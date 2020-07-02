<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0


get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .page-content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer(); */


get_header(); the_post(); 


 ?>

	<div id="pg-banner">
    	<div class="container">
        	<h2><?php _e( '404: Page Not Found', 'twentyfourteen' ); ?></h2>
        </div>
        
        <!--NOTE 
        	remove banner-margin-true class if you dont need space between banners 
            -->
         <div class="banner-wrap clearfix">
        	<div class="banner-left pull-left" style="background-image:url(<?php echo get_option('fischbach_feature1'); ?>)"></div>
            <div class="banner-right pull-right banner-margin-true">
            	<div class="banner-right-bg" style="background-image:url(<?php echo get_option('fischbach_feature2'); ?>)"></div>
            </div>
        </div>
    </div><!--pg-banner/-->
    
    <section id="content-wrap">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<article id="article" class="main-content pull-left">
                	<p><?php _e( 'It looks like nothing was found at this location. ', 'twentyfourteen' ); ?></p>
                </article>
				<aside id="side-bar" class="pull-right">
				
				</aside>
        	</div>
        	</div>
    </section>
				
				<?php get_footer(); ?>