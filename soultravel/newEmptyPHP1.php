<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<section class="small-section bg-blue-40">
		<img src="https://soultravel.com.ua/wp-content/uploads/2018/04/soul-travel-sea1.jpg" alt="Надпись Soul Travel - турагентсвто на пляже" class="cws_prlx_layer" id="cws_prlx_layer_224651651977" style="transform: translate(-50%, -73.9328px);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-section alt-2">Турагентство в Харькове</h1>
                        <div class="cws_divider mb-25 mt-5"></div>
                        <p class="color-white">Вы искали туристическую фирму, вероятно что вы устали от работы и вам
                            хочется подумать о предстоящем отдыхе на берегу моря. Наша задача - сделать процесс выбора
                            тура наиболее удобным и легким для вас. В наших принципах мы уделяем внимание не только качеству подбора вариантов,
                            а и душевному общению с туристами. Поэтому мы называемся Soul Travel и наш девиз - путешесвуй с душой".</p>
                    </div>
                </div>
            </div>

                    <!-- 2 услуги разделы-  !-->
    <div class="slider-info-wrap clearfix">
          <div class="slider-info-content">
             <?php
          $tagslug= basename(get_permalink());
                    $args = array(
                        'post_type' => 'page',
                        'post'  => '429',                    
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
              <div class="info-item-media"><img src="pic/slider-info-1.jpg" data-at2x="pic/slider-info-1@2x.jpg" alt="">
                <div class="info-item-text">
                  <div class="info-price font-4"><span>start per night</span> $105</div>
                  <div class="info-temp font-4"><span>local temperature</span> 36° / 96.8°</div>
                  <p class="info-text">Nunc hendrerit nulla molestie ipsum tincidunt vestibulum. Nunc condimentum nibh.</p>
                </div>
              </div>
              <div class="info-item-content">
                <div class="main-title">
                  <h3 class="title"><span class="font-4">Hawaii</span> Honolulu</h3>
                  <div class="price"><span>$105</span> per night</div><a href="hotels-details.html" class="button">Details</a>
                </div>
              </div>
            </div>          
              
    <?php endwhile; ?>
    <?php endif;  wp_reset_postdata(); ?>     
          
          </div>
        </div>
     <!-- услуги разделы- -->
                
        </section>
        <!-- !-->

