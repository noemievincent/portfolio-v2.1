<?php get_header(); // Template Name: RGPD  

$is_policy = is_page([4, 12]);

if ($is_policy) {
    $rgpd_pages = new WP_Query(['post_type' => 'page', 'meta_key' => '_wp_page_template', 'meta_value' => 'page-templates/page-rgpd.php', 'order' => 'ASC', 'post__not_in' => [get_the_ID()]]);
}

?>

    <div id="rgpd-page"
         class="grid-default px-default flex-grow py-10 pt-18 lg:py-24 lg:pt-32">
        <?php if ($is_policy) : ?>
            <?php if ($rgpd_pages->have_posts()) : ?>
                <div class="col-span-full lg:col-start-4 lg:col-span-6 2xl:col-start-5 2xl:col-span-4 flex flex-col gap-5 lg:gap-14">
                    <?= get_template_part('template-parts/title-with-bubbles') ?>
                    <ul class="relative lg:text-2xl divide-theme-light flex flex-col items-center text-xl text-center divide-y ">
                        <?php while ($rgpd_pages->have_posts()) : $rgpd_pages->the_post(); ?>
                            <li class="flex items-center w-full">
                                <a href="<?= get_the_permalink() ?>"
                                   class="group ease-all flex items-center before:content-none hover px-3 hover:text-theme-dark focus:text-theme-dark justify-between lg:py-6 lg:px-5 py-3.5 w-full no-underline">
                                    <span><?= get_the_title(); ?></span>
                                    <span class="border-theme-dark ease-all group-hover:bg-theme-dark group-focus:bg-theme-dark shrink-0 lg:w-12 lg:h-12 flex items-center justify-center w-10 h-10 bg-transparent border rounded-full">
                                    <svg class="fill-theme-dark ease-all group-hover:fill-white w-3.5 h-3.5 lg:w-4 lg:h-4 ml-0.5">
                                        <use xlink:href="#arrow"></use>
                                    </svg>
                                </span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div class="col-span-full lg:col-start-4 lg:col-span-6 2xl:col-start-5 2xl:col-span-4 flex flex-col gap-8">
                <?= get_template_part('template-parts/title-with-bubbles') ?>
                <div class="text-content">
                    <?php if ($content = get_the_content()) : ?>
                        <?= wpautop($content) ?>
                    <?php else : ?>
                        <p class="text-lg lg:text-xl"><?= __('Contenu à venir', 'nv_portfolio'); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>