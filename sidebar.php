<?php
/*
    Sidebar template file
*/
?>
<aside>
    <?php if ( is_active_sidebar( 'column' ) ){
              dynamic_sidebar( 'column' ); 
           } ?>
</aside>