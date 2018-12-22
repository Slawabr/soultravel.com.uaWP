<?php

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

// remove_filter( 'the_content', 'wpautop' ); // Отключаем автоформатирование в полном посте
// remove_filter( 'the_excerpt', 'wpautop' ); // Отключаем автоформатирование в кратком(анонсе) посте
// remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях


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
 	wp_register_style('reset', get_template_directory_uri() . '/css/reset.css', null);  
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

	wp_enqueue_style('reset');
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

/*
function themes_taxonomy() {  
	register_taxonomy(  
		'country',  //The name of the taxonomy
		['tour', 'post'],
		array(  
			'hierarchical' => true,  
			'label' => 'Курорты',  //Display name
			'query_var' => true,
			'rewrite' => array( 'hierarchical' => true ), // this makes hierarchical URLs
		)  
	);
	flush_rewrite_rules();
}  
add_action( 'init', 'themes_taxonomy');
*/
/*
function themes_taxonomy2() {  
	register_taxonomy(  
		'category',  //The name of the taxonomy
		['tour', 'post'],
		array(  
			'hierarchical' => true,  
			'label' => 'Ру	брика',  //Display name
			'query_var' => true,
			'rewrite' => array( 'hierarchical' => true ), // this makes hierarchical URLs
		)  
	);
	flush_rewrite_rules();
}  
add_action( 'init', 'themes_taxonomy2');
*/
/*
function set_link_tours( $post_link, $post, $leavename, $sample ) {
	if ( 'tour' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
	}
	$args = array(
		'taxonomy' => 'country',
		'hide_empty' => false,
		'object_ids' => $post->ID,
	);
	$terms = get_terms( $args );
	$add_url = $terms[0]->slug;
	if ($terms[0]->parent > 0) {
		$args = array(
			'taxonomy' => 'country',
			'hide_empty' => false,
			'include' => $terms[0]->parent,
		);
		$parent_terms = get_terms( $args );
		$add_url = $parent_terms[0]->slug.'/'.$add_url;
	}
	$post_link = str_replace('/tour/', "/$add_url/", $post_link);
	return $post_link;
}
add_filter( 'post_type_link', 'set_link_tours', 10, 4 );
*/
/*
function tours_parse_request( $query ) {
	if (strpos($query->request, '/hotels') !== false) {
		preg_match('/(.+)\/hotels/', $query->request, $matches);
		if (strpos($matches[1], '/') !== false) {
			preg_match('/(.+)\/(.+)/', $matches[1], $cats);
			$query->request = 'oteli-v-kategorii';
			$query->query_vars = array();
			$query->query_vars['page'] = '';
			$query->query_vars['pagename'] = 'oteli-v-kategorii';
			global $regions;
			$regions[] = $cats[1];
			$regions[] = $cats[2];
		} else {
			$query->request = 'oteli-v-kategorii';
			$query->query_vars = array();
			$query->query_vars['page'] = '';
			$query->query_vars['pagename'] = 'oteli-v-kategorii';
			global $regions;
			$regions[] = $matches[1];
		}
	} else if (substr_count($query->request, '/') == 2) {
		preg_match_all('/(.+?)\/(.+?)\/(.+)/', $query->request, $matches);
		$term = term_exists( $matches[1][0], 'country' );
		if (!empty($term)) {
			$child_term = term_exists( $matches[2][0], 'country', $term['term_id'] );
			if (!empty($child_term['term_id'])) {
				$query->request = str_replace($matches[1][0].'/'.$matches[2][0], 'tour', $query->request);
				$query->query_vars = array();
				$query->query_vars['page'] = '';
				$query->query_vars['tour'] = $matches[3][0];
				$query->query_vars['post_type'] = 'tour';
				$query->query_vars['name'] = $matches[3][0];
			}
		}
	} else if (substr_count($query->request, '/') == 1) {
		preg_match_all('/(.+?)\/(.+)/', $query->request, $matches);
		$term = term_exists( $matches[2][0], 'country' );
		if (empty($term)) {
			$term_parent = term_exists( $matches[1][0], 'country', 0 );
			if (!empty($term_parent)) {
				$query->request = str_replace($matches[1][0], 'tour', $query->request);
				$query->query_vars = array();
				$query->query_vars['page'] = '';
				$query->query_vars['tour'] = $matches[2][0];
				$query->query_vars['post_type'] = 'tour';
				$query->query_vars['name'] = $matches[2][0];
			}
		}
	}
	return $query;
}
add_action( 'parse_request', 'tours_parse_request' );*/


function av_get_field ($name, $slug) {
	global $wpdb;
	return $wpdb->get_var($wpdb->prepare('SELECT option_value FROM wp_options WHERE option_name=%s', $slug.'_'.$name));
}

function custom_get_field ($name) {
	global $wpdb;
	return $wpdb->get_var($wpdb->prepare('SELECT option_value FROM wp_options WHERE option_name=%s', $name));
}
/*
function get_tours_func( $atts ) {
	ob_start(); 
	$params = shortcode_atts( array(
		'rating' => '',
		'region' => '',

		'sort' => '',

		'eat' => '',
		'room' => '',
		'period' => '',
		'city' => '',
		'price' => '',

		'hotel' => '',
	), $atts );

	if ($params['hotel'] == '') {
		$meta_query_hotel = '';
		if ($params['rating']) {
			$meta_query_hotel = array( array('key' => 'rating', 'value' => $params['rating'], 'compare' => '=') );
		}
		$tax_query = '';
		if ($params['region']) {
			$tax_query = array( array( 'taxonomy' => 'country', 'field' => 'slug', 'terms' => $params['region']) );
		}
		$args = array(
			'post_type'      => 'tour',
			'meta_query'     => $meta_query_hotel,
			'posts_per_page' => -1,
			'tax_query' => $tax_query,
		);
		$hotels = get_posts($args);
		if (!empty($hotels)) {
			$id_hotels = array();
			foreach ($hotels as $k => $v) {
				$id_hotels[] = $v->ID;
			}
		  

			$args = array(
					'taxonomy' => 'hotels',
					'hide_empty' => false,
					'object_ids' => $id_hotels,
					'parent' => '0',
					'number' => 40,
				);
			$tours = get_terms( $args );
		} else {
			$tours = array();
		}
	} else {
		$args = array(
				'taxonomy' => 'hotels',
				'hide_empty' => false,
				'object_ids' => $params['hotel'],
				'parent' => '0',
				//'number' => 20,
			);
		$tours = get_terms( $args );
	}
	if ($params['eat'] != '')
		for ($i = 0, $count = count($tours); $i < $count; $i++) { 
			if ($params['eat'] != custom_get_field($tours[$i]->taxonomy.'_'.$tours[$i]->term_id.'_eat')) unset($tours[$i]);
		}
	if ($params['room'] != '')
		for ($i = 0, $count = count($tours); $i < $count; $i++) { 
			if ($params['room'] != custom_get_field($tours[$i]->taxonomy.'_'.$tours[$i]->term_id.'_type_nomer')) unset($tours[$i]);
		}
	if ($params['period'] != '')
		for ($i = 0, $count = count($tours); $i < $count; $i++) { 
			if ($params['period'] != custom_get_field($tours[$i]->taxonomy.'_'.$tours[$i]->term_id.'_period')) unset($tours[$i]);
		}
	if ($params['city'] != '')
		for ($i = 0, $count = count($tours); $i < $count; $i++) { 
			if ($params['city'] != custom_get_field($tours[$i]->taxonomy.'_'.$tours[$i]->term_id.'_city')) unset($tours[$i]);
		}
	if ($params['price'] != '')
		for ($i = 0, $count = count($tours); $i < $count; $i++) { 
			if ($params['price'] > custom_get_field($tours[$i]->taxonomy.'_'.$tours[$i]->term_id.'_price')) unset($tours[$i]);
		}

	
	?>

	<div id="prices" class="mb-50 mt-40 table-tours">
		<div class="search-hotels room-search pattern">
			<div class="search-room-title">
				<h5>Выберите тур</h5>
			</div>
		</div>
		<div class="room-table">
			<table id="sort-tours" class="table alt-2">
				<thead>
					<tr class="row-head-tours">
						<?php if ($params['hotel'] == ''): ?>
							<th <?php if ($params['sort'] == 'Отель') echo 'id="active-sort"'; ?> data-type="string">Отель</th> 
						<?php endif; ?>
						<th <?php if ($params['sort'] == 'Кол. человек') echo 'id="active-sort"'; ?> data-type="number"><div class="table-icon clickable-sort"><i class="clickable-sort flaticon-people"></i></div></th>
						<th <?php if ($params['sort'] == 'Питание') echo 'id="active-sort"'; ?> data-type="string">Питание</th>
						<th <?php if ($params['sort'] == 'Номер') echo 'id="active-sort"'; ?> data-type="string">Номер</th>
						<th <?php if ($params['sort'] == 'Кол. ночей') echo 'id="active-sort"'; ?> data-type="number">Кол. ночей</th>
						<th <?php if ($params['sort'] == 'Город') echo 'id="active-sort"'; ?> data-type="string">Город</th>
						<th <?php if ($params['sort'] == 'Дата') echo 'id="active-sort"'; ?> data-type="string">Дата</th>
						<th <?php if ($params['sort'] == 'Цена') echo 'id="active-sort"'; ?> data-type="number">Цена</th>
						<th <?php if ($params['sort'] == 'Заказать') echo 'id="active-sort"'; ?> data-type="string">Заказать</th>
					</tr>
				</thead>
				<tbody class="table-body-tours">
					<?php 
					$count = 0;
					foreach ($tours as $tour): 
						$count++;
						if ($params['hotel'] == '') {
							$args = array(
								'post_type'      => 'tour',
								'posts_per_page' => 1,
								'tax_query' => array(
									array(
										'taxonomy' => 'hotels',
										'field'    => 'slug',
										'terms'    => $tour->slug,
									)
								)
							);
							$hotel = get_posts($args);
						}
						?>
						<tr <?php if ($count > 20) echo 'class="hide-tour" style="display: none;"'; ?>>
							<?php if ($params['hotel'] == ''): ?>
								<td>
									<div style="margin: 0px;"><?=$hotel[0]->post_title?></div>
									
								</td>
							<?php endif; ?>
							<td>
								<p><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_num_people')?></p>
							</td>
							<td>
								<p><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_eat')?></p>
							</td>
							<td>
								<p><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_type_nomer')?></p>
							</td>
							<td>
								<p><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_period')?></p>
							</td>
							<td>
								<p><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_city')?></p>
							</td>
							<td>
								<div style="text-align: left;"><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_from_date')?></div>
								<div style="text-align: right;"><?=custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_to_date')?></div>
							</td>
							<td class="room-price">
								<p>
									<?php 
										echo custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_price'); 
										$cur = custom_get_field($tour->taxonomy.'_'.$tour->term_id.'_currency');
										if (empty($cur)) echo "$";
										else echo $cur;
									?>
								</p>
							</td>
							<td>
								<a href="#" class="cws-button alt gray" onclick="$.fancybox('#order'); $('.wpcf7-hidden').val('<?=$tour->name?>');">Заказать</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php if ($count > 20): ?>
				<div class="breadright" style="margin-top: 20px;">
					<a href="javascript:void(0);" id="show-all-tours" class="cws-button small alt fancy" style="padding: 8px 20px 5px;">Показать все</a>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<script>
		jQuery(function($) {
			$('#show-all-tours').click(function(){
				$('.hide-tour').fadeIn();
				$('#show-all-tours').hide();
			});

			var grid = document.getElementById('sort-tours');
			var lastActive = document.getElementById('active-sort');
			var isInverse = true;
			grid.onclick = function(e) {
				if (e.target.classList.contains('clickable-sort')) {
					var targ = $(e.target).closest('th')[0];
					lastActive.id = "";
					if (lastActive == e.target)
						isInverse = !isInverse;
					sortGrid(targ.cellIndex, targ.getAttribute('data-type'));
					lastActive = e.target;
					e.target.id = "active-sort";
					return;
				}
				if (e.target.tagName != 'TH') return;
				lastActive.id = "";
				if (lastActive == e.target)
					isInverse = !isInverse;
				else if (lastActive != e.target)
					isInverse = false;
				sortGrid(e.target.cellIndex, e.target.getAttribute('data-type'));
				lastActive = e.target;
				e.target.id = "active-sort";
			};
			
			function sortGrid(colNum, type) {
				var tbody = grid.getElementsByTagName('tbody')[0];
				var rowsArray = [].slice.call(tbody.rows);
				var compare;
				switch (type) {
					case 'number':
						compare = function(rowA, rowB) {
							if (!isInverse)
								return parseInt(rowA.cells[colNum].children[0].innerHTML) - parseInt(rowB.cells[colNum].children[0].innerHTML);
							else return parseInt(rowB.cells[colNum].children[0].innerHTML) - parseInt(rowA.cells[colNum].children[0].innerHTML);
						};
						break;
					case 'string':
						compare = function(rowA, rowB) {
							if (!isInverse)
								return rowA.cells[colNum].children[0].innerHTML > rowB.cells[colNum].children[0].innerHTML ? 1 : -1;
							else return rowA.cells[colNum].children[0].innerHTML < rowB.cells[colNum].children[0].innerHTML ? 1 : -1;
						};
						break;
				}

				rowsArray.sort(compare);
				grid.removeChild(tbody);
				for (var i = 0; i < rowsArray.length; i++) {
					tbody.appendChild(rowsArray[i]);
				}
				grid.appendChild(tbody);
			}

			$('#active-sort').click();
		});
	</script>

	<?php
	$res = ob_get_contents();
	ob_end_clean();
	return $res;
}
add_shortcode( 'get_tours', 'get_tours_func' ); */

/*if (!function_exists('post_exists')) {
	function post_exists($title, $content = '', $date = '') {
		global $wpdb;
	 
		$post_title = wp_unslash( sanitize_post_field( 'post_title', $title, 0, 'db' ) );
		$post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
		$post_date = wp_unslash( sanitize_post_field( 'post_date', $date, 0, 'db' ) );
	 
		$query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
		$args = array();
	 
		if ( !empty ( $date ) ) {
			$query .= ' AND post_date = %s';
			$args[] = $post_date;
		}
	 
		if ( !empty ( $title ) ) {
			$query .= ' AND post_title = %s';
			$args[] = $post_title;
		}
	 
		if ( !empty ( $content ) ) {
			$query .= ' AND post_content = %s';
			$args[] = $post_content;
		}
	 
		if ( !empty ( $args ) )
			return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );
	 
		return 0;
	}
}*/
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
/*
add_action('admin_menu', function(){
	add_menu_page( 'Парсер', 'Парсер', 'manage_options', 'tour-parser', 'add_parser', '', 40 ); 
} );

function add_parser(){
	?>
	<div class="wrap">
		<h1><?php echo get_admin_page_title() ?></h1>
		<?php include "parser.php"; ?>
	</div>
	<?php

}
*/
/*
function themes_taxonomy() {  
	register_taxonomy(  
		'country',  //The name of the taxonomy
		'region',        //post type name
		array(  
			'hierarchical' => true,  
			'label' => 'Страны',  //Display name
			'query_var' => true,
			// 'rewrite' => array(
			//     'slug' => 'tour', // This controls the base slug that will display before each term
			//     'with_front' => false // Don't display the category base before 
			// )
		)  
	);
}  
add_action( 'init', 'themes_taxonomy');



function filter_post_type_link($link, $post)
{
	if ($post->post_type != 'region')
		return $link;

	if ($cats = get_the_terms($post->ID, 'country'))
		$link = str_replace('%country%', array_pop($cats)->slug, $link);
	return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);


//Registering Custom Post Type Themes
add_action( 'init', 'register_themepost', 20 );
function register_themepost() {
	$labels = array(
		'name' => _x( 'region', 'my_custom_post','custom' ),
		'singular_name' => _x( 'Регион', 'my_custom_post', 'custom' ),
		'add_new' => _x( 'Добавить новый', 'my_custom_post', 'custom' ),
		'add_new_item' => _x( 'Добавить новый регион', 'my_custom_post', 'custom' ),
		'edit_item' => _x( 'Редактировать регион', 'my_custom_post', 'custom' ),
		'new_item' => _x( 'New ThemePost', 'my_custom_post', 'custom' ),
		'view_item' => _x( 'View ThemePost', 'my_custom_post', 'custom' ),
		'search_items' => _x( 'Search ThemePosts', 'my_custom_post', 'custom' ),
		'not_found' => _x( 'No ThemePosts found', 'my_custom_post', 'custom' ),
		'not_found_in_trash' => _x( 'No ThemePosts found in Trash', 'my_custom_post', 'custom' ),
		'parent_item_colon' => _x( 'Parent ThemePost:', 'my_custom_post', 'custom' ),
		'menu_name' => _x( 'Регионы', 'my_custom_post', 'custom' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'taxonomies' => array( 'country'),
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array('slug' => '/%country%','with_front' => FALSE),
		'public' => true,
		'has_archive' => 'region',
		'capability_type' => 'post'
	);  
	register_post_type( 'region', $args );//max 20 charachter cannot contain capital letters and spaces
	flush_rewrite_rules();
}  



function default_taxonomy_term( $post_id, $post ) {
	if ( 'publish' === $post->post_status ) {
		$defaults = array(
			'country' => array( 'other'),   //

			);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
			}
		}
	}
}
add_action( 'save_post', 'default_taxonomy_term', 100, 2 );

/*
 * главная функция
 */
// function tr_new_taxonomy_box() {
 
//   // перечислить список таксономий через запятую
//   $choosed_taxonomies = array( 'region', 'country' );
 
//   if ( empty($choosed_taxonomies) )
//     return;
 
//   foreach ( $choosed_taxonomies as $tax_name ) {
//     $taxonomy = get_taxonomy( $tax_name );
 
//     // метабокс будет добавляться только для таксономий с иерархией
//     if ( !$taxonomy->hierarchical || !$taxonomy->show_ui || empty($taxonomy->object_type) )
//       continue;
 
//     foreach ( $taxonomy->object_type as $post_type ) {
 
//       // удаляем стандартный метабокс
//       remove_meta_box( "{$tax_name}div", $post_type, 'side' );
 
//       // добавляем собственный
//       add_meta_box( "unique-{$tax_name}-div", $taxonomy->labels->singular_name, 'tr_tax_metabox', $post_type, 'side', 'high', array('taxonomy' => $tax_name) );
//     }
//   }
// }
// add_action( 'admin_menu', 'tr_new_taxonomy_box' );
 
// /*
//  * функция для вывода непосредственно списка элементов таксономий
//  */
// function tr_print_radiolist( $post_id, $taxonomy ) {
//   $terms = get_terms( $taxonomy, array('hide_empty' => false, 'parent'  => 0) );
//   if ( empty($terms) )
//     return;
 
//   // значение аттрибута name для всех радио-кнопок
//   $name = ( $taxonomy == 'category' ) ? 'post_category' : "tax_input[{$taxonomy}]";
 
//   // определяем, к каким рубрикам относится текущий пост
//   $current_post_terms = get_the_terms( $post_id, $taxonomy );
//   $current = array();
//   if ( !empty($current_post_terms) ) {
//     foreach ( $current_post_terms as $current_post_term )
//       $current[] = $current_post_term->term_id;
//   }
 
//   // вывод списка
//   $list = '';
//   foreach ( $terms as $term ) {
//     $list .= "<li id='{$taxonomy}-{$term->term_id}'>";
//     $list .= "<label class='selectit'>";
//     $list .= "<input type='radio' name='{$name}[]' value='{$term->term_id}' ".checked( in_array($term->term_id, $current), true, false )." id='in-{$taxonomy}-{$term->term_id}' />";
//     $list .= " {$term->name}</label>";
//     $list .= "</li>\n";
 
//     // если вам наплевать на вложенные рубрики, то цикл foreach можно закончить прямо здесь
//     $childs = get_terms( $taxonomy, array('hide_empty' => false, 'parent'  => $term->term_id));
//     if ( count($childs) > 0 ){
//       $list .= "<ul class='children'>";
//       foreach ($childs as $child){
//         $list .= "<li id='{$taxonomy}-{$child->term_id}'>";
//         $list .= "<label class='selectit'>";
//         $list .= "<input type='radio' name='{$name}[]' value='{$child->term_id}' ".checked( in_array($child->term_id, $current), true, false )." id='in-{$taxonomy}-{$child->term_id}' />";
//         $list .= " {$child->name}</label>";
//         $list .= "</li>\n";
//       }
//       $list .= "</ul>";
//     }
//   }
//   echo $list;
// }
 
// /*
//  * содержимое метабокса
//  */
// function tr_tax_metabox( $post, $box ) {
//   if ( !isset($box['args']) || !is_array($box['args']) )
//     $args = array();
//   else
//     $args = $box['args'];
 
//   $defaults = array('taxonomy' => 'category');
//   extract( wp_parse_args($args, $defaults), EXTR_SKIP );
//   $tax = get_taxonomy($taxonomy);
 
//   $name = ( $taxonomy == 'category' ) ? 'post_category' : 'tax_input[' . $taxonomy . ']';
 
//   $metabox = "<div id='taxonomy-{$taxonomy}' class='categorydiv'>";
//   $metabox .= "<input type='hidden' name='{$name}' value='0' />";
//   $metabox .= "<ul id='{$taxonomy}-tabs' class='category-tabs'>";
//   $metabox .= "<li class='tabs'><a href='#{$taxonomy}-all' tabindex='3'>{$tax->labels->all_items}</a></li>";
//   $metabox .= "</ul>";
//   $metabox .= "<div id='{$name}-all' class='tabs-panel'>";
//   $metabox .= "<ul id='{$taxonomy}checklist' class='list:{$taxonomy} categorychecklist form-no-clear'>";
//   echo $metabox;
 
//   tr_print_radiolist( $post->ID, $taxonomy );
 
//   echo "</ul></div></div>";
// }

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

?>