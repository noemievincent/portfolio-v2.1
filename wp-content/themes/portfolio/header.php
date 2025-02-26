<!DOCTYPE html>
<html <?= language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class('flex flex-col h-screen') ?>>
<?php wp_body_open(); ?>
<?php include get_theme_file_path() . '/inc/svg.php'; ?>

<header id="top" class="flex-0 z-50 relative">
</header>

<main class="flex flex-col flex-grow">

