<?php get_header(); the_post(); ?>
  <main class="content-body">
    <div class="container page" style="padding: 60px 0;">
      <div class="row">
        <div class="col-md-8 mb-60">
        
          <article class="blog-item clearfix mb-30 border">
              <h1><?php the_title(); ?></h1>  

           
            <?php the_content(); ?>
                     
          </article>
            
            
        </div>

          <div class="col-md-4 sidebar">
              <!-- widget category-->
              <div class="cws-widget">
                  <div class="widget-post">
                      <div class="widget-title alt">Подписка на горящие туры</div>
                      <!-- item recent post-->				  
					      <a rel="nofollow" target="_blank" href="https://manychat.com/l7/soultravelcomua"><div class="item-recent clearfix">
                              <div class="widget-post-media"><img src="/wp-content/uploads/2018/02/sn-logo-fb.jpg" data-at2x="/wp-content/uploads/2018/02/sn-logo-fb.jpg" alt="FaceBook рассылка"></div>
                              <div class="title">Подписка в FaceBook</div>
                          </div></a><br>
                      <!-- ! item recent post-->
					  
					    <!-- item recent post-->				  
					      <a rel="nofollow" target="_blank" href="https://vk.com/soultravel_com_ua?w=app5728966_-122232090"><div class="item-recent clearfix">
                              <div class="widget-post-media"><img src="/wp-content/uploads/2018/02/sn-logo-vk.jpg" data-at2x="/wp-content/uploads/2018/02/sn-logo-vk.jpg" alt="Вконтакте рассылка"></div>
                              <div class="title">Подписка в Вконтакте</div>
                          </div></a><br>
                      <!-- ! item recent post-->
					  
<!-- item recent post-->				  
					      <a rel="nofollow" target="_blank" href="http://bit.ly/viberhottours"><div class="item-recent clearfix">
                              <div class="widget-post-media"><img src="/wp-content/uploads/2018/02/sn-logo-viber.jpg" data-at2x="/wp-content/uploads/2018/02/sn-logo-viber.jpg" alt="Подписка в Viber"></div>
                              <div class="title">Подписка в Viber</div>
                          </div></a><br>
                      <!-- ! item recent post-->

                      <!-- ! item recent post-->
                      <a rel="nofollow" target="_blank" href="https://t.me/soultravelua"><div class="item-recent clearfix">
                              <div class="widget-post-media"><img src="/wp-content/uploads/2018/02/sn-logo-telegramm.jpg" data-at2x="/wp-content/uploads/2018/02/sn-logo-telegramm.jpg" alt="Telegramm рассылка"></div>
                              <div class="title">Подписка в Telegramm</div>
                          </div></a><br>
                      <!-- ! item recent post-->
					  
         <!-- item recent post-->
                      <div class="item-recent clearfix">
                          <button sp-show-form="97124" class="cws-button alt" type="button">Подписка на e-mail</button>
                          <script src="//static-login.sendpulse.com/apps/fc3/build/loader.js" sp-form-id="a9e8115b6f75f9ea93168d6bce6c686b1ef45f3a3acea752c6f82af7b2b21334"></script>
                     </div>


                  </div>
              </div>
              <br>
                            <div class="cws-widget">
                  <div class="widget-search">
                      <div class="widget-title">Заявка на подбор тура</div>
                      <form method="post" id="form-email" class="mt-10 form" >
                          <div class="input-container"><input class="form-row" name="name" required="" size="40" type="text" value="" placeholder="Введите ваше имя" aria-invalid="false" aria-required="true" /></div>
                          &nbsp;
                          <div class="input-container"><input class="form-row" name="tel" required="" size="40" type="text" value="" placeholder="Введите ваш номер" aria-required="true" /></div>
                          <br>
                          <button onclick="yaCounter38269775.reachGoal('zayavka'); ga('send', 'event', 'zayavka', 'zakaz', 'click_botton', '240'); return true;" type="submit" class="cws-button alt" >Подобрать варианты</button>
                      </form>
                  </div>
              </div>

          </div>
    </div>
  </div>
 </main>
<?php get_footer(); ?>