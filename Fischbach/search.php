<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
	<div id="pg-banner">
    	<div class="container">
        	<h2>Search Result</h2>
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
    <?php $search_string = get_search_query(); 
	$query = new wp_query(array('post_type'=>'page', 's'=>"$search_string"));
	
	
	?>
    <section id="content-wrap">
    	<div class="container">
        	<div class="container-inner clearfix">
            	<article id="article" class="pull-left search-result">
                	<h3>
                    	<?php echo($query->found_posts);?> result found for "<?php echo $search_string;?>"
                    </h3>
                    
                    <ul id="search-result">
                    	<?php while($query->have_posts()): $query->the_post();    ?>
						<li>
                        	<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        	<p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?><p>
                            <?php// the_excerpt();?>
                            <a href="<?php the_permalink();?>" class="more black-btn hover-red">CONTINUE</a>
                        </li>
                        <?php endwhile; ?>
                    </ul>                    
<?php kriesi_pagination(); ?>
                </article>
                
                <aside id="side-bar" class="pull-right">
                	<div class="box-one spotlight-box">
                        <p><strong>Can't find what you are looking for? Let us know if we can help!</strong></p>
                       <?php echo do_shortcode('[gravityform id="1" title="true" description="false"]'); ?>
                    </div><!--spotlight-box-->
                    
                	<!--<div class="proud-members">
                        <strong>PROUD MEMBER OF </strong>
                        
                        <div class="clearfix inner-wrap">
                            <div class="col-one pull-left box">
                                <div class="clearfix">
                                    <div class="logo pull-left">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-1.png" width="50" height="51" alt="" />
                                    </div>
                                    <div class="content pull-right">
                                        <h5>CIM</h5>
                                        <p>Construction Industries of Massachusetts</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-two pull-right box">
                                <div class="clearfix">
                                    <div class="logo pull-left">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-2.png" width="50" height="51" alt="" />
                                    </div>
                                    <div class="content pull-right">
                                        <h5>IBEW</h5>
                                        <p>International Brotherhood of Electrical Workers Local 103</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>proud-members-->                
                </aside>
            </div>
        </div>
    </section>

<?php	
get_footer();
