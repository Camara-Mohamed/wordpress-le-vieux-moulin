<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dw_handle_contact_form(): void
{
    // Initialiser les données de session
    $_SESSION['contact_form_old'] = $_POST;
    $_SESSION['contact_form_errors'] = [];

    // Validation
    $errors = [];

    if (empty($_POST['fullname'])) {
        $errors['fullname'] = __('Veuillez entrer votre nom complet ou société', 'levm');
    }

    if (empty($_POST['email'])) {
        $errors['email'] = __('Veuillez entrer votre email', 'levm');
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = __('Adresse email invalide', 'levm');
    }

    if (!empty($_POST['phone']) && !preg_match('/^[\d\s\+\-\(\)]{10,}$/', $_POST['phone'])) {
        $errors['phone'] = __('Numéro de téléphone invalide', 'levm');
    }

    $allowed_subjects = ['Don', 'Bénévolat', 'Partenariat', 'Famille d\'accueil', 'Autre'];
    if (empty($_POST['subject']) || !in_array($_POST['subject'], $allowed_subjects)) {
        $errors['subject'] = __('Veuillez sélectionner un sujet valide', 'levm');
    }

    if (empty($_POST['message'])) {
        $errors['message'] = __('Veuillez entrer votre message', 'levm');
    }

    // Si erreurs, rediriger avec les messages
    if (!empty($errors)) {
        $_SESSION['contact_form_errors'] = $errors;
        wp_safe_redirect(home_url('/contact'));
        exit;
    }

    // Nettoyage des données
    $fullname = sanitize_text_field($_POST['fullname']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Sauvegarde en base
    wp_insert_post([
        'post_type' => 'contact_message',
        'post_title' => $fullname . ' - ' . $subject,
        'post_content' => "Email: $email\nTéléphone: $phone\n\nMessage:\n$message",
        'post_status' => 'publish',
    ]);

    // Envoi d'email
    $to = 'camara.mohmd@gmail.com';
    $email_subject = sprintf(
        __('Nouveau message de contact: %s', 'levm'),
        $subject
    );
    $email_message = sprintf(
        __("Nom: %s\nEmail: %s\nTéléphone: %s\nSujet: %s\n\nMessage:\n%s", 'levm'),
        $fullname,
        $email,
        $phone,
        $subject,
        $message
    );

    wp_mail($to, $email_subject, $email_message);

    // Message de succès
    $_SESSION['contact_form_success'] = __('Merci pour votre message ! Nous vous répondrons dès que possible.', 'levm');
    unset($_SESSION['contact_form_old']);
    unset($_SESSION['contact_form_errors']);

    wp_safe_redirect(home_url('/contact'));
    exit;
}