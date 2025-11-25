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

/* admin/loyalty/list.html.twig */
class __TwigTemplate_b5b410c7f72dc55f54669bf9f9e1775a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/loyalty/list.html.twig"));

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

        yield "Points Fidélité";
        
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
    <h2>Gestion des points fidélité</h2>
    <p>Créditer / débiter des points pour un client.</p>
    <div class=\"table-responsive\">
        <table id=\"loyalty-table\"><thead><tr><th>ID</th><th>Client</th><th>Points</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readLoyalty(){try{return JSON.parse(localStorage.getItem('preview_loyalty')||'null')||[]}catch(e){return[]}}
function saveLoyalty(s){localStorage.setItem('preview_loyalty',JSON.stringify(s))}
function render(){
    const tbody=document.querySelector('#loyalty-table tbody'); tbody.innerHTML='';
    const list=readLoyalty();
    list.forEach(it=>{
        const tr=document.createElement('tr');
        tr.innerHTML = `<td>\${it.id}</td><td>\${it.customer}</td><td>\${it.points}</td>`;
        tbody.appendChild(tr);
    });
}
// init sample
if(!localStorage.getItem('preview_loyalty')){const s=[{id:1,customer:'Alice',points:120},{id:2,customer:'Bob',points:40}]; saveLoyalty(s);} render();
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
        return "admin/loyalty/list.html.twig";
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

{% block page_title %}Points Fidélité{% endblock %}

{% block admin_content %}
<div class=\"card\">
    <h2>Gestion des points fidélité</h2>
    <p>Créditer / débiter des points pour un client.</p>
    <div class=\"table-responsive\">
        <table id=\"loyalty-table\"><thead><tr><th>ID</th><th>Client</th><th>Points</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readLoyalty(){try{return JSON.parse(localStorage.getItem('preview_loyalty')||'null')||[]}catch(e){return[]}}
function saveLoyalty(s){localStorage.setItem('preview_loyalty',JSON.stringify(s))}
function render(){
    const tbody=document.querySelector('#loyalty-table tbody'); tbody.innerHTML='';
    const list=readLoyalty();
    list.forEach(it=>{
        const tr=document.createElement('tr');
        tr.innerHTML = `<td>\${it.id}</td><td>\${it.customer}</td><td>\${it.points}</td>`;
        tbody.appendChild(tr);
    });
}
// init sample
if(!localStorage.getItem('preview_loyalty')){const s=[{id:1,customer:'Alice',points:120},{id:2,customer:'Bob',points:40}]; saveLoyalty(s);} render();
</script>

{% endblock %}
", "admin/loyalty/list.html.twig", "C:\\projectsymf\\smart-coffee-menu\\templates-only\\admin\\loyalty\\list.html.twig");
    }
}
