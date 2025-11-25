<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/base.html.twig */
class __TwigTemplate_7a567a3e7985b0b94bbd96272026d109 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'page_title' => [$this, 'block_page_title'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_notification.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/base.html.twig"));

        $this->parent = $this->load("base_notification.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Admin - ";
        yield from         $this->unwrap()->yieldBlock("page_title", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .admin-sidebar h2 {
            padding: 20px 20px 10px;
            font-size: 1.5em;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .admin-sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .admin-sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #3498db;
            padding-left: 25px;
        }

        .admin-sidebar a.active {
            background: rgba(52, 152, 219, 0.2);
            border-left-color: #3498db;
            color: #3498db;
        }

        .menu-section {
            margin-top: 20px;
        }

        .menu-section-title {
            padding: 10px 20px;
            font-size: 0.85em;
            color: #95a5a6;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Main Content */
        .admin-main {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .admin-header {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-header h1 {
            font-size: 1.8em;
            color: #2c3e50;
        }

        .admin-header-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .admin-header-right a {
            color: #3498db;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .admin-header-right a:hover {
            background: #ecf0f1;
        }

        .admin-content {
            flex: 1;
            padding: 30px;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #3498db;
        }

        .stat-card.success {
            border-left-color: #27ae60;
        }

        .stat-card.warning {
            border-left-color: #f39c12;
        }

        .stat-card.danger {
            border-left-color: #e74c3c;
        }

        .stat-card-label {
            color: #95a5a6;
            font-size: 0.9em;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .stat-card-value {
            font-size: 2.5em;
            font-weight: bold;
            color: #2c3e50;
        }

        /* Tables */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
        }

        table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #dee2e6;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }

        table tbody tr:hover {
            background: #f8f9fa;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-success {
            background: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.9em;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        input[type=\"text\"],
        input[type=\"email\"],
        input[type=\"password\"],
        input[type=\"number\"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            font-family: inherit;
        }

        input[type=\"text\"]:focus,
        input[type=\"email\"]:focus,
        input[type=\"password\"]:focus,
        input[type=\"number\"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 70px;
                padding: 10px 0;
            }

            .admin-sidebar h2 {
                font-size: 1em;
                padding: 10px;
                text-align: center;
            }

            .admin-sidebar a {
                padding: 12px;
                text-align: center;
                font-size: 0;
            }

            .admin-sidebar a::before {
                font-size: 1.2em;
            }

            .admin-main {
                margin-left: 70px;
            }

            .admin-header {
                flex-direction: column;
                gap: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 0.9em;
            }

            table th, table td {
                padding: 8px;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 377
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 378
        yield "    <div class=\"admin-container\">
        <!-- Sidebar -->
        <aside class=\"admin-sidebar\">
            <h2>☕ ";
        // line 381
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", true, true, false, 381) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 381, $this->source); })()), "user", [], "any", false, false, false, 381)))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 381), "getName", [], "method", true, true, false, 381)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 381, $this->source); })()), "user", [], "any", false, false, false, 381), "getName", [], "method", false, false, false, 381), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 381), "getUserIdentifier", [], "method", true, true, false, 381)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 381, $this->source); })()), "user", [], "any", false, false, false, 381), "getUserIdentifier", [], "method", false, false, false, 381), "Admin")) : ("Admin")))) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 381), "getUserIdentifier", [], "method", true, true, false, 381)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 381, $this->source); })()), "user", [], "any", false, false, false, 381), "getUserIdentifier", [], "method", false, false, false, 381), "Admin")) : ("Admin")))), "html", null, true);
        } else {
            yield "Admin";
        }
        yield "</h2>

            <a href=\"";
        // line 383
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" class=\"";
        if (CoreExtension::inFilter("dashboard", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 383, $this->source); })()), "request", [], "any", false, false, false, 383), "attributes", [], "any", false, false, false, 383), "get", ["_route", ""], "method", false, false, false, 383))) {
            yield "active";
        }
        yield "\">
                📊 Dashboard
            </a>

            <div class=\"menu-section\">
                <div class=\"menu-section-title\">Gestion</div>
                <a href=\"";
        // line 389
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_list");
        yield "\" class=\"";
        if (CoreExtension::inFilter("users", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 389, $this->source); })()), "request", [], "any", false, false, false, 389), "attributes", [], "any", false, false, false, 389), "get", ["_route", ""], "method", false, false, false, 389))) {
            yield "active";
        }
        yield "\">
                    👥 Utilisateurs
                </a>
                <a href=\"";
        // line 392
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menu_list");
        yield "\" class=\"";
        if (CoreExtension::inFilter("menu", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 392, $this->source); })()), "request", [], "any", false, false, false, 392), "attributes", [], "any", false, false, false, 392), "get", ["_route", ""], "method", false, false, false, 392))) {
            yield "active";
        }
        yield "\">
                    🍰 Menu
                </a>
                <a href=\"";
        // line 395
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_list");
        yield "\" class=\"";
        if (CoreExtension::inFilter("events", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 395, $this->source); })()), "request", [], "any", false, false, false, 395), "attributes", [], "any", false, false, false, 395), "get", ["_route", ""], "method", false, false, false, 395))) {
            yield "active";
        }
        yield "\">
                    🎫 Événements
                </a>
                ";
        // line 399
        yield "                <a href=\"/admin/suggestions/list\" class=\"";
        if (CoreExtension::inFilter("suggestions", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 399, $this->source); })()), "request", [], "any", false, false, false, 399), "attributes", [], "any", false, false, false, 399), "get", ["_route", ""], "method", false, false, false, 399))) {
            yield "active";
        }
        yield "\">
                    💡 Suggestions
                </a>
                <a href=\"/admin/loyalty\" class=\"";
        // line 402
        if (CoreExtension::inFilter("loyalty", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 402, $this->source); })()), "request", [], "any", false, false, false, 402), "attributes", [], "any", false, false, false, 402), "get", ["_route", ""], "method", false, false, false, 402))) {
            yield "active";
        }
        yield "\">
                    ⭐ Points Fidélité
                </a>
                ";
        // line 406
        yield "            </div>

            <div class=\"menu-section\">
                <div class=\"menu-section-title\">Autres</div>
                <a href=\"";
        // line 410
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings");
        yield "\">⚙️ Paramètres</a>
                <a href=\"";
        // line 411
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" onclick=\"localStorage.clear();\" style=\"color: #e74c3c;\">🚪 Déconnexion</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class=\"admin-main\">
            <!-- Header -->
            <header class=\"admin-header\">
                <h1>";
        // line 419
        yield from $this->unwrap()->yieldBlock('page_title', $context, $blocks);
        yield "</h1>
                <div class=\"admin-header-right\">
                    <span>👤 ";
        // line 421
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", true, true, false, 421) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 421, $this->source); })()), "user", [], "any", false, false, false, 421)))) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 421), "getName", [], "method", true, true, false, 421)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 421, $this->source); })()), "user", [], "any", false, false, false, 421), "getName", [], "method", false, false, false, 421), ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 421), "getUserIdentifier", [], "method", true, true, false, 421)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 421, $this->source); })()), "user", [], "any", false, false, false, 421), "getUserIdentifier", [], "method", false, false, false, 421), "Admin")) : ("Admin")))) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, true, false, 421), "getUserIdentifier", [], "method", true, true, false, 421)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 421, $this->source); })()), "user", [], "any", false, false, false, 421), "getUserIdentifier", [], "method", false, false, false, 421), "Admin")) : ("Admin")))), "html", null, true);
        } else {
            yield "Admin";
        }
        yield "</span>
                    <a href=\"";
        // line 422
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" onclick=\"localStorage.clear();\" style=\"color: #e74c3c;\">🚪 Déconnexion</a>
                </div>
            </header>

            <!-- Content -->
            <div class=\"admin-content\">
                ";
        // line 428
        yield from $this->unwrap()->yieldBlock('admin_content', $context, $blocks);
        // line 429
        yield "            </div>
        </main>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 419
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Tableau de Bord";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 428
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  623 => 428,  606 => 419,  595 => 429,  593 => 428,  584 => 422,  576 => 421,  571 => 419,  560 => 411,  556 => 410,  550 => 406,  542 => 402,  533 => 399,  523 => 395,  513 => 392,  503 => 389,  490 => 383,  481 => 381,  476 => 378,  466 => 377,  89 => 6,  79 => 5,  61 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base_notification.html.twig\" %}

{% block title %}Admin - {{ block('page_title') }}{% endblock %}

{% block stylesheets %}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .admin-sidebar h2 {
            padding: 20px 20px 10px;
            font-size: 1.5em;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .admin-sidebar a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
        }

        .admin-sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #3498db;
            padding-left: 25px;
        }

        .admin-sidebar a.active {
            background: rgba(52, 152, 219, 0.2);
            border-left-color: #3498db;
            color: #3498db;
        }

        .menu-section {
            margin-top: 20px;
        }

        .menu-section-title {
            padding: 10px 20px;
            font-size: 0.85em;
            color: #95a5a6;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Main Content */
        .admin-main {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .admin-header {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .admin-header h1 {
            font-size: 1.8em;
            color: #2c3e50;
        }

        .admin-header-right {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .admin-header-right a {
            color: #3498db;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .admin-header-right a:hover {
            background: #ecf0f1;
        }

        .admin-content {
            flex: 1;
            padding: 30px;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.5em;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #3498db;
        }

        .stat-card.success {
            border-left-color: #27ae60;
        }

        .stat-card.warning {
            border-left-color: #f39c12;
        }

        .stat-card.danger {
            border-left-color: #e74c3c;
        }

        .stat-card-label {
            color: #95a5a6;
            font-size: 0.9em;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .stat-card-value {
            font-size: 2.5em;
            font-weight: bold;
            color: #2c3e50;
        }

        /* Tables */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #f8f9fa;
        }

        table th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            color: #2c3e50;
            border-bottom: 2px solid #dee2e6;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
        }

        table tbody tr:hover {
            background: #f8f9fa;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-success {
            background: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.9em;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        input[type=\"text\"],
        input[type=\"email\"],
        input[type=\"password\"],
        input[type=\"number\"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            font-family: inherit;
        }

        input[type=\"text\"]:focus,
        input[type=\"email\"]:focus,
        input[type=\"password\"]:focus,
        input[type=\"number\"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-warning {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 70px;
                padding: 10px 0;
            }

            .admin-sidebar h2 {
                font-size: 1em;
                padding: 10px;
                text-align: center;
            }

            .admin-sidebar a {
                padding: 12px;
                text-align: center;
                font-size: 0;
            }

            .admin-sidebar a::before {
                font-size: 1.2em;
            }

            .admin-main {
                margin-left: 70px;
            }

            .admin-header {
                flex-direction: column;
                gap: 10px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            table {
                font-size: 0.9em;
            }

            table th, table td {
                padding: 8px;
            }
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"admin-container\">
        <!-- Sidebar -->
        <aside class=\"admin-sidebar\">
            <h2>☕ {% if app.user is defined and app.user is not null %}{{ app.user.getName()|default(app.user.getUserIdentifier()|default('Admin')) }}{% else %}Admin{% endif %}</h2>

            <a href=\"{{ path('admin_dashboard') }}\" class=\"{% if 'dashboard' in app.request.attributes.get('_route', '') %}active{% endif %}\">
                📊 Dashboard
            </a>

            <div class=\"menu-section\">
                <div class=\"menu-section-title\">Gestion</div>
                <a href=\"{{ path('admin_users_list') }}\" class=\"{% if 'users' in app.request.attributes.get('_route', '') %}active{% endif %}\">
                    👥 Utilisateurs
                </a>
                <a href=\"{{ path('admin_menu_list') }}\" class=\"{% if 'menu' in app.request.attributes.get('_route', '') %}active{% endif %}\">
                    🍰 Menu
                </a>
                <a href=\"{{ path('admin_events_list') }}\" class=\"{% if 'events' in app.request.attributes.get('_route', '') %}active{% endif %}\">
                    🎫 Événements
                </a>
                {# Removed separate manage pages; CRUD is inline on list pages #}
                <a href=\"/admin/suggestions/list\" class=\"{% if 'suggestions' in app.request.attributes.get('_route', '') %}active{% endif %}\">
                    💡 Suggestions
                </a>
                <a href=\"/admin/loyalty\" class=\"{% if 'loyalty' in app.request.attributes.get('_route', '') %}active{% endif %}\">
                    ⭐ Points Fidélité
                </a>
                {# Orders removed from admin menu per request #}
            </div>

            <div class=\"menu-section\">
                <div class=\"menu-section-title\">Autres</div>
                <a href=\"{{ path('admin_settings') }}\">⚙️ Paramètres</a>
                <a href=\"{{ path('app_logout') }}\" onclick=\"localStorage.clear();\" style=\"color: #e74c3c;\">🚪 Déconnexion</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class=\"admin-main\">
            <!-- Header -->
            <header class=\"admin-header\">
                <h1>{% block page_title %}Tableau de Bord{% endblock %}</h1>
                <div class=\"admin-header-right\">
                    <span>👤 {% if app.user is defined and app.user is not null %}{{ app.user.getName()|default(app.user.getUserIdentifier()|default('Admin')) }}{% else %}Admin{% endif %}</span>
                    <a href=\"{{ path('app_logout') }}\" onclick=\"localStorage.clear();\" style=\"color: #e74c3c;\">🚪 Déconnexion</a>
                </div>
            </header>

            <!-- Content -->
            <div class=\"admin-content\">
                {% block admin_content %}{% endblock %}
            </div>
        </main>
    </div>
{% endblock %}
", "admin/base.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\base.html.twig");
    }
}
