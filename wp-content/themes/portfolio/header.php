<?php

$default_theme_color = get_field('core_default_theme_color', 'options') ?? 'pink';

?>

<!DOCTYPE html>
<html <?= language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class('flex flex-col h-screen') ?> data-theme="<?= $_GET['theme'] ?? $default_theme_color; ?>">
<?php

wp_body_open();
include get_theme_file_path() . '/inc/svg.php';

?>

<header id="top" class="flex-0 z-50 relative">
</header>

<main class="flex flex-col flex-grow">
