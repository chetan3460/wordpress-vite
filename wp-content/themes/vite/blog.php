<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>
<?php get_template_part('template-files/common/banner'); ?>

<?php
    $post_heading = get_field('blog_heading');
    $post_description = get_field('blog_description');
?>

<div class="overlaped-section">
    <div class="overlaped-inner">


        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'blog',
                'posts_per_page' => 6,
                'paged' => $paged
            );
            $query = new WP_Query($args);
     
            $blog_page_id = get_option('page_for_posts'); 
            $blog_page_url = get_permalink($blog_page_id);
        ?>
        <section class="blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="blog-box grid">
                        <div class="blog-listing element-item">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <?php $blog_thumbnail = get_field('blog_thumbnail'); ?>

                            <div class="blog-card element-item">
                                <div class="image">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        } else {
                            echo '<img src="' . esc_url(get_template_directory_uri() . '/images/blog/blog-thumbnails.jpg') . '" alt="screenroot">';
                        }
                        ?>


                                    </a>
                                </div>
                                <h5 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                                </h5>
                                <div class="d-flex flex-column">
                                    <span class="blog-date"><?php echo get_the_date('j M Y'); ?></span>
                                    <span class="blog-read-time"><?php echo reading_time(); ?></span>
                                </div>
                            </div>
                            <?php endwhile; ?>



                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="pagination">
                                    <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
  <path d="M19 6.995C19.5523 6.995 20 7.44271 20 7.995C20 8.54728 19.5523 8.995 19 8.995V6.995ZM0.292892 8.7021C-0.0976315 8.31158 -0.0976315 7.67841 0.292892 7.28789L6.65685 0.923927C7.04738 0.533403 7.68054 0.533403 8.07107 0.923927C8.46159 1.31445 8.46159 1.94762 8.07107 2.33814L2.41421 7.995L8.07107 13.6518C8.46159 14.0424 8.46159 14.6755 8.07107 15.0661C7.68054 15.4566 7.04738 15.4566 6.65685 15.0661L0.292892 8.7021ZM19 8.995L1 8.995V6.995L19 6.995V8.995Z" fill="#040E0D"/>
</svg>',
                'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
  <path d="M1 6.995C0.447715 6.995 0 7.44271 0 7.995C0 8.54728 0.447715 8.995 1 8.995V6.995ZM19.7071 8.7021C20.0976 8.31158 20.0976 7.67841 19.7071 7.28789L13.3431 0.923927C12.9526 0.533403 12.3195 0.533403 11.9289 0.923927C11.5384 1.31445 11.5384 1.94762 11.9289 2.33814L17.5858 7.995L11.9289 13.6518C11.5384 14.0424 11.5384 14.6755 11.9289 15.0661C12.3195 15.4566 12.9526 15.4566 13.3431 15.0661L19.7071 8.7021ZM1 8.995L19 8.995V6.995L1 6.995V8.995Z" fill="#040E0D"/>
</svg>',
                'mid_size' => 1,
            ));
            ?>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>