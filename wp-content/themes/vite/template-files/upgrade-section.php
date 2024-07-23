<?php
    $upgrade_title = get_field('upgrade_title');
    $upgrade_description = get_field('upgrade_description');
    $upgrade_subtitle = get_field('upgrade_subtitle');

    ?>
<!-- Upgrade -->

<section class="upgrade--section">
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-10 col-11 mx-auto">
                <div class="upgrade--content">
                    <h2 class="text-white title-anim">
                        <?php echo $upgrade_title ?>

                    </h2>
                    <div class="my-4">
                        <?php echo $upgrade_description ?>

                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-3">
                    <p class="fw-bold ">
                        <?php echo $upgrade_subtitle ?>
                    </p>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-buttons">
                        <!-- <div class="swiper-button-prev"></div> -->
                        <div class="swiper-button-next">
                            <img src="<?php bloginfo('template_directory'); ?>/images/arrow-right.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="accelerator_div">

                    <!-- Slider main container -->
                    <div class="swiper-upgrade">
                        <?php if( have_rows('upgrade_slides') ): ?>
                        <!-- Additional required wapper -->

                        <div class="swiper-wrapper">
                            <?php
                            while(have_rows('upgrade_slides') ): the_row();
                            $upgrade_img = get_sub_field('upgrade_img');
                            $upgrade_item_title = get_sub_field('upgrade_item_title');
                            $upgrade_item_text = get_sub_field('upgrade_item_text');
                        ?>
                            <div class="swiper-slide">
                                <div class="upgrade--item d-flex align-items-start gap-3 flex-nowrap">
                                    <div class="upgrade--item-icon">
                                        <img src="<?php echo $upgrade_img ?>" alt="upgrade">

                                    </div>
                                    <div class="item-content">
                                        <h4>
                                            <?php echo $upgrade_item_title ?>

                                        </h4>
                                        <p>
                                            <?php echo $upgrade_item_text ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>


                        </div>

                        <!-- Add pagination -->
                        <div class="swiper-pagination"></div>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>


</section>