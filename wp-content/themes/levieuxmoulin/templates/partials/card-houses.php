<?php if (have_rows('houses_section_cards')) : ?>
    <section class="houses">
        <h2 class="title"><?= get_field('houses_section_title'); ?></h2>
        <div class="houses__grid">
            <?php while (have_rows('houses_section_cards')) : the_row();
                $page_id = get_sub_field('page');
                if ($page_id) :

                    $link = get_permalink($page_id);
                    ?>
                    <article class="house__card">
                        <a href="<?= $link; ?>" class="house__card--link"
                           title="Voir la maison <?= get_sub_field('custom_description'); ?>">
                            <?php if ($image = get_sub_field('custom_image') ?: get_post_thumbnail_id($page_id)) : ?>
                                <div class="house__card--image">
                                    <?= wp_get_attachment_image($image, 'medium'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="card--content">
                                <?php if ($title = get_sub_field('custom_title')) : ?>
                                    <h3 class="title"><?= $title; ?></h3>
                                <?php endif; ?>

                                <?php if ($description = get_sub_field('custom_description') ?: get_the_excerpt($page_id)) : ?>
                                    <div class="description">
                                        <?= $description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>