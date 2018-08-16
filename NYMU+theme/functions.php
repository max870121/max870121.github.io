<?php
//add css to html
function learningWordpress_resources(){
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css');
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css');
	wp_enqueue_style( 'owl.carousel.min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css');

}

add_action('wp_enqueue_scripts','learningWordpress_resources');
function theme_js() {
	global $wp_scripts;

	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js');
	wp_enqueue_script( 'cdnjs', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js');
	wp_enqueue_script( 'bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js');
	wp_enqueue_script( 'scrollUp', get_template_directory_uri() . '/assets/js/scrollUp.min.js');
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js');
	wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/assets/js/wow.min.js');
	wp_enqueue_script( 'owl.carousel.min', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js');
	wp_enqueue_script( 'jquery.parallax-1.1.3', get_stylesheet_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js');
	
	
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js');
	

}

add_action( 'wp_enqueue_scripts', 'theme_js');

//Navigation menus



//Get top ancestor
function get_top_ancestor_id(){

	global $post;
	
	if ($post->post_parent){
		$ancestors =array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}
	return $post->ID;
}

//Customize excerpt word count length
function custom_excerpt(){
	return 25;
}
add_filter('excerpt_length','custom_excerpt');

// Register Nav Walker
require_once('wp_bootstrap_navwalker.php');

function learningWordPress_setup(){
	//Navigation Menus
	register_nav_menus(array(
		'primary' => __('Primary Menu'),
		'footer' =>__('Footer Menu'),
	));
	//Add featured image
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail',413,460);

	//Add post format 
	add_theme_support('post-formats',array('aside','gallery','link'));
}

add_action('after_setup_theme', 'learningWordPress_setup');

//Add our widgetlocations
function ourWidgetsInit(){
	register_sidebar(array(
		'name' =>'Sidebar',
		'id'=>'sidebar1',
		'before_widget'=>'<div class="widget-item">',
		'after_widget'=>'</div>',

	));
	register_sidebar(array(
		'name' =>'Footer Area 1',
		'id'=>'footer1'));
	register_sidebar(array(
		'name' =>'Footer Area2',
		'id'=>'footer2'));
	register_sidebar(array(
		'name' =>'Footer Area3',
		'id'=>'footer3'));
}
add_action('widgets_init','ourWidgetsInit');

//Customize apearance options
function learnwordpress_customize_register($wp_customize){
	$wp_customize->add_setting('lwp_link_color',array(
		'default'=>'#006ec3',
		'transport'=>'refresh',
	));

	$wp_customize->add_section('lwp_standard_colors',array(
		'title' =>__('Standard Colors') ,'LearningWordPress',
		'priority'=>30,
		 ));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'lwp_link_color_control',array(
		'label'=>__('Link Color','LearningWordPress'),
		'section'=>'lwp_standard_colors',
		'settings'=>'lwp_link_color',
	)));
}
add_action('customize_register','learnwordpress_customize_register');

//Output Customize CSS
function learningWordPress_customize_css(){?>
	<style type="text/css">
		a:link,
		a:visited{
			color: <?php echo get_theme_mod('lwp_link_color');?>;
		}
		.site-header nav ul li.current-menu-item a{
			background-color: <?php echo get_theme_mod('lwp_link_color');?>;
			color:white;
		}
	</style>
<?}

add_action('wp_head','learningWordPress_customize_css');
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


