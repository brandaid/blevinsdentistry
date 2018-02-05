<?php
/**
 * Interactions with Google API v3
 * NOTE: Designed to be used with PHP v5 and up
 * 
 * @author Luca Montanari
 */
 
class gg_gplus_integration {
	
	private $client_id = '30140518177-feqfop7mqku6tla4f0mhde175pv5epig.apps.googleusercontent.com';
	private $client_secret = 'oJiuW8STONYXlftpX5SQYec6';
	private $redirect_uri = 'http://www.lcweb.it';
	private $scope = 'http://picasaweb.google.com/data/';	

	private $gallery_id = '';
	private $real_token = '';
	private $curl_cust_req = false;
	public $g_username = false;
	
	/* set gallery ID */
	public function __construct($gall_id, $username = false) {
		$this->gallery_id = $gall_id;
		if($username) {$this->g_username = $username;}
		return true;	
	}
	
	
	/* perform CURL call */
	private function curl_call($url, $params = false, $with_header = true) {
		if(!function_exists('curl_version')) {return false;}
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
       
	    if($with_header) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Authorization: Bearer ' . $this->real_token, 'X-JavaScript-User-Agent: Global Gallery', 'GData-Version: 2'));
		}
		if($params) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);	
		}
		
		if($this->curl_cust_req) {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->curl_cust_req);	
		}
		
		return curl_exec($ch);
	}
	
	
	
	/* first check - let user accept the app and get refresh token */
	public function accept_app() {
		 $params = array(
			'response_type' => 'code',
			'client_id' => $this->client_id,
			'redirect_uri' => $this->redirect_uri,
			'access_type' => 'offline',
			'scope' => $this->scope,
			'approval_prompt' => 'force'
		 );
 
		return 'https://accounts.google.com/o/oauth2/auth?' . http_build_query($params);
	}



    /* get access and refresh token */
    public function get_access_token($base_token, $g_username = false) {
		// get google username if is not set
		if(!$this->g_username && !$g_username) {
		   if($g_username) {$this->g_username = $g_username;}
		   else {$this->g_username = get_post_meta($this->gallery_id, 'gg_username', true);}
		}
		
		// check if a refresh token already exist for this base
		$stored_token = $this->base_tokens_db('get', $this->g_username); 
		if($stored_token && $stored_token['base'] == $base_token) {return $stored_token['refresh'];}
	   
		// get the new refresh token
		$tokenURL = 'https://accounts.google.com/o/oauth2/token';
		$postData = array(
			'code'          => $base_token,
			'client_id'     => $this->client_id,
			'client_secret' => $this->client_secret,
			'redirect_uri'  => $this->redirect_uri,
			'grant_type'    => 'authorization_code',
		);
		$data = json_decode( $this->curl_call($tokenURL, $postData, false) );

		if(isset($data->refresh_token)) {
			// store 
			$this->base_tokens_db('set', $this->g_username, array('base' => $base_token, 'refresh' => $data->refresh_token)); 
			
			return $data->refresh_token;
		} else {
			//var_dump($data); // debug
			return false;	
		}
	}
	
	
	
	/* get a refreshed token */
	public function get_refreshed_token() {
		// get refresh toke from database
		$stored_token = $this->base_tokens_db('get', $this->g_username); 
		if(!$stored_token) {return false;}
		
		$tokenURL = 'https://accounts.google.com/o/oauth2/token';
        $postData = array(
        	'refresh_token' => $stored_token['refresh'],
			'client_id'     => $this->client_id,
			'client_secret' => $this->client_secret,
			'grant_type'    => 'refresh_token',
        );

		$data = json_decode( $this->curl_call($tokenURL, $postData, false) );
		if(isset($data->access_token)) {
			return $data->access_token;
		} else {
			//var_dump($data); // debug
			return false;	
		}
    }
	
	
	
	/* manage base tokens database to avoid expired tokens
	 * 
	 *  @param string $action - action to perform - set/get
	 *  @param string $username - google username
	 *  @param array $tokens - associative array of base token + refresh token
	 */
	public function base_tokens_db($action, $username, $tokens = array('base' => '', 'refresh' => '')) {
		$db = get_option('gg_gplus_base_tokens_db', array());
		
		if($action == 'set') {
			$db[$username] = $tokens;
			update_option('gg_gplus_base_tokens_db', $db);
			
			// update other gplus galleries having the same username
			$args = array(
				'posts_per_page'   => -1,
				'post_type'        => 'gg_galleries',
				'post_status'      => array('trash', 'publish'),
				'post__not_in'     => array($this->gallery_id),
				'meta_query'	   => array(
					'relation' => 'AND',
					array('key' => 'gg_type', 'value' => 'picasa'),
					array('key' => 'gg_username', 'value' => $username),
				)
			);
			$galleries = new WP_Query($args);
			
			if(is_array($galleries->posts)) {
				foreach($galleries->posts as $gall) {
					update_post_meta($gall->ID, 'gg_psw', $tokens['base']);	
				}
			}
		}
		else {
			return (isset($db[$username])) ? $db[$username] : false; 	
		}
	}
	
	
	
	/* 
	 * check if is possible to perform a request - all data are ok 
	 * get temporary access token
	 */
	public function is_ok() {
		$this->real_token = $this->get_refreshed_token();
		return ($this->real_token) ? true : false;
	}
	
	
	//////////////////////////////////////////////////////////////////
	
	
	/* GET ALBUMS */
	public function get_albums($username) {
		$this->g_username = $username;
		$url = 'https://picasaweb.google.com/data/feed/api/user/'. urlencode($username);
		
		if($this->is_ok()) {
			$data = $this->curl_call($url);
			
			if(strpos($data, 'Unable to find user with email') === false) {
				$data = simplexml_load_string($data);
				
				$albums = array();
				foreach($data->entry as $album) {
					$id_arr = explode('/', $album->id);
					$albums[ end($id_arr) ] = (string)$album->title; 	
				}
				
				return $albums;
			}
			else {
				return false;	
			}
		}
	}
	
	
	/* GET IMAGES*/
	public function get_images($username, $album_id) {
		$this->g_username = $username;
		$url = 'https://picasaweb.google.com/data/feed/api/user/'. urlencode($username) .'/albumid/'. urlencode($album_id);
		
		if($this->is_ok()) {
			$data = $this->curl_call($url);

			if(strpos($data, 'Unable to find user with email') === false) {
				$data = simplexml_load_string($data);			
				return $data->entry;
			}
			else {
				return false;	
			}
		}
	}

}
