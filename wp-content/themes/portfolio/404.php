<?php get_header() ?>

    <div id="404-page"
         class="grid-default px-default flex-grow py-16 lg:py-24 lg:pt-32 max-md:grid-rows-[auto_1fr] gap-y-2 rg:gap-y-6">
        <div class="col-span-full md:col-start-1 md:col-span-4 rl:col-start-2 rl:col-span-5 xl:col-start-3 xl:col-span-4 2xl:col-start-4 2xl:col-span-3 md:pr-10 rl:pr-14 text-xl text-theme-dark">
            <h1 class="md:sr-only"><?= __('Erreur 404', THEME_TEXT_DOMAIN) ?></h1>
            <svg class="fill-theme w-full h-full max-md:hidden">
                <use xlink:href="#bubbles-error-404"></use>
            </svg>
        </div>
        <div class="col-span-full md:col-end-9 md:col-span-4 rl:col-end-12 rl:col-span-5 xl:col-end-11 xl:col-span-4 2xl:col-end-10 2xl:col-span-3 self-center flex flex-col gap-10 rl:gap-14 max-md:h-full max-md:flex-grow justify-between">
            <div class="flex flex-col gap-3 text-2xl rl:text-2.5xl lg:text-3xl font-light">
                <p class="font-mono font-normal text-5xl rl:text-6xl lg:text-7xl"><?= __('Oups !', THEME_TEXT_DOMAIN); ?></p>
                <p><?= __('Cette page n\'a pas pu être trouvée.', THEME_TEXT_DOMAIN); ?></p>
            </div>
            <a href="<?= home_url(); ?>" class="btn-primary max-md:mx-auto">
                <span class="top">
                    <?= __('Retourner à l\'accueil', THEME_TEXT_DOMAIN); ?>
                </span>
            </a>
        </div>
    </div>

<?php get_footer() ?>