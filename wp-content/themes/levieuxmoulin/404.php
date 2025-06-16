<?php get_header() ?>

    <main id="main-content" class="main__content" itemscope itemtype="https://schema.org/WebPage">
        <section class="hero">
            <div class="hero__content">
                <h2 id="error-title" class="error-404__title">Erreur 404</h2>

                <p class="error-404__text">
                    La page que vous recherchez n'a pas pu être trouvée. Elle a peut-être été déplacée ou supprimée.
                </p>

                <div class="error-404__actions">
                    <a href="<?= home_url('/'); ?>" class="error-404__action button button__primary"
                       aria-label="Revenir à la page d'accueil"
                       title="Revenir à l'accueil">
                        Retour à l'accueil
                    </a>
                    <a href="<?= home_url('/actualites'); ?>"
                       class="error-404__button button button__secondary"
                       aria-label="Voir nos actualités"
                       title="Voir toutes les actualités">
                        Voir nos actualités
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php get_footer() ?>