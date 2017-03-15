<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
	
	
	//setting up the keyword for tracking in leadmaster.
	//This keyword is set in the adwords settings.		
	//Storing the keyword in the cookie so as to track them on submit of any form.
	if ($_GET['keyword']) {
		$cookie_name = 'keyword';
		$cookie_value = $_GET['keyword']; 
	 	setcookie($cookie_name, $cookie_value, time() + 1800, "/");		
	}

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
 <link href="<?php bloginfo('template_url');?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url');?>/css/doc.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,400italic,500,500italic,700' rel='stylesheet' type='text/css'>
   

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<section class="top_header">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="top_header_innr">
					<ul>
						<li>
							<div class="serch_box">
							<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
							<input type="text" name="s" id="s" value="" placeholder="Search this site" />
							<input type="submit" name="" value="" />
							</form>
							</div>
						</li>
						<?php dynamic_sidebar ('header-top-menu-widget-area'); ?>

					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="second_header">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="logo">
					<a href="<?php echo get_option('home');?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" alt=""/></a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="contact">
					<?php dynamic_sidebar( 'header-contact-widget-area' ); ?>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="main_menu">
					  <!-- Static navbar -->
      <nav class="navbar navbar-default menu mob_hide">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
          		<?php

$defaults = array(
	'theme_location'  => 'primary',
	'menu'            => '',
	'container'       => '',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul class="nav navbar-nav">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );

?>
           
          </div><!--/.nav-collapse -->
          	
      </nav>
      <div class="mob_menu desk_hide navbar-default">
          	<?php echo do_shortcode('[srMenu theme_location=primary]');?>
          </div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="body_top">
	<div class="container">
		<div class="row">
			<?php /*
			<div class="col-sm-8">
				<div class="body_top_baner">
					<?php
					if( get_field('baner_image') ){
						$baner_img_src = get_field('baner_image');
					} else {
						$baner_img_src = get_template_directory_uri() . '/images/header-baner-homepage.jpg';
					}
					?>
					<img src="<?php echo $baner_img_src; ?>" />
				</div>
			</div>

			$slider_array = array(
				array(
					'url'	=> '#',
					'image'	=> get_template_directory_uri() . '/images/nexgen-banner-1.jpg'
				),
				array(
					'url'	=> '#',
					'image'	=> get_template_directory_uri() . '/images/nexgen-banner-2.jpg'
				),
				array(
					'url'	=> '#',
					'image'	=> get_template_directory_uri() . '/images/nexgen-banner-3.jpg'
				),
				array(
					'url'	=> '#',
					'image'	=> get_template_directory_uri() . '/images/nexgen-banner-4.jpg'
				),
				array(
					'url'	=> '#',
					'image'	=> get_template_directory_uri() . '/images/nexgen-banner-5.jpg'
				)
			);
			?>
			<div class="col-sm-8">
				<div class="top_slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<?php foreach( $slider_array as $key => $slide ){ ?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $key;?>" class="active"></li>
							<?php } ?>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<?php foreach( $slider_array as $key => $slide ){ ?>
								<div class="item<?php if( $key==0 ){ ?> active<?php } ?>">
									<a href="<?php echo $slide['url']; ?>"><img src="<?php echo $slide['image']; ?>" alt=""></a>
								</div>
							<?php } ?>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<?php */ ?>
			<?php
				if( have_rows('banner') ){
					global $post;
					$post_id = $post->ID;
				} else {
					$post_id = 2;
				}
			?>
			<div class="col-sm-8">
				<div class="top_slider">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					  	<?php 
					  	$i=0;
					  	while( have_rows('banner',$post_id) ): the_row(); ?>
					    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="active"></li>
					    <?php 
					    $i++;
					    endwhile; ?>
					  </ol>
					
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					  	 	<?php 
					  	$i=0;
					  	while( have_rows('banner',$post_id) ): the_row(); ?>

					    <div class="item<?php if($i==0){?> active<?php } ?>">
					      <a href="<?php echo the_sub_field('banner_url'); ?>"><img src="<?php the_sub_field('banner_image',$post_id); ?>" alt=""></a>
					    </div>
					     <?php $i++; endwhile; ?>
					  </div>
					
					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="body_top_form">
					<?php /* <a href="<?php echo home_url( '/quote-form/' ); ?>"> */ ?>
					<a id="show_internal_form_overlay" href="#">
						<div class="button_container">
							<strong>Free Consultation & Quote</strong>
							<div class="form_button">GO</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
