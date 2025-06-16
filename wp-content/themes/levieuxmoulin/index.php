<?php get_header() ?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
            <?php while (have_posts()) : the_post(); ?>
                    <?= the_content() ?>
            <?php endwhile; ?>
    </main>

<?php get_footer() ?>