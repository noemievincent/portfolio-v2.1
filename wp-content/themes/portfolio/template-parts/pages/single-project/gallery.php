<?php

$images = get_field('gallery');

if (!empty($images)) :

    ?>

    <section aria-labelledby="gallery"
             class="relative bg-theme-lightest">
        <div class="relative grid-default px-default overflow-hidden">
            <div class="col-span-full xl:col-start-2 xl:col-span-10 2xl:col-start-3 2xl:col-span-8 py-12 pb-24 md:pb-36 rg:py-20 rg:pb-40 lg:py-20 lg:pb-64 gap-y-12">
                <h2 id="gallery" class="sr-only"><?= __('Galerie d\'images', THEME_TEXT_DOMAIN); ?></h2>
                <div class="relative z-2 grid grid-cols-1 md:grid-cols-2 rg:grid-cols-3 gap-4 rg:gap-5 lg:gap-6">
                    <?php foreach ($images as $index => $img_id) :

                        $classes = $index == 0 ? 'md:col-span-full md:aspect-[1.8]' : 'lg:aspect-[1.2]';
                        $img_classes = $index == 0 ? 'object-cover object-center' : 'object-cover object-top';

                        ?>
                        <span class="rl:relative z-3 w-full h-full aspect-[1.4]  <?= $classes; ?>">
                        <?php if ($index === 0) : ?>
                            <svg class="fill-theme-light aspect-[1.50] absolute rotate-[140deg] w-[160px] -bottom-16 -right-10 rg:max-lg:hidden <?= count($images) === 1 ? 'lg:w-[280px] lg:-bottom-24 lg:-right-24' : 'lg:rotate-[50deg] lg:w-[360px] lg:-bottom-36 lg:-right-48 xl:-right-52'; ?>">
                                <use xlink:href="#bubbles-2"></use>
                            </svg>
                        <?php endif; ?>
                        <a href="<?= wp_get_attachment_image_src($img_id, 'large')[0] ?>" target="_blank"
                           data-fancybox="gallery" data-caption="<?= wp_get_attachment_caption($img_id); ?>"
                           class="group relative z-1 inline-block w-full h-full overflow-hidden bg-theme-dark">
                            <?= wp_get_attachment_image($img_id, $index == 0 ? '' : 'large', false, ['class' => 'w-full h-full ease-all group-hover:opacity-80 group-focus:opacity-80 ' . $img_classes]); ?>
                            <span class="absolute bottom-4 left-4 aspect-square w-12 bg-white fill-black border-2 border-black flex items-center justify-center translate-y-20 opacity-0 ease-all group-hover:translate-y-0 group-hover:opacity-100 group-focus:translate-y-0 group-focus:opacity-100">
                                <svg class="shrink-0 h-6 w-6">
                                    <use xlink:href="#zoom"></use>
                                </svg>
                            </span>
                        </a>
                    </span>
                    <?php endforeach; ?>
                    <svg class="fill-theme-light aspect-square w-[120px] md:w-[220px] lg:w-[340px] absolute -z-1 -top-12 -left-4 md:-top-20 md:-left-16 lg:top-32 lg:-left-60">
                        <use xlink:href="#bubbles-1"></use>
                    </svg>

                </div>
            </div>
        </div>
        <svg class="fill-theme-lightest aspect-[11.70] absolute inset-x-0 bottom-full w-full">
            <use xlink:href="#wave-1"></use>
        </svg>

    </section>

<?php endif; ?>