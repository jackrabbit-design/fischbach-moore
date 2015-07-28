<?php
/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Frischbach
 */

get_header(); 

$home_bg =  get_field( "image_home" );

?>

	<div id="home-body">
    	<div class="bg-image" style="background-image:url(<?php echo $home_bg; ?>)"></div><!--bg-image-->
        <div class="top-content">
        	<div class="container">
            	<div class="container-inner">
                	<h2><?php the_field('title_tab'); ?></h2>
                    
                    <div class="middle-nav hidden-s">
                    	<ul>
						<?php
							// check if the repeater field has rows of data
							if( have_rows('display_tabs') ):
								while ( have_rows('display_tabs') ) : the_row(); ?>
                        	<li><a href="<?php the_sub_field('cta_link_tab'); ?>"><?php the_sub_field('heading_tab'); ?></a></li>
                           <?php 
						   endwhile;
							else :
							endif;
							?>
                        </ul>
                    </div>
                    <div class="middle-nav visible-s">
                    	<ul>
                        	<li><a href="#">OUR SERVICES</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--top-content-->
        
        <div class="home-boxes">
        	<div class="container">
            	<div class="container-inner clearfix">
                	<div class="left-box pull-left">
                    	<h4><?php the_field('title_featured'); ?></h4>
                        <?php the_field('content_featured'); ?>              
                        <a href="<?php the_field('cta_link_featured'); ?>" class="more black-btn hover-red"><?php the_field('cta_text_featured'); ?></a>
                    </div><!--left-box-->
                    
                    <div class="right-box pull-right">
					<?php  if( get_field('red_content_headline') != '')
						{ ?>  
                    	<div class="box-one spotlight-box">
                        	<strong>PROJECT SPOTLIGHT</strong>
                            <h4><?php the_field('red_content_headline'); ?></h4>
                            <?php the_field('red_content_body'); ?>
							 <?php  if( get_field('red_button_text') != '')
							{?>
                            <a href="<?php the_field('red_button_link'); ?>" class="more black-btn hover-white"><?php the_field('red_button_text'); ?></a><?php } ?>
                        </div><!--spotlight-box-->
                        <?php
						}
							$video_section1 = get_post_meta($post->ID, 'want_to_include_proud_member_section', true);
							//var_dump($video_section1);
							if($video_section1[0] == 'include-proud-member-section')
							{
								?>
                        <div class="box-two proud-members">
                        	<strong><?php the_field('heading_proud'); ?></strong>
                            
                            <div class="clearfix inner-wrap">
                            	<div class="member-row">
	                            	<div class="col-one pull-left box">
	                                	<div class="clearfix">
	                                    	<div class="logo pull-left">
	                                        	<img src="<?php the_field('image_left_proud'); ?>" width="50" height="51" alt="" />
	                                        </div>
	                                        <div class="content pull-right">
	                                        	<h5><?php the_field('title_left_proud'); ?></h5>
	                                            <p><?php the_field('short_description_left_proud'); ?></p>
	                                        </div>
	                                    </div>
	                                </div><!--col-one-->
	                                <div class="col-two pull-right box">
	                                	<div class="clearfix">
	                                    	<div class="logo pull-left">
	                                        	<img src="<?php the_field('image_right_proud'); ?>" width="50" height="51" alt="" />
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
	                                    		<?php $imagePL = get_field('image_left_proud_2'); ?>
	                                        	<img src="<?php echo $imagePL; ?>" width="50" height="51" alt="" />
	                                        </div>
	                                        <div class="content pull-right">
	                                        	<h5><?php the_field('title_left_proud_2'); ?></h5>
	                                            <p><?php the_field('short_description_left_proud_2'); ?></p>
	                                        </div>
	                                    </div>
	                                </div><!--col-one-->

                                </div>
                            </div>
                        </div><!--box-two-->
						 <?php } ?>	
                    </div><!--right-box-->
                </div>
            </div>
        </div>
    </div>  
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


<?php
get_footer();
