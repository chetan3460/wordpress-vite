<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>


<div id="smooth-wrapper">
    <div id="smooth-content">
        <!-- main content will come here -->
        <?php get_template_part('template-files/home-banner-section'); ?>
        <?php get_template_part('template-files/about-us-section'); ?>
        <?php get_template_part('template-files/upgrade-section'); ?>
        <?php get_template_part('template-files/journey-section'); ?>
        <?php get_template_part('template-files/partner-section'); ?>
        <?php get_template_part('template-files/contact-form-section'); ?>


        <?php get_footer(); ?>

    </div>
</div>