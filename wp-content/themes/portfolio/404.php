<?php get_header() ?>

    <div id="404-page"
         class="grid-default px-default flex-grow py-16 lg:py-24 lg:pt-32 max-lg:grid-rows-[auto_1fr] gap-y-6">
        <div class="col-span-full lg:col-start-3 lg:col-span-4 2xl:col-start-4 2xl:col-span-3 lg:pr-14 text-2xl text-theme-dark">
            <h1 class="lg:sr-only"><?= __('Erreur 404', THEME_TEXT_DOMAIN) ?></h1>
            <svg class="fill-theme w-full h-full max-lg:hidden">
                <use xlink:href="#bubbles-error-404"></use>
            </svg>
        </div>
        <div class="col-span-full lg:col-end-11 lg:col-span-4 2xl:col-end-10 2xl:col-span-3 self-center flex flex-col gap-10 lg:gap-14 max-lg:h-full max-lg:flex-grow justify-between">
            <div class="flex flex-col gap-3 text-2xl lg:text-3xl font-light">
                <p class="font-mono font-normal text-5xl lg:text-7xl"><?= __('Oups !', THEME_TEXT_DOMAIN); ?></p>
                <p><?= __('Cette page n\'a pas pu être trouvée.', THEME_TEXT_DOMAIN); ?></p>
            </div>
            <a href="<?= home_url(); ?>" class="btn-primary max-lg:mx-auto">
                <span class="top">
                    <?= __('Retourner à l\'accueil', THEME_TEXT_DOMAIN); ?>
                </span>
            </a>
        </div>
    </div>

<?php get_footer() ?>