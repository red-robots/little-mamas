<?php
/**
 * Template Name: Menu
 */

get_header(); ?>

	<div id="primary" class="content-area subpage pagemenu">
		<main id="main" data-id="<?php the_ID(); ?>" class="site-main wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php $custom_title = get_field("custom_page_title"); ?>
				<header class="pageheader">
					<h1 class="entry-title"><span><?php echo ($custom_title) ? $custom_title:get_the_title(); ?></span></h1>
				</header>
				<div class="entry-content text-center">
					<div class="midwrap">
						<?php the_content(); ?>
					</div>
				</div>

				<?php /* FOOD MENU */ ?>
				<?php $placeholder= get_bloginfo("template_url") . "/images/menu-placeholder.png"; ?>
				<?php if( $menus = get_field("menus","option") ) { ?>
				<section class="page-food-menu cf">
					<div class="menu-types">
						<?php foreach ($menus as $m) { 
						$pagelink = ($m['pdf_link']) ? ' href="'.$m['pdf_link'].'"' : "";
						$menuImg = $m['image'];
						$style = ($menuImg) ? ' style="background-image:url('.$menuImg['url'].')"':'';
						$hasImg = ($menuImg) ? 'hasimage':'noimage';
						?>
						<a class="type"<?php echo $pagelink ?>>
							<span class="inside">
								<div class="menu-image <?php echo $hasImg ?>"<?php echo $style ?>><img src="<?php echo $placeholder ?>" alt="" aria-hidden="true" class="placeholder" /></div>
								<span class="menu-name"><span><?php echo $m['title'] ?></span></span>
							</span>
						</a>	
						<?php } ?>
					</div>
				</section>
				<?php } ?>

			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
