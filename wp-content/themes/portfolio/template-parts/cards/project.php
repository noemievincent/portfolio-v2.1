<?php

$title = get_the_title();
$excerpt = get_field('excerpt');
$date = get_field('date');

$url = get_the_permalink();

?>

<article aria-labelledby="<?= sanitize_title($title) ?>"
         class="project-card group relative z-1 overflow-hidden bg-white border-2 border-theme-dark flex flex-col gap-6 lg:gap-8 p-6">
    <div class="bg-theme-dark aspect-square w-full flex items-center justify-center">
        <?php if ($img_id = get_post_thumbnail_id()) : ?>
            <?= wp_get_attachment_image($img_id, 'medium_large', false, ['class' => 'h-full w-full object-cover ease-all group-hover:scale-[1.10] group-focus:scale-[1.10]']) ?>
        <?php else : ?>
            <svg class="shrink-0 w-full h-full scale-[0.25] fill-white/50">
                <use xlink:href="#no-photo"></use>
            </svg>
        <?php endif; ?>
    </div>
    <div class="flex flex-col gap-2.5">
        <h3 id="<?= sanitize_title($title) ?>" class="font-mono text-2xl"><?= $title ?></h3>
        <?php if ($excerpt) : ?>
            <p class="line-clamp-3 font-light text-lg"><?= $excerpt ?></p>
        <?php endif; ?>
    </div>
    <a href="<?= $url ?>"
       class="absolute z-1 inset-0 w-full h-full ease-all bg-white/70 flex flex-col p-4 opacity-0 group-hover:opacity-100 ease-all">
        <span class="text-center flex items-center justify-center aspect-square w-full font-light text-xl"><?= __('En savoir plus sur ce projet', THEME_TEXT_DOMAIN) ?></span>
        <span class="aspect-square bg-theme-dark border-2 border-theme-dark fill-white rounded-full w-14 inline-flex items-center justify-center self-end mt-auto translate-y-full group-hover:translate-y-0 group-focus:translate-y-0 hover:bg-white hover:fill-theme-dark focus:bg-white focus:fill-theme-dark ease-all">
            <svg class="shrink-0 shrink-0 w-5 h-5">
                <use xlink:href="#arrow"></use>
            </svg>
        </span>
    </a>
</article>
