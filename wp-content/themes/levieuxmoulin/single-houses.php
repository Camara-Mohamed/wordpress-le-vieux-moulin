<?php
/**
 * Template Name: Single Maison
 */
?>

<?php get_header() ?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
        <?php get_template_part('templates/partials/hero-section') ?>

        <?php if (have_rows('features_section')): ?>
            <section class="features">
                <h2 class="features__title"><?= get_field('features_section_title'); ?></h2>
                <div class="features__grid">
                    <?php while(have_rows('features_section_items')): the_row(); ?>
                        <div class="feature__item">
                            <h3><?= get_sub_field('title'); ?></h3>
                            <p><?= get_sub_field('description'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (have_rows('team_section')): ?>
            <section class="team">
                <h2 class="team__title"><?= get_field('team_section_title'); ?></h2>
                <?php while(have_rows('team_section_subsections')): the_row(); ?>
                    <div class="team__container">
                        <h3><?= get_sub_field('title'); ?></h3>
                        <div class="teammates">
                            <?php while(have_rows('members')): the_row(); ?>
                                <div class="teammates__content">
                                    <h4><?= get_sub_field('name'); ?></h4>
                                    <p class="position"><?= get_sub_field('position'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php if($phrase = get_sub_field('phrase')): ?>
                            <p class="team__note"><?= $phrase; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <?php get_template_part('templates/partials/card-houses') ?>
    </main>

<?php get_footer() ?>