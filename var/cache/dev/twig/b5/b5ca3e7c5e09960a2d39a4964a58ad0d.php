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

/* admin/events/new.html.twig */
class __TwigTemplate_9160d0e84c5b2aa81384edc0df6cfd4b extends Template
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
            'page_title' => [$this, 'block_page_title'],
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/events/new.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Nouvel événement";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 6
        yield "<div class=\"card\">
    <h2>Créer un événement</h2>
    <form id=\"event-form\">
        <div class=\"form-group\">
            <label>Nom</label>
            <input type=\"text\" id=\"title\" required />
        </div>
        <div class=\"form-group\">
            <label>Date</label>
            <input type=\"date\" id=\"date\" required />
        </div>
        <p><button class=\"btn btn-primary\" type=\"submit\">Créer</button> <a class=\"btn btn-secondary\" href=\"/admin/events\">Annuler</a></p>
    </form>
</div>

<script>
function readEvents(){try{return JSON.parse(localStorage.getItem('preview_events')||'null')||[]}catch(e){return[]}}
function saveEvents(e){localStorage.setItem('preview_events',JSON.stringify(e))}
document.getElementById('event-form').addEventListener('submit',function(e){
    e.preventDefault();
    const title=document.getElementById('title').value.trim();
    const date=document.getElementById('date').value;
    const list=readEvents();
    const id = list.length? (Math.max(...list.map(x=>x.id))+1):1;
    list.push({id:id,title:title,date:date});
    saveEvents(list);
    location.href='/admin/events';
});
</script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/events/new.html.twig";
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
        return array (  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Nouvel événement{% endblock %}

{% block admin_content %}
<div class=\"card\">
    <h2>Créer un événement</h2>
    <form id=\"event-form\">
        <div class=\"form-group\">
            <label>Nom</label>
            <input type=\"text\" id=\"title\" required />
        </div>
        <div class=\"form-group\">
            <label>Date</label>
            <input type=\"date\" id=\"date\" required />
        </div>
        <p><button class=\"btn btn-primary\" type=\"submit\">Créer</button> <a class=\"btn btn-secondary\" href=\"/admin/events\">Annuler</a></p>
    </form>
</div>

<script>
function readEvents(){try{return JSON.parse(localStorage.getItem('preview_events')||'null')||[]}catch(e){return[]}}
function saveEvents(e){localStorage.setItem('preview_events',JSON.stringify(e))}
document.getElementById('event-form').addEventListener('submit',function(e){
    e.preventDefault();
    const title=document.getElementById('title').value.trim();
    const date=document.getElementById('date').value;
    const list=readEvents();
    const id = list.length? (Math.max(...list.map(x=>x.id))+1):1;
    list.push({id:id,title:title,date:date});
    saveEvents(list);
    location.href='/admin/events';
});
</script>

{% endblock %}
", "admin/events/new.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\events\\new.html.twig");
    }
}
