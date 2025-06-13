<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Meta de base -->
    <meta name="author" content="Le vieux moulin - Camara Mohamed">
    <meta name="keywords"
          content="<?= __('Mohamed Camara, le vieux moulin, accueil, foyer, jeunes, mineurs, dons, actualités, aide à la jeunesse, jeune en difficulté',
              'levm') ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Title -->
    <title>
        <?php
        if (is_front_page()) {
            echo _e('Accueil', 'le-vm').' -  '.get_bloginfo('name');
        } else {
            echo wp_title('', false).' - '.get_bloginfo('name');
        }
        ?>
    </title>

    <!-- Open Graph -->
    <meta property="og:title" content="<?php
    if (is_front_page()) {
        echo _e('Accueil', 'levm').' - '.get_bloginfo('name');
    } else {
        echo wp_title('', false).' - '.get_bloginfo('name');
    }
    ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= home_url(); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:image"
          content="<?= get_template_directory_uri().'/resources/svg/logo-simple.svg'; ?>">

    <?php wp_head(); ?>
    <!-- FancyBox : Pour que chaque image soit cliquable et qu'on puisse la voir en grand -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.css"/>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js" defer></script>

    <!-- JavaScript -->
    <script src="/wp-content/themes/levieuxmoulin/resources/js/main.js" defer type="module"></script>

</head>
<body>
<h1 class="sro" role="heading" aria-level="1"><?= get_the_title(); ?></h1>

<noscript>
    <p class="no-js__message">
        <?php _e('Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.',
            'levm') ?> <br>
        <?php _e('Voici les', 'levm') ?> <a href="https://www.enable-javascript.com/"
                                            title="<?= __
                                            ('vers le site enable-javascript',
                                                'levm') ?>"><?php _e('instructions pour activer JavaScript dans votre navigateur Web') ?></a>.
    </p>
</noscript>

<a class="skip__link" href="#main-content"><?php _e('Aller au contenu principal', 'levm') ?></a>

<header class="header">
    
    <!-- Pre-navigation -->
    <div class="header__pre--nav">
        <h2 class="sro" aria-level="2"><?php _e('Navigation secondaire',
                'levm'); ?></h2>

        <div class="header__container">
            <div class="header__contact">
                <p><?= get_field('contact_email', 'option'); ?></p>
                <p><?= get_field('contact_phone', 'option'); ?></p>
            </div>

            <div class="header__social">
            <?php if (have_rows('social_links', 'option')): ?>
                <?php while (have_rows('social_links', 'option')): the_row(); ?>
                    <a href="<?php the_sub_field('url'); ?>" target="_blank">
                        <?php
                        $icon = get_sub_field('icon');
                        echo wp_get_attachment_image($icon, 'full');
                        ?>
                    </a>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>

        <div class="header__languages">
            <?php
            if (function_exists('pll_the_languages')) {
                $languages = pll_the_languages(array('raw' => 1, 'echo' => 0));
                if ($languages) {
                    foreach ((array) $languages as $lang) {
                        echo '<a href="'.$lang['url'].'" class="'.(!empty($lang['current']) ? 'active' : '').'">'.strtoupper($lang['slug']).'</a>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- Navigation principale -->
    <nav class="header__nav">
        <h2 class="sro" aria-level="2"><?php _e('Navigation principale',
                'levm'); ?></h2>

        <a class="header__nav--title" href="<?= home_url('/'); ?>" itemprop="url"
           title="<?php _e('Aller à la page d\'accueil', 'levm');
           ?>"><?= get_bloginfo('name') ?>
        </a>

        <input type="checkbox" id="burger-menu" class="sro burger-checkbox" aria-label="Menu principal"/>
        <label for="burger-menu" class="header__nav--burger">
            <svg class="burger-icon" viewBox="0 0 448 512" width="35" height="35">
                <path fill="currentColor" d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/>
            </svg>
            <svg class="close-icon" viewBox="0 0 384 512" width="35" height="35">
                <path fill="currentColor" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
            </svg>
        </label>

        <ul class="header__nav--container">
            <?php foreach (levm_get_navigation_links('header') as $link): ?>
                <li class="nav__item<?= $link->current ? ' nav__item--current' : '' ?>">
                    <a href="<?= $link->href ?>" class="nav__item--link">
                        <?= $link->label ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
