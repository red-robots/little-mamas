	</div><!-- #content -->

	<?php
		$reservation_title = get_field('reservation_title','option');
		$reservation_link = get_field('reservation_link','option');

		$social[] = array('facebook','fab fa-facebook-square');
		$social[] = array('instagram','fab fa-instagram');
		$social[] = array('twitter','fab fa-twitter-square');
		$social_links = array();
		foreach($social as $s) {
			$field = $s[0];
			$val = get_field($field,'option');
			$icon = $s[1];
			if($val) {
				$social_links[$field] = array($val,$icon);
			}
		}

		$footer_text = get_field('partners_text','option');
		$partners = get_field('partners_list','option');

		$address = get_field('address','option');
		$phone = get_field('phone','option');
		$hours = get_field('hours','option');
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ($reservation_title && $reservation_link) { ?>
		<div class="foottop clear">
			<div class="wrapper text-center">
				<a class="fbtn" href="<?php echo $reservation_link ?>" target="_blank"><span class="mr-calendar"></span><?php echo $reservation_title ?></a>
			</div>
		</div>
		<?php } ?>

		<div class="footbottom clear">
			<div class="wrapper">

				<div class="foot-contact-info">
					<div class="midwrap">
						<?php if ($social_links) { ?>
						<div class="social-media-col col3 clear">
							<div class="vertical-middle">
								<span class="sp span1">FOLLOW US</span>
								<span class="sp span2">
									<?php foreach ($social_links as $k=>$e) { ?>
										<a class="<?php echo $k ?>" href="<?php echo $e[0] ?>" target="_blank"><i class="<?php echo $e[1] ?>"></i><span class="sr-only"><?php echo $k ?></span></a>
									<?php } ?>
								</span>
							</div>
						</div>	
						<?php } ?>
					</div>
				</div>
				

				<?php if ($footer_text) { ?>
				<div class="footer-text text-center clear"><?php echo $footer_text ?></div>
				<?php } ?>

				<?php if ($partners) { ?>
				<div class="section-partners fullwrap">
					<div class="flexrow">
						<?php foreach ($partners as $p) { 
						$a_id = $p['ID'];
						$attachment_link = get_field("attachment_link",$a_id); 
						?>
						<div class="info">
							<?php if ($attachment_link) { ?>
								<a href="<?php echo $attachment_link ?>" target="_blank"><img src="<?php echo $p['url'] ?>" alt="<?php echo $p['title'] ?>" /></a>
							<?php } else { ?>
								<img src="<?php echo $p['url'] ?>" alt="<?php echo $p['title'] ?>" />
							<?php } ?>
						</div>	
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
