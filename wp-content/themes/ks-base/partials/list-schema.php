<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "<?php echo get_theme_mod( 'themeslug_schema_business_type' ); ?>",
  "name": "<?php bloginfo('name'); ?>",
  "url": "<?php bloginfo('url'); ?>",
  "logo": "<?php echo get_theme_mod( 'themeslug_logo' ); ?>",
  "description": "<?php echo get_theme_mod( 'themeslug_footer_about_text' ); ?>",
  
  
  <?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>	
	"address":
    [
        {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_theme_mod( 'themeslug_address_city' ); ?>",
            "addressRegion": "<?php echo get_theme_mod( 'themeslug_address_state' ); ?>",
            "postalCode": "<?php echo get_theme_mod( 'themeslug_address_zip' ); ?>",
            "streetAddress": "<?php echo get_theme_mod( 'themeslug_address_street' ); ?>"
        },
        {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_theme_mod( 'themeslug_loc2_address_city' ); ?>",
            "addressRegion": "<?php echo get_theme_mod( 'themeslug_loc2_address_state' ); ?>",
            "postalCode": "<?php echo get_theme_mod( 'themeslug_loc2_address_zip' ); ?>",
            "streetAddress": "<?php echo get_theme_mod( 'themeslug_loc2_address_street' ); ?>"
        }
        <?php if (get_theme_mod ( 'themeslug_loc3_name') ) : ?>
        ,
        {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_theme_mod( 'themeslug_loc3_address_city' ); ?>",
            "addressRegion": "<?php echo get_theme_mod( 'themeslug_loc3_address_state' ); ?>",
            "postalCode": "<?php echo get_theme_mod( 'themeslug_loc3_address_zip' ); ?>",
            "streetAddress": "<?php echo get_theme_mod( 'themeslug_loc3_address_street' ); ?>"
        }
        <?php endif; ?>
        <?php if (get_theme_mod ( 'themeslug_loc4_name') ) : ?>
        ,
        {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_theme_mod( 'themeslug_loc4_address_city' ); ?>",
            "addressRegion": "<?php echo get_theme_mod( 'themeslug_loc4_address_state' ); ?>",
            "postalCode": "<?php echo get_theme_mod( 'themeslug_loc4_address_zip' ); ?>",
            "streetAddress": "<?php echo get_theme_mod( 'themeslug_loc4_address_street' ); ?>"
        }
        <?php endif; ?>
        <?php if (get_theme_mod ( 'themeslug_loc5_name') ) : ?>
        ,
        {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_theme_mod( 'themeslug_loc5_address_city' ); ?>",
            "addressRegion": "<?php echo get_theme_mod( 'themeslug_loc5_address_state' ); ?>",
            "postalCode": "<?php echo get_theme_mod( 'themeslug_loc5_address_zip' ); ?>",
            "streetAddress": "<?php echo get_theme_mod( 'themeslug_loc5_address_street' ); ?>"
        }
        <?php endif; ?>
        <?php if (get_theme_mod ( 'themeslug_loc6_name') ) : ?>
        ,
        {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo get_theme_mod( 'themeslug_loc6_address_city' ); ?>",
            "addressRegion": "<?php echo get_theme_mod( 'themeslug_loc6_address_state' ); ?>",
            "postalCode": "<?php echo get_theme_mod( 'themeslug_loc6_address_zip' ); ?>",
            "streetAddress": "<?php echo get_theme_mod( 'themeslug_loc6_address_street' ); ?>"
        }
        <?php endif; ?>
        
    ]	
  <?php else : ?>
	"address": {
	    "@type": "PostalAddress",
	    "streetAddress": "<?php echo get_theme_mod( 'themeslug_address_street' ); ?>",
	    "addressLocality": "<?php echo get_theme_mod( 'themeslug_address_city' ); ?>",
	    "addressRegion": "<?php echo get_theme_mod( 'themeslug_address_state' ); ?>",
	    "postalCode": "<?php echo get_theme_mod( 'themeslug_address_zip' ); ?>",
	    "addressCountry": "USA"
	  },
  <?php endif; ?>
  
  <?php if (!get_theme_mod ( 'themeslug_loc2_name') ) : ?>
  	"hasMap": "<?php echo get_theme_mod( 'themeslug_gmap' ); ?>",
  <?php endif; ?>
  
  "openingHours": "<?php if (get_theme_mod ( 'themeslug_schema_hours_mon') ) : ?>Mo <?php echo get_theme_mod( 'themeslug_schema_hours_mon' ); ?>,<?php endif; ?> <?php if (get_theme_mod ( 'themeslug_schema_hours_tues') ) : ?>Tu <?php echo get_theme_mod( 'themeslug_schema_hours_tues' ); ?>,<?php endif; ?> <?php if (get_theme_mod ( 'themeslug_schema_hours_weds') ) : ?>We <?php echo get_theme_mod( 'themeslug_schema_hours_weds' ); ?>,<?php endif; ?> <?php if (get_theme_mod ( 'themeslug_schema_hours_thurs') ) : ?>Th <?php echo get_theme_mod( 'themeslug_schema_hours_thurs' ); ?>,<?php endif; ?> <?php if (get_theme_mod ( 'themeslug_schema_hours_fri') ) : ?>Fr <?php echo get_theme_mod( 'themeslug_schema_hours_fri' ); ?><?php endif; ?> <?php if (get_theme_mod ( 'themeslug_schema_hours_sat') ) : ?>, Sa <?php echo get_theme_mod( 'themeslug_schema_hours_sat' ); ?>,<?php endif; ?> <?php if (get_theme_mod ( 'themeslug_schema_hours_sun') ) : ?>Su <?php echo get_theme_mod( 'themeslug_schema_hours_sun' ); ?><?php endif; ?>",
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": "Patient Service / New Appointments",
    "telephone": "<?php echo get_theme_mod( 'themeslug_phone' ); ?>"
  }
  "sameAs" : [ <?php if (get_theme_mod ( 'themeslug_show_facebook') == 'value1'  ) : ?>"<?php echo get_theme_mod( 'themeslug_facebook' ); ?>",<?php endif; ?>
    			<?php if (get_theme_mod ( 'themeslug_show_gplus') == 'value1'  ) : ?>"<?php echo get_theme_mod( 'themeslug_gplus' ); ?>",<?php endif; ?>
				<?php if (get_theme_mod ( 'themeslug_show_twitter') == 'value1'  ) : ?>"<?php echo get_theme_mod( 'themeslug_twitter' ); ?>",<?php endif; ?>
				<?php if (get_theme_mod ( 'themeslug_show_instagram') == 'value1'  ) : ?>"<?php echo get_theme_mod( 'themeslug_instagram' ); ?>",<?php endif; ?>
				]
}
 </script>