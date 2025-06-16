<?php
/**
 * Template Name: Dons
 */
?>

<?php get_header() ?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
        <?php get_template_part('templates/partials/hero-section') ?>

        <?php if (have_rows('donation_sections')) : ?>
            <article class="donations" itemprop="mainContentOfPage">
                <h2 class="sro" itemprop="headline">Les dons</h2>
                <?php while (have_rows('donation_sections')) : the_row(); ?>
                    <section class="donation" itemscope itemtype="https://schema.org/DonateAction">
                        <h3 class="donation__title"><?= get_sub_field('title'); ?></h3>

                        <div class="donation__content">
                            <div class="donation__description" itemprop="description">
                                <p>
                                    <?= get_sub_field('description'); ?>
                                </p>
                            </div>

                            <?php $image = get_sub_field('image'); ?>
                            <?php if ($image) : ?>
                                <div class="donation__image" itemprop="image">
                                    <?= wp_get_attachment_image($image, 'medium'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endwhile; ?>
            </article>
        <?php endif; ?>

        <?php if (have_rows('realisation')) : ?>
            <?php while (have_rows('realisation')) : the_row(); ?>
                <section class="realisation" itemscope itemtype="https://schema.org/ItemList">
                    <h2 class="realisation__title" itemprop="name"><?= get_sub_field('title'); ?></h2>

                    <div class="realisation__grid">
                        <?php while (have_rows('boxes')) : the_row(); ?>
                            <div class="box">
                                <h3 class="box__title" itemprop="name"><?= get_sub_field('title'); ?></h3>
                                <p class="box__description" itemprop="description">
                                    <?= get_sub_field('description'); ?>
                                </p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer() ?>