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

/* home.html.twig */
class __TwigTemplate_649dba446f5d5e986168c38cd3856bdd extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home.html.twig"));

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

        yield "Accueil - Café Virtuel";
        
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
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            text-align: center;
            max-width: 800px;
        }

        .logo {
            font-size: 4em;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.3em;
            color: #bbb;
            margin-bottom: 50px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .feature-icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .feature h3 {
            color: white;
            margin-bottom: 10px;
        }

        .feature p {
            color: #ddd;
            font-size: 0.9em;
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            font-size: 1.1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 600;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #8B4513;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: transparent;
            color: white;
        }

        .footer {
            margin-top: 50px;
            color: #999;
            font-size: 0.9em;
        }

        .footer p {
            margin: 10px 0;
        }

        /* Responsive */
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            .subtitle {
                font-size: 1em;
            }

            .buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 149
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 150
        yield "    <div class=\"container\">
        <div class=\"logo\">☕</div>

        <h1>Café Virtuel</h1>
        <p class=\"subtitle\">Votre espace de détente et de convivialité en ligne</p>

        <div class=\"features\">
            <div class=\"feature\">
                <div class=\"feature-icon\">🍰</div>
                <h3>Menu Complet</h3>
                <p>Découvrez nos délicieux cafés, pâtisseries et desserts</p>
            </div>
            <div class=\"feature\">
                <div class=\"feature-icon\">🛒</div>
                <h3>Panier Facile</h3>
                <p>Commandez en ligne avec un panier simple et intuitif</p>
            </div>
            <div class=\"feature\">
                <div class=\"feature-icon\">👥</div>
                <h3>Communauté</h3>
                <p>Rejoignez notre communauté de passionnés du café</p>
            </div>
        </div>

        <div class=\"buttons\">
            <a href=\"";
        // line 175
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" class=\"btn btn-primary\">Se Connecter</a>
            <a href=\"";
        // line 176
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn btn-secondary\">S'Inscrire</a>
        </div>

        <div class=\"footer\">
            <p>Bienvenue! Connectez-vous ou créez un compte pour commencer.</p>
            <p>&copy; 2025 Café Virtuel - Tous droits réservés ☕</p>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home.html.twig";
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
        return array (  276 => 176,  272 => 175,  245 => 150,  235 => 149,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Accueil - Café Virtuel{% endblock %}

{% block stylesheets %}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            text-align: center;
            max-width: 800px;
        }

        .logo {
            font-size: 4em;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 1.3em;
            color: #bbb;
            margin-bottom: 50px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .feature-icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .feature h3 {
            color: white;
            margin-bottom: 10px;
        }

        .feature p {
            color: #ddd;
            font-size: 0.9em;
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 15px 40px;
            font-size: 1.1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 600;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #8B4513;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: transparent;
            color: white;
        }

        .footer {
            margin-top: 50px;
            color: #999;
            font-size: 0.9em;
        }

        .footer p {
            margin: 10px 0;
        }

        /* Responsive */
        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }

            .subtitle {
                font-size: 1em;
            }

            .buttons {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"container\">
        <div class=\"logo\">☕</div>

        <h1>Café Virtuel</h1>
        <p class=\"subtitle\">Votre espace de détente et de convivialité en ligne</p>

        <div class=\"features\">
            <div class=\"feature\">
                <div class=\"feature-icon\">🍰</div>
                <h3>Menu Complet</h3>
                <p>Découvrez nos délicieux cafés, pâtisseries et desserts</p>
            </div>
            <div class=\"feature\">
                <div class=\"feature-icon\">🛒</div>
                <h3>Panier Facile</h3>
                <p>Commandez en ligne avec un panier simple et intuitif</p>
            </div>
            <div class=\"feature\">
                <div class=\"feature-icon\">👥</div>
                <h3>Communauté</h3>
                <p>Rejoignez notre communauté de passionnés du café</p>
            </div>
        </div>

        <div class=\"buttons\">
            <a href=\"{{ path('app_login') }}\" class=\"btn btn-primary\">Se Connecter</a>
            <a href=\"{{ path('app_register') }}\" class=\"btn btn-secondary\">S'Inscrire</a>
        </div>

        <div class=\"footer\">
            <p>Bienvenue! Connectez-vous ou créez un compte pour commencer.</p>
            <p>&copy; 2025 Café Virtuel - Tous droits réservés ☕</p>
        </div>
    </div>
{% endblock %}
", "home.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\home.html.twig");
    }
}
