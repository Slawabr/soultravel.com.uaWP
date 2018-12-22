<?php
  /*
  Template Name: Main2
  */
 get_header();?>
  
<main class="content-body">
    <div class="clearfix"></div>
<section class="small-section cws_prlx_section bg-blue-40" id="cws_prlx_section_804240207758">
    <img src="/wp-content/uploads/2018/04/soul-travel-sea1.jpg" alt="Турагентство SoulTravel - мы путешествуем с лушой" class="cws_prlx_layer" id="cws_prlx_layer_1290487586505" style="transform: translate(-50%, -4.76247px);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1 class="title-section alt-2">Турагентство в Харькове</h1>  
             <div class="cws_divider mb-25 mt-5"></div>
                        <p class="color-white">Вы искали туристическую фирму, вероятно что вы устали от работы и вам
                            хочется подумать о предстоящем отдыхе на берегу моря. Наша задача - сделать процесс выбора
                            тура наиболее удобным и легким для вас. В наших принципах мы уделяем внимание не только качеству подбора вариантов,
                            а и душевному общению с туристами. Поэтому мы называемся Soul Travel и наш девиз - "путешествуй с душой".</p>
                               <div class="cws_divider mb-30 mt-30"></div>
      
            </div>
            <div class="col-md-12 align-center">
                 <div class="title-section alt-2">Заявка на подбор тура</div>
                   <p class="color-white">Для того чтобы ваш отдых прошел успешно и вы получили от него максимум положительных эмоций, лучше всего - связаться с менеджером. Наши эксперты узнают у вас детали - а затем ознакомят с подборкой подходящих вариантов.</p>
                              
              <style> @import "/wp-content/themes/soultravel/css/full/kviz-form.css"; </style>

<form method="post" id="xinform" name="xinform">
    <div id="prices" class="container mt-40 xinotstup">
      <div class="search-hotels room-search xinpattern">
            
        <div id="kvizform1" class="tours-container">
          <div class="tours-box">
            <div class="tours-search xinboxkviz">
                  <div class="tours-calendar form search divider-skew">
                      <i class="fas fa-map-marker-alt xinicondest"></i>
                      <input type="text" id="xindestination" name="xindestination" value="" class="xinmaxwidth form-control search-field xinblockdest">
                  </div>
              <div class="tours-calendar divider-skew"> 
                <input placeholder="Дата" id="xindate" name="xindate" type="date" value="" class="calendar-default textbox-n xinmaxwidth"><i class="xinicon fas fa-calendar-alt calendar-icon"></i>
              </div>
              <div class="tours-calendar selection-box divider-skew xinmaxwidth xinwidth50"><i class="fas fa-user box-icon"></i>
                <select id="xinadults" name="xinadults">
                  <option>Взрослых</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
              </div>
              <div class="tours-calendar selection-box xinwidth50"><i class="fas fa-child box-icon"></i>
                <select id="xinchilds" name="xinchilds">
                  <option>Детей</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
              <div onclick="ga('send','event','dalee','click')" id="xinformbutton1" class="button-search">Далее</div>
              </div>
          </div>
        </div>

        <div id="kvizform2" class="tours-container kvizform2">
          <div class="tours-box">
            <div class="tours-search xinboxkviz">
        

        <div class="cws-widget">
            <div class="widget-price-slider">
                <div class="xinslider price_slider_wrapper">
                  <div aria-disabled="false" class="xinprice_slider price_slider price_slider_amount ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div><a href="#" class="ui-slider-handle ui-state-default ui-corner-all">
                      <div style="" class="price_label"><span class="from"></span></div></a><a href="#" class="ui-slider-handle ui-state-default ui-corner-all">
                      <div style="" class="price_label"><span class="to"></span></div></a>
                  </div>
                  <div class="price_slider_amount addon">
                    <input id="min_price" type="text" name="min_price" value="" data-min="500" placeholder="Min price" style="display: none;">
                    <input id="max_price" type="text" name="max_price" value="" data-max="4000" placeholder="Max price" style="display: none;">
                    <div class="clear"></div>
                  </div>
                </div>
            </div>
          </div>
          

          <div class="selection-box divider-skew xinmaxwidth xinwidth50"><i class="fas fa-utensils box-icon"></i>
            <select id="xinfood" name="xinfood">
              <option>Все включено</option>
              <option>Полу-пансион</option>
              <option>Только завтраки</option>
              <option>Без питания</option>
            </select>
          </div>
          <div class="selection-box xindivider-skew xinmaxwidth xinwidth50"><i class="fas fa-star box-icon"></i>
            <select id="xinstar" name="xinstar">
              <option>Звездность</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div id="xinformbutton2" class="button-search divider-skew">Далее</div>
        </div>
      </div>
        </div>

      <div id="kvizform3" class="tours-container kvizform3">
        <div class="tours-box">
          <div class="tours-search xinboxkviz">
            <div class="col-md-6 xinforma tours-calendar xinamedivider-skew">
              <div class="input-container">
                <input type="text" minlength="3" id="xinname" name="xinname" value="" size="30" placeholder="Имя" class="chekbox xinwidthform" required>
              </div>
            </div>
            <div class="col-md-6 xinforma tours-calendar divider-skew">
              <div class="input-container">
                <input type="text" id="xinemail" name="xinemail" value="" size="30" placeholder="Email" aria-required="true" class="xinwidthform" required>
              </div>
            </div>
            <div class="col-md-6 xinforma tours-calendar">
                <div class="input-container">
                  <input type="text" id="xinphone" name="xinphone" value="" size="30" placeholder="Телефон" class="xinwidthform form-control" required>
                </div>
              </div>
            <button onclick="yaCounter38269775.reachGoal('zayavka'); return true;" id="xinbuttonsend" type="submit" class="button-search">Отправить</button>
          </div>
        </div>
      </div>

          </div>
        </div>
</form>
<script>
$("#xinform").validate();
</script> 
                   
            </div>
          </div>
        </div>

      </section>
    
                <!-- 2 услуги разделы-  !-->
<div class="slider-info-wrap clearfix">
          <div class="slider-info-content">
             <?php
          $tagslug= basename(get_permalink());
                    $args = array(
                        'post_type' => 'page',
                         'cat'  => '2705',                    
                        'order' => 'DESC',
                        'posts_per_page' => 4
                    );

                    $posts = new WP_Query($args);

                    if ($posts->have_posts()):
                        while ($posts->have_posts()) : $posts->the_post();
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
?>
              
              <div class="slider-info-item">
              <div class="info-item-media"><img src="<?php  echo $thumb_url [0];?>" alt="<?php the_title(); ?>">
                <div class="info-item-text">
                  <p class="info-text"><? echo  get_field('descindex');?></p>
                </div>
              </div>
              <div class="info-item-content">
                <div class="main-title">
                  <h3 class="title"><?php the_title(); ?></h3>
                 <a href="<?=get_permalink()?>" class="button">Подробнее</a>
                </div>
              </div>
            </div>          
              
    <?php endwhile; ?>
    <?php endif;  wp_reset_postdata(); ?>     
          
          </div>
        </div>
     <!-- услуги разделы- --> 

     
    
  <!-- 3 Популярные направления- !-->
        <section class="small-section bg-gray" style="padding: 60px 0 !important;">
            <div class="container">
 <div class="row">
                    <div class="col-md-8">   
                        <h3 class="title-section">Популярные<span> направления</span></h3>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p>Мы рекомендуем ознакомиться с самыми интересными курортами для наших туристов в этом сезоне</p>
                    </div>
                    <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
                </div>
       </div>

<div class="features-tours-full-width">
<div class="features-tours-wrap clearfix">

                    <?php
          $tagslug= basename(get_permalink());
                    $args = array(
                        'post_type' => 'tours',
                        'cat'  => '2686', 
                        'cat'  => '2704', 
                        'order' => 'DESC',
                        'posts_per_page' => 4
                    );

                    $posts = new WP_Query($args);

                    if ($posts->have_posts()):
                        while ($posts->have_posts()) : $posts->the_post();
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
?>

                       
<div class="features-tours-item">
    <div class="features-media"><img src="<?php  echo $thumb_url [0];?>" alt="<?php the_title(); ?>">
<div class="features-info-top"><p class="info-text"><? echo  get_field('desc');?></p></div>
<div class="features-info-bot"><h4 class="title"><?php the_title(); ?></h4><a href="<?=get_permalink()?>" class="button">подробнее</a></div>
</div>
</div>
    
    <?php endwhile; ?>
    <?php endif;  wp_reset_postdata(); ?>     
    
</div>
</div>

        </section>
   <!-- Основные направления- -->
   
        <!-- 4 Спец предложения-->
<section class="small-section bg-gray" style="padding: 60px 0 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="title-section-top font-4">Выгодные варианты туров</div>
                        <h3 class="title-section">Специальные<span> предложения</span></h3>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p>Самые выгодные варианты отдыха рекомендованные нашими сотрудниками и туристами в разделах: отель дня, горящие туры, специальные предложения.
                            Обращаем внимание что эти спец. предложения действительны на дату публикации, если вас что-то заинтересовало - сразу свяжитесь с нами.</p>
                    </div>
                    <div class="col-md-4"><i class="flaticon-suntour-hotel title-icon"></i></div>
                </div>

                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'tours',
                        'order' => 'DESC',
                        'cat'  => '2685',
                        'posts_per_page' => 8,
                    );
                    $posts = new WP_Query($args);
                    if ($posts->have_posts()):
                        while ($posts->have_posts()) : $posts->the_post();
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
?>
                           <!-- Hotel tour preview -->
                            <div class="col-md-6">
                                <div class="recom-item">
                                    <div class="recom-media">
                                        <a href="<?=get_permalink()?>">
                                            <div class="pic">
                                                <img src="<?php  echo $thumb_url [0];?>" alt="<?php the_title(); ?>" style="height: 250px;">
                                            </div>
                                        </a>
                                        <div class="location"><i class="flaticon-suntour-map"></i> <?php $posttags = get_the_tags();
                                            if ($posttags) {
                                                foreach($posttags as $tag) {
                                                    echo $tag->name . ' ';}
                                            }  ?></div>
                                    </div>
                                    <!-- Recomended Content-->
                                    <div class="recom-item-body"><a href="<?=get_permalink()?>">
                                            <div class="h4 blog-title"><?php the_title(); ?></div></a>
<div class="stars stars-<?php echo get_field('stars'); ?>"></div>
<div class="recom-price"><span class="font-4"><? echo get_field('price');?></span> за <? echo  get_field('days');?></div>
 <p class="mb-30"><? echo  get_field('desc');?></p>
<a href="<?=get_permalink()?>" class="recom-button">Подробнее</a><a href="#" onclick="$.fancybox('#ordertop');" class="cws-button small alt">Заказ тура</a>                                     
                                    </div>
                                    <!-- Recomended Image-->
                                </div>
                            </div>
                            <!-- ! Hotel tour preview -->
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- ! -->
        
  <!-- 7 subscribe -->
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

    <section class="page-section cws_prlx_section bg-white-80 pb-60 pt-60" ><img src="/wp-content/uploads/2018/04/soul-travel-sea1.jpg" data-lazyload="/wp-content/uploads/2018/04/soul-travel-sea1.jpg" alt="заявка на подбор тура" class="cws_prlx_layer" style="transform: translate(-50%, -109.306px);">
        <div class="container">
          <div class="call-out-box">
            <div class="call-out-wrap alt">
              <h3 class="title-section alt-2 gray">Подобрать вам подходящий тур</h3><a href="#"  onclick="$.fancybox('#ordertop');" class="cws-button border-left large alt mb-20">Оставить заявку</a>
            </div>
          </div>
        </div>
      </section>        
        
        
        <!-- 8 managers -->
<section class="page-section pt-50">
         <div class="container">    
    <div class="row">   
       <h2 class="title-section">Спрашивайте информацию по турам у наших экспертов:</h2>
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

 </div>
</section>
        <!-- !managers -->

</main>	
<?php get_footer(); ?>