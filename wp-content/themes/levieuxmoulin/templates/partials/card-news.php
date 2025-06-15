<article class="news__card" itemscope itemtype="https://schema.org/NewsArticle">
    <a href="<?php the_permalink(); ?>" itemprop="url" class="news__card--link" title="Voir l'actualité : <?php the_title(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <div class="news__card--image" itemprop="image">
                <?php the_post_thumbnail('medium'); ?>
            </div>
        <?php endif; ?>
        <div class="news__card--content">
            <h3 class="news__card--title" itemprop="headline"><?php the_title(); ?></h3>
            <time class="news__card--date" datetime="<?php echo get_the_date('Y-m-d '); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
            <p class="news__card--excerpt" itemprop="description"><?php the_excerpt(); ?></p>
        </div>
    </a>
</article>