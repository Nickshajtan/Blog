<?php
/*
    Main template file
*/
?>
<?php get_header(); ?>
<main>
    <div class="container zerogrid">
        <!-- Start Posts Container -->
        <?php if ( have_posts() ) : ?>
        <div class="col-2-3" id="post-container">
 			<div class="wrap-col">
                <?php while ( have_posts() ) : the_post(); ?>
               <!-- Start Post Item -->
            <div class="post">
            	<div class="post-margin">
                <?php $autor = get_avatar( get_the_author_email() ); ?>
                <?php if( !empty( ( $autor ) ) ) : ?>
                <div class="post-avatar">
                    <div class="avatar-frame"></div>
                    <?php echo get_avatar( get_the_author_email() ); ?>               
                </div>
                <?php endif; ?>
                
                <h4 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                	<ul class="post-status">
                    <li><i class="fa fa-clock-o"></i><?php echo get_the_date('d.m.Y'); ?></li>
                    <li><i class="fa fa-folder-open-o"></i><?php the_category(' ', 'single'); ?></li>
                    <li><i class="fa fa-comment-o"></i><?php comments_number('нет комментариев', '1 комментарий', '% комментариев'); ?></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                
                    <div class="featured-image">
                    <?php if ( has_post_thumbnail()) : ?>
                                  <?php 
                                    $default_attr = array(
                                        'src' => $src,
                                        'class' => "attachment-$size attachment-post-standard",
                                        'alt' => trim(strip_tags( $wp_postmeta->_wp_attachment_image_alt )),
                                    );
                                    the_post_thumbnail('large', $default_attr); ?>
                    <?php endif; ?>            
                        <div class="post-icon">
<!--
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                        </span>
-->
                        </div>
                    </div>
                                
            <div class="post-margin">
            <p>
                <?php the_excerpt(); ?>
            </p>
            </div>
             <ul class="post-social">
             <li>
                   <noindex>
                     <a rel="nofollow" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>', 'facebook', 'width=1000, height=1024'); return false;" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Поделиться в Facebook" target="_blank">
                     <i class="fa fa-facebook"></i></a>
                 </noindex>     
             </li>                        
             <li>
                 <noindex>
                     <a onclick="window.open('http://twitter.com/home?status=Читаю <?php the_permalink(); ?>: <?php the_title(); ?>', 'twitter', 'width=1000, height=1024'); return false;" href="http://twitter.com/home?status=Читаю <?php the_permalink(); ?>: <?php the_title(); ?>" title="Добавить в Twitter" target="_blank" rel="nofollow" >
                 <i class="fa fa-twitter"></i></a>
                 </noindex>
             </li>
      
             <li>
              <noindex>
                     <a rel="nofollow" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>', 'google-plus', 'width=1000, height=1024'); return false;" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Поделиться в Google+" target="_blank">
                 <i class="fa fa-google-plus"></i></a>
                 </noindex>
             </li>
            
            <li>
                <noindex>
                     <a rel="nofollow" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&<?php the_permalink(); ?>', 'google-plus', 'width=1000, height=1024'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&<?php the_permalink(); ?>" title="Поделиться в Linkedin" target="_blank">
                 <i class="fa fa-linkedin"></i></a>
                 </noindex>
            </li>
            
            <li>
            <a href="<?php the_permalink() ?>" class="readmore">Читать Дальше<i class="fa fa-arrow-circle-o-right"></i></a>
            </li>
            </ul>
            
            <div class="clear"></div>
            </div>
            <!-- End Post Item -->
            <?php endwhile; ?>
                <!-- Start Pagination -->
                    <div class="spacing-20"></div>
                    <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
                <!-- End Pagination -->
                <div class="clear"></div>
            </div>
        </div>
        <div class="col-1-3">
		    <div class="wrap-col">
               <?php get_sidebar(); ?>
                <div class="clear"></div>
            </div>
        </div>
        <?php else : ?>
           <div class="col-full page-conainer">
                <p>Простите...ничего не найдено.</p>
           </div>
        <?php endif; ?>
        <!-- End Posts Container -->
    </div>
</main>
<?php get_footer(); ?>
