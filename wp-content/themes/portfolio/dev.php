<?php

global $template;
$mode = (IS_VITE_DEVELOPMENT) ? "development" : "production";

if ($mode === 'development') :

    ?>

    <div id="dev-container" class="grid-default px-default py-3 font-mono text-black bg-gray-300">
        <div class="col-span-full 3xl:col-start-2 3xl:col-span-10 md:text-sm gap-y-2 flex flex-wrap items-center justify-between m-0 text-xs">
            <p class="">Currently in <strong><?= $mode ?></strong> mode in <strong><?= basename($template); ?></strong>
                file.</p>
            <p id="dev-screen-size"><strong class="width font-mono">width</strong>x<strong class="height font-mono">height</strong>
                pixels</p>
        </div>
    </div>

<?php endif; ?>