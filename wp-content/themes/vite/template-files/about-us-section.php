       <!-- About Section -->
       <?php
    $about_title = get_field('about_title');
    $about_short_text = get_field('about_short_text');
    $about_long_description = get_field('about_long_description');
    $about_subtitle = get_field('about_subtitle');

    ?>
       <section class="about-us--section">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-lg-10 col-11 mx-auto">
                       <div class="about-us--wrapper">
                           <div class="row">
                               <div class="col-lg-4">
                                   <div class="about-us--title">
                                       <h2 class="title-anim">

                                           <?php echo $about_title ?>

                                       </h2>
                                       <p>
                                           <?php echo $about_short_text ?>
                                       </p>
                                   </div>
                               </div>
                               <div class="col-lg-8">
                                   <article class="about-us--content expander">
                                       <p>
                                           <?php echo $about_long_description ?>

                                       </p>
                                       <!-- <a href="#" class="read_more"></a> -->
                                   </article>

                               </div>
                           </div>
                           <hr class="my-4">
                           <div class="row">
                               <div class="col-lg-12">
                                   <p class="fw-bold mb-3">
                                       <?php echo $about_subtitle ?>

                                   </p>

                                   <?php if( have_rows('about_items') ): ?>
                                   <div class="about-us--offering d-grid">

                                       <?php
                                        while(have_rows('about_items') ): the_row();
                                        $about_item_img = get_sub_field('about_item_img');
                                        $about_item_title = get_sub_field('about_item_title');
                                        ?>
                                       <div class="about-us--item d-flex  align-items-center gap-3 flex-nowrap">
                                           <div class="icon">
                                               <img src="<?php echo $about_item_img ?>" alt="about">
                                           </div>
                                           <div class="text">
                                               <p>
                                                   <?php echo $about_item_title ?>

                                               </p>
                                           </div>
                                       </div>
                                       <?php endwhile; ?>

                                   </div>
                                   <?php endif; ?>


                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>