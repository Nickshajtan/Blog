<?php
/*
    Page template file
*/
?>
<?php get_header(); ?>
<article>
<!-- Start Main Container -->
    <div class="container zerogrid">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="col-full page-conainer">
	        <div class="wrap-col">
               <div class="post-margin">
                <h5 class="page-title"><?php the_title(); ?></h5>
                 <!-- Start Entry -->
                    <p><?php the_content(); ?></p>
                    <div class="symple-clear-floats"></div>
                 <!-- End Entry -->
               </div>
            </div>
        </div>
               <?php if (comments_open()){ 
                     comments_template();
                } ?> 
        </div>
    <?php endwhile; ?>
    <?php else : ?>
           <div class="container zerogrid">
              <div class="col-full page-conainer">
                    <p>Простите...ничего не найдено.</p>
               </div>
            </div>
    <?php endif; ?>    
        <div class="clear"></div>
<!-- End Main Container -->
</article>    
<?php get_footer(); ?>