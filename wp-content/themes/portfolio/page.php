<?php get_header(); ?>

    <div id="page-page"
         class="grid-default px-default flex-grow py-10 pt-18 rl:py-16 rl:pt-24 lg:py-24 lg:pt-32">
        <div class="col-span-full rg:col-start-2 rg:col-span-6 rl:col-start-3 rl:col-span-8 lg:col-start-4 lg:col-span-6 2xl:col-start-5 2xl:col-span-4 flex flex-col gap-8">
            <?= get_template_part('template-parts/title-with-bubbles') ?>
            <div class="text-content">
                <?php if ($content = get_the_content()) : ?>
                    <?= wpautop($content) ?>
                <?php else : ?>
                    <p class="text-lg lg:text-xl"><?= __('Contenu à venir', THEME_TEXT_DOMAIN); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>