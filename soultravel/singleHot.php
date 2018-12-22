
<?php
/*
Template Name: Тур в отель
Template post type: post, tours
*/

get_header(); the_post();
$ancestors = get_ancestors(get_the_ID(),'tours');
if (count($ancestors )== 2)
{
$country = get_post($ancestors[1], ARRAY_A);
$region = get_post($ancestors[0], ARRAY_A);
$regionName = $region['post_title'];
$regionSlug = $region['post_name'];
$countryName = $country['post_title'];
$countrySlug = $country['post_name'];
}
if (count($ancestors )== 1)
{
$country = get_post($ancestors[0], ARRAY_A);
$countryName = $country['post_title'];
$countrySlug = $country['post_name'];
}
?>

<main class="content-body">

<section><div class="container"></div></section>


<!-- breadcrumbs start -->
  <section class="small-section cws_prlx_section bg-gray-40 breadcrumbs">
     <img src="<?php
 $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
 echo $image_url[0]; ?>"    alt="<?php the_title(); ?>" class="cws_prlx_layer" style="transform: translate(-50%, -2.33932px);">
   <div class="container">
        <div class="container">
          <div class="color-white text-left breadcrumbs-item"><a href="/">Главная</a><i>/</i><a href="/tours/">Страны</a>
            <i> / </i>  
            <a href="/tours/<?php echo $countrySlug; ?>/"><?php echo $countryName; ?></a><i>/</i>
            <a href="/tours/<?php echo $countrySlug; ?>/<?php echo $regionSlug; ?>/"><?php echo $regionName; ?></a><i>/</i>       

            <h1><span>Туры в </span> <?php the_title(); ?><span class="stars stars-<?php echo get_field('stars'); ?>"></span></h1>
            <div class="location">
              <p class="font-4"><? echo  get_field('desc');?>
               </p> <br>
                <p class="h4">
               Дата вылета: <? echo  get_field('date');?> <br>
               Город вылета: <? echo  get_field('from');?> <br>
               Длительность тура: <? echo  get_field('days');?> <br>
               Цена за 2х человек:  <? echo get_field('price');?>
              </p>
            </div>
            </div>
            <div class="breadright"><a href="#"  onclick="$.fancybox('#ordertop');" class="cws-button small alt">Оставить заявку</a>
          </div>
          </div>
        </div>
      </section>
<!--! breadcrumbs end--> 



<section class="page-section pt-50">
        <div class="container">

<div class="menu-widget with-switch mt-30 mb-30">
            <ul class="magic-line">
              <li class="current_item"><a href="#overview" class="scrollto">Описание тура</a></li>
              
              <li><a href="#include" class="scrollto">В тур входит</a></li>
            <li id="magic-line" style="width: 120px; left: 0px;"></li></ul>
          </div>


          <div class="row">
		  <div class="col-md-12">
              <h2 id="overview" class="title-section">Подробности тура в<span> <?php echo get_field('hotel'); ?></span>
                <span class="stars stars-<?php echo get_field('stars'); ?>"></span>
                <br>
			  ( <?php 
			  			  $tags = array_values( get_the_tags() );
 
// Название первой метки
if ( ! empty( $tags[0] ) )
	echo $tags[0]->name;
 
// Название второй метки
if ( ! empty( $tags[1] ) )
	echo ', '.$tags[1]->name;
 			  
			  ?> )
			  </h2>
              <div class="cws_divider mb-25 mt-5"></div>
			 
			   <?php the_content(); ?>
			   
            </div>

        </div>


        

		  <div class="row">
		  <div class="col-md-6 col-sm-12 col-xs-12 mb-30">
		  <h2 id="include" class="title-section">В тур включено</h2>
		  <div class="cws_divider mb-25 mt-5"></div>
		  <ul class="style-1">
                <li><strong>Авиа:</strong> <? echo  get_field('from');?> - <? echo  get_field('to_city');?> - <? echo  get_field('from');?></li>
                <li><strong>Трансфер:</strong>  Аэропорт - отель <?php echo get_field('hotel'); ?> - аэропорт</li>
                <li><strong>Проживание:</strong>  <? echo  get_field('days');?></li>
                <li><strong>Питание:</strong>  <? echo  get_field('food');?></li>
                <li>Медицинская туристическая страховка</li>
              </ul>
		   </div>
		   
		 
			
		 </div>
        
 
	 
	   <div class="row">   
	   <h2 class="title-section">Спрашивайте информацию по туру у менеджеров: </h2>
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