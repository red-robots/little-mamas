<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Lora:400,400i,700,700i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<?php wp_head(); ?>
</head>
<?php $custom_class = (has_banner()) ? 'hasbanner':'nobanner'; ?>
<body <?php body_class($custom_class); ?>>
<div id="page" class="site cf">
	<div class="topbg"></div>
	<a class="skip-link sr" href="#content"><?php esc_html_e( 'Skip to content', 'bellaworks' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">

			<?php  
			$reservation_title = get_field("reservation_title","option");
			$reservation_link = get_field("reservation_link","option");
			$order_options = get_field('order_options','option');
			?>
			
			<?php if ($order_options || $reservation_link) { ?>
			<div class="topmenu">
				<div class="links">
					<?php if ($reservation_title && $reservation_link) { ?>
						<a href="<?php echo $reservation_link ?>" target="_blank" class="green"><?php echo $reservation_title ?></a>
					<?php } ?>
					<?php if ($order_options) { ?>
						<a href="#" id="orderOption" class="orange">Order</a>
						<div class="order-options">
							<?php foreach ($order_options as $o) { 
								$o_link = $o['link'];
								$o_logo = $o['logo'];  
								$o_text = $o['text']; ?>
								<?php if ($o_link && $o_logo) { ?>
									<div class="orderlink">
										<a href="<?php echo $o_link ?>" target="_blank">
											<img src="<?php echo $o_logo['url'] ?>" alt="<?php echo $o['logo']['title'] ?>">
											<?php if ($o_text) { ?>
											<span class="text"><?php echo $o_text ?></span>	
											<?php } ?>
										</a>
									</div>
								<?php } ?>	
							<?php } ?>
							<div id="closeOrder" class="closediv clear"><span id="close-order">Close</span></div>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
			
			<div class="inner">
				<?php if( get_custom_logo() ) { ?>
		            <div class="logo">
		            	<?php the_custom_logo(); ?>
		            </div>
		        <?php } else { ?>
		            <h1 class="logo">
			            <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
		            </h1>
		        <?php } ?>
				<button id="toggleMenu" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="sr-only">MENU</span><span class="bar"></span></button>
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu','container_class'=>'main-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>

		</div><!-- wrapper -->
	</header><!-- #masthead -->

	<?php get_template_part("parts/content","banner"); ?>

	<div id="content" class="site-content">
