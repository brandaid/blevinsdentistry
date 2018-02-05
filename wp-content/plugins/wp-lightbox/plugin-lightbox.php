<?PHP
/*
  Plugin Name: Lightbox Evolution
  Plugin URI: http://codecanyon.net/item/lightbox-evolution-for-wordpress/119478
  Description: <strong>Lightbox Evolution</strong> is a tool for displaying images, html content, maps, and videos in a "lightbox" style that floats overtop of web page. Using Lightbox Evolution, website authors can showcase a wide assortment of media in all major browsers without navigating users away from the linking page.
  Version: 1.8.1
  Author: Eduardo Daniel Sada
  Author URI: http://codecanyon.net/user/aeroalquimia/portfolio
*/

$myplugin = array();
$myplugin['file'] = __FILE__;

include("classes/aeropanel.php");
include("panel-config.php");

$lbe_panel->queue($lbe_panel->path() . "/js/aeropanel/themepreview.js", "script");

function lbe_myplugin_lightbox($content)
{
  global $post, $lbe_panel;

  $shortcode       = $lbe_panel->get_option('shortcode');
  $autolightboxing = (int) $lbe_panel->get_option('autolightboxing');
  $autogroup       = (bool) $lbe_panel->get_option('autogroup') ? 'rel=\"gallery-'.$post->ID.'\"' : '';

  if ($autolightboxing==3 || $autolightboxing==2)
  {
/*
    $pattern['search']  = '/(<a(.*?)href="([^"]*.)(jpg|jpeg|png|gif|tiff|bmp|swf)"(.*?)>)/ie';
*/
    $pattern['search']  = '/(?><a([^>]*?)href=)[\"\\\']((?:[^>]*?)\.(?:jpg|jpeg|png|gif|bmp|swf)+?)[\"\\\']([^>]*)>/ie';

/*
    $pattern['replace'] = 'stripslashes(strstr("\2\5","class=") ? "\1" : "<a\2href=\"\3\4\"\5 class=\"lightbox\" '.$autogroup.'>")';
*/
    $pattern['replace'] = 'stripslashes(strstr("\1\3", "class=") ? "\0" : "<a\1href=\"\2\"\3 class=\"'.$shortcode.'\" '.$autogroup.'>")';

    $content = preg_replace($pattern['search'], $pattern['replace'], $content);
  }

  if ($autolightboxing==3 || $autolightboxing==1)
  {
    $videoregs['yoube']         = "youtu\.be\/";
    $videoregs['youtube']       = "youtube\.com\/watch";
    $videoregs['vimeo']         = "vimeo\.com\/";
    $videoregs['metacafe']      = "metacafe\.com\/watch";
    $videoregs['dailymotion']   = "dailymotion\.com\/video";
    $videoregs['collegehumor']  = "collegehumor\.com\/video";
    $videoregs['ustream']       = "ustream\.tv";
    $videoregs['twitvid']       = "twitvid\.com\/";
    $videoregs['wordpress']     = "v\.wordpress\.com";
    $videoregs['vzaar']         = "vzaar\.com\/videos";

    $video_options = implode("|", $videoregs);

    $pattern['search']  = '/(?><a([^>]*?)href=)[\\"\\\']((?:http[s]?:\\/\\/(?:w{3}\\.)?(?:'.$video_options.')+?[^>]*?))[\\"\\\']([^>]*)>/ie';

    // $pattern['replace'] = 'stripslashes(strstr("\1\3","class=") ? "\0" : "<a\1href=\"\2\"\3 class=\"lightbox\">")';
    $pattern['replace'] = 'strstr("\1\3", "class=") ? "\0" : "<a\1href=\"\2\"\3 class=\"'.$shortcode.'\">"';

    $content = preg_replace($pattern['search'], $pattern['replace'], $content);
  }

  return $content;
}
add_filter('the_content', 'lbe_myplugin_lightbox', 12);


function lbe_myplugin_lightbox_wp_print_styles()
{
  global $lbe_panel;
  echo '

<link rel="stylesheet" href="'.$lbe_panel->path().'/js/lightbox/themes/'.$lbe_panel->get_option('theme').'/jquery.lightbox.css" type="text/css" media="all"/>
<!--[if IE 6]>
<link rel="stylesheet" href="'.$lbe_panel->path().'/js/lightbox/themes/'.$lbe_panel->get_option('theme').'/jquery.lightbox.ie6.css" type="text/css" media="all"/>
<![endif]-->

<style type="text/css">
.jquery-lightbox-overlay
{
  background: '.($lbe_panel->get_option('background_custom') ? '#'.$lbe_panel->get_option('background_custom') : $lbe_panel->get_option('background')).';
}
</style>

';
}
add_action('wp_print_styles', 'lbe_myplugin_lightbox_wp_print_styles', 1);

function lbe_myplugin_lightbox_wp_enqueue_script()
{
  global $lbe_panel;

  $jqueryVersion = $lbe_panel->get_option('jquery');

  if ($jqueryVersion)
  {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $lbe_panel->path().'/js/jquery-'.$jqueryVersion.'.min.js', false, $jqueryVersion);
  }

  wp_enqueue_script('jquery');
}
add_action('wp_head', 'lbe_myplugin_lightbox_wp_enqueue_script', 1);



function lbe_myplugin_lightbox_footer()
{
  global $lbe_panel;

  $exec = trim($lbe_panel->get_option('exec'));
  $adv_options = trim($lbe_panel->get_option('adv_options'));

  $flash = '';
  if ($lbe_panel->get_option('default_width') || $lbe_panel->get_option('default_height'))
  {
    $flash = '$.lightbox().options.iframe = $.extend($.lightbox().options.flash, {';

    if ($lbe_panel->get_option('default_width'))
    {
      $flash .= 'width: '.(int)$lbe_panel->get_option('default_width').',';
    }
    if ($lbe_panel->get_option('default_height'))
    {
      $flash .= 'height: '.(int)$lbe_panel->get_option('default_height').',';
    }
    $flash .= 'custom: 1';

    $flash .= '});';
  }

  echo '
<script type="text/javascript" src="'.$lbe_panel->path().'/js/lightbox/jquery.lightbox.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    '.$flash.'
    $.lightbox().overlay.options.style.opacity = '.(float)$lbe_panel->get_option('background_opacity').';
    $.extend(true, $.lightbox().options, {
      emergefrom : "'.$lbe_panel->get_option('emergefrom').'",
      animation  : {
        move: {
          duration: '.((int)$lbe_panel->get_option('moveduration')).
          ((bool)$lbe_panel->get_option('animationeasing')?'':',easing: "swing"').'
        }
      }
    });

    '.$exec.'

    $(".lbe-lightbox,'.($lbe_panel->get_option('default_class') ? $lbe_panel->get_option('default_class') : ".lightbox, .evolution").'").lightbox({
      '.$adv_options.'
      modal       : '.(int)$lbe_panel->get_option('modal').',
      autoresize  : '.(int)$lbe_panel->get_option('autoresize').'
    });
  });
</script>
';
}
add_action('wp_footer', 'lbe_myplugin_lightbox_footer');



/*!
 * Gallery Shortcode
 * Filter the default gallery shortcode output.
 *
 * @see gallery_shortcode in wp-includes/media.php
 */
function lbe_gallery_shortcode($output, $attr)
{
  $post = get_post();

  static $instance = 0;
  $instance++;

  if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) ) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $html5 = current_theme_supports( 'html5', 'gallery' );
  $atts = shortcode_atts( array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post ? $post->ID : 0,
    'itemtag'    => $html5 ? 'figure'     : 'dl',
    'icontag'    => $html5 ? 'div'        : 'dt',
    'captiontag' => $html5 ? 'figcaption' : 'dd',
    'columns'    => 3,
    'size'       => 'thumbnail',
    'include'    => '',
    'exclude'    => '',
    'link'       => ''
  ), $attr, 'gallery' );

  $id = intval( $atts['id'] );

  if ( ! empty( $atts['include'] ) ) {
    $_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( ! empty( $atts['exclude'] ) ) {
    $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  } else {
    $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
  }

  if ( empty( $attachments ) ) {
    return '';
  }

  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment ) {
      $output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    }
    return $output;
  }

  $itemtag = tag_escape( $atts['itemtag'] );
  $captiontag = tag_escape( $atts['captiontag'] );
  $icontag = tag_escape( $atts['icontag'] );
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    $itemtag = 'dl';
  }
  if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    $captiontag = 'dd';
  }
  if ( ! isset( $valid_tags[ $icontag ] ) ) {
    $icontag = 'dt';
  }

  $columns = intval( $atts['columns'] );
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';

  $selector = "gallery-{$instance}";

  $gallery_style = '';

  if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
    $gallery_style = "
    <style type='text/css'>
      #{$selector} {
        margin: auto;
      }
      #{$selector} .gallery-item {
        float: {$float};
        margin-top: 10px;
        text-align: center;
        width: {$itemwidth}%;
      }
      #{$selector} img {
        border: 2px solid #cfcfcf;
      }
      #{$selector} .gallery-caption {
        margin-left: 0;
      }
    </style>
    <!-- see lbe_gallery_shortcode() in wp-content/plugins/wp-lightbox/plugin-lightbox.php -->";
  }

  $size_class = sanitize_html_class( $atts['size'] );
  $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

  $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

	$i = 0;
  foreach ( $attachments as $id => $attachment ) {

    // Desde aqui es mio:
    $attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
    $title = trim( $attachment->post_content ) ? wptexturize($attachment->post_content) : wptexturize($attachment->post_excerpt);

    if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
      $image_output = lbe_get_attachment_link( $id, $atts['size'], false, false, false, $attr, $selector, $title );
    } elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
      $image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
    } else {
      $image_output = lbe_get_attachment_link( $id, $atts['size'], true, false, false, $attr, $selector, $title );
    }
    $image_meta  = wp_get_attachment_metadata( $id );
    // Hasta aqui

    $orientation = '';
    if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
      $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
    }
    $output .= "<{$itemtag} class='gallery-item'>";
    $output .= "
      <{$icontag} class='gallery-icon {$orientation}'>
        $image_output
      </{$icontag}>";
    if ( $captiontag && trim($attachment->post_excerpt) ) {
      $output .= "
        <{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
        " . wptexturize($attachment->post_excerpt) . "
        </{$captiontag}>";
    }
    $output .= "</{$itemtag}>";
    if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
      $output .= '<br style="clear: both" />';
    }
  }

  if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
    $output .= "
      <br style='clear: both' />";
  }

  $output .= "
    </div>\n";

  return $output;
}


function lbe_get_attachment_link( $id = 0, $size = 'thumbnail', $permalink = false, $icon = false, $text = false, $attr = '', $selector = '', $title = '' ) {
  $id = intval( $id );
  $_post = get_post( $id );

  if ( empty( $_post ) || ( 'attachment' != $_post->post_type ) || ! $url = wp_get_attachment_url( $_post->ID ) )
    return __( 'Missing Attachment' );

  if ( $permalink )
    $url = get_attachment_link( $_post->ID );

  if ( $text ) {
    $link_text = $text;
  } elseif ( $size && 'none' != $size ) {
    $link_text = wp_get_attachment_image( $id, $size, $icon, $attr );
  } else {
    $link_text = '';
  }

  if ( trim( $link_text ) == '' )
    $link_text = $_post->post_title;

  return apply_filters( 'wp_get_attachment_link', "<a href='$url' title='$title' rel='$selector' class='lbe-lightbox'>$link_text</a>", $id, $size, $permalink, $icon, $text );
}

if ((bool) $lbe_panel->get_option('autogallery'))
{
  add_filter("post_gallery", "lbe_gallery_shortcode", 1, 2);
}

function lbe_lightbox_shortcode($atts, $content = null)
{
  $options    = array();
  $prop_rel   = "";
  $prop_class = "";
  $prop_href  = "";

  foreach ((array)$atts as $key=>$option)
  {
    if ($key != 'href' && $key != 'rel')
    {
      $options["lightbox[$key]"] = $option;
    }
  }

  if (isset($atts['rel']))
  {
    $prop_rel = ' rel="'.$atts['rel'].'" ';
  }

  if (isset($atts['href']))
  {
    $prop_href = ' href="'.add_query_arg($options, do_shortcode($atts['href'])).'" ';
  }

  $prop_class = ' class="lbe-lightbox" ';

  $content = do_shortcode($content);

  return '<a '.$prop_href.$prop_class.$prop_rel.'>'.$content.'</a>';
}
add_shortcode($lbe_panel->get_option('shortcode'), "lbe_lightbox_shortcode");





add_action( 'after_wp_tiny_mce', 'lbe_after_wp_tiny_mce' );
function lbe_after_wp_tiny_mce()
{
  ?>
  <script type="text/javascript">
  ( function( $ ) {
    var linkTarget = $(".link-target");

    var linkLB = '';
    linkLB += '<div class="link-target">';
    linkLB += '<label><span>&nbsp;</span><input type="checkbox" id="wp-link-lbe" /> ' + "Use Lightbox Evolution" + '</label>';
    linkLB += '</div>';

    linkTarget.after( linkLB );

    var oldGetAttrs = wpLink.getAttrs;
    wpLink.getAttrs = function( )
    {
      var obj = oldGetAttrs.call( wpLink );
      obj.class = ($( "#wp-link-lbe" ).prop( "checked" ) ? "lbe-lightbox" : "" );

      return obj;
    };

    var oldmceRefresh = wpLink.mceRefresh;

    wpLink.mceRefresh = function( )
    {
      oldmceRefresh.call( wpLink );

      var editor = tinymce.get( wpActiveEditor );
      var text,
        selectedNode = editor.selection.getNode(),
        linkNode = editor.dom.getParent( selectedNode, 'a[href]' ),
        onlyText = this.hasSelectedText( linkNode );

      var wplbe = $( "#wp-link-lbe" );

      if ( linkNode ) {
        wplbe.prop( "checked", "lbe-lightbox" === editor.dom.getAttrib( linkNode, 'class' ) );
      }
      else
      {
        wplbe.prop( "checked", false );
      }
    };

  } )( jQuery );
  </script>
  <?php
}

function lbe_admin_add_help_tab()
{
  $screen = get_current_screen();

  $screen->add_help_tab( array(
    'id'  => 'lbe_help_tab',
    'title' => __('Using Lightbox Evolution'),
    'content' => '<p>Read how to use it here: <a target="__blank" href="options-general.php?page=plugin-lightbox.php&subpage=1">Lightbox Evolution Help</a></p>',
  ) );
}

add_action( 'load-post.php', 'lbe_admin_add_help_tab' );
