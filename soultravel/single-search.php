<?php
// Template Name: search page
?>
<?php get_header(); the_post(); ?>
    <div class="content-body">
        <div class="container page" style="padding: 60px 0;">
            <div class="row">
                <div class="col-md-12">
                    <!-- Blog Post image-->
                    <div class="alt pb-20">


                        <!-- Text Intro-->
                        <?php the_content(); ?>
                        <!-- <div class="blog-tags mb-40">
						  <div class="blog-nav-tags"> <i class="flaticon-suntour-tag"></i><a href="#">Travel</a>, <a href="#">Beach</a>, <a href="#">Family</a></div>
						  <div class="blog-nav-share align-right mt-lg-0"> <a href="#" class="cws-social fa fa-twitter"></a><a href="#" class="cws-social fa fa-facebook"></a><a href="#" class="cws-social fa fa-google-plus"></a><a href="#" class="cws-social fa fa-linkedin"></a></div>
						</div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>