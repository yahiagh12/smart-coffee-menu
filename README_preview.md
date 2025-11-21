# Twig templates preview

This small preview scaffold lets you render the Twig templates that were preserved in `templates-only/`.

Requirements
- PHP 8+
- Composer

Setup
1. Install dependencies in the project root:

   composer install

2. Start the built-in PHP server from the project root:

   php -S 127.0.0.1:8000 -t public

3. Open your browser:

   http://127.0.0.1:8000/

Usage
- `/` — lists all `.twig` templates under `templates-only/`.
- `/view?t=path/to/template.twig` — render the selected template.

Notes
- The preview router provides a minimal environment and passes a basic `app` array and `$_GET`/`$_POST` variables to templates. Some templates that expect Symfony services or global variables may fail to render fully.
- This is intended for local preview purposes only. Do not expose it in production.
