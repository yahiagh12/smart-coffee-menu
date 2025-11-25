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

/* client/base.html.twig */
class __TwigTemplate_ef26bbb5b190b15b6297bb336af55d2e extends Template
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
            'client_content' => [$this, 'block_client_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/base.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Mon Espace";
        
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
        yield "<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f5f5;
        color: #333;
        min-height: 100vh;
    }

    .client-dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar - Matched to Admin */
    .client-sidebar {
        width: 260px;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        padding: 20px 0;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
    }

    .client-sidebar h2 {
        padding: 20px 20px 10px;
        font-size: 1.5em;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 20px;
    }

    .client-sidebar a {
        display: block;
        padding: 12px 20px;
        color: #ecf0f1;
        text-decoration: none;
        transition: all 0.3s;
        border-left: 4px solid transparent;
        margin: 4px 0;
    }

    .client-sidebar a:hover {
        background: rgba(255, 255, 255, 0.1);
        border-left-color: #3498db;
        padding-left: 25px;
    }

    .client-sidebar a.active {
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

    /* Main Content - Matched to Admin */
    .client-main {
        margin-left: 260px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .client-header {
        background: white;
        padding: 20px 30px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .client-header h1 {
        font-size: 1.8em;
        color: #2c3e50;
    }

    .client-header-right {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .client-header-right a {
        color: #3498db;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .client-header-right a:hover {
        background: #ecf0f1;
    }

    .client-content {
        flex: 1;
        padding: 30px;
    }

    /* Profile Card - Updated to match Admin Cards */
    .profile-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #3498db;
    }

    .profile-info h2 {
        color: #2c3e50;
        margin-bottom: 8px;
        font-size: 1.5em;
    }

    .profile-info p {
        color: #555;
        margin-bottom: 6px;
    }

    /* Summary Cards - Matched to Admin Stats Grid */
    .summary-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #3498db;
        text-align: center;
    }

    .card.success {
        border-left-color: #27ae60;
    }

    .card.warning {
        border-left-color: #f39c12;
    }

    .card.danger {
        border-left-color: #e74c3c;
    }

    .card h3 {
        color: #95a5a6;
        font-size: 0.9em;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .card p {
        font-size: 2.5em;
        font-weight: bold;
        color: #2c3e50;
    }

    /* Sections - Matched to Admin */
    .section {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .section h3 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 1.5em;
    }

    .event-list {
        list-style: none;
        padding: 0;
    }

    .event-list li {
        background: #f8f9fa;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 15px;
        border-left: 4px solid #3498db;
    }

    /* Buttons - Matched to Admin */
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

    .edit-profile-btn {
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
        text-decoration: none;
        display: inline-block;
    }

    .edit-profile-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .add-btn {
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 18px;
    }

    .add-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    /* Responsive - Matched to Admin */
    @media (max-width: 768px) {
        .client-sidebar {
            width: 70px;
            padding: 10px 0;
        }

        .client-sidebar h2 {
            font-size: 1em;
            padding: 10px;
            text-align: center;
        }

        .client-sidebar a {
            padding: 12px;
            text-align: center;
            font-size: 0;
        }

        .client-sidebar a::before {
            font-size: 1.2em;
        }

        .client-main {
            margin-left: 70px;
        }

        .client-header {
            flex-direction: column;
            gap: 10px;
        }

        .summary-cards {
            grid-template-columns: 1fr;
        }

        .profile-card {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 328
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 329
        $context["client"] = ((array_key_exists("client", $context)) ? ((isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 329, $this->source); })())) : ([]));
        // line 330
        yield "
<div class=\"client-dashboard\">

    <!-- Sidebar -->
    <aside class=\"client-sidebar\">
        <h2>☕ Mon Espace</h2>
        
        <a href=\"/view?t=client/account.html.twig\" class=\"active\">📊 Tableau de bord</a>
        <a href=\"/view?t=client/event_request_form.html.twig\">📝 Demander un Événement</a>
        
        <div class=\"menu-section\">
            <div class=\"menu-section-title\">Compte</div>
            ";
        // line 343
        yield "            <a href=\"/view?t=auth/login.html.twig\">🚪 Déconnexion</a>
        </div>
    </aside>

    <!-- Main content -->
    <main class=\"client-main\">
        <!-- Header -->
        <header class=\"client-header\">
            <h1>Mon Tableau de Bord</h1>
            <div class=\"client-header-right\">
                <span>👤 Client</span>
                <a href=\"";
        // line 354
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_cafe_home");
        yield "\">🏠 Accueil Café</a>
            </div>
        </header>

        <!-- Content -->
        <section class=\"client-content\">
            ";
        // line 360
        yield from $this->unwrap()->yieldBlock('client_content', $context, $blocks);
        // line 361
        yield "        </section>
    </main>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 360
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_client_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "client_content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "client/base.html.twig";
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
        return array (  477 => 360,  465 => 361,  463 => 360,  454 => 354,  441 => 343,  427 => 330,  425 => 329,  415 => 328,  87 => 6,  77 => 5,  60 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Mon Espace{% endblock %}

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
        min-height: 100vh;
    }

    .client-dashboard {
        display: flex;
        min-height: 100vh;
    }

    /* Sidebar - Matched to Admin */
    .client-sidebar {
        width: 260px;
        background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        color: white;
        padding: 20px 0;
        position: fixed;
        height: 100vh;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
    }

    .client-sidebar h2 {
        padding: 20px 20px 10px;
        font-size: 1.5em;
        border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 20px;
    }

    .client-sidebar a {
        display: block;
        padding: 12px 20px;
        color: #ecf0f1;
        text-decoration: none;
        transition: all 0.3s;
        border-left: 4px solid transparent;
        margin: 4px 0;
    }

    .client-sidebar a:hover {
        background: rgba(255, 255, 255, 0.1);
        border-left-color: #3498db;
        padding-left: 25px;
    }

    .client-sidebar a.active {
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

    /* Main Content - Matched to Admin */
    .client-main {
        margin-left: 260px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .client-header {
        background: white;
        padding: 20px 30px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .client-header h1 {
        font-size: 1.8em;
        color: #2c3e50;
    }

    .client-header-right {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .client-header-right a {
        color: #3498db;
        text-decoration: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .client-header-right a:hover {
        background: #ecf0f1;
    }

    .client-content {
        flex: 1;
        padding: 30px;
    }

    /* Profile Card - Updated to match Admin Cards */
    .profile-card {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #3498db;
    }

    .profile-info h2 {
        color: #2c3e50;
        margin-bottom: 8px;
        font-size: 1.5em;
    }

    .profile-info p {
        color: #555;
        margin-bottom: 6px;
    }

    /* Summary Cards - Matched to Admin Stats Grid */
    .summary-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-left: 5px solid #3498db;
        text-align: center;
    }

    .card.success {
        border-left-color: #27ae60;
    }

    .card.warning {
        border-left-color: #f39c12;
    }

    .card.danger {
        border-left-color: #e74c3c;
    }

    .card h3 {
        color: #95a5a6;
        font-size: 0.9em;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .card p {
        font-size: 2.5em;
        font-weight: bold;
        color: #2c3e50;
    }

    /* Sections - Matched to Admin */
    .section {
        background: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .section h3 {
        color: #2c3e50;
        margin-bottom: 20px;
        font-size: 1.5em;
    }

    .event-list {
        list-style: none;
        padding: 0;
    }

    .event-list li {
        background: #f8f9fa;
        border-radius: 5px;
        margin-bottom: 10px;
        padding: 15px;
        border-left: 4px solid #3498db;
    }

    /* Buttons - Matched to Admin */
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

    .edit-profile-btn {
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
        text-decoration: none;
        display: inline-block;
    }

    .edit-profile-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    .add-btn {
        background: #3498db;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 18px;
    }

    .add-btn:hover {
        background: #2980b9;
        transform: translateY(-2px);
    }

    /* Responsive - Matched to Admin */
    @media (max-width: 768px) {
        .client-sidebar {
            width: 70px;
            padding: 10px 0;
        }

        .client-sidebar h2 {
            font-size: 1em;
            padding: 10px;
            text-align: center;
        }

        .client-sidebar a {
            padding: 12px;
            text-align: center;
            font-size: 0;
        }

        .client-sidebar a::before {
            font-size: 1.2em;
        }

        .client-main {
            margin-left: 70px;
        }

        .client-header {
            flex-direction: column;
            gap: 10px;
        }

        .summary-cards {
            grid-template-columns: 1fr;
        }

        .profile-card {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
    }
</style>
{% endblock %}

{% block body %}
{% set client = client is defined ? client : {} %}

<div class=\"client-dashboard\">

    <!-- Sidebar -->
    <aside class=\"client-sidebar\">
        <h2>☕ Mon Espace</h2>
        
        <a href=\"/view?t=client/account.html.twig\" class=\"active\">📊 Tableau de bord</a>
        <a href=\"/view?t=client/event_request_form.html.twig\">📝 Demander un Événement</a>
        
        <div class=\"menu-section\">
            <div class=\"menu-section-title\">Compte</div>
            {# Removed Paramètres link per request #}
            <a href=\"/view?t=auth/login.html.twig\">🚪 Déconnexion</a>
        </div>
    </aside>

    <!-- Main content -->
    <main class=\"client-main\">
        <!-- Header -->
        <header class=\"client-header\">
            <h1>Mon Tableau de Bord</h1>
            <div class=\"client-header-right\">
                <span>👤 Client</span>
                <a href=\"{{ path('app_cafe_home') }}\">🏠 Accueil Café</a>
            </div>
        </header>

        <!-- Content -->
        <section class=\"client-content\">
            {% block client_content %}{% endblock %}
        </section>
    </main>
</div>

{% endblock %}", "client/base.html.twig", "C:\\Users\\yesse\\OneDrive\\Bureau\\cafe\\smart-coffee-menu\\templates-only\\client\\base.html.twig");
    }
}
