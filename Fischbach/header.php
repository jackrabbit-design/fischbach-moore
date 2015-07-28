<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="MSSmartTagsPreventParsing" content="true" /><!--[if lte IE 9]><meta http-equiv="X-UA-Compatible" content="IE=Edge"/><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
	<link type="text/css" rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/css/master.css" />
    <link type="text/plain" rel="author" href="authors.txt" />
    <link type="image/x-icon" rel="shortcut icon" href="favicon.ico" />
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.plugins.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.init.js" type="text/javascript"></script>   
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<!--[if lte IE 7]><iframe src="unsupported.html" frameborder="0" scrolling="no" id="no_ie6"></iframe><![endif]-->
    <!-- NOTE 
    	add pg-footer class interior pages FOOTER
        is not home :)
        -->
    <header id="header">
    	<div class="header-top">
        	<div class="container">
                <div class="container-inner clearfix">
                	<h1 id="logo" class="pull-left">
                    	<a href="<?php bloginfo('url'); ?>">
						<?php do_shortcode('[sitelogo]'); ?>
                        	<!--img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="153" height="155" alt="" /-->
                         </a>
                    </h1>
                    
                    <div class="header-right pull-right hidden-s">
                    	<div class="clearfix">
                        	<div class="header-contact pull-left">
                            	<ul>
                                	<li><?php echo get_option('fischbach_headadd'); ?></li>
                                    <li><?php echo get_option('fischbach_mobileno'); ?></li>
                                </ul>
                            </div><!--header-contact-->
                            
                            <div class="login pull-left">
                            	<a href="#">Employee Login</a>
                            </div>
                            
                            <div class="search-wrap pull-left">
                            	 <form  method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">   
                                	<ul>
                                    	<li>
                                        	<div>
                                            	<input type="text" name = "s" value = "<?php the_search_query(); ?>" placeholder="Search" />
                                                <span><i class="icon-search"></i></span>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div><!--header-right-->
                </div>
            </div>
        </div>
        
        <div class="main-nav-wrap">
        	<div class="container">
            	<div class="container-inner clearfix">
				<nav id="main-nav" class="pull-right hidden-s">
				<?php wp_nav_menu(array('container' => 'ul', 'menu_id'=>'nav' , 'theme_location' => 'primary')); ?>
                    </nav>
                    <div class="pull-right visible-s">
                    	<a class="phone pull-left" href="tel:617.268.7300"><i class="icon-call-phone"></i></a>
                        <div id="toggle_menu_btn" class="pull-left"><span></span></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="mobile-menu-wrap">
            <nav id="mobile-nav">
               <?php wp_nav_menu(array('container' => 'ul', 'menu_id'=>'nav' , 'theme_location' => 'mobile-menu')); ?>
            </nav>
        
            <div class="bottom-wrap">
                <div class="login">
                	<a href="#">Employee Login</a>
                </div>
            
                <div class="search-wrap">
                            	 <form  method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">   
                                	<ul>
                                    	<li>
                                        	<div>
                                            	<input type="text" name = "s" value = "<?php the_search_query(); ?>" placeholder="Search" />
                                                <span><i class="icon-search"></i></span>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                </div>
            </div><!--bottom-wrap-->
        
            <div class="mobile-contact">
                <ul>
                    <li><?php echo get_option('fischbach_headadd'); ?></li>
                    <li><?php echo get_option('fischbach_mobileno'); ?></li>
                </ul>
            </div>
        </div>
    </header>