<?php
	get_header();
	$cat = get_queried_object();
?> 
  <div class="content-body">
      <div class="container page" style="padding: 60px 0;">
        <h1 class="title"><?php echo $cat->name; ?></h1>
        <div class="row masonry">
          <div class="col-md-12">
            <div class="row">
            	<?php while (have_posts()) : the_post(); // Цикл записей ?>
					<!-- Blog Post-->
		              <div class="col-lg-6 mb-30">
		                <!-- Blog item-->
		                <div class="blog-item clearfix border">
		                  <!-- Blog Image-->
		                  <div class="blog-media"><a href="<?php the_permalink(); ?>">
		                      <div class="pic"><?php the_post_thumbnail(); ?></div></a></div>
		                  <!-- blog body-->
		                  <div class="blog-item-body clearfix">
		                    <!-- title--><a href="<?php the_permalink(); ?>">
		                      <h6 class="blog-title"><?php the_title(); ?></h6></a>
		                    <div class="blog-item-data"><?php the_time('D, d-m-Y'); ?></div>
		                    <!-- Text Intro-->
		                    <p><?php the_content(''); ?></p><a href="<?php the_permalink(); ?>" class="blog-button">Подробнее</a>
		                  </div>
		                </div>
		                <!-- ! Blog item-->
		              </div>
		              <!-- ! Blog Post-->
				<?php endwhile; ?>	
            </div>
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>