<?php
/*
    Page template file
*/
?>
<?php get_header(); ?>
<!-- Start Main Container -->
    <div class="container zerogrid">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="col-full page-conainer">
	        <div class="wrap-col">
               <div class="post-margin">
               <h5 class="page-title"><?php echo 'Результат поиска: ' . '<span>' . get_search_query() . '</span>'; ?></h5>
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                 <!-- Start Entry -->
                    <p><?php the_excerpt() ?></p>
                    <div>Дата добавления: <?php the_date() ?></div>
                    <div class="symple-clear-floats"></div>
                 <!-- End Entry -->
               </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php else : ?>
           <div class="col-full page-conainer">
	        <div class="wrap-col">
               <div class="post-margin">
                   <h5 class="page-title"><?php echo 'Результат поиска: ' . '<span>' . get_search_query() . '</span>'; ?></h5>
                    <p>Простите...ничего не найдено.</p>
                </div>
               </div>
            </div>
    <?php endif; ?>    
        <div class="clear"></div>
    </div>
<!-- End Main Container --> 
<?php get_footer(); ?>