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
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#d32a2e">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
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
                            	<a href="http://livewire.sullymac.com/login/?redirect_to=http://livewire.sullymac.com/" target="_blank">Employee Login</a>
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