<ul class="menu lang-switcher">
    <?php foreach ($languages as $l) : ?>
        <li class="lang-item <?= $l['current_lang'] == true ? 'lang-current' : '' ?>">
            <a href="<?= esc_url($l['url']) ?>">
                <?= strtoupper($l['slug']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>