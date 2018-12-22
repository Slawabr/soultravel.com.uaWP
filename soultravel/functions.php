<?php

// ПОДКЛЮЧАЕМ JQUERY
function jquery_lib(){
	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core',get_template_directory_uri().'/js/jquery-3.3.1.min.js#asyncload');
	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'jquery_lib');

// убираем для валидатора
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}

add_action( 'wp_footer', 'redirect_cf7' );

function redirect_cf7() {
?>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
       location = '/spasibo-za-zayavku/';
}, false );
</script>
<?php
}

function isa_remove_jquery_migrate( &$scripts ) {
	if( !is_admin() ) {
		$scripts->remove( 'jquery' );
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
	}
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );

function genesis(){}

add_filter('aioseop_prev_link', '__return_empty_string' );
add_filter('aioseop_next_link', '__return_empty_string' );

add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(254, 190); // Задаем размеры миниатюре

if ( function_exists('register_sidebar') )
register_sidebar(); // Регистрируем сайдбар

// require_once (dirname(__FILE__) . '/Redux/admin-config.php');

function erase_ap ($str) {
  $str = str_replace('\\', '', str_replace("’", '', str_replace("'", "", $str)));
  return $str;

}

function mytheme_register_styles(){
  if(!is_admin()) {
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', null);
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', null);
	wp_register_style('jquery.fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', null);
	wp_register_style('flaticon', get_template_directory_uri() . '/fonts/fi/flaticon.css', null);
	wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css', null);
	wp_register_style('main', get_template_directory_uri() . '/css/main.css', null);
	wp_register_style('indent', get_template_directory_uri() . '/css/indent.css', null);
	wp_register_style('settings', get_template_directory_uri() . '/rs-plugin/css/settings.css', null);
	wp_register_style('layers', get_template_directory_uri() . '/rs-plugin/css/layers.css', null);
	wp_register_style('navigation', get_template_directory_uri() . '/rs-plugin/css/navigation.css', null);

	wp_enqueue_style('bootstrap');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('jquery.fancybox');
	wp_enqueue_style('flaticon');
	wp_enqueue_style('flexslider');
	wp_enqueue_style('main');
	wp_enqueue_style('indent');
	wp_enqueue_style('settings');
	wp_enqueue_style('layers');
	wp_enqueue_style('navigation');
	wp_enqueue_style('colorpicker');
	wp_enqueue_style('styles');
  }
	wp_register_style('owlcarousel', get_template_directory_uri().'/css/owl.carousel.css', null);
	wp_register_style('otpusk', get_template_directory_uri().'/css/otpusk.css', null);
	wp_register_style('additional', get_template_directory_uri().'/css/additional.css', null);

	wp_enqueue_style('owlcarousel');
	wp_enqueue_style('otpusk');
	wp_enqueue_style('additional');
}

add_action('init', 'mytheme_register_styles');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
	if (in_array('current-menu-item', $classes) ){
		$classes[] = 'active-li';
	}
	return $classes;
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
	$indent = str_repeat("\t", $depth);
	$output .= "\n$indent<ul class=\"mn-sub\">\n";
  }
}

function add_menuclass($ulclass) {
	return preg_replace('/<a rel="menu"/', '<a class="mn-has-sub"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');


function av_get_field ($name, $slug) {
	global $wpdb;
	return $wpdb->get_var($wpdb->prepare('SELECT option_value FROM wp_options WHERE option_name=%s', $slug.'_'.$name));
}

function custom_get_field ($name) {
	global $wpdb;
	return $wpdb->get_var($wpdb->prepare('SELECT option_value FROM wp_options WHERE option_name=%s', $name));
}

if (!function_exists('transliterate')) {
	function transliterate($input) {
		$gost = array(
		   "Є"=>"YE","І"=>"I","Ѓ"=>"G","і"=>"i","№"=>"-","є"=>"ye","ѓ"=>"g",
		   "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
		   "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
		   "З"=>"Z","И"=>"I","Й"=>"J","К"=>"K","Л"=>"L",
		   "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
		   "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"X",
		   "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
		   "Ы"=>"Y","Ь"=>"","Э"=>"E","Ю"=>"YU","Я"=>"YA",
		   "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
		   "е"=>"e","ё"=>"yo","ж"=>"zh",
		   "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
		   "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
		   "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"x",
		   "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
		   "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
		   " "=>"_","—"=>"_",","=>"_","!"=>"_","@"=>"_",
		   "#"=>"-","$"=>"","%"=>"","^"=>"","&"=>"","*"=>"",
		   "("=>"",")"=>"","+"=>"","="=>"",";"=>"",":"=>"",
		   "'"=>"","\""=>"","~"=>"","`"=>"","?"=>"","/"=>"",
		   "\\"=>"","["=>"","]"=>"","{"=>"","}"=>"","|"=>""
		);
		return strtr($input, $gost);
	}
}


// */
// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

function add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false) return $url;
    else return str_replace('#asyncload', '', $url)."' async='async";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

function atr_remove($tag, $handle){
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
add_filter('style_loader_tag', 'atr_remove', 10, 2);
add_filter('script_loader_tag', 'atr_remove', 10, 2);

// добавляем привязку категоирй к страницам
function true_apply_categories_for_pages(){
	add_meta_box( 'categorydiv', 'Категории', 'post_categories_meta_box', 'page', 'side', 'normal'); // добавляем метабокс категорий для страниц
	register_taxonomy_for_object_type('category', 'page'); // регистрируем рубрики для страниц
}
// обязательно вешаем на admin_init
add_action('admin_init','true_apply_categories_for_pages');
 
function true_expanded_request_category($q) {
	if (isset($q['category_name'])) // если в запросе присутствует параметр рубрики
		$q['post_type'] = array('post', 'page'); // то, помимо записей, выводим также и страницы
	return $q;
}
 add_filter('request', 'true_expanded_request_category');

//добавьте код в functions.php вашей темы сайта
add_action( 'template_redirect', function() {
  if( is_attachment() ) {
    header("Status: 410 Not Found");
    global $wp_query;
    $wp_query->set_410();
    status_header(410);
    nocache_headers(); 
  }
} );

?>