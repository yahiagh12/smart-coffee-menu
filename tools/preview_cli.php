<?php
// Helper to run `public/index.php` from CLI with a fake request to capture output.
chdir(__DIR__ . '/..');
// Configure the requested template here (relative path inside templates-only)
$template = $argv[1] ?? 'admin/base.html.twig';
$_SERVER['REQUEST_URI'] = '/view';
$_GET['t'] = $template;
ob_start();
include __DIR__ . '/../public/index.php';
$out = ob_get_clean();
file_put_contents(__DIR__ . '/../preview_out.html', $out);
echo "WROTE: preview_out.html (template={$template})\n";
