<?php
/**
 * Template Name: Search Page
 * @package polvolab
 */

get_header();
?>

<main>
    <div class="container mt-5 azul-padrao">
        <div class="row">
            <div class="col-sm">
                <?php
                global $query_string;
                wp_parse_str($query_string, $search_query);
                $search = new WP_Query($search_query);
                ?>

                <?php if ($search->have_posts()) : ?>
                    <?php while ($search->have_posts()) : $search->the_post(); ?>
                        <article class="search-p">
                            <a href="<?php the_permalink(); ?>">
                                <h2 class="mb-5"><?php the_title(); ?></h2>
                                <!-- <?php
                                // Check if the post has a featured image
                                if (has_post_thumbnail()) {
                                    echo '<div class="featured-image">';
                                    the_post_thumbnail('large');
                                    echo '</div>';
                                }
                                ?> -->
                            </a>
                            <p><?php the_excerpt(); ?></p>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <h3>Não encontramos resultados.</h3>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
