<?php
/*
    Category template file
*/
?>
<?php get_header(); ?>
<article>
<!-- Start Main Container -->
    <div class="container zerogrid">
    <h1 class="page-title"><?php single_cat_title(); ?></h1>
    <?php
                    $category_description = category_description();
                    if ( ! empty( $category_description ) )
                        echo '<div class="archive-meta">' . $category_description . '</div>';
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="col-full page-conainer">
	        <div class="wrap-col">
               <div class="post-margin">
                <h5 class="page-title"><?php the_title(); ?></h5>
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
                    <p>Простите...ничего не найдено.</p>
               </div>
    <?php endif; ?>    
        <div class="clear"></div>
    </div>
<!-- End Main Container -->
</article>    
<?php get_footer(); ?>