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

/* auth/register.html.twig */
class __TwigTemplate_bd37d53763730a52e310ee293841033b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/register.html.twig"));

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

        yield "Inscription - Café Virtuel";
        
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
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .auth-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h1 {
            font-size: 2.5em;
            color: #8B4513;
            margin-bottom: 10px;
        }

        .auth-header p {
            color: #666;
            font-size: 1em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95em;
        }

        input[type=\"text\"],
        input[type=\"email\"],
        input[type=\"password\"],
        input[type=\"tel\"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            font-family: inherit;
            transition: all 0.3s;
        }

        input[type=\"text\"]:focus,
        input[type=\"email\"]:focus,
        input[type=\"password\"]:focus,
        input[type=\"tel\"]:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 10px rgba(139, 69, 19, 0.2);
        }

        .error-list {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #e74c3c;
        }

        .error-list ul {
            list-style: none;
            padding-left: 0;
        }

        .error-list li {
            padding: 5px 0;
        }

        .error-list li::before {
            content: '❌ ';
            margin-right: 5px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-register {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
        }

        .auth-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .auth-footer p {
            color: #666;
            margin-bottom: 10px;
        }

        .auth-footer a {
            color: #8B4513;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .auth-footer a:hover {
            color: #A0522D;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-size: 0.9em;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .password-info {
            font-size: 0.85em;
            color: #999;
            margin-top: 5px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .auth-card {
                padding: 25px;
            }

            .auth-header h1 {
                font-size: 1.8em;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 198
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 199
        yield "    <div class=\"container\">
        <a href=\"/\" class=\"back-link\">← Retour à l'accueil</a>

        <div class=\"auth-card\">
            <div class=\"auth-header\">
                <h1>☕ Inscription</h1>
                <p>Créez votre compte Café Virtuel</p>
            </div>

            ";
        // line 209
        yield "            ";
        $context["has_errors"] = ((array_key_exists("errors", $context) && (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 209, $this->source); })())) || (!Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 209, $this->source); })()), "flashes", ["error"], "method", false, false, false, 209))));
        // line 210
        yield "            ";
        if ((($tmp = (isset($context["has_errors"]) || array_key_exists("has_errors", $context) ? $context["has_errors"] : (function () { throw new RuntimeError('Variable "has_errors" does not exist.', 210, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 211
            yield "                <div class=\"error-list\">
                    <ul>
                        ";
            // line 213
            if ((array_key_exists("errors", $context) && (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 213, $this->source); })()))) {
                // line 214
                yield "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 214, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 215
                    yield "                                <li>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["error"], "html", null, true);
                    yield "</li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 217
                yield "                        ";
            }
            // line 218
            yield "
                        ";
            // line 219
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 219, $this->source); })()), "flashes", ["error"], "method", false, false, false, 219));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 220
                yield "                            <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            yield "                    </ul>
                </div>
            ";
        }
        // line 225
        yield "
            <form method=\"POST\">
                <div class=\"form-row\">
                    <div class=\"form-group\">
                        <label for=\"firstName\">👤 Prénom</label>
                        <input type=\"text\" id=\"firstName\" name=\"firstName\" required placeholder=\"Jean\" 
                               value=\"";
        // line 231
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "firstName", [], "any", true, true, false, 231) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 231, $this->source); })()), "firstName", [], "any", false, false, false, 231)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 231, $this->source); })()), "firstName", [], "any", false, false, false, 231), "html", null, true)) : (""));
        yield "\">
                    </div>

                    <div class=\"form-group\">
                        <label for=\"lastName\">👤 Nom</label>
                        <input type=\"text\" id=\"lastName\" name=\"lastName\" required placeholder=\"Dupont\" 
                               value=\"";
        // line 237
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "lastName", [], "any", true, true, false, 237) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 237, $this->source); })()), "lastName", [], "any", false, false, false, 237)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 237, $this->source); })()), "lastName", [], "any", false, false, false, 237), "html", null, true)) : (""));
        yield "\">
                    </div>
                </div>

                <div class=\"form-group\">
                    <label for=\"email\">📧 Email</label>
                    <input type=\"email\" id=\"email\" name=\"email\" required placeholder=\"votre@email.com\"
                           value=\"";
        // line 244
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "email", [], "any", true, true, false, 244) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 244, $this->source); })()), "email", [], "any", false, false, false, 244)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 244, $this->source); })()), "email", [], "any", false, false, false, 244), "html", null, true)) : (""));
        yield "\">
                </div>

                <div class=\"form-group\">
                    <label for=\"phone\">📱 Téléphone</label>
                    <input type=\"tel\" id=\"phone\" name=\"phone\" placeholder=\"06 12 34 56 78\"
                           value=\"";
        // line 250
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["formData"] ?? null), "phone", [], "any", true, true, false, 250) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 250, $this->source); })()), "phone", [], "any", false, false, false, 250)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formData"]) || array_key_exists("formData", $context) ? $context["formData"] : (function () { throw new RuntimeError('Variable "formData" does not exist.', 250, $this->source); })()), "phone", [], "any", false, false, false, 250), "html", null, true)) : (""));
        yield "\">
                </div>

                <div class=\"form-group\">
                    <label for=\"password\">🔐 Mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"password\" required placeholder=\"••••••••\">
                    <div class=\"password-info\">Minimum 6 caractères</div>
                </div>

                <div class=\"form-group\">
                    <label for=\"confirmPassword\">🔐 Confirmer le mot de passe</label>
                    <input type=\"password\" id=\"confirmPassword\" name=\"confirmPassword\" required placeholder=\"••••••••\">
                </div>

                <button type=\"submit\" class=\"btn btn-register\">Créer Mon Compte</button>
            </form>

            <div class=\"auth-footer\">
                <p>Vous avez déjà un compte?</p>
                <a href=\"";
        // line 269
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" style=\"color: #8B4513; font-weight: 600;\">Se Connecter</a>
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
        return "auth/register.html.twig";
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
        return array (  413 => 269,  391 => 250,  382 => 244,  372 => 237,  363 => 231,  355 => 225,  350 => 222,  341 => 220,  337 => 219,  334 => 218,  331 => 217,  322 => 215,  317 => 214,  315 => 213,  311 => 211,  308 => 210,  305 => 209,  294 => 199,  284 => 198,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Inscription - Café Virtuel{% endblock %}

{% block stylesheets %}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
        }

        .auth-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .auth-header h1 {
            font-size: 2.5em;
            color: #8B4513;
            margin-bottom: 10px;
        }

        .auth-header p {
            color: #666;
            font-size: 1em;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95em;
        }

        input[type=\"text\"],
        input[type=\"email\"],
        input[type=\"password\"],
        input[type=\"tel\"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            font-family: inherit;
            transition: all 0.3s;
        }

        input[type=\"text\"]:focus,
        input[type=\"email\"]:focus,
        input[type=\"password\"]:focus,
        input[type=\"tel\"]:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 10px rgba(139, 69, 19, 0.2);
        }

        .error-list {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #e74c3c;
        }

        .error-list ul {
            list-style: none;
            padding-left: 0;
        }

        .error-list li {
            padding: 5px 0;
        }

        .error-list li::before {
            content: '❌ ';
            margin-right: 5px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-register {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(139, 69, 19, 0.4);
        }

        .auth-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .auth-footer p {
            color: #666;
            margin-bottom: 10px;
        }

        .auth-footer a {
            color: #8B4513;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .auth-footer a:hover {
            color: #A0522D;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-size: 0.9em;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .password-info {
            font-size: 0.85em;
            color: #999;
            margin-top: 5px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .auth-card {
                padding: 25px;
            }

            .auth-header h1 {
                font-size: 1.8em;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"container\">
        <a href=\"/\" class=\"back-link\">← Retour à l'accueil</a>

        <div class=\"auth-card\">
            <div class=\"auth-header\">
                <h1>☕ Inscription</h1>
                <p>Créez votre compte Café Virtuel</p>
            </div>

            {# Safely show validation errors passed as `errors`, and also show any flashed error messages #}
            {% set has_errors = (errors is defined and errors) or (app.flashes('error') is not empty) %}
            {% if has_errors %}
                <div class=\"error-list\">
                    <ul>
                        {% if errors is defined and errors %}
                            {% for error in errors %}
                                <li>{{ error }}</li>
                            {% endfor %}
                        {% endif %}

                        {% for msg in app.flashes('error') %}
                            <li>{{ msg }}</li>
                        {% endfor %}
                    </ul>
                </div>
            {% endif %}

            <form method=\"POST\">
                <div class=\"form-row\">
                    <div class=\"form-group\">
                        <label for=\"firstName\">👤 Prénom</label>
                        <input type=\"text\" id=\"firstName\" name=\"firstName\" required placeholder=\"Jean\" 
                               value=\"{{ formData.firstName ?? '' }}\">
                    </div>

                    <div class=\"form-group\">
                        <label for=\"lastName\">👤 Nom</label>
                        <input type=\"text\" id=\"lastName\" name=\"lastName\" required placeholder=\"Dupont\" 
                               value=\"{{ formData.lastName ?? '' }}\">
                    </div>
                </div>

                <div class=\"form-group\">
                    <label for=\"email\">📧 Email</label>
                    <input type=\"email\" id=\"email\" name=\"email\" required placeholder=\"votre@email.com\"
                           value=\"{{ formData.email ?? '' }}\">
                </div>

                <div class=\"form-group\">
                    <label for=\"phone\">📱 Téléphone</label>
                    <input type=\"tel\" id=\"phone\" name=\"phone\" placeholder=\"06 12 34 56 78\"
                           value=\"{{ formData.phone ?? '' }}\">
                </div>

                <div class=\"form-group\">
                    <label for=\"password\">🔐 Mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"password\" required placeholder=\"••••••••\">
                    <div class=\"password-info\">Minimum 6 caractères</div>
                </div>

                <div class=\"form-group\">
                    <label for=\"confirmPassword\">🔐 Confirmer le mot de passe</label>
                    <input type=\"password\" id=\"confirmPassword\" name=\"confirmPassword\" required placeholder=\"••••••••\">
                </div>

                <button type=\"submit\" class=\"btn btn-register\">Créer Mon Compte</button>
            </form>

            <div class=\"auth-footer\">
                <p>Vous avez déjà un compte?</p>
                <a href=\"{{ path('app_login') }}\" style=\"color: #8B4513; font-weight: 600;\">Se Connecter</a>
            </div>
        </div>
    </div>
{% endblock %}
", "auth/register.html.twig", "C:\\projectsymf\\smart-coffee-menu\\templates-only\\auth\\register.html.twig");
    }
}
