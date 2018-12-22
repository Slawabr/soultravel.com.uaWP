<?php

get_header();
$custom_410_page_ID = 1100924;//Error 410 page ID
header($_SERVER["SERVER_PROTOCOL"] . " 410 Gone");
header("Refresh: 0; url=" . get_permalink($custom_410_page_ID));
exit();
// Подключаем хедер ?> 

<main class="content-body">
  <div class="container page">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="img-404" style="font-size: 100px;">404</div>
        <h2 class="mt-40 mb-50 align-center">Сюрприз, вы нашли секретную страничку и получаете скидку 4% на любой тур. В сообщении нам укажите промо код "404" и адрес этой странички</h2>
        <div class="row">
          <div class="col-md-6"> 
            <p class="mb-15">Вернитесь, пожалуйста, на <a href="/" class="back-home">главную страницу</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); // Подключаем футер ?>