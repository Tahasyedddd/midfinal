<?php
/**
 * Template Name: Home Page Template
 */
?>

<?php get_header(); ?>


<main id="content">
    

    <div id="content" class="page-container">

        <?php do_action( 'everafter_wedding_before_banner-sectionone' ); ?>

        <?php get_template_part( 'template-parts/home-sections/banner-sectionone' ); ?>

        <?php do_action( 'everafter_wedding_before_section1' ); ?>

        <?php get_template_part( 'template-parts/home-sections/about' ); ?>

        <?php do_action( 'everafter_wedding_after_section_about' ); ?>

        <?php get_template_part( 'template-parts/home-sections/wedding-details' ); ?>

        <?php do_action( 'everafter_wedding_before_section1' ); ?>

        <?php get_template_part( 'template-parts/home-sections/section1' ); ?>

    </div>

</main>

<?php get_footer(); ?>
