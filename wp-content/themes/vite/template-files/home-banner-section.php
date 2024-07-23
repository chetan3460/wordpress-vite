<section class="banner-area">
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Swiper -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <?php if( have_rows('banner_slider') ): ?>
            <div class="swiper-wrapper">
                <?php
                    while(have_rows('banner_slider') ): the_row();
                    $banner_image = get_sub_field('banner_image');
                    $banner_title = get_sub_field('banner_title');
                    $banner_subtitle = get_sub_field('banner_subtitle');
                    $button_link = get_sub_field('button_link');
                    ?>


                <!-- Slides -->
                <div class="swiper-slide">
                    <div class="slider-img">
                        <img src="<?php echo $banner_image ?>" alt="">
                    </div>
                    <div class="banner-caption">

                        <h1 class="text-white position-relative animation__char_come">
                            <?php echo $banner_title; ?>
                        </h1>

                        <div class="banner-text bdFadeUp">
                            <p class="text-white">
                                <?php echo $banner_subtitle ?>
                            </p>
                            <?php if( $button_link ):
                        $link_url = $button_link['url'];
                        $link_title = $button_link['title'];
                        $link_target = $button_link['target'] ? $button_link['target'] : '_self';
                    ?>
                            <div>
                                <a class="main-btn" href="<?php echo esc_url( $link_url ); ?>"
                                    target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                    <i class="arrow"></i>

                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
            <?php endif; ?>

        </div>

    </div>

</section>