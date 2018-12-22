<?php
	get_header();
  $tax = get_queried_object();
  $title = $tax->name;
  $slug_tax = $tax->taxonomy.'_'.$tax->term_id;
  $about = get_field('about', $slug_tax);
  $slider = get_field('slider', $slug_tax);

  // get countries
  $args = array(
    'post_type'      => 'tour',
    'order'          => 'DESC',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'tourtypes',
        'field'    => 'slug',
        'terms'    => $tax->slug
      )
    )
  );
  $tours = get_posts($args);
  $id_tours = array();
  foreach ($tours as $key => $value) {
    $id_tours[] = $value->ID;
  }
  $args = array(
    'taxonomy' => 'country',
    'hide_empty' => true,
    'object_ids' => $id_tours,
    'parent' => '0',
  );
  $countries = get_terms( $args );
  wp_reset_postdata();

  if ($tax->parent > 0)
  {
    $is_region = true;
    $region = array('name' => $tax->name, 'slug' => $tax->slug);
    $parent_tax = get_term($tax->parent, 'country');
    $country = array('name' => $parent_tax->name, 'slug' => $parent_tax->slug);
    $breadcrumbs = '<a href="'. home_url() .'/'. $country['slug'] .'/">'. $country['name'] .'</a><i>/</i><a href="'. home_url() .'/'. $country['slug'] .'/'. $region['slug'] .'/" class="last"><span>'. $region['name'] .'</span></a>';
  }
  else
  {
    $is_region = false;
    $country = array('name' => $tax->name, 'slug' => $tax->slug);
    $breadcrumbs = '<a href="'. home_url() .'/'. $country['slug'] .'/" class="last"><span>'. $country['name'] .'</span></a>';
  }
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
              <li class="current_item"><a href="#photo" class="scrollto">Фото</a></li>
              <li><a href="#overview" class="scrollto">Описание</a></li>
              <li><a href="#regions" class="scrollto">Страны</a></li>
              <li><a href="#tours" class="scrollto">Отели</a></li>
              <li><a href="#blog" class="scrollto">Блог</a></li>
            </ul>
          </div>
        </div>
        <?php
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
        <div class="container mt-30" id="overview">
          <h4 class="mb-20">Описание</h4>
          <?=$about?>
        </div>
        <!-- countries -->
        <div class="features-tours-full-width" id="regions">
          <div class="container">
            <h4 class="mb-20">Страны</h4>
          </div>
          <div class="features-tours-wrap clearfix">
            <?php foreach ( $countries as $country ): ?>
                      <div class="features-tours-item">
                        <div class="features-media">
                          <img src="<?=get_field('img', $country->taxonomy.'_'.$country->term_id)['sizes']['medium']?>">
                          <div class="features-info-top">
                            <p class="info-text"></p>
                          </div>
                          <div class="features-info-bot">
                            <h4 class="title"><?=$country->name?></h4><a href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].'/'.$country->slug; ?>/" class="button">Подробнее</a>
                          </div>
                        </div>
                      </div>
            <?php endforeach; ?>
          </div>
        </div>
        <br>
        <!-- end countries -->
        <!-- page section-->
        <div class="features-tours-full-width" id="tours">
          <div class="container">
            <h4 class="mb-20">Отели</h4>
          </div>
          <div class="features-tours-wrap clearfix">
            <?php 
            if (!empty($tours)): 
                    foreach ($tours as $post): setup_postdata($post);
                      $price = (get_field('price_sale')) ? get_field('price_sale') : get_field('price');
                      $tour_term = get_the_terms(get_the_ID(), 'country')[0]; ?>
                      <div class="features-tours-item">
                        <div class="features-media">
                          <?php the_post_thumbnail('thumbnail'); ?>
                          <div class="features-info-top">
                            <div style="margin-top: 30px;"></div>
                            <div class="info-price font-4"><span></span> <?=$price.get_field('currency')?></div>
                            <p class="info-text"><?=get_field('short_about')?></p>
                          </div>
                          <div class="features-info-bot">
                            <h4 class="title"><span class="font-4"><?=$tour_term->name?></span> <?php the_title(); ?></h4><a href="<?=get_permalink()?>" class="button">Подробнее</a>
                          </div>
                        </div>
                      </div>
                <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
        <br>
        <?php
          $args = array(
              'post_type'      => 'post',
              'order'          => 'DESC',
              'posts_per_page' => 4,
              'tax_query' => array(
                array(
                  'taxonomy' => 'country',
                  'field'    => 'slug',
                  'terms'    => $tax->slug
                )
              )
          );

          $blog = new WP_Query($args);

          if ($blog->have_posts()): ?>
            <div class="container" id="blog">
              <h4 class="mb-20">Блог</h4>
              <div class="tr">
                <div class="owl-two-pag pagiation-carousel mb-20">
                      <?php while ($blog->have_posts()) : $blog->the_post(); ?>
                        <!-- Blog item-->
                        <div class="blog-item clearfix">
                          <!-- Blog Image-->
                          <div class="blog-media">
                            <a href="<?=get_permalink()?>">
                              <div class="pic"><?php the_post_thumbnail('thumbnail'); ?></div>
                            </a>
                          </div>
                          <!-- blog body-->
                          <div class="blog-item-body clearfix">
                            <!-- title--><a href="<?=get_permalink()?>">
                              <h6 class="blog-title"><?php the_title(); ?></h6></a>
                            <div class="blog-item-data"><?php the_time('D, d-m-Y'); ?></div>
                            <!-- Text Intro-->
                            <?php the_content(''); ?>
                            <a href="<?=get_permalink()?>" class="blog-button">Подробнее</a>
                          </div>
                        </div>
                        <!-- ! Blog item-->
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>
      </section>
    </div>
    <?php get_footer(); ?>
