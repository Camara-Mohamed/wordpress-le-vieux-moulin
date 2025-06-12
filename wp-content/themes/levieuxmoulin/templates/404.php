<?php get_header() ?>

    <main id="main-content" class="main__content">
        <section class="hero">
            <div class="hero__content">
                <h2 id="error-title" class="error-404__title"><?php _e('Erreur 404', 'levm'); ?></h2>

                <p class="error-404__text">
                    <?php _e('La page que vous recherchez n\'a pas pu être trouvée. Elle a peut-être été déplacée ou supprimée.', 'levm'); ?>
                </p>

                <div class="error-404__actions">
                    <a href="<?= home_url('/'); ?>" class="error-404__action button button__primary"
                       aria-label="<?php _e('Revenir à la page d\'accueil', 'levm'); ?>"
                       title="<?php _e('Revenir à l\'accueil', 'levm'); ?>">
                        <?php _e('Retour à l\'accueil', 'levm'); ?>
                    </a>
                    <a href="<?= home_url(__('/actualités', 'levm')); ?>"
                       class="error-404__button button button__secondary"
                       aria-label="<?php _e('Voir nos actualités', 'levm'); ?>"
                       title="<?php _e('Voir toutes les actualités', 'levm'); ?>">
                        <?php _e('Voir nos actualités', 'levm'); ?>
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php get_footer() ?>