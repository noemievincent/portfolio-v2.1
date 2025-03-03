<?php

global $cpt_project;

$section_title = get_field('projects_section_title');
$section_id = get_field('projects_section_id');

$max_items_count = get_field('projects_max_items_count') ?? -1;
$args = [
    'post_type' => $cpt_project['slug'],
    'post_per_page' => $max_items_count,
    'orderby' => 'menu_order',
];

$projects = new WP_Query($args);

$see_more_btn_label = get_field('projects_see_more_btn_label');
$see_less_btn_label = get_field('projects_see_less_btn_label');

if ($projects->have_posts() || true) :

    ?>

    <section id="<?= $section_id ?>" aria-labelledby="<?= $section_id ?>-title"
             class="page-section relative grid-default px-default bg-theme-lightest py-12 pb-36 lg:py-16 lg:pb-48">
        <div class="col-span-full lg:col-start-2 lg:col-span-10 flex flex-col gap-10 lg:gap-16">
            <h2 id="<?= $section_id ?>-title"
                class="relative z-1 font-mono text-center text-3xl lg:text-5xl w-fit mx-auto">
                <span><?= $section_title ?></span>
                <svg class="fill-theme-light aspect-[1.50] w-[120px] lg:w-[224px] absolute -z-1 rotate-[-160deg] -bottom-2 -right-10 lg:-bottom-4 lg:-right-20">
                    <use xlink:href="#bubbles-2"></use>
                </svg>
            </h2>
            <div class="bg-purple-100 h-[40vh]"></div>
            <?php if ($projects->found_posts > $max_items_count || true) : ?>
                <div class="relative z-1 mx-auto mt-4 lg:mt-6">
                    <button id="load-more-btn" data-count="<?= $max_items_count ?>" data-request="load-more"
                            class="btn-primary max-lg:w-full">
                        <span class="top"><?= $see_more_btn_label ?></span>
                    </button>
                    <svg class="fill-theme-light aspect-square w-[110px] lg:w-[120px] absolute -z-1 -bottom-9 -right-16 lg:-bottom-10 lg:-right-20">
                        <use xlink:href="#bubbles-1"></use>
                    </svg>
                    <svg class="fill-theme-light aspect-[1.50] rotate-[120deg] w-[90px] lg:w-[110px] absolute -z-1 -top-4 -left-12 lg:-top-6 lg:-left-14">
                        <use xlink:href="#bubbles-2"></use>
                    </svg>
                </div>
            <?php endif; ?>
        </div>
        <svg class="fill-theme-lightest aspect-[11.70] absolute inset-x-0 bottom-full">
            <use xlink:href="#wave-1"></use>
        </svg>
    </section>

<?php endif; ?>
