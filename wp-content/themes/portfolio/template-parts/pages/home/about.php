<?php

$title = explode('%', get_field('about_title'));
$title_part_1 = isset($title[0]) ? trim($title[0]) : '';
$title_part_2 = isset($title[1]) ? trim($title[1]) : '';

$section_id = get_field('about_section_id');
$content = get_field('about_content');

$btn_1 = get_field('about_btn_1');
$btn_2 = get_field('about_btn_2');

?>

<div id="<?= $section_id ?>"
     class="page-section bg-white grid-default px-default py-10 pb-24 md:py-12 md:pb-32 lg:py-24 lg:pb-48 2xl:pb-80">
    <div class="col-span-full rg:col-start-1 rg:col-span-5 rl:col-start-1 rl:col-span-6 lg:col-start-2 lg:col-span-5 2xl:col-start-3 2xl:col-span-4 rg:py-10 lg:py-18 flex flex-col gap-8 lg:gap-16">
        <div class="flex flex-col gap-6 lg:gap-8">
            <h1 class="font-mono text-lg md:text-xl lg:text-2xl inline-flex flex-col gap-1 md:gap-3 lg:gap-2.5">
                <span><?= $title_part_1 ?></span>
                <span class="text-4xl md:text-4.5xl lg:text-6.5xl xl:text-7xl"><?= $title_part_2 ?></span>
            </h1>
            <?php if ($content) : ?>
                <div class="text-content rg:max-rl:w-4/5">
                    <?= $content ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($btn_1 || $btn_2) : ?>
            <div class="flex items-center max-md:justify-center flex-wrap gap-6 md:gap-10 lg:gap-14">
                <?php if ($btn_1) : ?>
                    <a href="<?= $btn_1['url'] ?>" <?= $btn_1['target'] == '_blank' ? 'target="_blank"' : '' ?>
                       class="btn-primary max-md:w-full">
                        <span class="top">
                            <?= $btn_1['title'] ?>
                        </span>
                    </a>
                <?php endif; ?>
                <?php if ($btn_2) : ?>
                    <a href="<?= $btn_2['url'] ?>" <?= $btn_2['target'] == '_blank' ? 'target="_blank"' : '' ?>
                       class="btn-secondary">
                        <?= $btn_2['title'] ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-span-full rg:col-end-9 rg:col-span-3 rl:col-end-13 rl:col-span-5 lg:col-end-12 lg:col-span-4 2xl:col-end-11 2xl:col-span-3 max-rg:hidden rg:max-rl:-ml-16">
        <?php get_template_part('template-parts/pages/home/bubbles-avatar'); ?>
    </div>
</div>