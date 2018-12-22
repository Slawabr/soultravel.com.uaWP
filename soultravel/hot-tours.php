
<?php
/*
Template Name: Горящие
Template post type: tours, post, page, hottours
*/

get_header(); the_post();
?>

<main class="content-body">

<section><div class="container"></div></section>
     
	<!-- breadcrumbs start 1-->
  <section class="small-section cws_prlx_section bg-gray-40 breadcrumbs">
     <img src="<?php
 $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
 echo $image_url[0]; ?>"    alt="<?php the_title(); ?>" class="cws_prlx_layer" style="transform: translate(-50%, -2.33932px);">
   <div class="container">
        <div class="container">
          <div class="color-white text-left breadcrumbs-item"><a href="/">Главная</a><i>/</i><a href="/hottours/">Горящие туры</a><i>/</i> <span><?php echo get_field('strana'); ?></span>
            <h1><span>Горящие туры в </span><?php echo get_field('kuda')?></h1>
            <div class="location">
              <p class="font-4"><? echo get_field('desc');?></p>
            </div>
            </div>
            <div class="breadright"><a href="#"  onclick="$.fancybox('#ordertop');" class="cws-button small alt">Оставить заявку</a>
          </div>
          </div>
        </div>       
<!--  квазиформа   -->         
<style> @import "/wp-content/themes/soultravel/css/full/kviz-form.css"; </style>

<form method="post" id="xinform" name="xinform">
    <div id="prices" class="container mt-40 xinotstup">
      <div class="search-hotels room-search xinpattern">
            
        <div id="kvizform1" class="tours-container">
          <div class="tours-box">
            <div class="tours-search xinboxkviz">
                  <div class="tours-calendar form search divider-skew">
                      <i class="fas fa-map-marker-alt xinicondest"></i>
                      <input type="text" id="xindestination" name="xindestination" value="<?php echo get_field('kuda')?>" class="xinmaxwidth form-control search-field xinblockdest">
                  </div>
              <div class="tours-calendar divider-skew"> 
                <input placeholder="Дата" id="xindate" name="xindate" type="date" value="<?php echo date('d-m-Y')?>" class="calendar-default textbox-n xinmaxwidth"><i class="xinicon fas fa-calendar-alt calendar-icon"></i>
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
              <div id="xinformbutton1" class="button-search">Далее</div>
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
            <button id="xinbuttonsend" type="submit" class="button-search">Отправить</button>
          </div>
        </div>
      </div>

          </div>
        </div>
</form>
<script>
$("#xinform").validate();
</script>
<!-- ! квазиформа   --> 
      </section>
<!-- ! breadcrumbs end-->
<section class="page-section pt-50">
        <div class="container">
          <div class="row">
		        <div class="col-md-12">
              <h2 id="overview" class="title-section">Специальные предложения на <span> <?php echo get_field('hotdate'); ?></span> </h2>
              <div class="cws_divider mb-25 mt-5"></div>
			 
			   <?php the_content(); ?>
			   
            </div>

        </div>
       
      </div>
         </section>

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



    
    <section class="page-section pt-50">
        <div class="container">    
	 <!-- managers -->
	   <div class="row">   
	   <h2 class="title-section">Спрашивайте информацию по горящим турам в <?php echo get_field('kuda'); ?> у менеджеров: </h2>
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
		   
	   <section class="page-section cws_prlx_section bg-white-80 pb-60 pt-60" ><img src=" <?php echo $image_url[0]; ?> " alt="<?php echo get_field('hotel'); ?>" class="cws_prlx_layer" style="transform: translate(-50%, -109.306px);">
        <div class="container">
          <div class="call-out-box">
            <div class="call-out-wrap alt">
              <h2 class="title-section alt-2 gray">У вас есть вопросы?</h2><a href="#"  onclick="$.fancybox('#ordertop');" class="cws-button border-left large alt mb-20">Свяжитесь с нами</a>
            </div>
          </div>
        </div>
      </section>

	 
	</main>


<?php get_footer(); ?>