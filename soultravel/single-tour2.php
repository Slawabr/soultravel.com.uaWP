<?php
	get_header();
  the_post();
  /*$mark_food = round(get_field('mark_food'), 2);
  $mark_service = round(get_field('mark_service'), 2);
  $mark_place = round(get_field('mark_place'), 2);
  $mark_nomers = round(get_field('mark_nomers'), 2);
  $mark_common = round(($mark_food + $mark_service + $mark_place + $mark_nomers) / 4, 2);
  if ($mark_common < 4)
    $mark = 'Среднее';
  else if ($mark_common >= 4 and $mark_common < 5)
    $mark = 'Хорошо';
  else
    $mark = 'Отлично';
  $num_recalls = get_field('num_recalls');*/
  $tax = get_the_terms(get_the_ID(), 'country')[0];
  if ($tax->parent > 0)
  {
    $region = array('name' => $tax->name, 'slug' => $tax->slug);
    $parent_tax = get_term($tax->parent, 'country');
    $country = array('name' => $parent_tax->name, 'slug' => $parent_tax->slug);
    $breadcrumbs = '<a href="'. home_url() .'/'. $country['slug'] .'/">'. $country['name'] .'</a><i>/</i><a href="'. home_url() .'/'. $country['slug'] .'/'. $region['slug'] .'/"><span>'. $region['name'] .'</span></a>';
  }
  else
  {
    $country = array('name' => $tax->name, 'slug' => $tax->slug);
    $breadcrumbs = '<a href="'. home_url() .'/'. $country['slug'] .'/"><span>'. $country['name'] .'</span></a>';
  }
    //$price = (get_field('price_sale')) ? 'Цена тура: <del><b style="font-size: 22px;margin-left: 5px">'. get_field('price').get_field('currency') .'</b></del> <b style="font-size: 30px;color: #ffc107;">'. get_field('price_sale').get_field('currency') .'</b>' : 'Цена тура: <b style="font-size: 22px;margin-left: 5px">'. get_field('price').get_field('currency') .'</b>';

  $args = array(
    'taxonomy' => 'hotels',
    'hide_empty' => true,
    'object_ids' => get_the_ID(),
  );
  $tours = get_terms( $args );
?>
      <!-- breadcrumbs start-->
      <section style="background-image:url('<?=get_field('bg')?>');" class="breadcrumbs style-2 gray-90">
        <div class="container">
          <div class="text-left breadcrumbs-item"><a href="<?=home_url()?>">Главная</a><i>/</i><?=$breadcrumbs?>
            <h1 style="color: #fff;margin: 0;"><?php the_title(); ?> <span class="stars stars-<?=get_field('rating')?>"></span></h1>
          </div>
          <div class="breadright">
            <a href="#order" class="cws-button small alt fancy">Оставить заявку</a>
            <?php /*<p style="margin: 5px 0;"><?=$price?></p>*/ ?>
          </div>
        </div>
      </section>
      <!-- ! breadcrumbs end-->
    <!-- ! header page-->
    <div class="content-body">
      <section class="page-section pt-0 pb-50">
        <div class="container">
          <div class="menu-widget with-switch mt-30 mb-30">
            <ul class="magic-line">
              <li class="current_item"><a href="#photo" class="scrollto">Фото</a></li>
              <li><a href="#overview" class="scrollto">Описание</a></li>
              <li><a href="#tours" class="scrollto hidden-xs">Туры</a></li>
              <?php if(get_field('map')): ?>
                <li><a href="#location" class="scrollto">Карта</a></li>
              <?php endif; ?>
              <?php /*<li><a href="#reviews" class="scrollto">Отзывы (<?=$num_recalls?>) <span class="stars stars-5"></span></a></li>*/ ?>
            </ul>
          </div>
        </div>
        <?php
          $slider = get_the_content();
          $slider = preg_replace('/(<p>)|(<\/p>)/', '', $slider);
          $slider = preg_replace('/(<img [^>]+>)/', '<li>$1</li>', $slider);
        ?>
        <div class="container" id="photo">
          <div id="flex-slider" class="flexslider">
            <ul class="slides">
              <?=$slider?>
            </ul>
          </div>
          <div id="flex-carousel" class="flexslider">
            <ul class="slides">
              <?=$slider?>
            </ul>
          </div>
        </div>
        <br>
        <div class="container mt-30" id="overview">
          <h3 class="mb-20">Описание отеля</h3>
          <div class="row">
            <?php the_field('about'); ?>
          </div>
        </div>
		
 <div class="container mt-30">
          <h2 class="mb-20">Подобрать вариант тура в <?php the_title(); ?></h2>
          <div class="row">
    	<!-- multistep form -->
	
	<form method="post" id="form-mult" class="search-hotels room-search pattern text-center">
		<div class="tours-container step">
              <div class="tours-box">
                <div class="tours-search mb-20">
                  <div class="form search divider-skew">
                    <div class="form search divider-skew search-wrap"> 
                      <input type="text" name="destination" value="<?php the_title(); ?>" placeholder="<?php the_title(); ?>" class="form-control search-field"><i class="flaticon-suntour-map search-icon"></i>
                    </div>
                  </div>
                  <div class="tours-calendar divider-skew"> 
                    <input name="date1" placeholder="Дата вылета" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="calendar-default textbox-n"><i class="flaticon-suntour-calendar calendar-icon"></i>
                  </div>
                  <div class="tours-calendar divider-skew"> 
                    <input name="date2" placeholder="Дата прибытия" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="calendar-default textbox-n"><i class="flaticon-suntour-calendar calendar-icon"></i>
                  </div>
                  <div class="selection-box divider-skew"><i class="flaticon-suntour-adult box-icon"></i>
                    <select name="adults">
                      <option>Взрослых</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
					  <option value="5+">5+</option>
                    </select>
                  </div>
                  <div class="selection-box divider-skew"><i class="flaticon-suntour-children box-icon"></i>
                    <select name="childs">
                      <option>Детей</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </div>    
                  <div class="next button-search">Далее</div>
                </div>
              </div>
            </div>
		
		<div class="tours-container step">
              <div class="tours-box">
                <div class="tours-search mb-20">
				
						<div class="price_slider_wrapper">
                            <div aria-disabled="false" class="price_slider price_slider_amount ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                              <div class="ui-slider-range ui-widget-header ui-corner-all"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 38%;">
                                <div style="" class="price_label"><span class="from">500<sup>$</sup></span></div></a>
								<a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 70%;">
                                <div style="" class="price_label"><span class="to">4000<sup>$</sup></span></div></a>
                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 38%; width: 32%;"></div></div>
                            <div class="price_slider_amount addon">
                              <input id="min_price" type="text" name="min_price" value="" data-min="500" placeholder="Min price" style="display: none;">
                              <input id="max_price" type="text" name="max_price" value="" data-max="4000" placeholder="Max price" style="display: none;">
                              <input type="hidden" name="post_type" value="product">
                            </div>
                          </div>
					
						   <div class="selection-box divider-skew"><i class="flaticon-suntour-check box-icon"></i>
							<select name="tp">
							  <option>Тип питания</option>
							  <option value="ai">Все включено</option>
							  <option value="fb">Полу-пансион</option>
							  <option value="br">Только завтраки</option>
							  <option value="ro">Без питания</option>
							</select>
						  </div>
					  <div class="next button-search">Далее</div>
                        
                     
				</div>
              </div>
            </div>

		<div class="tours-container step">
              <div class="tours-box">
                <div class="tours-search mb-20">
                  <div class="form search divider-skew">
                    <div class="form search divider-skew search-wrap">
                      <input type="text" name="name"  placeholder="Ваше имя" class="form-control search-field"><i class="flaticon-people search-icon"></i>
                    </div>
                  </div>
					
				<div class="form search divider-skew">
                    <div class="form search divider-skew search-wrap">
                      <input type="text" name="tel"  placeholder="Номер телефона" class="form-control search-field" required ><i class="flaticon-suntour-phone search-icon"></i>
                    </div>
                  </div>
  
				<div class="form search divider-skew">
                    <div class="form search divider-skew search-wrap">
                      <input type="text" name="email"  placeholder="E-mail" class="form-control search-field"><i class="flaticon-suntour-email search-icon"></i>
                    </div>
                  </div>
                   <button type="submit" class="button-search">Отправить данные</button>				  
                </div>
              </div>
            </div>
	</form>
<!-- form -->       
		   
		   
		   
          </div>
        </div>
	
		
        <!-- begin tours -->
        <div class="features-tours-full-width hidden-xs" id="tours">
          <div class="container">
            <?php echo do_shortcode("[get_tours hotel=\"".get_the_ID()."\"]"); ?>
          </div>
        </div>
        <br>
        <!-- end tours -->
        <?php /*
        <div class="container mt-30" id="overview">
          <h4 class="mb-20">Описание</h4>
          <div class="row">
            <div class="col-md-4">
              <div class="bg-gray-3 p-30-40">
                <ul class="style-1 mb-0">
                  <?php if(get_field('city')): ?>
                    <li>Город вылета: <b><?php the_field('city'); ?></b></li>
                  <?php endif;if(get_field('city')): ?>
                  <li>Количество ночей: <b><?php the_field('period'); ?></b></li>
                  <?php endif;if(get_field('city')): ?>
                  <li>Тип питания: <b><?php the_field('eat'); ?></b></li>
                  <?php endif;if(get_field('city')): ?>
                  <li>Количество людей: <b><?php the_field('num_people'); ?></b></li>
                  <?php endif;if(get_field('city')): ?>
                  <li>Тип номера: <b><?php the_field('type_nomer'); ?></b></li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <?php the_field('about'); ?>
            </div>
          </div>
        </div>
        */ ?>
        <!-- section prices-->
        <?php if(get_field('map')): ?>
		
		
		
	 <div class="container clearfix">
          <!-- media-->
          <div class="pic img-float-left"> <img src="/wp-content/uploads/2017/04/IMG_1804.jpg" alt="Юлия">
            <div class="hover-effect alt"></div>     
          </div>
          <!-- ! media-->
          <div class="overflow-h">
            <!-- section titles-->
            <div class="h2 title-section mt-10 mb-20 mt-md-0"><span>Подобрать тур в этот отель</span> </div>
            <!-- ! section title-->
            <p class="mb-30">Меня зовут Юлия и все вопросы по поводу подбора тура можно решить связавшись со мной любым из перечисленных способов</p>
            <!-- list-->
            <ul class="style-2 mb-30">
              <li>(050)-234-11-43</li>
              <li>(068)-234-11-43</li>
              <li>(063)-234-11-43</li>
            </ul>
            <!-- ! lists-->
            <!-- social-->
            <div class="social-link dark">
			<a href="mailto:info@soultravel.com.ua" class="cws-social fa fa-envelope"></a>
			<a href="https://www.facebook.com/juliasoultravel" class="cws-social fa fa-facebook"></a>
			<a href="https://vk.com/julia_soultravel" class="cws-social fa fa-vk"></a></div>
            <!-- ! social-->
          </div>
        </div>	
		
          <!-- section location-->
          <div id="location" class="container mb-50">
            <div class="row">
              <div class="col-md-12">
                <div class="trans-uppercase mb-10">Карта</div>
                <div class="cws_divider mb-30"></div>
                <!-- google map-->
                <div class="map-wrapper">
                  <iframe src="<?php the_field('map'); ?>" allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>

		 <div class="container mt-30">
          <h5 class="mb-20">Понравился отель?</h5>
          <div class="row">       
		<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus" data-counter=""></div>
          </div>
        </div>
		
		  <div class="container mt-30">
          <h5 class="mb-20">Оставьте свой коментарий.</h5>
          <div class="row">       
     <!-- Put this div tag to the place, where the Comments block will be -->
<div id="vk_comments"></div>
<script type="text/javascript">
VK.Widgets.Comments("vk_comments", {limit: 10, width: "500", attach: "photo,video,audio,link"});
</script>
          </div>
        </div> 
		
        <?php /*
        <!-- section reviews-->
        <div id="reviews" class="container mb-60">
          <div class="row">
            <div class="col-md-12">
              <h4 class="trans-uppercase mb-10">Отзывы посетителей</h4>
              <div class="cws_divider mb-30"></div>
            </div>
          </div>
          <div class="reviews-wrap">
            <div class="reviews-top pattern relative">
              <div class="reviews-total">
                <h5><?=$mark?></h5>
                <div class="reviews-sub-mark"><?=$mark_common?></div>
                <div class="stars-perc"><span style="width:<?=(($mark_common / 5) * 100)?>%"></span></div><span>Всего <?=$num_recalls?> отзывов</span>
              </div>
              <div class="reviews-marks">
                <ul>
                  <li>Питание<span><span class="stars-perc"><span style="width:<?=(($mark_food / 5) * 100)?>%"></span></span><?=$mark_food?></span></li>
                  <li>Сервис<span><span class="stars-perc"><span style="width:<?=(($mark_service / 5) * 100)?>%"></span></span><?=$mark_service?></span></li>
                </ul>
                <ul>
                  <li>Расположение<span><span class="stars-perc"><span style="width:<?=(($mark_place / 5) * 100)?>%"> </span></span><?=$mark_place?></span></li>
                  <li>Номера<span><span class="stars-perc"><span style="width:<?=(($mark_nomers / 5) * 100)?>%"></span></span><?=$mark_nomers?></span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- review -->
        */ ?>
        
      </section>
    </div>
   
    <div id="thanks2" style="display: none;text-align: center;">
        <p style="font-size: 26px;margin: 10px"> <b>Спасибо, мы с вами свяжемся в ближайшее время!</b>
    </div>
	
	
    <?php get_footer(); ?>
