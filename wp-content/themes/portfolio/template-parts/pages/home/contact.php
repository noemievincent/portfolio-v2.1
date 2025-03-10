<?php

$section_title = get_field('contact_section_title');
$section_id = get_field('contact_section_id');

$email = get_field('core_contact_email', 'options');
$phone = get_field('core_contact_phone', 'options');
$github = get_field('core_socials_github', 'options');
$linkedin = get_field('core_socials_linkedin', 'options');

?>

<section id="<?= $section_id ?>" aria-labelledby="<?= $section_id ?>-title"
         class="page-section relative grid-default px-default bg-theme-light py-12 pb-36 lg:py-16 lg:pb-48 gap-y-12">
    <div class="col-span-full lg:col-start-2 lg:col-span-3 2xl:col-start-3 2xl:col-span-2 flex flex-col gap-10 lg:gap-16 relative z-1">
        <h2 id="<?= $section_id ?>-title"
            class="relative z-1 font-mono text-3xl lg:text-4.5xl w-fit inline-flex flex-col max-lg:items-center max-lg:self-center gap-6 lg:gap-12 after:bg-black after:h-0.5 after:w-[40%]">
            <span><?= $section_title ?></span>
            <svg class="fill-theme aspect-square w-[120px] -top-10 -left-6 lg:w-[220px] absolute -z-1 lg:-top-24 lg:-left-32">
                <use xlink:href="#bubbles-1"></use>
            </svg>
        </h2>
        <div class="flex flex-wrap justify-between lg:flex-col lg:gap-24">
            <?php if ($email || $phone) : ?>
                <ul class="flex flex-col gap-2.5 lg:gap-3 font-light text-lg">
                    <?php if ($email) : ?>
                        <li>
                            <a href="mailto:<?= $email ?>" target="_blank"
                               class="group flex items-center gap-3 w-fit">
                                <span class="bg-theme w-10 aspect-square rounded-full inline-flex items-center justify-center group-hover:bg-theme-dark group-hover:text-white ease-all">
                                    <svg class="shrink-0 w-5 h-5 fill-current">
                                        <use xlink:href="#email"></use>
                                    </svg>
                                </span>
                                <span class="underlined-link"><?= $email ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($phone) : ?>
                        <li>
                            <a href="tel:<?= filter_var(str_replace(['-', '(0)'], '', $phone), FILTER_SANITIZE_NUMBER_INT) ?>"
                               target="_blank"
                               class="group flex items-center gap-3 w-fit">
                                <span class="bg-theme w-10 aspect-square rounded-full inline-flex items-center justify-center group-hover:bg-theme-dark group-hover:text-white ease-all">
                                    <svg class="shrink-0 w-5 h-5 fill-current">
                                        <use xlink:href="#phone"></use>
                                    </svg>
                                </span>
                                <span class="underlined-link"><?= $phone ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
            <?php if ($github || $linkedin) : ?>
                <ul class="flex gap-2 lg:gap-3">
                    <?php if ($github) : ?>
                        <li>
                            <a href="mailto:<?= $github ?>" target="_blank"
                               class="bg-theme w-10 aspect-square rounded-full inline-flex items-center justify-center hover:bg-theme-dark hover:text-white ease-all">
                                <svg class="shrink-0 w-5 h-5 fill-current">
                                    <use xlink:href="#github"></use>
                                </svg>
                                <span class="sr-only"><?= __('Visiter mon profil GitHub', 'nv_portfolio'); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($linkedin) : ?>
                        <li>
                            <a href="<?= $linkedin ?>"
                               target="_blank"
                               class="bg-theme w-10 aspect-square rounded-full inline-flex items-center justify-center hover:bg-theme-dark hover:text-white ease-all">
                                <svg class="shrink-0 w-5 h-5 fill-current">
                                    <use xlink:href="#linkedin"></use>
                                </svg>
                                <span class="sr-only"><?= __('Visiter ma page Linkedin', 'nv_portfolio'); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-span-full lg:col-end-12 lg:col-span-5 2xl:col-end-11 2xl:col-span-4 relative z-1">
        <div class="cf7-form">
            <?= do_shortcode('[contact-form-7 id="3da538d" title="Formulaire de contact"]') ?>
        </div>
        <svg class="fill-theme aspect-[1.50] lg:w-[220px] absolute -z-1 rotate-[154deg] lg:-bottom-24 lg:-right-20">
            <use xlink:href="#bubbles-2"></use>
        </svg>
    </div>
    <svg class="fill-theme-light aspect-[11.70] absolute inset-x-0 bottom-full">
        <use xlink:href="#wave-2"></use>
    </svg>
</section>
