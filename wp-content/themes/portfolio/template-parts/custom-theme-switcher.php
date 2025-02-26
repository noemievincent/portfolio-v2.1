<?php

$default_theme_color = get_field('core_default_theme_color', 'options') ?? 'pink';
$active_theme = isset($_GET['theme']) ? $_GET['theme'] : $default_theme_color;

$colors = [
    'pink' => [
        'label' => __('Changer le thème en rose', 'nv_portfolio'),
        'bg_class' => 'bg-palette-pink',
        'border_class' => 'border-palette-pink',
    ],
    'green' => [
        'label' => __('Changer le thème en vert', 'nv_portfolio'),
        'bg_class' => 'bg-palette-green',
        'border_class' => 'border-palette-green',
    ],
    'blue' => [
        'label' => __('Changer le thème en bleu', 'nv_portfolio'),
        'bg_class' => 'bg-palette-blue',
        'border_class' => 'border-palette-blue',
    ],
];

if (array_key_exists($default_theme_color, $colors)) {
    $colors = [$default_theme_color => $colors[$default_theme_color]] + $colors;
}

?>

<div class="flex gap-2 justify-self-end">
    <?php foreach ($colors as $color => $attr) : ?>
        <button class="color-button <?= $attr['border_class'] ?> <?= $active_theme == $color ? 'active' : ''; ?>"
                data-color="<?= $color ?>">
            <span class="inner-circle <?= $attr['bg_class'] ?>"></span>
            <span class="sr-only"><?= $attr['label'] ?></span>
        </button>
    <?php endforeach; ?>
</div>
