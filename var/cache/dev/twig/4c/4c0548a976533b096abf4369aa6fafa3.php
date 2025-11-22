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

/* client/account.html.twig */
class __TwigTemplate_eb4718c393cc5755409b587d4414ed20 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/account.html.twig"));

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

        yield "Mon Compte Client";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_client_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "client_content"));

        // line 6
        yield "
    <!-- Profile card -->
    <div class=\"profile-card\">
        <img src=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "picture", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 9, $this->source); })()), "picture", [], "any", false, false, false, 9), "/images/default-profile.png")) : ("/images/default-profile.png")), "html", null, true);
        yield "\" class=\"profile-pic\">
        <div class=\"profile-info\">
            <h2>";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "name", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 11, $this->source); })()), "name", [], "any", false, false, false, 11), "Nom Client")) : ("Nom Client")), "html", null, true);
        yield "</h2>
            <p>✉️ Email : ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 12, $this->source); })()), "email", [], "any", false, false, false, 12), "email@example.com")) : ("email@example.com")), "html", null, true);
        yield "</p>
            <p>📞 Téléphone : ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "phone", [], "any", true, true, false, 13)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 13, $this->source); })()), "phone", [], "any", false, false, false, 13), "N/A")) : ("N/A")), "html", null, true);
        yield "</p>
            <button class=\"edit-profile-btn\">✏️ Modifier le profil</button>
        </div>
    </div>

    <!-- Summary cards -->
    <div class=\"summary-cards\">
        <div class=\"card\">
            <h3>⭐ Points Fidèle</h3>
            <p>";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "loyalty_points", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 22, $this->source); })()), "loyalty_points", [], "any", false, false, false, 22), ((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "points", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 22, $this->source); })()), "points", [], "any", false, false, false, 22), 0)) : (0)))) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "points", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 22, $this->source); })()), "points", [], "any", false, false, false, 22), 0)) : (0)))), "html", null, true);
        yield "</p>
        </div>
        <div class=\"card\">
            <h3>✅ Événements Approuvés</h3>
            ";
        // line 26
        $context["approvedCount"] = 0;
        // line 27
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "events", [], "any", true, true, false, 27)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 27, $this->source); })()), "events", [], "any", false, false, false, 27), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 28
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "approved", [], "any", false, false, false, 28)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                $context["approvedCount"] = ((isset($context["approvedCount"]) || array_key_exists("approvedCount", $context) ? $context["approvedCount"] : (function () { throw new RuntimeError('Variable "approvedCount" does not exist.', 28, $this->source); })()) + 1);
            }
            // line 29
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        yield "            <p>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["approvedCount"]) || array_key_exists("approvedCount", $context) ? $context["approvedCount"] : (function () { throw new RuntimeError('Variable "approvedCount" does not exist.', 30, $this->source); })()), "html", null, true);
        yield "</p>
        </div>
    </div>

    <!-- Events section (overridable) -->
    <div class=\"section\">
        <h3>📅 Mes Demandes d'Événement</h3>
        <ul class=\"event-list\">
            ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "events", [], "any", true, true, false, 38)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 38, $this->source); })()), "events", [], "any", false, false, false, 38), [])) : ([])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 39
            yield "                <li>
                    <strong>";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "name", [], "any", false, false, false, 40), "html", null, true);
            yield "</strong><br>
                    Date : ";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "date", [], "any", false, false, false, 41), "html", null, true);
            yield "<br>
                    Description : ";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 42), "html", null, true);
            yield "<br>
                    Statut : ";
            // line 43
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "approved", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "✅ Approuvé";
            } else {
                yield "⏳ En attente";
            }
            // line 44
            yield "                </li>
            ";
            $context['_iterated'] = true;
        }
        // line 45
        if (!$context['_iterated']) {
            // line 46
            yield "                <li>Aucune demande d'événement pour le moment.</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        yield "        </ul>
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
        return "client/account.html.twig";
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
        return array (  192 => 48,  185 => 46,  183 => 45,  178 => 44,  172 => 43,  168 => 42,  164 => 41,  160 => 40,  157 => 39,  152 => 38,  140 => 30,  134 => 29,  129 => 28,  124 => 27,  122 => 26,  115 => 22,  103 => 13,  99 => 12,  95 => 11,  90 => 9,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"client/base.html.twig\" %}

{% block title %}Mon Compte Client{% endblock %}

{% block client_content %}

    <!-- Profile card -->
    <div class=\"profile-card\">
        <img src=\"{{ client.picture|default('/images/default-profile.png') }}\" class=\"profile-pic\">
        <div class=\"profile-info\">
            <h2>{{ client.name|default('Nom Client') }}</h2>
            <p>✉️ Email : {{ client.email|default('email@example.com') }}</p>
            <p>📞 Téléphone : {{ client.phone|default('N/A') }}</p>
            <button class=\"edit-profile-btn\">✏️ Modifier le profil</button>
        </div>
    </div>

    <!-- Summary cards -->
    <div class=\"summary-cards\">
        <div class=\"card\">
            <h3>⭐ Points Fidèle</h3>
            <p>{{ client.loyalty_points|default(client.points|default(0)) }}</p>
        </div>
        <div class=\"card\">
            <h3>✅ Événements Approuvés</h3>
            {% set approvedCount = 0 %}
            {% for event in client.events|default([]) %}
                {% if event.approved %}{% set approvedCount = approvedCount + 1 %}{% endif %}
            {% endfor %}
            <p>{{ approvedCount }}</p>
        </div>
    </div>

    <!-- Events section (overridable) -->
    <div class=\"section\">
        <h3>📅 Mes Demandes d'Événement</h3>
        <ul class=\"event-list\">
            {% for event in client.events|default([]) %}
                <li>
                    <strong>{{ event.name }}</strong><br>
                    Date : {{ event.date }}<br>
                    Description : {{ event.description }}<br>
                    Statut : {% if event.approved %}✅ Approuvé{% else %}⏳ En attente{% endif %}
                </li>
            {% else %}
                <li>Aucune demande d'événement pour le moment.</li>
            {% endfor %}
        </ul>
    </div>

{% endblock %}
", "client/account.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\client\\account.html.twig");
    }
}
