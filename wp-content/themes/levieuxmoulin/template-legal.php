<?php
/**
 * Template Name: Mentions Légales
 */
get_header();
?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
        <?php get_template_part('templates/partials/hero-section'); ?>

        <section class="legals">
            <div class="legals__container">
                <?php if (have_rows('sections_mentions')) : ?>
                    <div class="legals__content">
                        <?php while (have_rows('sections_mentions')) : the_row(); ?>
                            <article class="legals__section">
                                <h3 class="legals__title"><?php the_sub_field('title_legals'); ?></h3>
                                <div class="legals__content">
                                    <?php the_sub_field('content_legals'); ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>