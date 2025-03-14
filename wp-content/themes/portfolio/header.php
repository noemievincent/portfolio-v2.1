<?php

$default_theme_color = get_field('core_default_theme_color', 'options') ?? 'pink';

$github = get_field('core_socials_github', 'options');
$linkedin = get_field('core_socials_linkedin', 'options');

$logos = get_field('core_logos', 'options');

?>

<!DOCTYPE html>
<html <?= language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class('flex flex-col min-h-screen') ?> data-theme="<?= $_GET['theme'] ?? $default_theme_color; ?>">
<?php

wp_body_open();
include get_theme_file_path() . '/inc/svg.php';

?>

<?php get_template_part('template-parts/skiplinks'); ?>

<header id="header"
        class="flex-0 w-full z-40 text-lg rl:text-xl font-mono border-b-2 border-b-theme-dark top-0 <?= is_front_page() ? 'fixed' : 'sticky' ?>">
    <div id="sub-header"
         class="px-default grid-default bg-theme-dark text-black py-2 rg:py-3 ease-all relative z-30">
        <div class="col-span-full lg:col-start-2 lg:col-span-10 2xl:col-start-3 2xl:col-span-8 flex justify-between">
            <ul class="flex items-center gap-2.5 lg:gap-3.5">
                <?php if ($github) : ?>
                    <li>
                        <a href="<?= $github ?>" target="_blank"
                           class="flex items-center justify-center hover:text-white focus:text-white"
                           title="<?= __('Visiter mon profil GitHub', THEME_TEXT_DOMAIN); ?>">
                            <svg class="shrink-0 w-5.5 h-5.5 fill-current">
                                <use xlink:href="#github"></use>
                            </svg>
                            <span class="sr-only"><?= __('Visiter mon profil GitHub', THEME_TEXT_DOMAIN); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($linkedin) : ?>
                    <li>
                        <a href="<?= $linkedin ?>" target="_blank"
                           class="flex items-center justify-center hover:text-white focus:text-white"
                           title="<?= __('Visiter ma page Linkedin', THEME_TEXT_DOMAIN); ?>">
                            <svg class="shrink-0 w-5 h-5 fill-current">
                                <use xlink:href="#linkedin"></use>
                            </svg>
                            <span class="sr-only"><?= __('Visiter ma page Linkedin', THEME_TEXT_DOMAIN); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php custom_language_switcher() ?>
        </div>
    </div>
    <div id="main-header" class="px-default grid-default bg-white/90 relative py-3 rl:py-5 lg:py-8 ease-all">
        <input id="toggle-menu" tabindex="-1" class="toggle-menu rg:hidden absolute opacity-0 sr-only" type="checkbox">
        <div class="burger-container col-span-full rg:col-start-1 rg:col-span-1 lg:col-start-2 lg:col-span-1 2xl:col-start-3 flex items-center justify-between relative z-30">
            <a href="<?= home_url() ?>" class="w-fit h-fit inline-flex group">
                <?php if (!empty($logos) && array_key_exists('logo', $logos)) : ?>
                    <img class="style-svg w-12 md:w-16 lg:w-18 aspect-square ease-all group-hover:fill-theme-dark group-focus:fill-theme-dark"
                         src="<?= $logos['logo'] ?>" alt="">
                <?php endif; ?>
                <span class="sr-only"><?= __('Retourner à l\'accueil', THEME_TEXT_DOMAIN); ?></span>
            </a>
            <label for="toggle-menu" id="burger-menu" class="burger-menu rg:hidden w-8 h-5 cursor-pointer" tabindex="0">
                    <span class="lines">
                        <span aria-hidden="true"
                              class="line-1 bg-black origin-top-right"></span>
                        <span aria-hidden="true" class="line-2 bg-black"></span>
                        <span aria-hidden="true"
                              class="line-3 bg-black origin-bottom-right"></span>
                    </span>
                <span class="sr-only"><?= __('Ouvrir/fermer le menu', THEME_TEXT_DOMAIN) ?></span>
            </label>
        </div>
        <div class="header-mobile rg:col-end-9 rg:col-span-6 rl:col-end-13 rl:col-span-9 lg:col-end-12 lg:col-span-8 2xl:col-end-11 2xl:col-span-6 max-rg:bg-white">
            <div class="flex max-rg:flex-col items-center justify-center rg:justify-between h-full gap-16">
                <div role="navigation"
                     class="gap-16 max-rg:after:h-0.5 max-rg:after:w-20 max-rg:after:bg-black flex flex-col items-center">
                    <?php wp_nav_menu([
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_id' => 'menu',
                        'menu_class' => 'header-menu',
                    ]); ?>
                </div>
                <?= get_template_part('template-parts/custom-theme-switcher') ?>
            </div>
        </div>
    </div>
</header>

<main id="content" class="flex flex-col flex-grow">
