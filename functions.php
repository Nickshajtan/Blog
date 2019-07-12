<?php 
/*
    Functions of theme
*/
?>
<?php 
//update_option( 'siteurl', '' );
//update_option( 'home', '' );
//Remove admin bar
add_action ('get_header', 'remove_admin_login_header');
function remove_admin_login_header () {
	 remove_action ('wp_head', '_admin_bar_bump_cb');
}
//Style css
add_action('wp_enqueue_scripts', 'load_sec_css');
function load_sec_css() {
    wp_register_style( 'reset',  get_template_directory_uri() . '/css/reset.css', array(), ' ' );
    wp_enqueue_style( 'reset',  get_template_directory_uri() . '/css/reset.css', array(), ' ' );
    wp_register_style( 'superfish',  get_template_directory_uri() . '/css/superfish.css', array(), ' ' );
    wp_enqueue_style( 'superfish',  get_template_directory_uri() . '/css/superfish.css', array(), ' ' );
    wp_register_style( 'fonts',  get_template_directory_uri() . '/css/font-awsome/css/font-awesome.css', array(), ' ' );
    wp_enqueue_style( 'fonts',  get_template_directory_uri() . '/css/font-awsome/css/font-awesome.css', array(), ' ' );
    wp_register_style( 'orbit',  get_template_directory_uri() . '/css/orbit.css', array(), ' ' );
    wp_enqueue_style( 'orbit',  get_template_directory_uri() . '/css/orbit.css', array(), ' ' );
    wp_register_style( 'styles',  get_template_directory_uri() . '/css/style.css', array(), ' ' );
    wp_enqueue_style( 'styles',  get_template_directory_uri() . '/css/style.css', array(), ' ' );
    wp_register_style( 'color',  get_template_directory_uri() . '/css/color/green.css', array(), ' ' );
    wp_enqueue_style( 'color',  get_template_directory_uri() . '/css/color/green.css', array(), ' ' );
    wp_register_style( 'grid',  get_template_directory_uri() . '/css/zerogrid.css', array(), ' ' );
    wp_enqueue_style( 'grid',  get_template_directory_uri() . '/css/zerogrid.css', array(), ' ' );
    wp_register_style( 'resp',  get_template_directory_uri() . '/css/responsive.css', array(), ' ' );
    wp_enqueue_style( 'resp',  get_template_directory_uri() . '/css/responsive.css', array(), ' ' );
}
// Style
add_action('wp_enqueue_scripts', 'load_css');
function load_css() {
    wp_register_style( 'styles', get_stylesheet_uri(), array(), ' ' );
    wp_enqueue_style( 'styles', get_stylesheet_uri(), array(), ' ' );
}
//JQUERY
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', get_stylesheet_directory_uri() .'/js/jquery.js',array(), null, true);
	wp_enqueue_script( 'jquery' );
}

//Load js
add_action( 'wp_enqueue_scripts', 'load_js' );
function load_js() {
    wp_register_script('migrate', get_stylesheet_directory_uri() . '/js/jquery-migrate.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'migrate', get_stylesheet_directory_uri() . '/js/jquery-migrate.min.js', array('jquery'), null, true );
    
    wp_register_script('jq', get_stylesheet_directory_uri() . '/js/jquery-1.10.2.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'jq', get_stylesheet_directory_uri() . '/js/jquery-1.10.2.min.js', array('jquery'), null, true );
   
    wp_register_script('slider', get_stylesheet_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), null, true );
    wp_enqueue_script( 'slider', get_stylesheet_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), null, true );
    wp_register_script('hover', get_stylesheet_directory_uri() . '/js/hoverIntent.js', array('jquery'), null, true );
    wp_enqueue_script( 'hover', get_stylesheet_directory_uri() . '/js/hoverIntent.js', array('jquery'), null, true );
    
    wp_register_script('fish', get_stylesheet_directory_uri() . '/js/superfish.js', array('jquery'), null, true );
    wp_enqueue_script( 'fish', get_stylesheet_directory_uri() . '/js/superfish.js', array('jquery'), null, true );
    
    wp_register_script('orbit', get_stylesheet_directory_uri() . '/js/orbit.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'orbit', get_stylesheet_directory_uri() . '/js/orbit.min.js', array('jquery'), null, true );
    wp_register_script('media', get_stylesheet_directory_uri() . '/js/css3-mediaqueries.js', array('jquery'), null, true );
    wp_enqueue_script( 'media', get_stylesheet_directory_uri() . '/js/css3-mediaqueries.js', array('jquery'), null, true );
    
    wp_register_script('cookie', get_stylesheet_directory_uri() . '/js/jquery.Storage.js', array('jquery'), null, true );
    wp_enqueue_script( 'cookie', get_stylesheet_directory_uri() . '/js/jquery.Storage.js', array('jquery'), null, true );
    
    wp_register_script('my', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true );
    wp_enqueue_script( 'my', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true );
//     $wnm_custom = array( 'template_url' => get_bloginfo('template_url') );
//     wp_localize_script( '', 'wnm_custom', $wnm_custom );
    
}
//Setup
//Add menus
if (function_exists('add_menus')) {
	add_menus('menus');
    
    add_filter('wp_nav_menu_objects', 'css_for_nav_parrent');
    function css_for_nav_parrent( $items ){
        foreach( $items as $item ){
            if( __nav_hasSub( $item->ID, $items ) )
                $item->classes[] = 'menu-item-has-children'; 
        }

        return $items;
    }
    function __nav_hasSub( $item_id, $items ){
        foreach( $items as $item ){
            if( $item->menu_item_parent && $item->menu_item_parent == $item_id )
                return true;
        }

        return false;
    }
}
//IMG_posts
add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150 ); 
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-thumb', 360, 264, array( 'left', 'top' ) ); 
    add_image_size( 'icons-small', 60, 60, array( 'left', 'top' ) ); 
    add_image_size( 'icons-middle', 171, 171, array( 'left', 'top' ) ); 
}
//Add a few file type
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; 
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; 
    $mime_types['dwg'] = 'image/vnd.dwg'; 
    $mime_types['docx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    $mime_types['xlsx'] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'; 
    $mime_types['ppt'] = 'application/vnd.ms-powerpoint';
    $mime_types['doc'] = 'application/msword';
    $mime_types['pdf'] = 'application/pdf';     
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);
//Add Navigation mobile
function extra_setup() {
    register_nav_menu ('primary mobile', __( 'Navigation Mobile', 'blog_minimal' )); 
} 
add_action( 'after_setup_theme', 'extra_setup' );

function set_container_class ($args) { 
    $args['container_class'] = str_replace(' ','-',$args['theme_location']).'-nav'; return $args;
}
add_filter ('wp_nav_menu_args', 'set_container_class');

//Theme settings
if ( ! function_exists( 'theme_setup' ) ){
    function theme_setup(){
        //Add support theme html 5    
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption') ); 
        //Add custom logo
        add_theme_support( 'custom-logo', array(
            'height'      => 53,
            'width'       => 262,
            'flex-height' => false,
        ) );
        //Menu
        register_nav_menus( array(
            'primary' => __( 'Top Menu', 'blog_minimal' )
        ) );
    }
}
add_action( 'after_setup_theme', 'theme_setup' );
remove_filter('the_content', 'wpautop');
//Pagination
function wp_corenavi() {
  global $wp_query;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 0; 
  $a['mid_size'] = 3; 
  $a['end_size'] = 1; 
  $a['prev_text'] = '&laquo;'; 
  $a['next_text'] = '&raquo;';

  if ($max > 1) echo '<ul class="navigation pagination">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links('<li>' . $a . '</li>');
  if ($max > 1) echo '</ul>';
}

//Add image-responsibive for all pages&posts
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//More link text
function my_more_link($more_link, $more_link_text) {
    return str_replace($more_link_text, 'Продолжить чтение...', $more_link);
}
add_filter('the_content_more_link', 'my_more_link', 10, 2);
//Comments
function my_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="related-posts">
            <div class="post-avatar">
            <?php echo get_avatar($comment,$size='48'); ?>
            </div>
                <div class="related-posts-aligned">            
                    <h6><?php printf(__('<cite class="fn">%s</cite> <span class="says">сказал:</span>'), get_comment_author_link()) ?></h6>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Ваш комментарий ожидает модерации.') ?></em>
                    <br />
                    <?php endif; ?>
                    <p><?php comment_text() ?></p>
                       <div class="wrapper">
                            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>  
<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div> 
                       </div>  
                    <div class="clear"></div>
                </div>
            <div class="clear"></div>
            </div>
       </div>
    </li>
<?php }
$fields = apply_filters( 'comment_form_default_fields', $fields );
function true_remove_url_field( $fields ) {
	unset( $fields['url'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', 'true_remove_url_field', 10, 1);

function wp_comments_queue_js() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'wp_comments_queue_js' );





function true_change_name( $field ) {
	return '<p class="comment-form-author"><label style="display:none" for="author"></label> <input id="author" name="author" type="text" value="" class="comment-name ntSaveForms" placeholder="Ваше имя" required="required" /></p>';
}
add_filter( 'comment_form_field_author', 'true_change_name', 10, 1);

function true_change_mail( $field ) {
	return '<p class="comment-form-email"><label style="display:none" for="email"></label><input id="email" name="email" type="text" value="" class="comment-email ntSaveForms"  placeholder="Ваш email" required="required" /></p>';
}
add_filter( 'comment_form_field_email', 'true_change_mail', 10, 1);
//Register sidebars
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
	register_sidebar( array(
		'name'          => 'Хедер',
		'id'            => "header",
		'description'   => 'Виджет последних записей',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n",
	) );
    
    register_sidebar( array(
		'name'          => 'Футер',
		'id'            => "footer",
		'description'   => 'Виджет футера, например для мейла',
		'class'         => '',
		'before_widget' => '',
		'after_widget'  => "",
		'before_title'  => '<p>',
		'after_title'   => "</p>\n",
	) );
    
    register_sidebar( array(
		'name'          => 'Боковой сайдбар',
		'id'            => "column",
		'description'   => 'Для виджетов в боковой колонке',
		'class'         => '',
		'before_widget' => '<div class="widget-container">',
		'after_widget'  => "<div class='clear'></div></div>\n",
		'before_title'  => '<h6 class="widgettitle widget-title">',
		'after_title'   => "</h6>\n",
	) );
}



//Disable email notification
remove_action( 'add_option_new_admin_email', 'update_option_new_admin_email' );
remove_action( 'update_option_new_admin_email', 'update_option_new_admin_email' );
/**
 * Disable the confirmation notices when an administrator
 * changes their email address.
 *
 * @see http://codex.wordpress.com/Function_Reference/update_option_new_admin_email
 */
function wpdocs_update_option_new_admin_email( $old_value, $value ) {

    update_option( 'admin_email', $value );
}
add_action( 'add_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
add_action( 'update_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );

//No core update information
if( ! current_user_can( 'edit_users' ) ){
	add_filter( 'auto_update_core', '__return_false' );  
    add_filter( 'pre_site_transient_update_core', '__return_null' );
}
//Show php errors only for admin

add_action('init', 'enable_errors');
function enable_errors(){
	if( $GLOBALS['user_level'] < 5 )
		return;

	error_reporting(E_ALL ^ E_NOTICE);
	ini_set("display_errors", 1);
}
//Customizer
//Add custom bg
function true_custom_background_support(){
    add_theme_support( 'custom-background' );
    add_theme_support( 'custom-header' );
}
add_action('after_setup_theme', 'true_custom_background_support');

function mytheme_customize_register( $wp_customize ) {
    $wp_customize->add_section(
    // ID
    'data_site_section',
    // Arguments array
    array(
        'title' => 'Данные сайта',
        'capability' => 'edit_theme_options',
        'description' => "Тут можно указать данные сайта"
    )
);
$wp_customize->add_setting(
    // ID
    'theme_contacttext',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'theme_contacttext',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Текст с контактной информацией",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'theme_contacttext'
    )
);
$wp_customize->add_setting(
    // ID
    'site_telephone',
    // Arguments array
    array(
        'default' => '',
        'type' => 'option'
    )
);
$wp_customize->add_control(
    // ID
    'site_telephone',
    // Arguments array
    array(
        'type' => 'text',
        'label' => "Текст с телефоном",
        'section' => 'data_site_section',
        // This last one must match setting ID from above
        'settings' => 'site_telephone'
    )
);
$wp_customize->add_setting(
    'select',
    array('default' => 'right')
);
$wp_customize->add_control(
    'select',
    array(
        'type' => 'select',
        'label' => 'Сайдбар',
        'section' => 'data_site_section',
        'choices' => array(
            'left' => 'Лево',
            'right' => 'Право'
        ),
    )
);

$wp_customize->add_setting(
    'slider',
    array('default' => 'block')
);
$wp_customize->add_control(
    'slider',
    array(
        'type' => 'select',
        'label' => 'Слайдер',
        'section' => 'data_site_section',
        'choices' => array(
            'block' => 'Показать',
            'none' => 'Скрыть'
        ),
    )
);    
}
add_action( 'customize_register', 'mytheme_customize_register' );
add_action('customize_register', function($customizer){
    $customizer->add_section(
        'example_section_one',
        array(
            'title' => 'Расположение сайдбара',
            'description' => 'Право/лево',
            'priority' => 11,
        )
    );
});

class My_Register_Widget extends WP_Widget {
 
	/*
	 * create widget
	 */
	function __construct() {
		parent::__construct(
			'true_top_widget', 
			'Регистрация на сайте', // заголовок виджета
			array( 'description' => 'Позволяет вывести ссылку на регистрацию.' ) // описание
		);
	}
 
	/*
	 * frontend widget
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
		$posts_per_page = $instance['posts_per_page'];
 
		echo $args['before_widget'];
 
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
 
		$q = new WP_Query("posts_per_page=$posts_per_page&orderby=comment_count");
		if( $q->have_posts() ):
			?>
            <ul class="register">
		        <li><?php wp_register(); ?></li>
			    <li><?php wp_loginout(); ?></li>	    
			</ul>
			<?php endif;
		wp_reset_postdata();
 
		echo $args['after_widget'];
	}
    /*
     * backend widget
     */
    public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
        ?>
        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}
 
/*
 * регистрация виджета
 */
function true_top_posts_widget_load() {
	register_widget( 'My_Register_Widget' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );