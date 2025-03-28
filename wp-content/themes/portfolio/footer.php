</main>

<footer class="flex-0">
    <a href="#content" id="scroll-to-top"
       class="overflow-hidden fixed z-50 bottom-12 right-6 xl:bottom-24 xl:right-10 inline-flex items-center bg-theme rounded-full p-3.5 px-4 md:p-5 xl:px-5.5 font-mono align-top whitespace-nowrap text-white fill-white max-xl:text-sm">
        <span class="animate"><?= __('Retour en haut', THEME_TEXT_DOMAIN); ?></span>
        <svg class="h-4 w-4 md:h-5 md:w-5 -rotate-90">
            <use xlink:href="#arrow"></use>
        </svg>
    </a>
    <section aria-labelledby="footer" class="bg-theme-dark grid-default px-default py-4 gap-y-2 lg:py-5 lg:gap-y-3">
        <h2 id="footer" class="sr-only"><?= __('Pied de page', THEME_TEXT_DOMAIN); ?></h2>
        <div class="col-span-full rg:col-start-1 rg:col-span-4 rl:col-start-1 rl:col-span-6 xl:col-start-2 xl:col-span-4 2xl:col-start-3 2xl:col-span-3">
            <p class="font-mono max-md:text-sm">
                <span class="font-sans text-lg">&copy;</span> <?= date('Y'); ?> <?= __('Noémie Vincent. Tous droits réservés.', THEME_TEXT_DOMAIN) ?>
            </p>
        </div>
        <div role="navigation"
             class="col-span-full rg:col-end-9 rg:col-span-4 rl:col-end-13 rl:col-span-6 xl:col-end-12 xl:col-span-6 2xl:col-end-11 2xl:col-span-5">
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