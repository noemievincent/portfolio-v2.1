<?php
/**
 * Template email de Contact Form 7
 *
 * Variables disponibles :
 * - $submission : instance de WPCF7_Submission
 * - $data : tableau des données envoyées (champ => valeur)
 */

$data = $submission->get_posted_data();

$logos = get_field('core_logos', 'options');

?>

<div class="font-sans text-black bg-white border-2 border-black overflow-hidden m-2 md:m-6 lg:m-8">
    <div class="p-4 md:p-8 lg:p-10 flex flex-col gap-6">

        <div class="flex flex-col gap-3">
            <!-- Logo -->
            <a href="<?= home_url(); ?>" class="flex items-center justify-center w-16 aspect-square --mx-auto">
                <span class="sr-only"><?= __('Noémie Vincent', THEME_TEXT_DOMAIN); ?></span>
                <?php if (!empty($logos) && array_key_exists('logo', $logos)) : ?>
                    <img class="style-svg shrink-0 w-full h-full fill-current"
                         src="<?= $logos['logo'] ?>" alt="">
                <?php endif; ?>
            </a>

            <h1 class="text-xl font-semibold"><?= __('Merci pour votre message !', THEME_TEXT_DOMAIN); ?></h1>
            <p class=""><?= __('Je l’ai bien reçu et je vous répondrai dans les plus brefs délais.', THEME_TEXT_DOMAIN); ?></p>
        </div>

        <div class="flex flex-col gap-2 border-t border-zinc-800 py-4">
            <p><?= __('Voici un résumé de votre envoi :', THEME_TEXT_DOMAIN); ?></p>
            <ul>
                <li>
                    <span class="font-semibold"><?= __('Nom :', THEME_TEXT_DOMAIN); ?></span>
                    <span><?= $data['fullname']; ?></span>
                </li>
                <li>
                    <span class="font-semibold"><?= __('Adresse e-mail :', THEME_TEXT_DOMAIN); ?></span>
                    <span><?= $data['email']; ?></span>
                </li>
                <li>
                    <span class="font-semibold"><?= __('Message :', THEME_TEXT_DOMAIN); ?></span>
                    <br>
                    <span><?= $data['message']; ?></span>
                </li>
            </ul>
        </div>

        <!-- Pied de page -->
        <p class="font-mono text-center text-xs lg:text-sm -mb-2 md:-mb-6 lg:-mb-8">
            <span class="font-sans text-sm lg:text-lg">&copy;</span> <?= date('Y'); ?> <?= __('Noémie Vincent. Tous droits réservés.', THEME_TEXT_DOMAIN) ?>
        </p>
    </div>
</div>
