<?php
    $journey_title = get_field('journey_title');
    $journey_description = get_field('journey_description');

    ?>
<!-- Journey -->

<section class="journey--section">
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-10 col-11 mx-auto journey--title d-flex flex-column gap-4">
                <h2 class="title-anim">
                    <?php echo $journey_title ?>
                    dfd
                </h2>
                <div>
                    <?php echo $journey_description ?>
                </div>
                <?php if( have_rows('journey_items') ): ?>
                <div class="journey--item-block">
                    <?php
                                        while(have_rows('journey_items') ): the_row();
                                        $journey_item_img = get_sub_field('journey_item_img');
                                        $journey_item_title = get_sub_field('journey_item_title');
                                        ?>
                    <div class="journey--item d-flex align-items-start gap-3 flex-nowrap">
                        <img src="<?php echo $journey_item_img ?>" alt="about">

                        <p><?php echo $journey_item_title ?>
                        </p>
                    </div>
                    <?php endwhile; ?>


                </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
    <div class="journey--bg-img">
        <img src="<?php bloginfo('template_directory'); ?>/images/breakaway-journey.png" alt="">
    </div>
</section>