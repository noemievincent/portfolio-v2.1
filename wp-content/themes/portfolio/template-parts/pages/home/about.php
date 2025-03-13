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
     class="page-section bg-white grid-default px-default py-12 pb-24 lg:py-24 lg:pb-48 2xl:pb-80">
    <div class="col-span-full lg:col-start-2 lg:col-span-5 2xl:col-start-3 2xl:col-span-4 lg:py-18 flex flex-col gap-8 lg:gap-16">
        <div class="flex flex-col gap-6 lg:gap-8">
            <h1 class="font-mono text-xl lg:text-2xl inline-flex flex-col gap-3 lg:gap-2.5">
                <span><?= $title_part_1 ?></span>
                <span class="text-4.5xl lg:text-7xl"><?= $title_part_2 ?></span>
            </h1>
            <?php if ($content) : ?>
                <div class="text-content">
                    <?= $content ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($btn_1 || $btn_2) : ?>
            <div class="flex items-center max-lg:justify-center flex-wrap gap-6 lg:gap-14">
                <?php if ($btn_1) : ?>
                    <a href="<?= $btn_1['url'] ?>" <?= $btn_1['target'] == '_blank' ? 'target="_blank"' : '' ?>
                       class="btn-primary max-lg:w-full">
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
    <div class="col-span-full lg:col-end-12 lg:col-span-4 2xl:col-end-11 2xl:col-span-3">
        <svg class="fill-theme w-full h-full max-lg:hidden">
            <use xlink:href="#bubbles-avatar"></use>
        </svg>
    </div>
</div>