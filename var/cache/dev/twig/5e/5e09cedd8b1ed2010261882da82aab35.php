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

/* auth/login.html.twig */
class __TwigTemplate_00a061b5a748f342949f028d68224850 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "auth/login.html.twig"));

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

        yield "Connexion - Café Virtuel";
        
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
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
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

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95em;
        }

        input[type=\"email\"],
        input[type=\"password\"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            font-family: inherit;
            transition: all 0.3s;
        }

        input[type=\"email\"]:focus,
        input[type=\"password\"]:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 10px rgba(139, 69, 19, 0.2);
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #e74c3c;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #27ae60;
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

        .btn-login {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            margin-top: 10px;
        }

        .btn-login:hover {
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

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #ddd;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .divider span {
            background: white;
            padding: 0 10px;
            position: relative;
            color: #999;
            font-size: 0.85em;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input {
            margin-right: 8px;
            cursor: pointer;
            width: auto;
        }

        .remember-me label {
            margin-bottom: 0;
            cursor: pointer;
            font-weight: 400;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .auth-card {
                padding: 25px;
            }

            .auth-header h1 {
                font-size: 1.8em;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 216
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 217
        yield "    <div class=\"container\">
        <a href=\"/\" class=\"back-link\">← Retour à l'accueil</a>

        <div class=\"auth-card\">
            <div class=\"auth-header\">
                <h1>☕ Connexion</h1>
                <p>Accédez à votre compte Café Virtuel</p>
            </div>

            ";
        // line 226
        if ((($tmp = (isset($context["success"]) || array_key_exists("success", $context) ? $context["success"] : (function () { throw new RuntimeError('Variable "success" does not exist.', 226, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 227
            yield "                <div class=\"success-message\">
                    ✅ ";
            // line 228
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["success"]) || array_key_exists("success", $context) ? $context["success"] : (function () { throw new RuntimeError('Variable "success" does not exist.', 228, $this->source); })()), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 231
        yield "
            ";
        // line 232
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 232, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 233
            yield "                <div class=\"error-message\">
                    ❌ ";
            // line 234
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 234, $this->source); })()), "html", null, true);
            yield "
                </div>
            ";
        }
        // line 237
        yield "
            <form method=\"POST\">
                <div class=\"form-group\">
                    <label for=\"email\">📧 Email</label>
                    <input type=\"email\" id=\"email\" name=\"email\" required placeholder=\"votre@email.com\">
                </div>

                <div class=\"form-group\">
                    <label for=\"password\">🔐 Mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"password\" required placeholder=\"••••••••\">
                </div>

                <div class=\"remember-me\">
                    <input type=\"checkbox\" id=\"remember\" name=\"remember\">
                    <label for=\"remember\">Se souvenir de moi</label>
                </div>

                <button type=\"submit\" class=\"btn btn-login\">Se Connecter</button>
            </form>

            <div class=\"divider\">
                <span>OU</span>
            </div>

            <div class=\"auth-footer\">
                <p>Pas encore de compte?</p>
                <a href=\"";
        // line 263
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" class=\"btn\" style=\"background: #f0f0f0; color: #8B4513; margin-top: 10px;\">Créer un Compte</a>

                <div style=\"margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;\">
                    <p style=\"font-size: 0.9em;\">Comptes de Test:</p>
                    <p style=\"font-size: 0.85em; color: #999;\">
                        Admin: <strong>admin@cafe.com</strong><br>
                        Client: <strong>client1@email.com</strong>
                    </p>
                </div>
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
        return "auth/login.html.twig";
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
        return array (  376 => 263,  348 => 237,  342 => 234,  339 => 233,  337 => 232,  334 => 231,  328 => 228,  325 => 227,  323 => 226,  312 => 217,  302 => 216,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Connexion - Café Virtuel{% endblock %}

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
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
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

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.95em;
        }

        input[type=\"email\"],
        input[type=\"password\"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1em;
            font-family: inherit;
            transition: all 0.3s;
        }

        input[type=\"email\"]:focus,
        input[type=\"password\"]:focus {
            outline: none;
            border-color: #8B4513;
            box-shadow: 0 0 10px rgba(139, 69, 19, 0.2);
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #e74c3c;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #27ae60;
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

        .btn-login {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            margin-top: 10px;
        }

        .btn-login:hover {
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

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #ddd;
        }

        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .divider span {
            background: white;
            padding: 0 10px;
            position: relative;
            color: #999;
            font-size: 0.85em;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input {
            margin-right: 8px;
            cursor: pointer;
            width: auto;
        }

        .remember-me label {
            margin-bottom: 0;
            cursor: pointer;
            font-weight: 400;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .auth-card {
                padding: 25px;
            }

            .auth-header h1 {
                font-size: 1.8em;
            }
        }
    </style>
{% endblock %}

{% block body %}
    <div class=\"container\">
        <a href=\"/\" class=\"back-link\">← Retour à l'accueil</a>

        <div class=\"auth-card\">
            <div class=\"auth-header\">
                <h1>☕ Connexion</h1>
                <p>Accédez à votre compte Café Virtuel</p>
            </div>

            {% if success %}
                <div class=\"success-message\">
                    ✅ {{ success }}
                </div>
            {% endif %}

            {% if error %}
                <div class=\"error-message\">
                    ❌ {{ error }}
                </div>
            {% endif %}

            <form method=\"POST\">
                <div class=\"form-group\">
                    <label for=\"email\">📧 Email</label>
                    <input type=\"email\" id=\"email\" name=\"email\" required placeholder=\"votre@email.com\">
                </div>

                <div class=\"form-group\">
                    <label for=\"password\">🔐 Mot de passe</label>
                    <input type=\"password\" id=\"password\" name=\"password\" required placeholder=\"••••••••\">
                </div>

                <div class=\"remember-me\">
                    <input type=\"checkbox\" id=\"remember\" name=\"remember\">
                    <label for=\"remember\">Se souvenir de moi</label>
                </div>

                <button type=\"submit\" class=\"btn btn-login\">Se Connecter</button>
            </form>

            <div class=\"divider\">
                <span>OU</span>
            </div>

            <div class=\"auth-footer\">
                <p>Pas encore de compte?</p>
                <a href=\"{{ path('app_register') }}\" class=\"btn\" style=\"background: #f0f0f0; color: #8B4513; margin-top: 10px;\">Créer un Compte</a>

                <div style=\"margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;\">
                    <p style=\"font-size: 0.9em;\">Comptes de Test:</p>
                    <p style=\"font-size: 0.85em; color: #999;\">
                        Admin: <strong>admin@cafe.com</strong><br>
                        Client: <strong>client1@email.com</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "auth/login.html.twig", "C:\\Users\\yesse\\OneDrive\\Bureau\\cafe\\smart-coffee-menu\\templates-only\\auth\\login.html.twig");
    }
}
