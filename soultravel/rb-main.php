<?php
  /*
  Template Name: Раннее - главная
    Template post type: page, tours;
  */ 
  get_header();
  the_post();
?> 
<main class="content-body">
<section><div class="container"></div></section>
<section class="tp-banner-container">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
   <?php the_content(); ?>
      </div>

 <!-- subscribe -->
  <div class="features-tours-full-width">
    <div class="features-tours-wrap clearfix">
      <div class="features-tours-item">
        <div class="features-media"><img src="/wp-content/uploads/2017/12/viber-1.jpg" data-at2x="/wp-content/uploads/2017/12/viber-1.jpg" alt="Горящие туры в Viber">
          <div class="features-info-bot">
            <h4 class="title"><span class="font-4">Рассылка </span>Viber</h4>
            <a href="http://bit.ly/viberhottours" target="_blank" rel="nofollow" class="button">подписка</a>
          </div>
        </div>
      </div>
      <div class="features-tours-item">
        <div class="features-media"><img src="/wp-content/uploads/2017/12/facebook.jpg" data-at2x="/wp-content/uploads/2017/12/facebook.jpg" alt="Горящие туры в FaceBook">
          <div class="features-info-bot">
            <h4 class="title"><span class="font-4">Рассылка </span>FaceBook</h4>
            <a href="https://m.me/soultravelcomua?ref=w2392872" target="_blank" rel="nofollow" class="button">подписка</a>
          </div>
        </div>
      </div>
      <div class="features-tours-item">
        <div class="features-media"><img src="/wp-content/uploads/2017/12/telegramm.jpg" data-at2x="/wp-content/uploads/2017/12/telegramm.jpg" alt="Горящие туры в Telegramm">
          <div class="features-info-bot">
            <h4 class="title"><span class="font-4">Рассылка </span>Telegramm</h4>
            <a href="https://t.me/soultravelua" target="_blank" rel="nofollow" class="button">подписка</a>
          </div>
        </div>
      </div>
      <div class="features-tours-item">
        <div class="features-media"><img src="/wp-content/uploads/2017/12/vkontakte.jpg" data-at2x="/wp-content/uploads/2017/12/viber-1.jpg" alt="Горящие туры в Вконтакте">
          <div class="features-info-bot">
            <h4 class="title"><span class="font-4">Рассылка </span>Вконтакте</h4>
            <a href="https://vk.com/app5748831_-122232090" target="_blank" rel="nofollow" class="button">подписка</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- !subscribe -->

<!-- страны -->
<div class="row">
      <div class="col-md-12">
                    <?php
          $tagslug= basename(get_permalink());
                    $args = array(
                        'post_type' => 'ranee',
                        'cat'  => '2653',
                        'order' => 'DESC',
                        'posts_per_page' => 20
                    );
                    $posts = new WP_Query($args);
                    if ($posts->have_posts()):
                        while ($posts->have_posts()) : $posts->the_post();
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
?>
<!-- tour preview -->
                            <div class="col-md-6">
                                <div class="recom-item">
                                    <div class="recom-media">
                                        <a href="<?=get_permalink()?>">
                                            <div class="pic">
                                                <img src="<?php  echo $thumb_url [0];?>" alt="<?php the_title(); ?>" style="height: 250px;">
                                            </div>
                                        </a>
                            
                                    </div>
                                    <!-- Recomended Content-->
                                    <div class="recom-item-body"><a href="<?=get_permalink()?>">
                                            <div class="h4 blog-title"><?php the_title(); ?></div></a>
 <p class="mb-30"><? echo  get_field('desc');?></p>
<a href="<?=get_permalink()?>" class="recom-button">Подробнее</a>                                
                                    </div>
                                    <!-- Recomended Image-->
                                </div>
                            </div>
                            <!-- ! Hotel tour preview -->
                        <?php endwhile; ?>
                    <?php endif;  wp_reset_postdata(); ?>               
            </div>
        </div>
        <!-- !страны  -->
   </div></div>
</section>
  </main>
<?php get_footer(); ?>