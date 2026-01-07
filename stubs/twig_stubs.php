<?php
// Lightweight stubs for Twig classes so editors/static analyzers work
// when vendor dependencies are not installed. These are only defined
// when the real classes are missing and will be skipped when Twig is installed.

if (!class_exists('Twig\\Environment')) {
    class Twig_Environment_Stub {
        public function __construct($loader = null, $opts = []) {}
        public function render($template, $vars = []) {
            return "[Twig not installed] Cannot render `{$template}`. Run `composer install`.";
        }
    }
    class_alias('Twig_Environment_Stub', 'Twig\\Environment');
}

if (!class_exists('Twig\\Loader\\FilesystemLoader')) {
    class Twig_Loader_FilesystemLoader_Stub {
        private $path;
        public function __construct($path = null) { $this->path = $path; }
    }
    class_alias('Twig_Loader_FilesystemLoader_Stub', 'Twig\\Loader\\FilesystemLoader');
}
