<?php

$images = get_field('gallery');

if (!empty($images)) :

    ?>

    <section aria-labelledby="gallery" class="relative grid-default px-default bg-theme-lightest">
        <div class="col-span-full lg:col-start-2 lg:col-span-10 2xl:col-start-3 2xl:col-span-8 py-12 pb-24 lg:py-20 lg:pb-64 gap-y-12">
            <h2 id="gallery" class="sr-only"><?= __('Galerie d\'images', THEME_TEXT_DOMAIN); ?></h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-6">
                <?php foreach ($images as $index => $img_id) :

                    $classes = $index == 0 ? 'lg:col-span-full lg:aspect-[1.8]' : 'lg:aspect-[1.2]';
                    $img_classes = $index == 0 ? 'object-cover object-center' : 'object-cover object-top';

                    ?>
                    <a href="<?= wp_get_attachment_image_src($img_id, 'large')[0] ?>" target="_blank"
                       data-fancybox="gallery" data-caption="<?= wp_get_attachment_caption($img_id); ?>"
                       class="group relative inline-block w-full h-full overflow-hidden bg-theme-dark aspect-[1.4]  <?= $classes; ?>">
                        <?= wp_get_attachment_image($img_id, $index == 0 ? '' : 'large', false, ['class' => 'w-full h-full ease-all group-hover:opacity-60 group-focus:opacity-60 ' . $img_classes]); ?>
                        <span class="absolute bottom-4 left-4 aspect-square w-12 bg-white fill-black border-2 border-black flex items-center justify-center translate-y-20 opacity-0 ease-all group-hover:translate-y-0 group-hover:opacity-100 group-focus:translate-y-0 group-focus:opacity-100">
                            <svg class="shrink-0 h-6 w-6">
                                <use xlink:href="#zoom"></use>
                            </svg>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <svg class="fill-theme-lightest aspect-[11.70] absolute inset-x-0 bottom-full">
            <use xlink:href="#wave-1"></use>
        </svg>
    </section>

<?php endif; ?>