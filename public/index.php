<?php
// public/index.php - Show all errors

use App\Kernel;

// Enable all error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__).'/vendor/autoload.php';
// Avoid short CLI/web timeouts during development (temporary)
// If this is needed permanently, update your php.ini `max_execution_time`.
@set_time_limit(300);
ini_set('max_execution_time', '300');

require_once dirname(__DIR__).'/vendor/autoload.php';
// Prefer real autoload when available. If `vendor/` is incomplete (preview mode),
// fall back to a minimal templates-only preview router to avoid fatal require errors.
$vendorAutoload = dirname(__DIR__).'/vendor/autoload.php';
if (file_exists($vendorAutoload)) {
    require_once $vendorAutoload;
} else {
    // Minimal preview router: map request URIs to files under `templates-only/`.
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $path = ltrim($path, '/');
    if ($path === '' || $path === 'index.php') {
        $candidates = ['home.html.twig', 'home.twig', 'base.html.twig'];
    } else {
        // Try several candidate mappings: direct, underscore->slash, and appended .html.twig
        $candidates = [];
        $candidates[] = $path;
        $candidates[] = $path . '.html.twig';
        $candidates[] = $path . '.twig';
        $candidates[] = str_replace('_', '/', $path) . '.html.twig';
        $candidates[] = str_replace('_', '/', $path) . '.twig';
    }

    $found = null;
    foreach ($candidates as $cand) {
        $file = dirname(__DIR__) . '/templates-only/' . $cand;
        if (file_exists($file)) { $found = $file; break; }
    }

    header('Content-Type: text/html; charset=utf-8');
    if ($found) {
        // Serve the twig file as-is for quick preview (no server-side Twig rendering).
        echo file_get_contents($found);
        exit(0);
    }

    // Show a simple index listing of available templates.
    $tplDir = dirname(__DIR__) . '/templates-only';
    echo "<h1>Templates preview</h1>\n";
    echo "<p>No vendor autoload found; showing available templates under <code>templates-only/</code>.</p>\n";
    echo "<ul>\n";
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($tplDir));
    foreach ($it as $f) {
        if ($f->isFile()) {
            $rel = str_replace($tplDir . DIRECTORY_SEPARATOR, '', $f->getPathname());
            $url = '/' . str_replace(DIRECTORY_SEPARATOR, '/', preg_replace('#\.(html\.twig|twig)$#', '', $rel));
            echo '<li><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($rel) . '</a></li>' . "\n";
        }
    }
    echo "</ul>\n";
    exit(0);
}

// Load environment variables
if (file_exists(dirname(__DIR__).'/.env')) {
    (new Symfony\Component\Dotenv\Dotenv())->load(dirname(__DIR__).'/.env');
}

$env = $_SERVER['APP_ENV'] ?? 'dev';
$debug = (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== $env));

try {
    $kernel = new Kernel($env, $debug);
    $kernel->boot();

    $request = Symfony\Component\HttpFoundation\Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
} catch (Exception $e) {
    // Display the error
    header('Content-Type: text/plain; charset=utf-8');
    echo "ERROR: " . $e->getMessage() . "\n\n";
    echo "FILE: " . $e->getFile() . ":" . $e->getLine() . "\n\n";
    echo "TRACE:\n" . $e->getTraceAsString() . "\n";
}