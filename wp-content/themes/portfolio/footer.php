</main>

<footer class="flex-0">
    <section aria-labelledby="footer" class="bg-theme-dark grid-default px-default py-5 gap-y-3">
        <div class="col-span-full lg:col-start-2 lg:col-span-4 2xl:col-start-3 2xl:col-span-3">
            <p class="font-mono max-lg:text-sm">
                <span class="font-sans text-lg">&copy;</span> <?= date('Y'); ?> <?= __('Noémie Vincent. Tous droits réservés.', 'nv_portfolio') ?>
            </p>
        </div>
        <div role="navigation" class="col-span-full lg:col-end-12 lg:col-span-6 2xl:col-end-11 2xl:col-span-5">
            <?php wp_nav_menu([
                'theme_location' => 'rgpd',
                'container' => false,
                'menu_class' => 'rgpd-menu',
            ]); ?>
        </div>
    </section>
</footer>

<?php get_template_part('/dev'); ?>

<?php wp_footer() ?>
</body>

</html>