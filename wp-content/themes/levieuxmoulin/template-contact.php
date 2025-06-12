<?php
/**
 * Template Name: Nous Contacter
 */
?>

<?php get_header() ?>

    <main id="main-content" class="main__content">
        <?php get_template_part('templates/partials/hero-section') ?>

        <div class="contact">
            <?php if (have_rows('informations')) : ?>
                <div class="contact__container">
                    <?php while (have_rows('informations')) : the_row(); ?>
                        <article class="contact__article">
                            <h3><?php the_sub_field('title'); ?></h3>
                            <div class="article__content">
                                <?php the_sub_field('content'); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div class="contact__form">
                <h3 class="contact__form--title"><?php _e('Vous avez une question, un projet ou souhaitez nous soutenir ?', 'levm'); ?></h3>
                <p class="contact__form--note"><abbr title="<?php _e('Champs Obligatoire', 'levm'); ?>">*</abbr> <?php _e('(Champs obligatoires)', 'levm'); ?></p>

                <?php if (isset($_SESSION['contact_form_success'])) : ?>
                    <div class="contact__form--feedback contact__form-success">
                        <?= $_SESSION['contact_form_success']; ?>
                    </div>
                    <?php unset($_SESSION['contact_form_success']); ?>
                <?php else : ?>

                    <form method="POST" action="<?= admin_url('admin-post.php'); ?>" class="form">
                        <input type="hidden" name="action" value="submit_contact_form">

                        <fieldset>
                            <div class="contact__form--field">
                                <label for="fullname" class="contact__form--label">
                                    <?php _e('Nom complet ou société', 'levm'); ?>
                                    <abbr title="<?php _e('Champs Obligatoire', 'levm'); ?>">*</abbr>
                                </label>
                                <input type="text" id="fullname" name="fullname" required
                                       class="contact__form--input"
                                       value="<?= $_SESSION['contact_form_old']['fullname'] ?? ''; ?>"
                                       placeholder="<?= __('Votre nom ou société', 'levm') ?>">
                                <?php if (isset($_SESSION['contact_form_errors']['fullname'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['fullname']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="contact__form--field">
                                <label for="email" class="contact__form--label">
                                    <?php _e('Email', 'levm'); ?>
                                    <abbr title="<?php _e('Champs Obligatoire', 'levm'); ?>">*</abbr>
                                </label>
                                <input type="email" id="email" name="email" required class="contact__form--input"
                                       value="<?= $_SESSION['contact_form_old']['email'] ?? ''; ?>"
                                       placeholder="<?= __('votre@email.com', 'levm') ?>">
                                <?php if (isset($_SESSION['contact_form_errors']['email'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['email']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="contact__form--field">
                                <label for="phone" class="contact__form--label">
                                    <?php _e('Téléphone', 'levm'); ?>
                                </label>
                                <input type="tel" id="phone" name="phone" class="contact__form--input"
                                       value="<?= $_SESSION['contact_form_old']['phone'] ?? ''; ?>"
                                       placeholder="<?= __('+32 123 45 67 89', 'levm') ?>">
                                <?php if (isset($_SESSION['contact_form_errors']['phone'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['phone']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="contact__form--field">
                                <label for="subject" class="contact__form--label">
                                    <?php _e('Sujet', 'levm'); ?>
                                    <abbr title="<?php _e('Champs Obligatoire', 'levm'); ?>">*</abbr>
                                </label>
                                <select id="subject" name="subject" required class="contact__form--select">
                                    <option value=""><?php _e('Sélectionnez un sujet...', 'levm'); ?></option>
                                    <option value="Don" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Don' ? 'selected' : ''; ?>>
                                        <?php _e('Don', 'levm'); ?>
                                    </option>
                                    <option value="Bénévolat" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Bénévolat' ? 'selected' : ''; ?>>
                                        <?php _e('Bénévolat', 'levm'); ?>
                                    </option>
                                    <option value="Partenariat" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Partenariat' ? 'selected' : ''; ?>>
                                        <?php _e('Partenariat', 'levm'); ?>
                                    </option>
                                    <option value="Famille d'accueil" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Famille d\'accueil' ? 'selected' : ''; ?>>
                                        <?php _e('Famille d\'accueil', 'levm'); ?>
                                    </option>
                                    <option value="Autre" <?= isset($_SESSION['contact_form_old']['subject']) && $_SESSION['contact_form_old']['subject'] === 'Autre' ? 'selected' : ''; ?>>
                                        <?php _e('Autre', 'levm'); ?>
                                    </option>
                                </select>
                                <?php if (isset($_SESSION['contact_form_errors']['subject'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['subject']; ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="contact__form--field">
                                <label for="message" class="contact__form--label">
                                    <?php _e('Message', 'levm'); ?>
                                    <abbr title="<?php _e('Champs Obligatoire', 'levm'); ?>">*</abbr>
                                </label>
                                <textarea id="message" name="message" rows="8" required
                                          class="contact__form--textarea"
                                          placeholder="<?= __('Votre message ici...', 'levm') ?>"><?= $_SESSION['contact_form_old']['message'] ?? ''; ?></textarea>
                                <?php if (isset($_SESSION['contact_form_errors']['message'])) : ?>
                                    <span class="contact__form--error"><?= $_SESSION['contact_form_errors']['message']; ?></span>
                                <?php endif; ?>
                            </div>
                        </fieldset>

                        <button type="submit" class="contact__form--submit button">
                            <?php _e('Envoyer', 'levm'); ?>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <?php if (have_rows('partners_section')) : ?>
            <?php while (have_rows('partners_section')) : the_row(); ?>
                <section class="partners">
                    <h2><?php the_sub_field('title'); ?></h2>

                    <div class="partners__grid">
                        <?php while (have_rows('partners_logos')) : the_row(); ?>
                            <div class="partner__logo">
                                <?php if (get_sub_field('url')) : ?>
                                    <a href="<?php the_sub_field('url'); ?>">
                                        <?php echo wp_get_attachment_image(get_sub_field('logo'), 'medium'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer() ?>