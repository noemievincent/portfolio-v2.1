<a href="<?= get_permalink($post_id); ?>" class="group flex gap-4 items-center justify-end ml-auto text-right">
    <span class="flex flex-col items-end">
        <span class="text-lg font-light lowercase"><?= __('Projet suivant', THEME_TEXT_DOMAIN); ?></span>
        <span class="font-mono text-xl lg:text-2xl lg:-mt-1"><?= get_the_title($post_id); ?></span>
    </span>
    <span class="aspect-square bg-theme-dark border-2 border-theme-dark fill-white rounded-full w-16 inline-flex items-center justify-center self-end group-hover:translate-x-3 group-hover:scale-90 group-focus:translate-x-3 group-focus:scale-90 hover:bg-white/40 hover:fill-theme-dark focus:bg-white/40 focus:fill-theme-dark ease-all">
        <svg class="shrink-0 w-5 h-5">
            <use xlink:href="#arrow"></use>
        </svg>
    </span>
</a>
