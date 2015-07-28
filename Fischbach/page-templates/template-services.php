<?php
/**
 * Template Name: Services
 *
 * @package WordPress
 * @subpackage Frischbach
 */

get_header(); 

$left_img = get_field('left_featured_image');
$right_img = get_field('right_featured_image');

?>

	<div id="pg-banner">
    	<div class="container">
        	<h2><?php the_title(); ?></h2>
        </div>
        
         <!--NOTE 
        	remove banner-margin-true class if you dont need space between banners 
            -->
        <div class="banner-wrap clearfix">
        	<div class="banner-left pull-left" style="background-image:url(<?php echo $left_img; ?>)"></div>
            <div class="banner-right pull-right banner-margin-true">
            	<div class="banner-right-bg" style="background-image:url(<?php echo $right_img; ?>)"></div>
            </div>
        </div>
    </div><!--pg-banner/-->
    
    <section id="content-wrap">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<article id="article" class="pull-left">
                	<div class="main-content">
                    	<?php 
						while ( have_posts() ) : the_post();
						the_content(); 
						endwhile;
						?>
                    </div>
                    
                    <div class="bottom-links">
                    	<div class="main-content">
                        	<h5><?php the_field('title_our_below'); ?> </h5>
                        	<?php the_field('description_our_below'); ?>
                        </div>
	
                        <div class="bottom-links">
                        	<ul>
					<?php
					
					$terms = get_field('select_category'); 
					$slugs =  $terms->term_id; 
						//var_dump($slugs); die;
						$args = array('post_type'=>'portfolio', 
						'posts_per_page' => -1, 
						'tax_query' => array(
						array(
							'taxonomy' => 'portfolio-category',
							'terms' => $slugs,
							'field' => 'id'
						   )
						));
						$result = new WP_Query($args);
						//var_dump($args); die;
					   while ( $result->have_posts() ) : $result->the_post(); ?>
                            	<li><a href="#box<?php echo ($post->ID); ?>" class="more black-btn hover-red portfolio-popup"><?php the_title();?></a></li>
                        <?php endwhile; wp_reset_postdata();?>
                            </ul>
                        </div>
                    </div>
                </article>
                
                <aside id="side-bar" class="pull-right">
                
                	<div id="aside-slider-wrap">
                    	<div class="aside-pager"></div>
                        
                    	<ul id="aside-slider" class="cycle-slideshow" data-cycle-fx="fade" 
                            data-cycle-pager=".aside-pager"
                            data-cycle-timeout=1
                            data-cycle-swipe=true
                            data-cycle-swipe-fx=scrollHorz
                            data-cycle-slides=">li">
                        	
							<?php
						//$terms1 = get_field('select_category'); 
						//$slugs1 =  $terms->term_id; 
						//var_dump($slugs); die;
						$pro_name = $terms->name;
						//var_dump($pro_name);
						$args = array('post_type'=>'portfolio', 
						'posts_per_page' => -1, 
						'tax_query' => array(
						array(
							'taxonomy' => 'portfolio-category',
							'terms' => $slugs,
							'field' => 'id'
						   )
						));
						$result = new WP_Query($args);
						//var_dump($args); die;
					   while ( $result->have_posts() ) : $result->the_post(); ?>
					   <li>
                            	<h4>RECENT <?php echo $pro_name; ?> PROJECTS</h4>
                                
                                <div class="txt-box clearfix main-content">
                                	<h3><?php the_title(); ?></h3>
                                	<div class="logo pull-right">
                                    	<?php the_post_thumbnail('slider-logo',array('class' => 'img-responsive')); ?>
                                    </div>                                    
                                    <div class="content pull-left">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <div class="bottom-box pull-left">
                                    	<a href="#box<?php echo ($post->ID); ?>" class="more black-btn hover-red portfolio-popup">VIEW PROJECT</a>
                                    </div>
                                </div>
                            </li>
                             <?php endwhile; wp_reset_postdata();?>
                        </ul>
                    </div><!--aside-slider-wrap/-->
     
	 <?php
		$video_section1 = get_post_meta($post->ID, 'want_to_include_proud_member_section', true);
		//var_dump($video_section1);
		if($video_section1[0] == 'include-proud-member-section')
		{
			?>
					
                    <div class="proud-members">
                        <strong><?php the_field('heading_proud'); ?></strong>
                        
                        <div class="clearfix inner-wrap">
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
                            </div><!--col-one-->
                        </div>
                    </div><!--proud-members-->   
                <?php } ?>	
                </aside>
            
            </div>
        </div>
    </section>
	
	<div class="portfolio-single-wrap" style="display:none">	 
		<?php
		$terms = get_field('select_category'); 
		$slugs =  $terms->term_id; 
		//var_dump($slugs); die;
		$args = array('post_type'=>'portfolio', 
		'posts_per_page' => -1, 
		'tax_query' => array(
							array(
								'taxonomy' => 'portfolio-category',
								'terms' => $slugs,
								'field' => 'id'
								)
						));
		$result = new WP_Query($args);
		//var_dump($args); die;
	    while ( $result->have_posts() ) : $result->the_post(); ?>
					   
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
					   
					   
					   
					   
	<?php endwhile; wp_reset_postdata();?>				
					
	</div>				
    
    <!-- NOTE 
    	pg-footer class only for interiors -->
		
<script>
$('.cycle-slideshow').cycle({
	fx:'fade', 
    speed:1500, 
    timeout:3500, 
    pause:1 
});
</script>
<?php 
get_footer();
