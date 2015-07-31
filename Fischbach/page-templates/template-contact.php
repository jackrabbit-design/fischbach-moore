<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Frischbach
 */

get_header(); the_post();
$left_img1 = get_field('left_featured_image');
$right_img1 = get_field('right_featured_image');
 ?>

	<div id="pg-banner">
    	<div class="container">
        	<h2><?php the_title(); ?></h2>
        </div>
        
        <!--NOTE 
        	remove banner-margin-true class if you dont need space between banners 
            -->
        <div class="banner-wrap clearfix">
        	<div class="banner-left pull-left" style="background-image:url(<?php echo $left_img1; ?>)"></div>
            <div class="banner-right pull-right banner-margin-true">
            	<div class="banner-right-bg" style="background-image:url(<?php echo $right_img1; ?>)"></div>
            </div>
        </div>
    </div><!--pg-banner/-->

        <section id="content-wrap">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<article id="article" class="main-content pull-left">
                	<?php 
						
						the_content(); 
					
						?>
                </article>
                
                <aside id="side-bar" class="pull-right">
					<div class="box-one spotlight-box">
						<?php the_field('contact_sidebar'); ?>
					</div>
                </aside>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>