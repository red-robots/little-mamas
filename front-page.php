<?php get_header(); ?>
<div id="primary" class="content-area homecontent">
	<main id="main" class="wrapper">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		$home1_image = get_field("home1_image");
		$home1_text = get_field("home1_text");
		$row1_class = ($home1_image && $home1_text) ? 'half':'full';
		?>
		<div class="row1 <?php echo $row1_class ?>">
			<div class="flexrow">
				<?php if ($home1_image) { ?>
				<div class="imagecol">
					<img src="<?php echo $home1_image['url'] ?>" alt="<?php echo $home1_image['title'] ?>" />
				</div>	
				<?php } ?>

				<?php if ($home1_text) { ?>
				<div class="textcol">
					<div class="inside"><?php echo $home1_text ?></div>
				</div>	
				<?php } ?>
			</div>
		</div>
	<?php endwhile; ?>
	</main>

	<?php /* FOOD MENU */ ?>
	<?php if( $menus = get_field("menus","option") ) { ?>
	<section class="food-menu cf">
		<div class="inner">
			<div class="wrapper">
				<div class="rectangle">
					<div class="corner top"><span class="left"></span><span class="right"></span></div>
					<div class="layer1">
						<div class="layer2"><div class="top"></div><div class="bottom"></div></div>
						<div class="flexrow info">
							<?php foreach ($menus as $m) { ?>
							<div class="menu-title">
								<?php if ($m['pdf_link']) { ?>
								<a href="<?php echo $m['pdf_link'] ?>" target="_blank"><?php echo $m['title'] ?></a>
								<?php } else { ?>
									<?php echo $m['title'] ?>
								<?php } ?>
							</div>	
							<?php } ?>
						</div>
					</div>
					<div class="corner bottom"><span class="left"></span><span class="right"></span></div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>

</div><!-- #primary -->
<?php
get_footer();
