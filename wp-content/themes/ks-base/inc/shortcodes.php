<?php
/**
* Add Custom Short Codes
*
*
* @package understrap
*/

// function shortcode_handler($atts) {
//    code goes here
// }
// add_shortcode('name_of_shortcode','shortcode_handler');

/********** Practic Name **********/
function practice_name_shortcode($atts) {
  return bloginfo( 'name' );
}
add_shortcode('practice-name','practice_name_shortcode');

/********** Location Names **********/

/** Location Name 1 **/
function loc1_name_shortcode($atts) {
  return get_theme_mod('themeslug_loc1_name');
}
add_shortcode('loc1-name','loc1_name_shortcode');

/** Location Name 2 **/
function loc2_name_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_name');
}
add_shortcode('loc2-name','loc2_name_shortcode');

/** Location Name 3 **/
function loc3_name_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_name');
}
add_shortcode('loc3-name','loc3_name_shortcode');

/** Location Name 4 **/
function loc4_name_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_name');
}
add_shortcode('loc4-name','loc4_name_shortcode');

/** Location Name 5 **/
function loc5_name_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_name');
}
add_shortcode('loc5-name','loc5_name_shortcode');

/** Location Name 6 **/
function loc6_name_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_name');
}
add_shortcode('loc6-name','loc6_name_shortcode');


/********** Addresses **********/

/** Location Address 1 **/
function loc1_street_shortcode($atts) {
  return get_theme_mod('themeslug_address_street');
}
add_shortcode('loc1-street','loc1_street_shortcode');

function loc1_city_shortcode($atts) {
  return get_theme_mod('themeslug_address_city');
}
add_shortcode('loc1-city','loc1_city_shortcode');

function loc1_state_shortcode($atts) {
  return get_theme_mod('themeslug_address_state');
}
add_shortcode('loc1-state','loc1_state_shortcode');

function loc1_zip_shortcode($atts) {
  return get_theme_mod('themeslug_address_zip');
}
add_shortcode('loc1-zip','loc1_zip_shortcode');

/** Location Address 2 **/
function loc2_street_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_address_street');
}
add_shortcode('loc2-street','loc2_street_shortcode');

function loc2_city_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_address_city');
}
add_shortcode('loc2-city','loc2_city_shortcode');

function loc2_state_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_address_state');
}
add_shortcode('loc2-state','loc2_state_shortcode');

function loc2_zip_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_address_zip');
}
add_shortcode('loc2-zip','loc2_zip_shortcode');

/** Location Address 3 **/
function loc3_street_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_address_street');
}
add_shortcode('loc3-street','loc3_street_shortcode');

function loc3_city_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_address_city');
}
add_shortcode('loc3-city','loc3_city_shortcode');

function loc3_state_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_address_state');
}
add_shortcode('loc3-state','loc3_state_shortcode');

function loc3_zip_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_address_zip');
}
add_shortcode('loc3-zip','loc3_zip_shortcode');

/** Location Address 4 **/
function loc4_street_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_address_street');
}
add_shortcode('loc4-street','loc4_street_shortcode');

function loc4_city_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_address_city');
}
add_shortcode('loc4-city','loc4_city_shortcode');

function loc4_state_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_address_state');
}
add_shortcode('loc4-state','loc4_state_shortcode');

function loc4_zip_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_address_zip');
}
add_shortcode('loc4-zip','loc4_zip_shortcode');

/** Location Address 5 **/
function loc5_street_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_address_street');
}
add_shortcode('loc5-street','loc5_street_shortcode');

function loc5_city_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_address_city');
}
add_shortcode('loc5-city','loc5_city_shortcode');

function loc5_state_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_address_state');
}
add_shortcode('loc5-state','loc5_state_shortcode');

function loc5_zip_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_address_zip');
}
add_shortcode('loc5-zip','loc5_zip_shortcode');

/** Location Address 6 **/
function loc6_street_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_address_street');
}
add_shortcode('loc6-street','loc6_street_shortcode');

function loc6_city_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_address_city');
}
add_shortcode('loc6-city','loc6_city_shortcode');

function loc6_state_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_address_state');
}
add_shortcode('loc6-state','loc6_state_shortcode');

function loc6_zip_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_address_zip');
}
add_shortcode('loc6-zip','loc6_zip_shortcode');


/********** Phone Numbers **********/

/** Location Phone 1 **/
function loc1_phone_shortcode($atts) {
  return get_theme_mod('themeslug_phone');
}
add_shortcode('loc1-phone','loc1_phone_shortcode');

/** Location Phone 2 **/
function loc2_phone_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_phone');
}
add_shortcode('loc2-phone','loc2_phone_shortcode');

/** Location Phone 3 **/
function loc3_phone_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_phone');
}
add_shortcode('loc3-phone','loc3_phone_shortcode');

/** Location Phone 4 **/
function loc4_phone_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_phone');
}
add_shortcode('loc4-phone','loc4_phone_shortcode');

/** Location Phone 5 **/
function loc5_phone_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_phone');
}
add_shortcode('loc5-phone','loc5_phone_shortcode');

/** Location Phone 6 **/
function loc6_phone_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_phone');
}
add_shortcode('loc6-phone','loc6_phone_shortcode');

/********** Google Maps **********/

/** Location 1 Map **/
function loc1_gmap_shortcode($atts) {
  return get_theme_mod('themeslug_gmap');
}
add_shortcode('loc1-gmap','loc1_gmap_shortcode');

/** Location 2 Map **/
function loc2_gmap_shortcode($atts) {
  return get_theme_mod('themeslug_loc2_gmap');
}
add_shortcode('loc2-gmap','loc2_gmap_shortcode');

/** Location 3 Map **/
function loc3_gmap_shortcode($atts) {
  return get_theme_mod('themeslug_loc3_gmap');
}
add_shortcode('loc3-gmap','loc3_gmap_shortcode');

/** Location 4 Map **/
function loc4_gmap_shortcode($atts) {
  return get_theme_mod('themeslug_loc4_gmap');
}
add_shortcode('loc4-gmap','loc4_gmap_shortcode');

/** Location 5 Map **/
function loc5_gmap_shortcode($atts) {
  return get_theme_mod('themeslug_loc5_gmap');
}
add_shortcode('loc5-gmap','loc5_gmap_shortcode');

/** Location 6 Map **/
function loc6_gmap_shortcode($atts) {
  return get_theme_mod('themeslug_loc6_gmap');
}
add_shortcode('loc6-gmap','loc6_gmap_shortcode');