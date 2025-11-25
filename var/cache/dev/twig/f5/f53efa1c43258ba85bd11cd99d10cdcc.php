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

/* traiteur/base.html.twig */
class __TwigTemplate_6421e18f20cb84963e62acec50975b51 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'heading' => [$this, 'block_heading'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "traiteur/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">
        <title>Traiteur - ";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <style>
            body{font-family:Segoe UI,Arial,Helvetica,sans-serif;background:#f4f6f8;color:#222}
            .layout{display:flex;min-height:100vh}
            .sidebar{width:220px;background:#2d3748;color:#fff;padding:20px}
            .sidebar a{color:#cbd5e1;display:block;padding:10px 8px;text-decoration:none;border-radius:4px}
            .sidebar a:hover{background:#1f2937;color:#fff}
            .main{flex:1;padding:24px}
            .top{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
            .card{background:#fff;padding:18px;border-radius:8px;box-shadow:0 2px 6px rgba(0,0,0,0.06);margin-bottom:14px}
            .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px}
            .btn{display:inline-block;padding:8px 12px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none}
            .toggle{display:inline-block;padding:6px 10px;border-radius:18px;background:#e5e7eb;cursor:pointer}
            .toggle.on{background:#10b981;color:#fff}
            table{width:100%;border-collapse:collapse}
            th,td{padding:10px;border-bottom:1px solid #eef2f6;text-align:left}
        </style>
    </head>
    <body>
        <div class=\"layout\">
            <aside class=\"sidebar\">
                <h3>☕ Traiteur</h3>
                <a href=\"";
        // line 28
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("traiteur_dashboard");
        yield "\">Tableau de bord</a>
                <a href=\"";
        // line 29
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("traiteur_dashboard_products");
        yield "\">Produits</a>
            </aside>
            <main class=\"main\">
                <div class=\"top\">
                    <h2>";
        // line 33
        yield from $this->unwrap()->yieldBlock('heading', $context, $blocks);
        yield "</h2>
                    <div>
                        <a class=\"btn\" href=\"/\">Retour list</a>
                    </div>
                </div>
                ";
        // line 38
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 39
        yield "            </main>
        </div>
    </body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Dashboard";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 33
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_heading(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "heading"));

        yield "Dashboard Traiteur";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 38
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "traiteur/base.html.twig";
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
        return array (  147 => 38,  130 => 33,  113 => 6,  101 => 39,  99 => 38,  91 => 33,  84 => 29,  80 => 28,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\">
        <title>Traiteur - {% block title %}Dashboard{% endblock %}</title>
        <style>
            body{font-family:Segoe UI,Arial,Helvetica,sans-serif;background:#f4f6f8;color:#222}
            .layout{display:flex;min-height:100vh}
            .sidebar{width:220px;background:#2d3748;color:#fff;padding:20px}
            .sidebar a{color:#cbd5e1;display:block;padding:10px 8px;text-decoration:none;border-radius:4px}
            .sidebar a:hover{background:#1f2937;color:#fff}
            .main{flex:1;padding:24px}
            .top{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
            .card{background:#fff;padding:18px;border-radius:8px;box-shadow:0 2px 6px rgba(0,0,0,0.06);margin-bottom:14px}
            .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px}
            .btn{display:inline-block;padding:8px 12px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none}
            .toggle{display:inline-block;padding:6px 10px;border-radius:18px;background:#e5e7eb;cursor:pointer}
            .toggle.on{background:#10b981;color:#fff}
            table{width:100%;border-collapse:collapse}
            th,td{padding:10px;border-bottom:1px solid #eef2f6;text-align:left}
        </style>
    </head>
    <body>
        <div class=\"layout\">
            <aside class=\"sidebar\">
                <h3>☕ Traiteur</h3>
                <a href=\"{{ path('traiteur_dashboard') }}\">Tableau de bord</a>
                <a href=\"{{ path('traiteur_dashboard_products') }}\">Produits</a>
            </aside>
            <main class=\"main\">
                <div class=\"top\">
                    <h2>{% block heading %}Dashboard Traiteur{% endblock %}</h2>
                    <div>
                        <a class=\"btn\" href=\"/\">Retour list</a>
                    </div>
                </div>
                {% block content %}{% endblock %}
            </main>
        </div>
    </body>
</html>
", "traiteur/base.html.twig", "C:\\Users\\yesse\\OneDrive\\Bureau\\cafe\\smart-coffee-menu\\templates-only\\traiteur\\base.html.twig");
    }
}
