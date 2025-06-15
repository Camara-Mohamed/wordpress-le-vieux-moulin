<article class="news__card">
    <a href="<?php the_permalink(); ?>" class="news__card--link" title="Voir l'actualité : <?php the_title(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <div class="news__card--image">
                <?php the_post_thumbnail('medium'); ?>
            </div>
        <?php endif; ?>
        <div class="news__card--content">
            <h3 class="news__card--title"><?php the_title(); ?></h3>
            <time class="news__card--date"><?php echo get_the_date(); ?></time>
            <p class="news__card--excerpt"><?php the_excerpt(); ?></p>
        </div>
    </a>
</article>