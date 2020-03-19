<?php
$currentid = get_the_ID();
$placeholder= get_bloginfo("template_url") . "/images/rectangle.png";
$frame = get_bloginfo("template_url") . "/images/frame2.png";
$frame3 = get_bloginfo("template_url") . "/images/frame3.png";
$frameSmall = get_bloginfo("template_url") . "/images/frame-small.png";
if( is_front_page() ) { 
	$banners = get_field("banners"); 
	$bannerItems = array();
	if($banners) {
		foreach($banners as $b) {
			if($b['image']) {
				$bannerItems[] = $b;
			}
		}
	}
	?>
	<?php if ($bannerItems) { 
	$count = count($bannerItems);
	$slidesId = ($count>1) ? 'slideshow':'static';
	?>
	<div class="slidesWrapper cf">
		<div class="slideInner">
			<div class="bghelper"></div>
			<img src="<?php echo $frame ?>" alt="" aria-hidden="true" class="frame"/>
			<div class="<?php echo $slidesId ?>" class="swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ($bannerItems as $s) { 
						$image = $s['image'];?>
						<?php if ($image) { ?>
						<div class="swiper-slide">
							<div class="slide-image" style="background-image:url('<?php echo $image['url']?>');"></div>
						</div>
						<?php } ?>
					<?php } ?>
				</div>

				<?php if ($count>1) { ?>
				    <div class="swiper-pagination"></div>
				    <div class="swiper-button-next"></div>
				    <div class="swiper-button-prev"></div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
<?php } else { ?>
	
	<?php 
	$ftop3= get_bloginfo("template_url") . "/images/ftop3.png";
	$page_id = get_page_id_by_template('page-menu');
	$banner = get_field("banner"); 
	?>
	<?php if ($banner) { ?>
	<div class="slidesWrapper subpage cf">
		<div class="slideInner">
			<div class="bghelper"></div>
			<?php if ($currentid==$page_id) { ?>
			<img src="<?php echo $frame3 ?>" alt="" aria-hidden="true" class="frame"/>
			<?php } else { ?>
			<img src="<?php echo $frameSmall ?>" alt="" aria-hidden="true" class="frame"/>
			<?php } ?>
			<div class="static" class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="slide-image" style="background-image:url('<?php echo $banner['url']?>');"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

<?php } ?>