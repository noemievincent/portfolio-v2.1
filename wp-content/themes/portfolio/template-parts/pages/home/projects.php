<?php

global $cpt_project;

$section_title = get_field('projects_section_title');
$section_id = get_field('projects_section_id');

$initial_items_count = get_field('projects_initial_items_count') ?? -1;
$add_items_count = get_field('projects_add_items_count') ?? 1;

$results = portfolio_get_projects($initial_items_count);
$projects = $results->projects;

$see_more_btn_label = get_field('projects_see_more_btn_label');
$see_less_btn_label = get_field('projects_see_less_btn_label');

if ($projects->have_posts()) :

    ?>

    <section id="<?= $section_id ?>" aria-labelledby="<?= $section_id ?>-title"
             class="page-section relative grid-default px-default bg-theme-lightest py-12 pb-36 lg:py-16 lg:pb-48 2xl:pb-80">
        <div class="col-span-full lg:col-start-2 lg:col-span-10 2xl:col-start-3 2xl:col-span-8 flex flex-col gap-10 lg:gap-16">
            <h2 id="<?= $section_id ?>-title"
                class="relative z-1 font-mono text-center text-3xl lg:text-5xl w-fit mx-auto">
                <span><?= $section_title ?></span>
                <svg class="fill-theme-light aspect-[1.50] w-[120px] lg:w-[224px] absolute -z-1 rotate-[-160deg] -bottom-2 -right-10 lg:-bottom-4 lg:-right-20">
                    <use xlink:href="#bubbles-2"></use>
                </svg>
            </h2>
            <div class="relative">
                <div id="loader" role="status" class="absolute inset-0 z-20 hidden">
                    <span class="lg:mt-12 flex items-center justify-center">
                        <span class="inline-block h-12 w-12 animate-spin rounded-full border-4 border-solid border-theme-dark border-r-transparent motion-reduce:animate-[spin_1.5s_linear_infinite] relative z-30"></span>
                        <span class="sr-only"><?= __('Chargement...', THEME_TEXT_DOMAIN); ?></span>
                    </span>
                </div>
                <div id="projects-container"
                     class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <?php while ($projects->have_posts()) : $projects->the_post();
                        get_template_part('template-parts/cards/project');
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
            <?php if ($projects->found_posts > $initial_items_count) : ?>
                <div class="relative z-1 mx-auto mt-4 lg:mt-6">
                    <button id="load-more-btn" data-initial-count="<?= $initial_items_count ?>"
                            data-offset="<?= $initial_items_count ?>"
                            data-count="<?= $add_items_count ?>" data-see-more-label="<?= $see_more_btn_label ?>"
                            data-see-less-label="<?= $see_less_btn_label ?>"
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
