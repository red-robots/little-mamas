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
              <div class="section-title"><span>Menus</span></div>
              <div class="food-menu-items">
                <?php foreach ($menus as $m) { 
                $pagelink = ($m['pdf_link']) ? $m['pdf_link'] : "#";
                ?>
                <div class="foodMenuName">
                  <a href="<?php echo $pagelink ?>" target="_blank"><span><?php echo $m['title'] ?></span></a>
                </div>  
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="corner bottom"><span class="left"></span><span class="right"></span></div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>


  <?php /* CONTACT */ ?>
  <?php 
  $square = get_bloginfo("template_url") . "/images/square.png";
  $phone = get_field("phone","option"); 
  $address = get_field("address","option"); 
  $gmap = get_field("gmap","option"); 
  $contactBg = get_field("contactBg"); 
  $contactStyle = ($contactBg) ? ' style="background-image:url('.$contactBg['url'].')"':'';
  $store_locations = get_field('store_locations','option');
  ?>

  <section class="section-contact cf"<?php echo $contactStyle ?>>
    <div class="wrapper">
      <div class="flexwrap">
        <?php if($store_locations) { ?>
          <?php foreach($store_locations as $s) { 
            $phone = $s['phone'];
            $address = $s['address'];
            $a_hours = $s['a_hours'];
            $a_disclaimer = $s['a_disclaimer'];
            $coming_soon = $s['coming_soon'];
            $gmap = $s['googlemap'];
               ?>
            <div class="contactinfo">
              <div class="inside">
                <div class="wrap">
                  <?php if($coming_soon=='yes') { ?>
                  <div class="title coming-soon">Coming Soon</div>
                  <?php } ?>
                  <div class="details">
                    <?php if ($phone) { ?>
                    <div class="info phone"><?php echo $phone ?></div>
                    <?php } ?>
                    <?php if ($address) { ?>
                    <div class="info address"><?php echo $address ?></div>
                    <?php } ?>
                    <?php if ($address) { ?>
                    <div class="info thehours"><?php echo $a_hours ?></div>
                    <?php } ?>
                    <?php if ($address) { ?>
                    <div class="info disclaimer"><?php echo $a_disclaimer ?></div>
                    <?php } ?>
                  </div>
                  <?php if ($gmap) { ?>
                    <div class="gmap"><a href="<?php echo $gmap ?>" target="_blank">GET DIRECTIONS</a></div>
                  <?php } ?>
                </div>
              </div>
              <img src="<?php echo $square ?>" alt="" aria-hidden="true" class="placeholder" />
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </section>

</div><!-- #primary -->
<?php
get_footer();
