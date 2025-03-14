<?php

$date = get_field('date');
$content = get_field('content');

$github_url = get_field('github_url');
$live_url = get_field('live_url');
$show_live_url = get_field('show_live_url') && $live_url;

$color_palette = get_field('color_palette');

?>

<div id="single-page"
     class="relative z-3 grid-default px-default flex-grow py-16 pt-18 md:pb-2 lg:py-24 lg:pt-32 lg:pb-6 gap-y-6 lg:gap-y-8 grid-rows-[auto_1fr]">
    <div class="col-span-full xl:col-start-2 xl:col-span-10 2xl:col-start-3 2xl:col-end-9">
        <?= get_template_part('template-parts/title-with-bubbles') ?>
    </div>
    <div class="col-span-full rg:col-start-1 rg:col-span-4 rl:col-start-1 rl:col-span-6 xl:col-start-2 xl:col-span-5 2xl:col-start-3 2xl:col-span-4 flex flex-col gap-8 rg:gap-16 lg:gap-28">
        <div class="flex flex-col gap-2 lg:gap-4">
            <?php if ($date) : ?>
                <p class="flex items-center gap-2 text-lg font-light">
                    <svg class="shrink-0 h-4 w-4 fill-black -mt-0.5">
                        <use xlink:href="#calendar"></use>
                    </svg>
                    <span><?= $date; ?></span>
                </p>
            <?php endif; ?>
            <div class="text-content">
                <?php if ($content) : ?>
                    <?= $content ?>
                <?php else : ?>
                    <p class="text-lg lg:text-xl"><?= __('Contenu à venir', THEME_TEXT_DOMAIN); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="flex items-center max-md:justify-center flex-wrap gap-y-6 gap-8 lg:gap-10">
            <?php if ($show_live_url) : ?>
                <a href="<?= $live_url ?>" target="_blank" class="btn-primary max-md:w-full">
                        <span class="top">
                            <?= __('Voir le site', THEME_TEXT_DOMAIN) ?>
                            <svg class="shrink-0 w-3 h-3 fill-current">
                                <use xlink:href="#external-link"></use>
                            </svg>
                        </span>
                </a>
            <?php endif; ?>
            <?php if ($github_url) : ?>
                <?php if ($show_live_url) : ?>
                    <a href="<?= $github_url; ?>" target="_blank" class="btn-secondary">
                        <svg class="shrink-0 w-5 h-5 fill-current">
                            <use xlink:href="#github"></use>
                        </svg>
                        <?= __('Consulter le repo GitHub', THEME_TEXT_DOMAIN) ?>
                    </a>
                <?php else : ?>
                    <a href="<?= $github_url ?>" target="_blank" class="btn-primary max-md:w-full">
                        <span class="top">
                            <?= __('GitHub', THEME_TEXT_DOMAIN) ?>
                            <svg class="shrink-0 w-5 h-5 fill-current">
                                <use xlink:href="#github"></use>
                            </svg>
                        </span>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-span-full rg:col-end-9 rg:col-span-4 rl:col-end-13 rl:col-span-5 xl:col-end-12 xl:col-span-4 2xl:col-end-11 2xl:col-span-3 max-rg:mt-4 md:max-rg:mt-8 flex flex-col gap-8 rg:items-end justify-between">
        <?php if (!empty($color_palette)) : ?>
            <section aria-labelledby="palette" class="flex flex-col rg:items-end gap-6">
                <h2 id="palette"
                    class="font-mono text-xl lg:text-1.5xl flex flex-col gap-5 rg:items-end after:bg-black after:h-0.5 after:w-[20%] rg:after:w-[40%]"><?= __('Palette de couleurs', THEME_TEXT_DOMAIN); ?></h2>
                <ul class="flex flex-wrap items-center lg:justify-end gap-6 gap-y-3">
                    <?php foreach ($color_palette as $color) :
                        $code = $color['hex_code'];
                        $add_border = $color['add_border'];
                        ?>
                        <li class="inline-flex flex-col items-center gap-1 text-lg font-light uppercase">
                            <span class="block aspect-square w-16 rounded-full <?= $add_border ? 'border border-black/30' : ''; ?>"
                                  style="background: <?= $code ?>"></span>
                            <span><?= $code; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>
        <?php portfolio_get_next_project(); ?>
    </div>
</div>