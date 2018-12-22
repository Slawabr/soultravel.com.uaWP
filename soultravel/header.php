<!DOCTYPE html>
<html lang="ru">
<head>
 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<meta name="yandex-verification" content="5a6eb9669ff335fd" />

<link rel="stylesheet" href="/wp-content/themes/soultravel/css/owl.carousel.css">
<link rel="stylesheet" href="/wp-content/themes/soultravel/css/otpusk.css">
<link rel="stylesheet" href="/wp-content/themes/soultravel/css/ms-style.css">
<link rel="Stylesheet" href="https://export.otpusk.com/os/onsite/form.css" /> 
<link rel="Stylesheet" href="https://export.otpusk.com/os/onsite/result.css" />
<link rel="Stylesheet" href="https://export.otpusk.com/os/onsite/tour.css" /> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

<link rel="stylesheet" href="/wp-content/themes/soultravel/css/additional.css"> 

 <!--[if lt IE 9]> 
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp

  ?>


    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NKGFC9J');</script>
    <!-- End Google Tag Manager -->
  </head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKGFC9J"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- header page-->
    <header>
      <!-- site top panel-->
      <div class="site-top-panel">
        <div class="container p-relative">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <!-- lang select wrapper-->
              <div class="top-left-wrap font-3">
                <div class="mail-top"><i class="title-section-top font-4">Турагентство SoulTravel</i> </div>
              <span>/</span>           
              <div class="tel-top">
  <a href="tel:(050)-234-11-43" onClick="yaCounter38269775.reachGoal('headcall');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (050)-234-11-43  </a>
			  </div>
              <span>/</span>
               <div class="tel-top">
  <a href="tel:(068)-234-11-43" onClick="yaCounter38269775.reachGoal('headcall');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (068)-234-11-43  </a>
			  </div>
               <span>/</span>
               <div class="tel-top">
  <a href="tel:(063)-234-11-43" onClick="yaCounter38269775.reachGoal('headcall');"><i class="flaticon-suntour-phone" style="margin-right: 3px"></i> (063)-234-11-43  </a>
			  </div>
             
        
              </div>			  
              <!-- ! lang select wrapper-->
            </div>           
          </div>
        </div>
      </div>
      <!-- ! site top panel-->


      
      <!-- Navigation panel-->
<nav class="main-nav js-stick">
        <div class="full-wrapper relative clearfix container">
          <!-- Logo ( * your text or image into link tag *)-->
          
          <div class="nav-logo-wrap local-scroll"><a href="/"> <img src="/wp-content/uploads/2017/12/logo.gif" alt="Турфирма SoulTravel логотип"></a></div><!-- Main Menu-->
          
          <div class="inner-nav desktop-nav">
            <ul class="clearlist">
            				 
  <?php
            		wp_nav_menu( array(
					    'menu'   => 'top-menu',
					    'container' => false,
					    'items_wrap' => '%3$s',
					    'walker' => new My_Walker_Nav_Menu(),
					) );
            	?>
			  
			
            <li class="search"><a href="#" onclick="$.fancybox('#order');">Заказ тура</a></li>
            </ul>
          </div>
          <!-- End Main Menu-->
        </div>
      </nav>
      
      <!-- End Navigation panel-->
    </header>
