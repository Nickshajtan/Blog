<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
    <header>
            <!-- Start Header -->
        <?php if( has_nav_menu('primary' ) ) : ?>    
        <div class="container zerogrid">
            <div class="col-full"><div class="wrap-col">
                <div id="header-nav-container">
                        <?php
                            if ( empty( the_custom_logo() ) ) {
                            $blog_title = get_bloginfo('name');
                                echo '<h1 style="color:#fff; float:left;">' . $blog_title . '</h1>'; 
                            }
                            if ( function_exists( 'the_custom_logo' ) ) {
		                              the_custom_logo();
	                        }
                        ?>
                        <!-- Navigation Menu -->
        <?php wp_nav_menu( array('menu' => 'primary', 'container' => '', 'menu_class' => 'sf-menu', 'depth' => 0 )); ?>
                        <!-- End Navigation Menu -->
                        <div class="clear"></div>

                </div>
                </div>
            </div>
        <div class="clear"></div> 
        </div>
        <?php endif; ?>
        <div class="spacing-30"></div>
        <!-- End Header -->
        <?php if((is_front_page()) || (is_home()) ) : ?>
           <?php if ( is_active_sidebar( 'header' ) ) : ?> 
             <div class="container zerogrid">
              <div class="col-full page-conainer">
                   <?php dynamic_sidebar( 'header' ); ?>
              </div>
             </div>
           <?php else : ?>
            <!-- Start Featured Carousel -->
            <div class="container zerogrid">
                <div class="list_carousel">
                <ul id="featured-posts">
                <?php $the_query = new WP_Query( 'showposts=9' ); ?>
                <?php $i = 1; ?>
    <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
                <li class="<?php echo ( $i % 3 == 0 ) ?  'last ' : 'first '; ?> carousel-item">
                    <div class="post-margin">
                        <h6>
                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </h6>
                        <span><i class="fa fa-clock-o"></i>&nbsp<?php echo get_the_date('d.m.Y'); ?></span>
                    </div>

                                <div class="featured-image">
                                <?php if ( has_post_thumbnail()) : ?>
                                   <?php 
                                    $default_attr = array(
                                        'src' => $src,
                                        'class' => "attachment-$size attachment-post-standard",
                                        'alt' => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                                        'width' => 290,
                                        'height' => 130
                                    );
                                    the_post_thumbnail('blog-thumb', $default_attr); ?>
                                <?php endif; ?>
                        <div class="post-icon">
<!--
                            <span class="fa-stack fa-lg">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i></span>
-->
                        </div>
                    </div>
                    <div class="post-margin">
                        <p><?php the_excerpt(__('(more…)')); ?></p>
                    </div>
                </li>
                <?php $i++; ?>
        <?php endwhile; ?>
                </ul>

                <div class="clear"></div>

                    <div class="carousel-controls">
                        <a id="prev2" class="prev" href="#"><i class="fa fa-angle-left"></i></a>
                        <a id="next2" class="next" href="#"><i class="fa fa-angle-right"></i></a>
                      <div class="clear"></div>
                    </div>
              </div>
            </div>
            <!-- End Featured Carousel -->
        <?php endif; ?>
    <?php endif; ?>
    <?php $header = get_header_image();
        if(!empty($header)) : ?>
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    <?php endif; ?>
    </header>