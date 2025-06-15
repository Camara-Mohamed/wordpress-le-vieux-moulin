<?php
/**
 * Template Name: Nos actualités
 */
?>

<?php get_header() ?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
        <?php get_template_part('templates/partials/hero-section') ?>

        <section class="news featured" itemscope itemtype="https://schema.org/ItemList">
            <h2 class="news__title" itemprop="name">À la une</h2>
            <div class="news__grid featured-news">
                <?php
                $featured_news = new WP_Query([
                    'post_type' => 'news',
                    'posts_per_page' => 4,
                    'meta_key' => 'featured',
                    'meta_value' => '1'
                ]);

                while ($featured_news->have_posts()) : $featured_news->the_post();
                    get_template_part('templates/partials/card-news');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </section>

        <section class="news all__news" itemscope itemtype="https://schema.org/ItemList">
            <h2 class="news__title" itemprop="name">Toutes les actualités</h2>
            <div class="news__grid all__news">
                <?php
                $all_news = new WP_Query([
                    'post_type' => 'news',
                    'posts_per_page' => -1
                ]);

                while ($all_news->have_posts()) : $all_news->the_post();
                    get_template_part('templates/partials/card-news');
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </section>
    </main>

<?php get_footer() ?>