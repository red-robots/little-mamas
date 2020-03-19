<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area subpage">
		<main id="main" data-id="<?php the_ID(); ?>" class="site-main wrapper" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php $custom_title = get_field("custom_page_title"); ?>
				<header class="pageheader">
					<h1 class="entry-title"><?php echo ($custom_title) ? $custom_title:get_the_title(); ?></h1>
				</header>
				<div class="entry-content text-center">
					<div class="midwrap">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
