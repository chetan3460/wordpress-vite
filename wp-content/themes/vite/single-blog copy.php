<?php get_header(); ?>

<?php
    $post_type = get_post_type();

?>

<div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <section class="segment">
        <?php if (has_post_thumbnail()) : ?>

        <div class="image-column">
            <div class="">
                <h1 class="category-heading">Blog</h1>
            </div>
            <div class="image-wrapper">
                <?php  the_post_thumbnail(); ?>
            </div>
        </div>
        <?php endif; ?>


        <article class="content-column <?php echo has_post_thumbnail() ? '' : 'w-100'; ?>">
            <div class="content-area">
                <div class="article-section">
                    <div>

                        <!-- <h1 class="category-heading">Blog</h1> -->
                        <?php if ($post_type_name) : ?>
                        <h3 class="category-name"><?php echo esc_html($post_type_name); ?></h3>
                        <?php endif; ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>

                    </div>
                    <div class="title-wrapper">
                        <h2 class="article-title">
                            <?php echo the_title(); ?>
                        </h2>
                        <?php if (has_excerpt()) : ?>
                        <div class="excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <nav class="tags">
                    <?php
                        $post_tags = get_the_tags();
                        if ( $post_tags ) {
                            $first_tag = true;
                            foreach ( $post_tags as $tag ) {
                                if ( ! $first_tag ) {
                                    echo '<span class="tag-marker"></span>';
                                }
                                echo '<span class="tag-item">' . esc_html( $tag->name ) . '</span>';
                                $first_tag = false;
                            }
                        }
                        ?>
                </nav>

            </div>

        </article>
    </section>
    <section class="main-content">
        <div class="content-wrapper">
            <div class="article-content">
                <?php echo the_content(); ?>
            </div>
    </section>
    <section class="quote-area">
        <div class="content-wrapper d-flex align-items-center ">

            <img src="<?php bloginfo('template_directory'); ?>/images/blog/quote-icon.svg"
                alt="Scalability Illustration" />

            <?php get_template_part('template-files/common/blog-quote'); ?>

            <img src="<?php bloginfo('template_directory'); ?>/images/blog/quote-hand.svg"
                alt="Scalability Illustration" />
            <?php
            $blog_title = get_the_title();
            $blog_url = get_permalink();
            $blog_image = get_the_post_thumbnail_url();
            ?>
            <div class="social-share d-flex align-items-center">
                <p>Share</p>
                <ul class="social-media-share d-flex align-items-center">
                    <li>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($blog_url) . '&t=' . urlencode($blog_title) ?>"
                            target="_blank">
                            <img src="<?php bloginfo('template_directory'); ?>/images/blog/facebook.svg"
                                alt="Facebook Icon" />
                        </a>
                    </li>

                    <li>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode($blog_url) . '&title=' . urlencode($blog_title) ?>&amp;summary=<?php the_excerpt(); ?>&amp;source=<?php bloginfo('name'); ?>"
                            target="_blank">
                            <img src="<?php bloginfo('template_directory'); ?>/images/blog/linkedin.svg"
                                alt="Linkedin Icon" />
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($blog_url) . '&text=' . urlencode($blog_title) ?>"
                            target="_blank">
                            <img src="<?php bloginfo('template_directory'); ?>/images/blog/twitter.svg"
                                alt="Twitter Icon" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode($blog_url) . '&title=' . urlencode($blog_title) ?>&amp;summary=<?php the_excerpt(); ?>&amp;source=<?php bloginfo('name'); ?>"
                            target="_blank">
                            <img src="<?php bloginfo('template_directory'); ?>/images/blog/youtube.svg"
                                alt="youtube Icon" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode($blog_url) . '&title=' . urlencode($blog_title) ?>&amp;summary=<?php the_excerpt(); ?>&amp;source=<?php bloginfo('name'); ?>"
                            target="_blank">
                            <img src="<?php bloginfo('template_directory'); ?>/images/blog/instagram.svg"
                                alt="instagram Icon" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>


    <?php get_template_part('template-files/common/blog-cta-contact'); ?>
    <?php get_template_part('template-files/common/blog-nextpost'); ?>

    <?php endwhile; endif; ?>

</div>



<?php get_footer(); ?>