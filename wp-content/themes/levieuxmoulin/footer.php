<footer class="footer">
    <h2 class="sro" aria-level="2"><?php _e('Navigation de pied de page', 'levm'); ?></h2>

    <div class="footer__container">
        <section class="footer__section">
            <h3 class="footer__title"><?php __('Le vieux moulin', 'levm'); ?></h3>
            <div class="footer__contact">
                <p>
                    <a href="mailto:<?= get_field('contact_email', 'option'); ?>"
                       title="<?php _e('Envoyer un email', 'levm'); ?>">
                        <?= get_field('contact_email', 'option'); ?>
                    </a>
                    <a href="tel:<?= get_field('contact_phone', 'option'); ?>"
                       title="<?php _e('Appeler le numéro', 'levm'); ?>">
                        <?= get_field('contact_phone', 'option'); ?>
                    </a>
                </p>
            </div>
        </section>

        <nav class="footer__section">
            <h3 class="footer__title sro"><?php _e('Navigation de bas de page', 'levm'); ?></h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'depth' => 1,
                'fallback_cb' => false
            ]);
            ?>
        </nav>

        <aside class="footer__section">
            <h3 class="footer__title sro"><?php _e('Partenaires', 'levm'); ?></h3>
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
        <h3 class="sro"><?php _e('Mentions légales', 'levm'); ?></h3>
        <p><?php echo __('Copyright © Le Vieux Moulin. Tous droits réservés.', 'levm'); ?></p>
        <a href="<?php home_url(__('/mentions-legales', 'levm')); ?>"
           title="<?php _e('Voir les mentions légales', 'levm'); ?>">
            <?php _e(' Mentions légales', 'levm'); ?>
        </a>
    </article>
</footer>

<?php wp_footer(); ?>
</body>
</html>