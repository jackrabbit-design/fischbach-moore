<?php
/**
 * Template Name: General Interiors
 *
 * @package WordPress
 * @subpackage Frischbach
 */

get_header();
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
						while ( have_posts() ) : the_post();
						the_content();
						endwhile;
						?>
                </article>

                <aside id="side-bar" class="pull-right">

                    <?php // if(is_user_logged_in()){ ?>




                         <?php  if( have_rows('red_box_content','options')) {?>
                            <div class="box-one spotlight-box cycle-slideshow" data-cycle-slides=">.red-slide" data-cycle-pager=".red-pager">
                                <?php while( have_rows('red_box_content','options')) { the_row(); ?>
                                    <div class="red-slide">
                                        <strong><?php the_sub_field('headline'); ?></strong>
                                        <?php the_sub_field('body'); ?>
                                        <?php  if( get_sub_field('button_text') != '') {?>
                                            <a href="<?php the_sub_field('button_link'); ?>" class="more black-btn hover-white"><?php the_sub_field('button_text'); ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <div class="red-pager"></div>
                            </div><!--spotlight-box-->
                        <?php } ?>




                    <?php /* }else{ //end logged in condition ?>
            				 <?php  if( get_field('red_content_headline') != '')
            				{?>
                            	<div class="box-one spotlight-box">
                                    <strong><?php the_field('red_content_headline'); ?></strong>
                                    <?php the_field('red_content_body'); ?>
            						<?php  if( get_field('red_button_text') != '')
            						{?>
                                    <a href="<?php the_field('red_button_link'); ?>" class="more black-btn hover-white"><?php the_field('red_button_text'); ?></a><?php } ?>
                                </div><!--spotlight-box-->
            					<?php } ?>
                    <?php } // end not logged in */ ?>



                     <?php
		$video_section1 = get_post_meta($post->ID, 'want_to_include_proud_member_section', true);
		//var_dump($video_section1);
		if($video_section1[0] == 'include-proud-member-section')
		{
			?>
                	 <div class="proud-members">
                        	<strong><?php the_field('heading_proud', 'options'); ?></strong>

                            <div class="clearfix inner-wrap">
                            	<div class="member-row">
	                            	<div class="col-one pull-left box">
	                                	<div class="clearfix">
	                                    	<div class="logo pull-left">
	                                        	<img src="<?php the_field('image_left_proud', 'options'); ?>" alt="" />
	                                        </div>
	                                        <div class="content pull-right">
	                                        	<h5><?php the_field('title_left_proud', 'options'); ?></h5>
	                                            <p><?php the_field('short_description_left_proud', 'options'); ?></p>
	                                        </div>
	                                    </div>
	                                </div><!--col-one-->
	                                <div class="col-two pull-right box">
	                                	<div class="clearfix">
	                                    	<div class="logo pull-left">
	                                        	<img src="<?php the_field('image_right_proud', 'options'); ?>"  alt="" />
	                                        </div>
	                                        <div class="content pull-right">
	                                        	<h5><?php the_field('title_right_proud'); ?></h5>
	                                            <p><?php the_field('short_description_right_proud'); ?></p>
	                                        </div>
	                                    </div>
	                                </div><!--col-two-->
                            	</div>

                                <div class="member-row-bottom">
	       							<div class="col-one pull-left box">
	                                	<div class="clearfix">
	                                    	<div class="logo pull-left">
	                                    		<?php $imagePL = get_field('image_left_proud_2', 'options'); ?>
	                                        	<img src="<?php echo $imagePL; ?>" width="50" height="51" alt="" />
	                                        </div>
	                                        <div class="content pull-right">
	                                        	<h5><?php the_field('title_left_proud_2', 'options'); ?></h5>
	                                            <p><?php the_field('short_description_left_proud_2', 'options'); ?></p>
	                                        </div>
	                                    </div>
	                                </div><!--col-one-->

                                    <div class="col-two pull-right box">
                                        <div class="clearfix">
                                            <div class="logo pull-left">
                                                <img src="<?php the_field('image_proud_2', 'options'); ?>"  alt="" />
                                            </div>
                                            <div class="content pull-right">
                                                <h5><?php the_field('title_proud_2', 'options'); ?></h5>
                                                <p><?php the_field('short_description_proud_2', 'options'); ?></p>
                                            </div>
                                        </div>
                                    </div><!--col-two-->

                                </div>
                            </div>
                        </div><!--box-two-->
 <?php } ?>
                </aside>
            </div>
        </div>
    </section>
	<div class="portfolio-single-wrap" style="display:none">
	 <?php
	$args = array( 'post_type' => 'portfolio', 'posts_per_page' => -1 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		if(in_array('select',get_field('featured_portfolio')))
		{
	?>
			<div id="box<?php echo ($post->ID); ?>" class="protfolio-single">
        	<h4><?php the_title(); ?></h4>
            <div class="portfolio-slider-wrap">
				<ul class="portfolio-slider cycle-slideshow" data-cycle-fx="fade"
                    data-cycle-pager=".portfolio-pager1<?php echo ($post->ID); ?>"
                    data-cycle-swipe=true
                    data-cycle-swipe-fx=scrollHorz
                    data-cycle-slides=">li">
			<?php
				if( have_rows('post_slider_image') ):
					while ( have_rows('post_slider_image') ) : the_row();
					$image = get_sub_field('image');?>
                    <li style="background-image:url(<?php echo $image; ?>)"></li>
			<?php   endwhile;
				endif;	?>
                </ul>
                <div class="portfolio-pager portfolio-pager1<?php echo ($post->ID); ?>"></div>
            </div>

            <div class="portfolio-content main-content">
                <div class="sec-row">
                		<img src="<?php echo (wp_get_attachment_url( get_post_thumbnail_id() ));?>" alt="" class="alignright" />
                    	<?php the_content(); ?>
                </div><!--sec-row-->

                <div class="bottom-row clearfix">
                	<div class="box pull-left">

                    	<h5><?php $field_object = get_field_object('workforce_required'); $field_label = $field_object['label']; echo ($field_label);?></h5>
                        <?php the_field('workforce_required');?>
                    </div><!--box-->

                    <div class="box pull-left">
                    	<h5><?php $field_object = get_field_object('interesting_facts'); $field_label = $field_object['label']; echo ($field_label);?></h5>
                        <?php the_field('interesting_facts');?>
                    </div><!--box-->

                    <div class="box pull-left">
                    	<h5><?php $field_object = get_field_object('execution'); $field_label = $field_object['label']; echo ($field_label);?></h5>
                        <?php the_field('execution');?>
                    </div><!--box-->
                </div>
            </div>
        </div>
	 <?php
		}
		 endwhile;  wp_reset_postdata(); ?>

	 </div>

    <!-- NOTE
    	pg-footer class only for interiors -->
<?php
get_footer();
