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

/* client/event_request_form.html.twig */
class __TwigTemplate_07c214b04a6a43bf95f643b06ab9b30a extends Template
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
            'client_content' => [$this, 'block_client_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "client/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/event_request_form.html.twig"));

        $this->parent = $this->load("client/base.html.twig", 1);
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

        yield "Demander un Événement";
        
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
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        /* Form card styling matching the client dashboard theme */
        .card.form-card {
            max-width: 800px;
            margin: 0 auto 30px auto;
            padding: 32px 28px;
            border-radius: 15px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.08);
            background: #fff;
        }

        .card.form-card h2 {
            color: #34495e;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #2c3e50;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            margin-bottom: 16px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 1em;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: #3498db;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-cancel {
            background: #95a5a6;
            color: #fff;
            border: none;
        }

        .btn-cancel:hover {
            background: #7f8c8d;
        }

        .note {
            margin-top: 16px;
            font-size: 0.9em;
            color: #555;
        }

        @media (max-width: 900px) {
            .card.form-card {
                padding: 20px;
                margin: 0 10px 30px 10px;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 92
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_client_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "client_content"));

        // line 93
        yield "    <div style=\"max-width:800px;margin:20px auto;padding:0 20px;\">
        <div class=\"card form-card\">
            <h2>📝 Demander un Événement</h2>
            <form method=\"post\">
                <div class=\"form-group\">
                    <label for=\"event_name\">Nom de l'événement</label>
                    <input type=\"text\" id=\"event_name\" name=\"event_name\" required />
                </div>
                <div class=\"form-group\">
                    <label for=\"event_date\">Date</label>
                    <input type=\"date\" id=\"event_date\" name=\"event_date\" required />
                </div>
                <div class=\"form-group\">
                    <label for=\"event_description\">Description</label>
                    <textarea id=\"event_description\" name=\"event_description\" rows=\"6\" required></textarea>
                </div>
                <div style=\"display:flex;gap:12px;align-items:center;flex-wrap:wrap;\">
                    <button type=\"submit\" class=\"btn btn-primary\">✅ Envoyer la demande</button>
                    <a href=\"/view?t=client/account.html.twig\" class=\"btn btn-cancel\">🚫 Annuler</a>
                </div>
            </form>
            <div class=\"note\">
                Votre demande sera transmise à l'administrateur pour approbation. Vous recevrez une notification une fois la décision prise.
            </div>
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
        return "client/event_request_form.html.twig";
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
        return array (  190 => 93,  180 => 92,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"client/base.html.twig\" %}

{% block title %}Demander un Événement{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        /* Form card styling matching the client dashboard theme */
        .card.form-card {
            max-width: 800px;
            margin: 0 auto 30px auto;
            padding: 32px 28px;
            border-radius: 15px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.08);
            background: #fff;
        }

        .card.form-card h2 {
            color: #34495e;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #2c3e50;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            margin-bottom: 16px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
            outline: none;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 1em;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: #3498db;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-cancel {
            background: #95a5a6;
            color: #fff;
            border: none;
        }

        .btn-cancel:hover {
            background: #7f8c8d;
        }

        .note {
            margin-top: 16px;
            font-size: 0.9em;
            color: #555;
        }

        @media (max-width: 900px) {
            .card.form-card {
                padding: 20px;
                margin: 0 10px 30px 10px;
            }
        }
    </style>
{% endblock %}

{% block client_content %}
    <div style=\"max-width:800px;margin:20px auto;padding:0 20px;\">
        <div class=\"card form-card\">
            <h2>📝 Demander un Événement</h2>
            <form method=\"post\">
                <div class=\"form-group\">
                    <label for=\"event_name\">Nom de l'événement</label>
                    <input type=\"text\" id=\"event_name\" name=\"event_name\" required />
                </div>
                <div class=\"form-group\">
                    <label for=\"event_date\">Date</label>
                    <input type=\"date\" id=\"event_date\" name=\"event_date\" required />
                </div>
                <div class=\"form-group\">
                    <label for=\"event_description\">Description</label>
                    <textarea id=\"event_description\" name=\"event_description\" rows=\"6\" required></textarea>
                </div>
                <div style=\"display:flex;gap:12px;align-items:center;flex-wrap:wrap;\">
                    <button type=\"submit\" class=\"btn btn-primary\">✅ Envoyer la demande</button>
                    <a href=\"/view?t=client/account.html.twig\" class=\"btn btn-cancel\">🚫 Annuler</a>
                </div>
            </form>
            <div class=\"note\">
                Votre demande sera transmise à l'administrateur pour approbation. Vous recevrez une notification une fois la décision prise.
            </div>
        </div>
    </div>
{% endblock %}
", "client/event_request_form.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\client\\event_request_form.html.twig");
    }
}
