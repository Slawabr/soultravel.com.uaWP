<?php
  /*
  Template Name: contacts
  */
  get_header();
  the_post();
?>
  <!-- content-->
  <main class="content-body">
    <div class="container page">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-item">
            <h1 class="title-section mt-30"><?php the_title(); ?></h1>
            <div class="cws_divider mb-25 mt-5"></div>
            <ul class="icon">
              <li> <a href="mailto:info@soultravel.com.ua">info@soultravel.com.ua<i class="flaticon-suntour-email"></i></a></li>
              <li>+38(050)-234-11-43 , +38(068)-234-11-43 , +38(063)-234-11-43 <i class="flaticon-suntour-phone"></i></li>
              <li> Украина, г. Харьков, пл. Конституции, 1, Дворец Труда, 4 подъезд, 4 этаж - офис 44-23 <i class="flaticon-suntour-map"></i></li>
            </ul>
            <?php the_content(); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map-wrapper">
            <iframe src="<?=get_field('map')?>" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- ! content-->
<?php get_footer(); ?>