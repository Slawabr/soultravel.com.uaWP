<?php
/*
Template Name: Отели
*/

get_header();
global $regions;
if (count($regions) > 1) {
	$slug = $regions[1];
} else if (count($regions) == 1) {
	$slug = $regions[0];
} else {
  header('Location: https://soultravel.com.ua/404');
}
$about = get_field('about_hotels', $slug);
?>
<!-- breadcrumbs start-->
<section style="background-image:url('<?=get_field('bg')?>');" class="breadcrumbs style-2 gray-90">
<div class="container">
  <div class="text-left breadcrumbs-item">
    <a href="<?=home_url()?>">Главная</a><i>/</i><?=$breadcrumbs?>
  </div>
  <h1 style="text-align: center;margin: 0;text-transform: uppercase;color: #ffffff;"><?=$title?></h1>
</div>
</section>
<!-- ! breadcrumbs end-->
<!-- ! header page-->
<div class="content-body">
<section class="page-section pt-0 pb-50">
<div class="container">
  <div class="menu-widget with-switch mt-30 mb-30">
    <ul class="magic-line">
	    <li class="current_item"><a href="#txt" class="scrollto">Описание</a></li>
	    <li><a href="#hotels" class="scrollto">Отели</a></li>
    </ul>
  </div>
</div>
<div class="container mt-30" id="txt">
  <h4 class="mb-20">Описание</h4>
  <?=$about?>
</div>
  <div class="features-tours-full-width" id="hotels">
    <div class="container">
      <div class="mb-20">Отели</div>
    </div>
    <div class="features-tours-wrap clearfix">
      <?php
          $args = array(
              'post_type'      => 'tour',
              'order'          => 'DESC',
              'posts_per_page' => -1,
              'tax_query' => array(
                array(
                  'taxonomy' => 'country',
                  'field'    => 'slug',
                  'terms'    => $slug
                )
              )
          );

          $tour = new WP_Query($args);
          $id_tours = array();

          if ($tour->have_posts()): 
              while ($tour->have_posts()): 
                $tour->the_post();
                $price = (get_field('price_sale')) ? get_field('price_sale') : get_field('price');
                $tour_term = get_the_terms(get_the_ID(), 'country')[0]; 
                $id_tours[] = get_the_ID();
                ?>
                <div class="features-tours-item">
                  <div class="features-media">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <div class="features-info-top">
                      <div style="margin-top: 30px;"></div>
                      <div class="info-price font-4"><span></span> <?=$price.get_field('currency')?></div>
                      <?php /*<div class="info-temp font-4"><span>Локальная температура</span> <?=get_field('temperature')?></div>*/ ?>
                      <p class="info-text"><?=get_field('short_about')?></p>
                    </div>
                    <div class="features-info-bot">
                      <div class="title"><span class="font-4"><?=$country['name']?> <?=$tour_term->name?></span> <?php the_title(); ?></div><a href="<?=get_permalink()?>" class="button">Подробнее</a>
                    </div>
                  </div>
                </div>
          <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
  <br>
</section>
</div>
<?php get_footer(); ?>
