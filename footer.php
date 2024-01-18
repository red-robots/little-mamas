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
        
        <?php if(has_nav_menu('footer')) { ?>
        <nav id="footer-navigation" class="footer-navigation" role="navigation">
          <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu','container_class'=>'footer-menu' ) ); ?>
        </nav>
        <?php } ?>
        
      </div>
      <div class="siteby">Designed by <a href="https://bellaworksweb.com" target="_blank">BW</a></div>
    </div>

  </footer><!-- #colophon -->
</div><!-- #page -->

<?php 
$on = get_field('turn_on', 'option');
if( $on[0] == 'yes' && is_front_page() ) : ?>
<script type="text/javascript">
  window.onload = function() {
    $.colorbox({inline:true, href:".ajax"});
  }
</script>
<?php endif; ?>

<?php  $store_locations = get_field('store_locations','option');
if($store_locations) { ?>
<div class="reservationPopUpBox animated">
  <div class="popupContent">
      <a href="javascript:void(0)" class="popupClose"><span class="sr-only">Close Popup</span></a>
    <div class="popTitle">
      <h3>RESERVATIONS</h3>
      <p>Select a location.</p>
    </div>
    <div class="locationList">
      <?php foreach($store_locations as $s) { 
      $address = $s['address'];
      $reservationLink = $s['reservation_link']; 
        $is_coming_soon = ($s['coming_soon']=='yes') ? true : false; 
        if($is_coming_soon) {
        $reservationLink = "javascript:void(0)";
      }
      ?>
        <?php if ($address && $reservationLink) { ?>
          <?php if($is_coming_soon) { ?>
            <div class="store-address coming--soon">
              <small>Coming Soon</small>
              <a href="<?php echo $reservationLink ?>" class="soon" disabled="true">
                <?php echo $address; ?>
              </a>
            </div>
          <?php } else { ?>
            <div class="store-address">
            <a href="<?php echo $reservationLink ?>" target="_blank"><?php echo $address; ?></a>
            </div>
          <?php } ?>
        <?php } ?>
      <?php } ?>
    </div>  
  </div>
</div>
<?php } ?>
<script>
jQuery(document).ready(function($){
  $(document).on('click','.reservationPopUpBox .popupClose', function(e){
    e.preventDefault();
    $('.reservationPopUpBox').hide();
    $('.reservationPopUpBox').removeClass('fadeIn');
  });
  $(document).on('click','#reservationsBtn', function(e){
    e.preventDefault();
    $('.reservationPopUpBox').show();
    $('.reservationPopUpBox').addClass('fadeIn');
  });
});
</script>
<?php wp_footer(); ?>

</body>
</html>
