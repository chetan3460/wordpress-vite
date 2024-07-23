<?php
    $partner_title = get_field('partner_title');
    $partner_description = get_field('partner_description');
    $partner_subtitle = get_field('partner_subtitle');

    ?>
<!-- Partner -->

<section class="partner--section">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-9 col-11 mx-auto text-center">
                <div class="partner--content">
                    <h2 class="title-anim">
                        <?php echo $partner_title ?>

                    </h2>
                    <p class="fw-bold mb-2">
                        <?php echo $partner_subtitle ?>
                    </p>
                    <div>
                        <?php echo $partner_description ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>