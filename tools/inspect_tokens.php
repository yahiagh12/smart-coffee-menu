<?php
foreach (['CategorieController.php','MenuItemController.php'] as $file) {
    $path = __DIR__ . '/../src/Controller/Api/' . $file;
    echo "--- $file ---\n";
    $src = file_get_contents($path);
    echo 'len=' . strlen($src) . PHP_EOL;
    $tokens = token_get_all($src);
    echo 'tokens=' . count($tokens) . PHP_EOL;
    $ns = '';
    $classes = [];
    $next = null;
    foreach ($tokens as $t) {
        if (is_array($t)) {
            if ($t[0] === T_NAMESPACE) {
                $next = 'ns';
                continue;
            }
            if ($next === 'ns' && ($t[0] === T_STRING || $t[0] === T_NS_SEPARATOR)) {
                $ns .= $t[1];
                continue;
            }
            if ($t[0] === T_CLASS) {
                $next = 'class';
                continue;
            }
            if ($next === 'class' && $t[0] === T_STRING) {
                $classes[] = $t[1];
                $next = null;
                continue;
            }
        } else {
            if ($next === 'ns' && $t === ';') {
                $next = null;
            }
        }
    }
    echo 'namespace: ' . ($ns ?: '(none)') . PHP_EOL;
    echo 'classes: ' . implode(', ', $classes) . PHP_EOL;
}

// inspect use-case file
$file = 'CreateMenuItem.php';
$path = __DIR__ . '/../src/UseCase/MenuItem/' . $file;
if (file_exists($path)) {
    echo "--- $file ---\n";
    $src = file_get_contents($path);
    echo 'len=' . strlen($src) . PHP_EOL;
    $tokens = token_get_all($src);
    echo 'tokens=' . count($tokens) . PHP_EOL;
    $ns = '';
    $classes = [];
    $next = null;
    foreach ($tokens as $t) {
        if (is_array($t)) {
            if ($t[0] === T_NAMESPACE) {
                $next = 'ns';
                continue;
            }
            if ($next === 'ns' && ($t[0] === T_STRING || $t[0] === T_NS_SEPARATOR)) {
                $ns .= $t[1];
                continue;
            }
            if ($t[0] === T_CLASS) {
                $next = 'class';
                continue;
            }
            if ($next === 'class' && $t[0] === T_STRING) {
                $classes[] = $t[1];
                $next = null;
                continue;
            }
        } else {
            if ($next === 'ns' && $t === ';') {
                $next = null;
            }
        }
    }
    echo 'namespace: ' . ($ns ?: '(none)') . PHP_EOL;
    echo 'classes: ' . implode(', ', $classes) . PHP_EOL;
    echo '----- RAW START -----\n';
    echo $src . PHP_EOL;
    echo '----- RAW END -----\n';
}
