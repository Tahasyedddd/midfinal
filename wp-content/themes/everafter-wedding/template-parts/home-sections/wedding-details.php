<?php
/**
 * Home Section features Template
 *
 * @package Everafter Wedding
 */

// All section-specific code goes here...


$section_one = get_theme_mod( 'everafter_wedding_features_enable' );
if ( 'Disable' == $section_one ) {
  return;
} ?>

<section id="amenites" class="amenities-posts">
  <div class="container-fluid">
    <div class="section-heading-main">
      <?php if(get_theme_mod('everafter_wedding_features_title',true) != ''){?>
    <h3><?php echo esc_html(get_theme_mod('everafter_wedding_features_title')); ?></h3>
    <?php }?>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row box-content">
          <div class="col-lg-6 col-12">
            <div class="feature-content-box">
             <h3><?php echo esc_html(get_theme_mod('everafter_wedding_feature1_title')); ?></h3>
              <p><?php echo esc_html(get_theme_mod('everafter_wedding_feature1_text')); ?></p>
            </div>
          </div>
          <div class="col-lg-6 col-12">
              <?php if(get_theme_mod('everafter_wedding_featureimage1_section')!=''){ ?>
              <img src="<?php echo esc_url(get_theme_mod('everafter_wedding_featureimage1_section')); ?>">
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="row box-content">
          <div class="col-lg-6 col-12">
              <?php if(get_theme_mod('everafter_wedding_featureimage2_section')!=''){ ?>
              <img src="<?php echo esc_url(get_theme_mod('everafter_wedding_featureimage2_section')); ?>">
            <?php } ?>
          </div>
          <div class="col-lg-6 col-12">
            <div class="feature-content-box">
             <h3><?php echo esc_html(get_theme_mod('everafter_wedding_feature2_title')); ?></h3>
              <p><?php echo esc_html(get_theme_mod('everafter_wedding_feature2_text')); ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="row box-content">
          <div class="col-lg-6 col-12">
            <div class="feature-content-box">
             <h3><?php echo esc_html(get_theme_mod('everafter_wedding_feature3_title')); ?></h3>
              <p><?php echo esc_html(get_theme_mod('everafter_wedding_feature3_text')); ?></p>
            </div>
          </div>
          <div class="col-lg-6 col-12">
              <?php if(get_theme_mod('everafter_wedding_featureimage3_section')!=''){ ?>
              <img src="<?php echo esc_url(get_theme_mod('everafter_wedding_featureimage3_section')); ?>">
            <?php } ?>
          </div>
        </div>
      </div>

       
      </div>
    </div>
</div>
</section>






