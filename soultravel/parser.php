<?php

if (!function_exists('av_get_field')) {
	function av_get_field ($name, $slug) {
		global $wpdb;
		return $wpdb->get_var($wpdb->prepare('SELECT option_value FROM wp_options WHERE option_name=%s', $slug.'_'.$name));
	}
}

/*ini_set('display_errors','On');
error_reporting('E_ALL');

include('../../../wp-load.php');

if (is_user_logged_in()) {

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
}*/

$strings = explode('
', $_POST['txt']);
$stage = 0;
$tour = array();
$tours = array();

foreach ($strings as $str) {
	/*if ($str == "" || strpos($str, "Отправ") !== false
		|| strpos($str, "Регион") !== false
		|| strpos($str, "Отел") !== false
		|| strpos($str, "Рейтинг") !== false
		|| strpos($str, "Тип п") !== false
		|| strpos($str, "Дата") !== false
		|| strpos($str, "Время") !== false
		|| strpos($str, "Оператор") !== false
		|| strpos($str, "Цена") !== false
		|| strpos($str, "Наличие") !== false
		|| strpos($str, "Забронировать") !== false
		|| strpos($str, "Заказа") !== false
		|| strpos($str, "Проверить") !== false
		|| strpos($str, "Сформировать") !== false) continue;
	if ($stage == 0) {
		preg_match('/^(.+?)\s+(.+)\s+([0-9]+)\s*$/', $str, $matches);
		$stage++;
		// $matches[1] - region
		// $matches[2] - hotel name
		// $matches[3] - rating (stars)
		$tour['region'] = $matches[1];
		$tour['hotel_name'] = $matches[2];
		$tour['rating'] = $matches[3];
	} else if ($stage == 1) {
		$str = trim(str_replace('.', '', $str));
		$stage++;
		// $str - тип номера
		$tour['nomer_type'] = $str;
	} else if ($stage == 2) {
		$str = trim(str_replace('.', '', $str));
		$stage++;
		// $str - тип питания
		$tour['eat'] = $str;
	} else if ($stage == 3) {
		$str = trim(str_replace('.', '', $str));
		$stage++;
		// $str - город отправления
		$tour['city'] = $str;
	} else if ($stage == 4) {
		$str = str_replace('.', '/', substr($str, 0, 8));
		$stage++;
		// $str - дата отправки
		$tour['from_date'] = $str;
	} else if ($stage == 5) {
		preg_match('/[0-9]+/', $str, $matches);
		$stage++;
		// $matches[0] - количество ночей
		$tour['period'] = $matches[0];
	} else if ($stage == 6) {
		$str = trim(str_replace('.', '', $str));
		$stage++;
		// $str - туроператор
		$tour['operator'] = $str;
	} else if ($stage == 7) {
		preg_match('/^(.+?)\s+(.+?)\s+(.+?)\s*$/', $str, $matches);
		$stage++;
		// $matches[1] - цена
		// $matches[2] - наличие мест туда
		// $matches[3] - наличие мест обратно
		$tour['price'] = $matches[1];
		$tour['free_places_go'] = $matches[2];
		$tour['free_places_back'] = $matches[3];
	} else if (strpos($str, "Карандаш") !== false || strpos($str, "know") !== false) {
		$stage = 0;
		//$tour_name = $tour['region'].'_'.$tour['hotel_name'].'_'.$tour['from_date'];
		$tour_name = 'new_tour';
		$res = term_exists( $tour_name, 'hotels' );
		if (empty($res)) {
			$res = wp_insert_term(
				$tour_name,
				'hotels',
				array(
					'description'=> '',
					'slug' => transliterate($tour_name),
				)
			);
		}
		wp_update_term($res['term_id'], 'hotels', array(
			  'name' => "Tour ".$res['term_id'],
			  'slug' => "tour_".$res['term_id'],
			));
		update_field('city', $tour['city'], 'hotels_'.$res['term_id']);
		update_field('from_date', $tour['from_date'], 'hotels_'.$res['term_id']);
		update_field('price', $tour['price'], 'hotels_'.$res['term_id']);
		update_field('num_people', $tour['free_places_go'], 'hotels_'.$res['term_id']);
		update_field('eat', $tour['eat'], 'hotels_'.$res['term_id']);
		update_field('period', $tour['period'], 'hotels_'.$res['term_id']);
		update_field('type_nomer', $tour['nomer_type'], 'hotels_'.$res['term_id']);
		update_field('date_update', date('d/m/Y'), 'hotels_'.$res['term_id']);
		$post_id = post_exists($tour['hotel_name']);
		if ($post_id == 0) {
			$post_data = array(
				'post_title'    => $tour['hotel_name'],
				'post_content'  => '',
				'post_status'   => 'draft',
				'post_author'   => 1,
				'post_date'		=> date('Y-m-d H:i:s', time()),
				'post_type'		=> 'tour',
			);
			$post_id = wp_insert_post( $post_data );
		}
		wp_set_post_terms( $post_id, $res['term_id'], 'hotels', true );
		$term_id = term_exists($tour['region'], 'country' )['term_id'];
		wp_set_post_terms( $post_id, $term_id, 'country', true );
		//echo $res['term_id'].", ";
	}*/
	/*if ($str == "") continue;
	if ($stage == 0) {
		preg_match('/^(.+?)\t(.+)$/', $str, $matches);
		$tour['region'] = $matches[1];
		$tour['hotel_name'] = $matches[2];
		$stage++;
	} else if ($stage == 1) {
		preg_match('/^([0-9]+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)$/', $str, $matches);
		$tour['rating'] = $matches[1];
		$tour['nomer_type'] = str_replace('.', '', $matches[2]);
		$tour['eat'] = $matches[3];
		$tour['city'] = $matches[4];
		$tour['from_date'] = str_replace('.', '/', substr($matches[5], 0, 8));
		$tour['period'] = $matches[6];
		$tour['operator'] = $matches[7];
		$stage++;
	}
	if ( is_numeric(trim($str)) ) {
		$tour['price'] = intval(trim($str));
		$stage = 0;
		//$tour_name = $tour['region'].'_'.$tour['hotel_name'].'_'.$tour['from_date'];
		$tour_name = 'new_tour';
		$res = term_exists( $tour_name, 'hotels' );
		if (empty($res)) {
			$res = wp_insert_term(
				$tour_name,
				'hotels',
				array(
					'description'=> '',
					'slug' => transliterate($tour_name),
				)
			);
		}
		wp_update_term($res['term_id'], 'hotels', array(
			  'name' => "Tour ".$res['term_id'],
			  'slug' => "tour_".$res['term_id'],
			));
		update_field('city', $tour['city'], 'hotels_'.$res['term_id']);
		update_field('from_date', $tour['from_date'], 'hotels_'.$res['term_id']);
		update_field('price', $tour['price'], 'hotels_'.$res['term_id']);
		update_field('eat', $tour['eat'], 'hotels_'.$res['term_id']);
		update_field('period', $tour['period'], 'hotels_'.$res['term_id']);
		update_field('type_nomer', $tour['nomer_type'], 'hotels_'.$res['term_id']);
		update_field('date_update', date('d/m/Y'), 'hotels_'.$res['term_id']);
		$post_id = post_exists($tour['hotel_name']);
		if ($post_id == 0) {
			$post_data = array(
				'post_title'    => $tour['hotel_name'],
				'post_content'  => '',
				'post_status'   => 'draft',
				'post_author'   => 1,
				'post_date'		=> date('Y-m-d H:i:s', time()),
				'post_type'		=> 'tour',
			);
			$post_id = wp_insert_post( $post_data );
		}
		wp_set_post_terms( $post_id, $res['term_id'], 'hotels', true );
		$term_id = term_exists($tour['region'], 'country' )['term_id'];
		wp_set_post_terms( $post_id, $term_id, 'country', true );
	}*/
	if ($str == "") continue;
	preg_match('/^(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)\t(.+?)$/', $str, $matches);
	$tour['region'] = $matches[1];
	$tour['hotel_name'] = $matches[2];
	$tour['rating'] = $matches[3];
	$tour['nomer_type'] = str_replace('.', '', $matches[4]);
	$tour['eat'] = $matches[5];
	$tour['city'] = $matches[6];
	$tour['from_date'] = str_replace('.', '/', substr($matches[7], 0, 8));
	$tour['period'] = $matches[8];
	$tour['operator'] = $matches[9];
	$tour['price'] = intval(trim($matches[10]));
	
	//$tour_name = $tour['region'].'_'.$tour['hotel_name'].'_'.$tour['from_date'];
	$tour_name = 'new_tour';
	$res = term_exists( $tour_name, 'hotels' );
	if (empty($res)) {
		$res = wp_insert_term(
			$tour_name,
			'hotels',
			array(
				'description'=> '',
				'slug' => transliterate($tour_name),
			)
		);
	}
	update_field('num_people', $_POST['num_people'], 'hotels_'.$res['term_id']);
	update_field('city', $tour['city'], 'hotels_'.$res['term_id']);
	update_field('from_date', $tour['from_date'], 'hotels_'.$res['term_id']);
	update_field('price', $tour['price'], 'hotels_'.$res['term_id']);
	update_field('eat', $tour['eat'], 'hotels_'.$res['term_id']);
	update_field('period', $tour['period'], 'hotels_'.$res['term_id']);
	update_field('type_nomer', $tour['nomer_type'], 'hotels_'.$res['term_id']);
	update_field('date_update', date('d/m/Y'), 'hotels_'.$res['term_id']);
	wp_update_term($res['term_id'], 'hotels', array(
		  'name' => "Tour ".$res['term_id'],
		  'slug' => "tour_".$res['term_id'],
		));
	
	$post_id = -1;
	$args = array(
        'post_type'      => 'tour',
        'posts_per_page' => -1,
	  	'post_status'	 => 'any',
    );
    $hotels = get_posts($args);
  	
    foreach ($hotels as $hotel) {
    	$alt_name = get_field( 'alt_name', $hotel->ID );
	  /*echo $hotel->post_title;
	  echo " ";
	  echo erase_ap($hotel->post_title);
	  echo " == ";
	  echo erase_ap($tour['hotel_name']);*/
    	if (erase_ap($hotel->post_title) == erase_ap($tour['hotel_name'])
			|| erase_ap($alt_name) == erase_ap($tour['hotel_name'])) {
    		$post_id = $hotel->ID;
    		break;
    	}
    }
    if ($post_id == -1) {
		$post_data = array(
			'post_title'    => $tour['hotel_name'],
			'post_content'  => '',
			'post_status'   => 'draft',
			'post_author'   => 1,
			'post_date'		=> date('Y-m-d H:i:s', time()),
			'post_type'		=> 'tour',
		);
		$post_id = wp_insert_post( $post_data );
	}
  

	/*$post_id = post_exists($tour['hotel_name']);
	if ($post_id == 0) {
		$post_data = array(
			'post_title'    => $tour['hotel_name'],
			'post_content'  => '',
			'post_status'   => 'draft',
			'post_author'   => 1,
			'post_date'		=> date('Y-m-d H:i:s', time()),
			'post_type'		=> 'tour',
		);
		$post_id = wp_insert_post( $post_data );
	}*/

	wp_set_post_terms( $post_id, $res['term_id'], 'hotels', true );
	$term_id = term_exists($tour['region'], 'country' )['term_id'];
	wp_set_post_terms( $post_id, $term_id, 'country', true );

	$tours[] = $tour;
}

if (isset($_POST['delete'])) {
	$args = array(
		'taxonomy' => 'hotels',
		'hide_empty' => false,
	);
	$tours = get_terms( $args );
	foreach ($tours as $tour) {
	  preg_match('/(.+)\/(.+)\/(.+)/', av_get_field('from_date', 'hotels_'.$tour->term_id), $dates);
	  	$f_d = intval($dates[1]).'.'.intval($dates[2]).'.20'.$dates[3];
		if (strtotime($f_d) < time()) {
		  wp_delete_term( $tour->term_id, 'hotels' );
		}
	}
	echo "<div style='color: green; '>Операция прошла успешно.</div>";
}

?>

<?php if (isset($_POST['txt'])): ?>
<div id="prices" class="mb-50 mt-40 table-tours">
	<div class="search-hotels room-search pattern">
		<div class="search-room-title">
			<h5>Выберите тур</h5>
		</div>
	</div>
	<div class="room-table">
		<table id="sort-tours" class="table alt-2" style="border-collapse: collapse;" border="1">
			<thead>
				<tr class="row-head-tours">
					<th data-type="string">Питание</th>
					<th data-type="string">Номер</th>
					<th data-type="number">Кол. ночей</th>
					<th data-type="string">Город</th>
					<th data-type="string">Дата</th>
					<th id="active-sort" data-type="number">Цена</th>
				</tr>
			</thead>
			<tbody class="table-body-tours">
				<?php foreach ($tours as $tour): ?>
				<tr>
					<td>
						<p><?=$tour['eat']?></p>
					</td>
					<td>
						<p><?=$tour['nomer_type']?></p>
					</td>
					<td>
						<p><?=$tour['period']?></p>
					</td>
					<td>
						<p><?=$tour['city']?></p>
					</td>
					<td>
						<div style="text-align: left;"><?=$tour['from_date']?></div>
						<div style="text-align: right;"></div>
					</td>
					<td class="room-price"><p><?=$tour['price']?>$</p></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script>
    jQuery(function($) {
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
<?php endif; ?>

<form method="POST" id="parser-form">
	<table class="form-table">
		<tbody>
			<tr class="user-description-wrap">
				<th><label for="description">Текст</label></th>
				<td><textarea name="txt" id="description" rows="5" cols="100" style="height: 300px;"></textarea>
				<p class="description">Вставте сюда текст и нажмите "Сохранить"</p></td>
			</tr>
			<tr class="user-num-people-wrap">
				<th><label for="num_people">Количество человек</label></th>
				<td><input name="num_people" id="num_people" value="2" class="regular-text" type="text"></td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<input name="submit" id="submit" class="button button-primary" value="Сохранить" type="submit">
	</p>
</form>

<h1>Очистка</h1>
<form method="POST" id="delete-form">
	<input name="delete" value="delete" type="hidden">
	<p class="submit">
		<input name="submit" id="submit" class="button button-primary" value="Удалить устаревшие" type="submit">
	</p>
</form>