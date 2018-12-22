<?php
  /*
  Template Name: Страны главная
  Template post type: page;
  */ 
  get_header();
  the_post();
?> 
  
<main class="content-body">

<section><div class="container"></div></section>
     
	<?php the_content(); ?>
   	 
<section class="page-section">
        <div class="container">

<!-- страны -->
<div class="row">
      <div class="col-md-12">
                    <?php
          $tagslug= basename(get_permalink());
                    $args = array(
                        'post_type' => 'tours',
                        'cat'  => '2686',
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
          
       	 
	   <div class="row">   
	   <h2 class="title-section">Спрашивайте информацию по странам у менеджеров: </h2>
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

 </div></div>
	       </section>
		   
	   <section class="page-section cws_prlx_section bg-white-80 pb-60 pt-60" ><img src=" <?php echo $image_url[0]; ?> " alt="<?php the_title(); ?>" class="cws_prlx_layer" style="transform: translate(-50%, -109.306px);">
        <div class="container">
          <div class="call-out-box">
            <div class="call-out-wrap alt">
              <h2 class="title-section alt-2 gray">У вас есть вопросы?</h2><a href="#"  onclick="$.fancybox('#order');" class="cws-button border-left large alt mb-20">Свяжитесь с нами</a>
            </div>
          </div>
        </div>
      </section>

	 
	</main>
<?php get_footer(); ?>