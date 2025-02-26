<?php get_header(); ?>

    <div id="content" class="--h-[120vh]">
        <?php
        get_template_part('template-parts/pages/home/about');
        get_template_part('template-parts/pages/home/projects');
        get_template_part('template-parts/pages/home/contact');
        ?>
    </div>

<?php get_footer(); ?>