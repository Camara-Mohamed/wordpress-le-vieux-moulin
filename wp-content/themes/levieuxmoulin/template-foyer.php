<?php
/**
 * Template Name: Foyer
 */
?>

<?php get_header() ?>

    <main id="main-content" class="main__content">
        <?php get_template_part('templates/partials/hero-section') ?>

        <?php get_template_part('templates/partials/card-houses') ?>

        <?php if (have_rows('foyer_section')) : ?>
            <?php while (have_rows('foyer_section')) : the_row(); ?>
                <section class="foyer">
                    <h2 class="foyer__title"><?= get_sub_field('title'); ?></h2>

                    <div class="foyer__container">
                        <nav class="foyer__nav">
                            <ul class="foyer__list">
                                <?php while (have_rows('subjects')) : the_row(); ?>
                                    <li class="foyer__list--item">
                                        <a class="foyer__link">
                                            <?= get_sub_field('title'); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </nav>

                        <div class="foyer__content">
                            <?php while (have_rows('subjects')) : the_row(); ?>
                                <article class="foyer__details">
                                    <h3><?= get_sub_field('title'); ?></h3>
                                    <div class="foyer__content">
                                        <?= get_sub_field('content'); ?>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php if (have_rows('activities_section')) : ?>
            <?php while (have_rows('activities_section')) : the_row(); ?>
                <section class="activities">
                    <h2 class="activities__title"><?= get_sub_field('title'); ?></h2>

                    <div class="activities__grid">
                        <?php while (have_rows('items')) : the_row(); ?>
                            <div class="activity__card">
                                <?php $image = get_sub_field('image'); ?>
                                <?php if ($image) : ?>
                                    <div class="activity__image">
                                        <?= wp_get_attachment_image($image, 'medium'); ?>
                                    </div>
                                <?php endif; ?>

                                <h3 class="activity__title"><?= get_sub_field('title'); ?></h3>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer() ?>