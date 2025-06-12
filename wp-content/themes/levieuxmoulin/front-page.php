<?php get_header() ?>

    <main id="main-content" class="main__content">
        <?php get_template_part('templates/partials/hero-section') ?>

        <?php if (have_rows('houses_section')): ?>
            <section class="houses">
                <h2 class="title"><?=  get_field('houses_section_title'); ?></h2>
                <div class="houses__grid">
                    <?php while(have_rows('houses_section_cards')): the_row();
                        $page_id = get_sub_field('page');
                        $card_data = [
                            'title' => get_the_title($page_id),
                            'description' => get_the_excerpt($page_id),
                            'image' => get_post_thumbnail_id($page_id),
                            'link' => get_permalink($page_id)
                        ];
                        get_template_part('templates/partials/card-houses', null, $card_data);
                    endwhile; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (have_rows('history_section')): ?>
            <section class="history">
                <h2 class="history__title"><?=  get_field('history_section_title'); ?></h2>
                <?php while(have_rows('history_section_items')): the_row(); ?>
                    <div class="history__container">
                        <?php if($video = get_sub_field('video')): ?>
                            <div class="history__video">
                                <?= wp_oembed_get($video); ?>
                            </div>
                        <?php endif; ?>
                        <div class="history__content">
                            <?php if(have_rows('content')): the_row(); ?>
                                <h3><?= get_sub_field('title'); ?></h3>
                                <p><?= get_sub_field('text'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php endif; ?>

        <?php if (have_rows('numbers_section')): ?>
            <section class="numbers">
                <h2 class="numbers__title"><?=  get_field('numbers_section_title'); ?></h2>
                <div class="numbers__grid">
                    <?php while(have_rows('numbers_section_cards')): the_row(); ?>
                        <div class="number__card">
                            <?php if($image = get_sub_field('image')): ?>
                                <?= wp_get_attachment_image($image, 'small'); ?>
                            <?php endif; ?>
                            <h3><?= get_sub_field('title'); ?></h3>
                            <p><?= get_sub_field('text'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (have_rows('cta_section')): ?>
            <section class="cta">
                <?php if($image = get_sub_field('image')): ?>
                    <?= wp_get_attachment_image($image, 'full'); ?>
                <?php endif; ?>
                <div class="cta__content">
                    <h2><?= get_sub_field('title'); ?></h2>
                    <?php if(have_rows('content')): the_row(); ?>
                        <div class="cta__text">
                            <h3><?= get_sub_field('title'); ?></h3>
                            <p><?= get_sub_field('text'); ?></p>
                        </div>
                        <div class="cta__buttons">
                            <?php while(have_rows('buttons')): the_row(); ?>
                                <a href="<?= get_sub_field('url'); ?>" class="button">
                                    <?= get_sub_field('text'); ?>
                                </a>
                            <?php endwhile; ?>
                        </div>
                        <?php if($link = get_sub_field('link')): ?>
                            <a href="<?= $link['url']; ?>" class="cta__link">
                                <?= $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (have_rows('faq_section')): ?>
            <section class="faq">
                <h2 class="faq__title"><?= get_field('faq_section_title'); ?></h2>
                <div class="faq__container">
                    <?php while(have_rows('faq_section_items')): the_row(); ?>
                        <details class="faq__item">
                            <summary><?= get_sub_field('question'); ?></summary>
                            <div class="faq__answer">
                                <?= get_sub_field('answer'); ?>
                            </div>
                        </details>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>

<?php get_footer() ?>