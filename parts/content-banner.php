<?php
$banners = get_field("banners");
if( is_front_page() ) { ?>

<?php if ($banners) { 
	$count = count($banners);
	$slidesId = ($count>1) ? 'slideshow':'static';
	$placeholder= get_bloginfo("template_url") . "/images/rectangle.png";
	$frame = get_bloginfo("template_url") . "/images/frame2.png";
	?>
	<div class="slidesWrapper">
		<div class="slideInner">
			<img src="<?php echo $frame ?>" alt="" aria-hidden="true" class="frame"/>
			<div class="<?php echo $slidesId ?>" class="swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ($banners as $s) { 
						$image = $s['image'];?>
						<?php if ($image) { ?>
						<div class="swiper-slide">
							<div class="slide-image" style="background-image:url('<?php echo $image['url']?>');"></div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
		


	</div>
	<?php } ?>

<?php } ?>