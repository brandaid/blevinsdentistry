<?php
/*
Plugin Name: 5sec Disable Formatting
Plugin URI: http://5sec-disable-formatting.webfactoryltd.com/
Description: Disables default post/page formating globally (set it in Settings - Writing), on a per-post basis (set post's custom field "raw" to "1") or on a  shortcode basis (use [raw]some HTML code[/raw]).
Author: Web factory Ltd
Version: 1.0
Author URI: http://www.webfactoryltd.com/
*/

// shortcode name, change if necessary
define('DISABLE_FORMATTING_SHORTCODE', 'raw');
// custom field name, change if necessary
define('DISABLE_FORMATTING_CUSTOM_FIELD', 'raw');

// **********************************
// !! DO NOT TOUCH BELOW THIS LINE !!
// **********************************

class wf_df {
  public function init() {
    // check if shortcode name is available
    global $shortcode_tags;
    if (isset($shortcode_tags[DISABLE_FORMATTING_SHORTCODE])) {
      add_action('admin_footer', array('wf_df', 'warning'));
    }

    // add option to settings - writing
    if (is_admin()){
      add_action('admin_init', array('wf_df', 'register_settings'));
    }

    // disable default filters and replace them with our custom one
    remove_filter('the_content', 'wpautop');
    remove_filter('the_content', 'wptexturize');
    add_filter('the_content', array('wf_df', 'content_filter'), 99, 1);
    
    return;
  } // init
  
  public function register_settings() {
    register_setting('writing', 'disable_formatting', array('wf_df', 'to_bool'));
    add_settings_field('disable_formatting', 'Disable formatting', array('wf_df', 'settings_callback'), 'writing', 'default', null);
    
    return;
  } // registered_settings
  
  public function settings_callback() {
    echo '<label for="disable_formatting">';
    echo '<input type="checkbox" value="1" id="disable_formatting" name="disable_formatting"';
    echo checked('1', get_option('disable_formatting'), false)  . ' >';
    echo "\n" . _('Disable default WordPress formatting on all posts and pages') . '</label>';
    
    return;
  } // settings_callback
  
  // disable/enable formating on a global, per post or per shortcode basis
  function content_filter($content) {
    global $post;
    $out = '';
    
    if (get_option('disable_formatting')) {
      if (get_post_meta($post->ID, 'not-' . DISABLE_FORMATTING_CUSTOM_FIELD, true)) {
        $out = wptexturize(wpautop($content));
      } else {
        $out = $content;
      }
    } elseif (get_post_meta($post->ID, DISABLE_FORMATTING_CUSTOM_FIELD, true)) {
      $out = $content;
    } else {
      $pattern = '{(\[' . DISABLE_FORMATTING_SHORTCODE. '\].*?\[/' . DISABLE_FORMATTING_SHORTCODE . '\])}is';
      $pattern_pieces = '{\[' . DISABLE_FORMATTING_SHORTCODE . '\](.*?)\[/' . DISABLE_FORMATTING_SHORTCODE . '\]}is';
      $pieces = preg_split($pattern, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

      foreach ($pieces as $piece) {
        if (preg_match($pattern_pieces, $piece, $matches)) {
          $out .= $matches[1];
        } else {
          $out .= wptexturize(wpautop($piece));
        }
      } // foreach
    }
    
    return $out;
  } // content_filter

  public function to_bool($value) {
    return (bool) $value;
  } // to_bool
  
  public function warning() {
    echo '<div id="message" class="error"><p><strong>5sec Disable Formatting is clashing with another plugin!</strong> The shortcode [' . DISABLE_FORMATTING_SHORTCODE . '] is already in use. Please refer to <a href="http://5sec-disable-formatting.webfactoryltd.com/">documentation</a> to solve this issue.</p></div>';
  
    return;
  } // warning
} // class wf_df

// hook our thing
add_action('init', array('wf_df', 'init'));
?>