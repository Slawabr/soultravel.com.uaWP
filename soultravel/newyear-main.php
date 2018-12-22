<?php
  /*
  Template Name: Новый год - главная
    Template post type: page;
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
            <a href="https://vk.com/soultravel_com_ua?w=app5728966_-122232090" target="_blank" rel="nofollow" class="button">подписка</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- !subscribe -->

    <section class="page-section cws_prlx_section bg-white-80 pb-60 pt-60" ><img src="<?php
 $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
 echo $image_url[0]; ?>" alt="заявка на горящий тур" class="cws_prlx_layer" style="transform: translate(-50%, -109.306px);">
        <div class="container">
          <div class="call-out-box">
            <div class="call-out-wrap alt">
              <h2 class="title-section alt-2 gray">Подыскать вам новогодний тур</h2><a href="#"  onclick="$.fancybox('#ordertop');" class="cws-button border-left large alt mb-20">Оставить заявку</a>
            </div>
          </div>
        </div>
      </section>
  
  
  <!-- hot tours regions -->
  <div class="features-tours-full-width">
    <div class="features-tours-wrap clearfix">
  <?php
          $tagslug = basename(get_permalink());
                    $args = array(
                        'post_type' => 'newyear',
                        'cat'  => '2689',
                        'order' => 'DESC',
                        'posts_per_page' => 4,
                    );

                    $posts = new WP_Query($args);

                    if ($posts->have_posts()):
                        while ($posts->have_posts()) : $posts->the_post();
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true); 
                            ?>               
      <div class="features-tours-item">
        <div class="features-media"><img src="<?php echo $thumb_url [0];?>" alt="<?php the_title(); ?>" >
          <div class="features-info-top">
            <div class="info-price font-4"></div>
            <p class="info-text"><? echo get_field('desc');?></p>
          </div>
          <div class="features-info-bot">
            <h4 class="title"><span class="font-4"> </span><?php the_title(); ?></h4>
            <a href="<?=get_permalink()?>" class="button">подробнее</a>
          </div>
        </div>
      </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
   



   </div>
 </div>
</div>
</div>

</section>
<section class="page-section pt-50">
        <div class="container">    
   <!-- managers -->
     <div class="row">   
     <h2 class="title-section">Спрашивайте информацию по горящим турам у менеджеров: </h2>
      <div class="cws_divider mb-25 mt-5"></div>
      <div class="col-md-6 col-sm-12 col-xs-12 mb-30">
              <div class="profile-item">
                <div class="profile-media"><img src="/wp-content/uploads/2017/11/yulia-st.jpg" alt="Юлия"></div>
                <div class="title-wrap">
                  <div class="title h4"><span>Юлия</span></div>
                  <div class="positions"><span class="font-4">Контакты:</span></div>
                </div>
                <div class="soc-links">
 <p><a href="tel:(050)-234-11-43" onclick="yaCounter38269775.reachGoal('headcall'); ga('send', 'event', 'nomer', 'zvonok', 'click_nomer', '240');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (050)-234-11-43  </a></p>
  <p><a href="tel:(068)-234-11-43" onclick="yaCounter38269775.reachGoal('headcall'); ga('send', 'event', 'nomer', 'zvonok', 'click_nomer', '240');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (068)-234-11-43  </a></p> 
 </div>
</div>
</div>  

 <div class="col-md-6 col-sm-12 col-xs-12 mb-30">
              <div class="profile-item">
                <div class="profile-media"><img src="/wp-content/uploads/2017/11/ilona-st.jpg" alt="Илона"></div>
                <div class="title-wrap">
                  <div class="title h4"><span>Илона</span></div>
                  <div class="positions"><span class="font-4">Контакты:</span></div>
                </div>
                <div class="soc-links">
 <p><a href="tel:(095)-59-69-263" onclick="yaCounter38269775.reachGoal('headcall'); ga('send', 'event', 'nomer', 'zvonok', 'click_nomer', '240');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (095)-59-69-263  </a></p>
  <p><a href="tel:(068)-659-19-47" onclick="yaCounter38269775.reachGoal('headcall'); ga('send', 'event', 'nomer', 'zvonok', 'click_nomer', '240');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (068)-659-19-47 </a></p> 
 </div>
</div>
</div>

 </div>
<!-- !managers -->
 </div>
         </section>
       
         
  </main>
<?php get_footer(); ?>