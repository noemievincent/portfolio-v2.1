<?php

$section_title = get_field('single_project_contact_section_title', 'options');
$content = get_field('single_project_contact_content', 'options');
$btn = get_field('single_project_contact_btn', 'options');

?>

<section aria-labelledby="contact" class="relative grid-default px-default bg-theme-light">
    <div class="col-span-full md:col-start-1 md:col-span-4 rl:-col-start-1 rl:col-span-6 lg:col-start-2 lg:col-span-4 2xl:col-start-3 2xl:col-span-3 flex flex-col gap-8 lg:gap-14 py-6 pb-12 lg:pt-8">
        <div class="flex flex-col gap-2">
            <h2 id="contact" class="font-mono text-2xl rl:text-4xl"><?= $section_title; ?></h2>
            <?php if ($content) : ?>
                <p class="text-xl font-light rl:text-2xl"><?= $content; ?></p>
            <?php endif; ?>
        </div>
        <?php if ($btn) : ?>
            <a href="<?= $btn['url'] ?>" <?= $btn['target'] == '_blank' ? 'target="_blank"' : '' ?>
               class="btn-primary max-md:w-full">
                <span class="top">
                    <?= $btn['title'] ?>
                </span>
            </a>
        <?php endif; ?>
    </div>
    <div class="max-md:hidden col-span-full md:col-end-9 md:col-span-3 rl:col-end-13 rl:col-span-5 lg:col-end-12 lg:col-span-5 2xl:col-end-11 2xl:col-span-4 md:pb-6 lg:pb-16">
        <svg class="fill-theme w-full h-full aspect-[1.32]">
            <use xlink:href="#bubbles-contact"></use>
        </svg>
    </div>
    <svg class="fill-theme-light aspect-[11.70] absolute inset-x-0 bottom-full w-full">
        <use xlink:href="#wave-2"></use>
    </svg>
</section>