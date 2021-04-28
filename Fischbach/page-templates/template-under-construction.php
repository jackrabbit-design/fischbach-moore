<?php
/**
 * Template Name: Under Construction
 *
 * @package WordPress
 * @subpackage Frischbach
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="MSSmartTagsPreventParsing" content="true" /><!--[if lte IE 9]><meta http-equiv="X-UA-Compatible" content="IE=Edge"/><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
<!-- 	<link type="text/css" rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/css/master.css" /> -->
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

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170305472-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-170305472-1');
	</script>

	<style>
		#header .header-top:before {
			display: none;
		}
	</style>

	<!-- Work -->
</head>
<body <?php body_class(); ?> >
	<!--[if lte IE 7]><iframe src="unsupported.html" frameborder="0" scrolling="no" id="no_ie6"></iframe><![endif]-->
	<!-- NOTE
		add pg-footer class interior pages FOOTER
		is not home :)
		-->
	<header id="header" style="position: fixed; width: 100%; top: 25vh;">
		<div class="header-top" style="background: transparent !important">
			<div class="container">
				<div class="container-inner clearfix">
					<h1 id="logo" class="pull-left">
						<a href="<?php bloginfo( 'url' ); ?>">
						<?php do_shortcode( '[sitelogo]' ); ?>
							<!--img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="153" height="155" alt="" /-->
						</a>
					</h1>

				</div>
			</div>
		</div>


		<div class="main-nav-wrap">
			<div class="container">
				<div class="container-inner clearfix">
					<nav id="main-nav" class="pull-left hidden-s" style="margin-left: 175px;">
						<ul>
							<li><a href='/' style="font-size: 32px; pointer-events: none;">Site Under Construction</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

	</header>

<?php

$home_bg =  get_field( "image_home", 5 );
$focal_point = get_field( 'background_position', 5 );
?>

	<div id="home-body"  style="padding-bottom: 0 !important">
		<div class="bg-image" style="background-image:url(<?php echo $home_bg; ?>); <?php echo ($focal_point) ? "background-position: {$focal_point}" : ""; ?>"></div><!--bg-image-->

	</div>

<?php wp_footer(); ?>
</body>
</html>