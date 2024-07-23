<?php
    $contact_title = get_field('contact_title');
    $contact_subtitle = get_field('contact_subtitle');

    ?>
<!-- Form -->
<section class="contact--form-section  text-white">
    <div class="container-fluid mx-auto">
        <div class="row">
            <div class="col-lg-10 col-11 mx-auto">
                <div class="row">
                    <div class="col-lg-12 col-sm-12  text-center">

                        <div class="contact--wrapper">
                            <h2 class="text-white title-anim">
                                <?php echo $contact_title ?>

                            </h2>
                            <P class="mb-5">
                                <?php echo $contact_subtitle ?>
                            </P>

                            <form class="php-email-form mt-4">
                                <div class="row">
                                    <div class="col-md-6 form-group"><input type="text" name="name" class="form-control"
                                            id="name" placeholder="Name" required="">
                                    </div>
                                    <div class="col-md-6 form-group mt-3 mt-md-0"><input type="text"
                                            class="form-control" name="organization" id="organization"
                                            placeholder="Organization" required=""></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group mt-4"><input type="email" class="form-control"
                                            name="email_u" id="email" placeholder="Email" required=""></div>
                                    <div class="col-md-6 form-group mt-4"><input type="tel" class="form-control"
                                            name="phone" id="phone" placeholder="Phone" required=""></div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group  mt-4"><input type="text" name="Country"
                                            class="form-control" id="country" placeholder="Country" required="">
                                    </div>
                                </div>
                                <div class="my-3"></div>
                                <div class="text-center">
                                    <button type="submit" class="main-btn">Book a Assessment
                                        <i class="arrow"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>