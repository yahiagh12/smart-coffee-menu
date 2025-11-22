<?php
// Simple preview router to render Twig templates from `templates-only/`.
// Usage:
// 1) Run `composer install` in project root to install Twig.
// 2) Run `php -S 127.0.0.1:8000 -t public` and open http://127.0.0.1:8000

// Security: This is a local preview tool. Do not expose it on production.

$projectRoot = dirname(__DIR__);
$templatesDir = $projectRoot . '/templates-only';

// Prefer real vendor autoload; if it's missing, fall back to stubs so the
// preview still runs (but with limited functionality). This ensures that
// when Twig is installed via Composer, the real classes are used.
if (file_exists($projectRoot . '/vendor/autoload.php')) {
    require $projectRoot . '/vendor/autoload.php';
} else {
    if (file_exists($projectRoot . '/stubs/twig_stubs.php')) {
        require_once $projectRoot . '/stubs/twig_stubs.php';
    }
    echo "Warning: vendor autoload not found; using local stubs.\n";
    echo "Run 'composer install' in project root to install Twig for full rendering.\n";
}

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader($templatesDir);
$twig = new Environment($loader, [
    'debug' => true,
    'cache' => false,
]);

// Add small stubs for common Symfony/Twig helpers so templates render in preview.
if (class_exists('\\Twig\\TwigFunction')) {
    $twig->addFunction(new \Twig\TwigFunction('path', function ($name = '', $params = []) {
        // If $name looks like a path, return it; otherwise return a shallow placeholder.
        if (is_string($name) && (strpos($name, '/') !== false || strpos($name, '.') !== false)) {
            return $name;
        }
        $query = http_build_query($params);
        return '/' . ltrim($name, '/') . ($query ? ('?' . $query) : '');
    }));

    $twig->addFunction(new \Twig\TwigFunction('asset', function ($path) {
        return '/' . ltrim($path, '/');
    }));

    $twig->addFunction(new \Twig\TwigFunction('csrf_token', function ($id = '') {
        return 'preview-csrf-token';
    }));
    // Additional common Symfony/Twig helper stubs
    $twig->addFunction(new \Twig\TwigFunction('importmap', function () { return ''; }));
    $twig->addFunction(new \Twig\TwigFunction('encore_entry_link_tags', function () { return ''; }));
    $twig->addFunction(new \Twig\TwigFunction('encore_entry_script_tags', function () { return ''; }));
    $twig->addFunction(new \Twig\TwigFunction('absolute_url', function ($p) { return (isset($_SERVER['HTTP_HOST'])? 'http://'.$_SERVER['HTTP_HOST'] : '') . '/' . ltrim($p, '/'); }));
    $twig->addFunction(new \Twig\TwigFunction('url', function ($p) { return '/' . ltrim($p, '/'); }));
}

// Basic global `app` so templates referencing `app.*` don't fail.
$twig->addGlobal('app', ['debug' => true, 'request' => ['uri' => $uri ?? '/'], 'user' => null]);

// Basic router: / -> list templates; /view?t=path/to/template.twig -> render
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Normalize URI (remove trailing slash except for root)
if ($uri !== '/' && substr($uri, -1) === '/') {
    $uri = rtrim($uri, '/');
}

if ($uri === '/' || $uri === '/index.php') {
    // List .twig files recursively
    $files = [];
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($templatesDir));
    foreach ($rii as $file) {
        if ($file->isDir()) continue;
        if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) === 'twig') {
            $relative = str_replace(DIRECTORY_SEPARATOR, '/', substr($file->getPathname(), strlen($templatesDir) + 1));
            $files[] = $relative;
        }
    }

    echo "<h1>Templates</h1>\n<ul>\n";
    foreach ($files as $f) {
        $url = '/view?t=' . urlencode($f);
        echo "<li><a href=\"{$url}\">{$f}</a></li>\n";
    }
    echo "</ul>\n";
    exit;
}

if ($uri === '/view') {
    $t = isset($_GET['t']) ? $_GET['t'] : null;
    if (!$t) {
        echo "Template not specified. Use ?t=path/to/file.twig";
        exit(1);
    }

    // Normalize path and prevent directory traversal
    $t = str_replace('..', '', $t);
    $templatePath = ltrim($t, '/\\');

    // Special-case logout preview when requested via ?t=...
    if ($templatePath === 'app_logout' || $templatePath === 'app/logout' || $templatePath === 'logout') {
        $proto = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
        header($proto . ' 200 OK');
        echo "<h1>Logged out (preview)</h1>\n";
        echo "<p>This route is handled by the application (logout). In preview mode there's no template — this is a stub.</p>\n";
        echo "<p><a href=\"/\">Back to template list</a></p>\n";
        exit;
    }

    // Try several candidate template filenames if the provided path has no extension
    $candidates = [];
    $candidates[] = $templatePath;
    if (substr($templatePath, -5) !== '.twig') {
        $candidates[] = $templatePath . '.html.twig';
        $candidates[] = $templatePath . '.twig';
        if (strpos($templatePath, '_') !== false) {
            $candidates[] = str_replace('_', '/', $templatePath) . '.html.twig';
            $candidates[] = str_replace('_', '/', $templatePath) . '.twig';
        }
        foreach (['auth', 'app', 'admin', 'menu'] as $d) {
            $candidates[] = $d . '/' . $templatePath . '.html.twig';
            $candidates[] = $d . '/' . $templatePath . '.twig';
        }
    }

    // Also perform a fuzzy search by filename parts
    $slug = basename($templatePath);
    if ($slug) {
        $parts = preg_split('/[_\-\.]/', $slug);
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($templatesDir));
        foreach ($rii as $file) {
            if ($file->isDir()) continue;
            if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) !== 'twig') continue;
            $name = strtolower($file->getFilename());
            if (stripos($name, strtolower($slug)) !== false) {
                $rel = str_replace(DIRECTORY_SEPARATOR, '/', substr($file->getPathname(), strlen($templatesDir) + 1));
                $candidates[] = $rel;
                continue;
            }
            foreach ($parts as $p) {
                if ($p && stripos($name, $p) !== false) {
                    $rel = str_replace(DIRECTORY_SEPARATOR, '/', substr($file->getPathname(), strlen($templatesDir) + 1));
                    $candidates[] = $rel;
                    break;
                }
            }
        }
    }

    // Deduplicate and try candidates
    $tried = [];
    $found = null;
    foreach ($candidates as $cand) {
        if (!$cand) continue;
        $cand = ltrim($cand, '/');
        if (in_array($cand, $tried)) continue;
        $tried[] = $cand;
        $fullPath = realpath($templatesDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $cand));
        if ($fullPath && stripos($fullPath, realpath($templatesDir)) === 0 && pathinfo($fullPath, PATHINFO_EXTENSION) === 'twig') {
            $found = $fullPath;
            break;
        }
    }

    if (!$found) {
        echo "Template not found or invalid path.";
        exit(1);
    }

    // Twig expects paths relative to the loader root and using forward slashes
    $templateForTwig = str_replace(realpath($templatesDir) . DIRECTORY_SEPARATOR, '', $found);
    $templateForTwig = str_replace(DIRECTORY_SEPARATOR, '/', $templateForTwig);

    try {
        // Provide some default variables for templates that expect them
        $vars = [
            'app' => [ 'debug' => true ],
            '_GET' => $_GET,
            '_POST' => $_POST,
        ];
        echo $twig->render($templateForTwig, $vars);
    } catch (Exception $e) {
        echo "Twig render error: " . htmlspecialchars($e->getMessage());
    }
    exit;
}

// Try to map pretty URI to a template file, e.g. `/admin/menu/edit` -> `admin/menu/edit.html.twig`
// Only do this if the URI doesn't contain a dot (no file extension)
$tryPath = ltrim($uri, '/');
if ($tryPath !== '' && strpos($tryPath, '.') === false) {
    $candidate = $tryPath . '.html.twig';
    $candidateAlt = $tryPath . '.twig';
    $attempts = [$candidate, $candidateAlt];
    foreach ($attempts as $cand) {
        $fullPath = realpath($templatesDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $cand));
        if ($fullPath && stripos($fullPath, realpath($templatesDir)) === 0 && pathinfo($fullPath, PATHINFO_EXTENSION) === 'twig') {
            $templateForTwig = str_replace(realpath($templatesDir) . DIRECTORY_SEPARATOR, '', $fullPath);
            $templateForTwig = str_replace(DIRECTORY_SEPARATOR, '/', $templateForTwig);
            try {
                $vars = ['app' => ['debug' => true], '_GET' => $_GET, '_POST' => $_POST];
                echo $twig->render($templateForTwig, $vars);
            } catch (Exception $e) {
                echo "Twig render error: " . htmlspecialchars($e->getMessage());
            }
            exit;
        }
    }

    // If tryPath maps to a directory, try common index/list filenames there
    $dirCandidate = realpath($templatesDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $tryPath));
    if ($dirCandidate && is_dir($dirCandidate)) {
        foreach (['list.html.twig', 'index.html.twig'] as $df) {
            $fullPath = realpath($dirCandidate . DIRECTORY_SEPARATOR . $df);
            if ($fullPath && stripos($fullPath, realpath($templatesDir)) === 0) {
                $templateForTwig = str_replace(realpath($templatesDir) . DIRECTORY_SEPARATOR, '', $fullPath);
                $templateForTwig = str_replace(DIRECTORY_SEPARATOR, '/', $templateForTwig);
                try {
                    $vars = ['app' => ['debug' => true], '_GET' => $_GET, '_POST' => $_POST];
                    echo $twig->render($templateForTwig, $vars);
                } catch (Exception $e) {
                    echo "Twig render error: " . htmlspecialchars($e->getMessage());
                }
                exit;
            }
        }
    }
}

// If direct candidates fail, try more aggressive fallbacks:
// - treat underscores as directory separators (app_logout -> app/logout)
// - search common directories (auth, app, admin, menu)
// - fuzzy search for filenames containing the slug or parts of it
$slug = basename($tryPath);
$candidates = [];
// underscore -> path
if (strpos($tryPath, '_') !== false) {
    $candidates[] = str_replace('_', '/', $tryPath) . '.html.twig';
    $candidates[] = str_replace('_', '/', $tryPath) . '.twig';
}
// common dirs
foreach (['auth', 'app', 'admin', 'menu'] as $d) {
    $candidates[] = $d . '/' . $slug . '.html.twig';
    $candidates[] = $d . '/' . $slug . '.twig';
}

// fuzzy search: collect any twig whose filename contains the slug or parts
if ($slug) {
    $parts = preg_split('/[_\-\.]/', $slug);
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($templatesDir));
    foreach ($rii as $file) {
        if ($file->isDir()) continue;
        if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) !== 'twig') continue;
        $name = strtolower($file->getFilename());
        if (stripos($name, strtolower($slug)) !== false) {
            $rel = str_replace(DIRECTORY_SEPARATOR, '/', substr($file->getPathname(), strlen($templatesDir) + 1));
            $candidates[] = $rel;
            continue;
        }
        foreach ($parts as $p) {
            if ($p && stripos($name, $p) !== false) {
                $rel = str_replace(DIRECTORY_SEPARATOR, '/', substr($file->getPathname(), strlen($templatesDir) + 1));
                $candidates[] = $rel;
                break;
            }
        }
    }
}

// try each candidate
$tried = [];
foreach ($candidates as $cand) {
    if (!$cand) continue;
    $cand = ltrim($cand, '/');
    if (in_array($cand, $tried)) continue;
    $tried[] = $cand;
    $fullPath = realpath($templatesDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $cand));
    if ($fullPath && stripos($fullPath, realpath($templatesDir)) === 0 && pathinfo($fullPath, PATHINFO_EXTENSION) === 'twig') {
        $templateForTwig = str_replace(realpath($templatesDir) . DIRECTORY_SEPARATOR, '', $fullPath);
        $templateForTwig = str_replace(DIRECTORY_SEPARATOR, '/', $templateForTwig);
        try {
            $vars = ['app' => ['debug' => true], '_GET' => $_GET, '_POST' => $_POST];
            // indicate fallback source in HTML comment
            echo "<!-- preview: rendering fallback template {$templateForTwig} for requested path {$uri} -->\n";
            echo $twig->render($templateForTwig, $vars);
        } catch (Exception $e) {
            echo "Twig render error: " . htmlspecialchars($e->getMessage());
        }
        exit;
    }
}

// Special-case known framework routes that don't have templates
if ($uri === '/app_logout' || $tryPath === 'app_logout') {
    $proto = isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
    header($proto . ' 200 OK');
    echo "<h1>Logged out (preview)</h1>\n";
    echo "<p>This route is handled by the application (logout). In preview mode there's no template — this is a stub.</p>\n";
    echo "<p><a href=\"/\">Back to template list</a></p>\n";
    exit;
}

// Fallback: show small help with 404
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
echo "<h1>404 — Template not found</h1>\n";
echo "<p>No template matches the requested path <strong>" . htmlspecialchars($uri) . "</strong>.</p>\n";
echo "<p>Available endpoints:</p>\n<ul>\n";
echo "<li><a href=\"/\">/</a> — list templates</li>\n";
echo "<li>/view?t=path/to/template.twig — render a template</li>\n";
echo "</ul>\n";
