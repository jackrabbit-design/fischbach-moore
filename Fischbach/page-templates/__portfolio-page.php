<?php
/* 

 */
 get_header();
?>
 



<div id="pg-banner">
    	<div class="container">
        	<h2><?php the_title();?></h2>
        </div>
        <!--NOTE 
        	remove banner-margin-true class if you dont need space between banners 
            -->        
        <div class="banner-wrap clearfix">
        	<div class="banner-left pull-left" style="background-image:url(<?php echo get_field('left_image');?>)"></div>
            <div class="banner-right pull-right banner-margin-true">
            	<div class="banner-right-bg" style="background-image:url(<?php echo get_field('right-image');?>)"></div>
            </div>
        </div>
    </div><!--pg-banner/-->
    <section id="portfolio-wrap">
    	<div class="filter-wrap">
        	<nav class="filter-nav">
            	<div class="drop-down-wrap visible-s">
                	<span class="title">all</span>
                    <span class="arrow"><i class="icon-arrow-down"></i></span>
                </div>
            	<ul>
                	<li class="filter" data-filter="all">ALL</li>                                           
                <?php 
				$taxonomy = 'portfolio-category';
				$term_args=array(
				'hide_empty' => false,
				'orderby' => 'name',
				'order' => 'ASC'
				);
				$categories = get_terms($taxonomy,$term_args);
				foreach($categories as $category)
				{ ?>
					<li class="filter" data-filter=".<?php echo $category->slug;?>"><?php echo $category->name; ?></li>
					
				<?php
					
				}?>
	
                </ul>
            </nav>
        </div><!--filter-wrap-->
        
        <div class="container portfolio-item-main">
        	<div class="container-inner">
            	<div class="portfolio-item-wrapper">
                    <ul id="portfolio-items">
			<?php 
			
				$query = new wp_query(array('post_type'=>'portfolio'));
				while($query->have_posts()): $query->the_post();
					$slug = get_the_terms($post->ID,'portfolio-category');
					$new_slug = $slug[0]->slug;
					//var_dump($new_slug);
			?>
					<li class="mix <?php echo $new_slug; ?>">
                            <div class="logo" style="background-image:url(<?php echo (wp_get_attachment_url( get_post_thumbnail_id($post->ID) ));?>)"></div>
                            <h3><?php the_title(); ?></h3>
                            <?php the_excerpt();?>
                            <a href="#box<?php echo ($post->ID); ?>" id = "<?php echo ($post->ID); ?>" class="more black-btn hover-red portfolio-popup">VIEW PROJECT</a>
                    </li>			
				<?php
				endwhile;
			
			?>
                        <li class="gap"></li>
                        <li class="gap"></li>
                        <li class="gap"></li>
                        <li class="gap"></li>
                    </ul>
                 </div>
            </div>
        </div>
    </section><!--portfolio-wrap/-->
   
    
    <!--Portfolio POPUP goes here -->
    <div class="portfolio-single-wrap" style="display:none">
    
	<?php while($query->have_posts()): $query->the_post();	?>
	
	    <div id="box<?php echo ($post->ID); ?>" class="protfolio-single">
        	<h4><?php the_title(); ?></h4>
            <div class="portfolio-slider-wrap">
				<ul class="portfolio-slider cycle-slideshow" data-cycle-fx="fade" data-cycle-speed="0" data-cycle-pager=".portfolio-pager1<?php echo ($post->ID); ?>" data-cycle-swipe=true data-cycle-swipe-fx=scrollHorz data-cycle-slides=">li">
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
  <?php endwhile;?>  
    </div><!--portfolio-single-wrap/-->
<?php get_footer(); ?>
    