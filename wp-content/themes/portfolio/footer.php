</main>

<footer class="flex-0">
    <a href="#content" id="scroll-to-top"
       class="overflow-hidden fixed z-30 lg:bottom-24 lg:right-10 inline-flex items-center bg-theme-dark rounded-full lg:p-5 lg:px-5.5 font-mono align-top whitespace-nowrap text-white fill-white max-lg:text-sm">
        <span class="animate"><?= __('Retour en haut', THEME_TEXT_DOMAIN); ?></span>
        <svg class="h-4 w-4 lg:h-5 lg:w-5 -rotate-90">
            <use xlink:href="#arrow"></use>
        </svg>
    </a>
    <section aria-labelledby="footer" class="bg-theme-dark grid-default px-default py-5 gap-y-3">
        <h2 class="sr-only"><?= __('Pied de page', THEME_TEXT_DOMAIN); ?></h2>
        <div class="col-span-full lg:col-start-2 lg:col-span-4 2xl:col-start-3 2xl:col-span-3">
            <p class="font-mono max-lg:text-sm">
                <span class="font-sans text-lg">&copy;</span> <?= date('Y'); ?> <?= __('Noémie Vincent. Tous droits réservés.', THEME_TEXT_DOMAIN) ?>
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