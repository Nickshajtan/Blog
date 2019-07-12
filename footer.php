    <footer>
    <!-- Start Footer -->
    <div class="spacing-30"></div>
    <div class="container zerogrid">
        <div id="footer-container" class="col-full">
        <div class="wrap-col">	
            <!-- Footer Copyright -->
                <p> Copyrigh &copy; 2018-<?php echo date('Y');?>  All Rights Reserved.
                </p>
            <!-- End Footer Copyright -->
            <?php
            $contact_text = get_option('theme_contacttext');
            if(!empty($contact_text)){
                echo '<p>'. $contact_text . '</p>';
            }
            $phone = get_option('site_telephone');
            if(!empty($phone)){
                echo '<p>'. $phone . '</p>';
            }
            ?>
            
            <!-- Footer Logo -->
			            <?php
                            if ( function_exists( 'the_custom_logo' ) ) {
		                              the_custom_logo();
	                        }
                        ?>
            <!-- End Footer Logo -->
            <?php if ( is_active_sidebar( 'footer' ) ) : ?> 
              <div style="float: right;">
                  <?php dynamic_sidebar( 'footer' ); ?>
              </div>
            <?php endif; ?>
            <?php if( wp_is_mobile() ) : ?>
            <!-- Navigation Menu -->
            <?php if( has_nav_menu('primary mobile' ) ){
                 wp_nav_menu( array('menu' => 'primary mobile', 'container' => '', 'menu_class' => 'sf-menu', 'depth' => 0 ));
            }
            ?>
            <!-- End Navigation Menu -->
            <?php endif; ?>
        <div class="clear"></div>
		</div>
        </div>
    </div>
    <?php $position = get_theme_mod('select');
        if(($position == 'left') && ($position != 'right')) : ?>
    <style>
        #post-container{
            float: right;
        }
    </style>
    <?php endif; ?>
    <?php if(($position == 'right') && ($position != 'left')) : ?>
    <style>
        #post-container{
            float: left;
        }
    </style>
    <?php endif; ?>
    <?php $position = get_theme_mod('slider');
        if($position == 'none') : ?>
    <style>
        .list_carousel{
            display: none;
        }
    </style>
    <?php endif; ?>
    <!-- End Footer -->
        <?php wp_footer(); ?>
    </footer>
    </body>
</html>