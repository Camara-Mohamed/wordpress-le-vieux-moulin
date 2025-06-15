<footer class="footer">
    <h2 class="sro" aria-level="2">Navigation de pied de page</h2>

    <div class="footer__container">
        <section class="footer__section">
            <h3 class="footer__title sro">Le vieux moulin</h3>
            <div class="footer__contact">
                <a class="footer__contact--title" href="<?= home_url('/'); ?>" itemprop="url"
                   title="Aller à la page d'accueil"><?= get_bloginfo('name') ?>
                </a>
                <div>
                    <a href="mailto:<?= get_field('contact_email', 'option'); ?>"
                       title="Envoyer un email">
                        <?= get_field('contact_email', 'option'); ?>
                    </a>
                    <a href="tel:<?= get_field('contact_phone', 'option'); ?>"
                       title="Appeler le numéro">
                        <?= get_field('contact_phone', 'option'); ?>
                    </a>
                </div>
            </div>
        </section>

        <nav class="footer__nav">
            <h3 class="footer__title sro">Navigation de bas de page</h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'depth' => 1,
                'fallback_cb' => false
            ]);
            ?>
        </nav>

        <aside class="footer__aside">
            <h3 class="footer__title sro">Partenaires</h3>
            <div class="footer__partners">
                <?php if (have_rows('partners', 'option')): ?>
                    <?php while (have_rows('partners', 'option')): the_row(); ?>
                        <?php
                        $logo = get_sub_field('logo');
                        $url = get_sub_field('url');
                        if ($logo): ?>
                            <a href="<?php echo $url; ?>"
                               target="_blank"
                               title="<?= get_sub_field('name'); ?>">
                                <?php echo wp_get_attachment_image($logo, 'medium', false, [
                                    'alt' => get_sub_field('name')
                                ]); ?>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </aside>
    </div>

    <article class="footer__copyright">
        <h3 class="sro">Mentions légales</h3>
        <p>Copyright © Le Vieux Moulin. Tous droits réservés.</p>
        <a href="<?php echo home_url('mentions-legales'); ?>"
           title="Voir les mentions légales">
            Mentions légales
        </a>
    </article>
</footer>

<?php wp_footer(); ?>
</body>
</html>