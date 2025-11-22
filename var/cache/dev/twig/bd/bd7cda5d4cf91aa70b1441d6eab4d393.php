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

/* traiteur/orders.html.twig */
class __TwigTemplate_cdc183dcca3de44bebb72f40f423c0e4 extends Template
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
            'heading' => [$this, 'block_heading'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "traiteur/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "traiteur/orders.html.twig"));

        $this->parent = $this->load("traiteur/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Gérer les commandes";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_heading(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "heading"));

        yield "Gérer les commandes";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 5
        yield "<div class=\"card\">
    <h3>Commandes</h3>
    <table id=\"orders-table\">
        <thead><tr><th>ID</th><th>Client</th><th>Items</th><th>Status</th><th>Action</th></tr></thead>
        <tbody></tbody>
    </table>
    <p style=\"margin-top:12px\"><a class=\"btn\" href=\"/traiteur/dashboard\">Retour</a></p>
</div>

<script>
function readOrders(){try{return JSON.parse(localStorage.getItem('preview_orders')||'null')||[]}catch(e){return[]}}
function saveOrders(o){localStorage.setItem('preview_orders',JSON.stringify(o))}
function render(){
    const tbody=document.querySelector('#orders-table tbody'); tbody.innerHTML='';
    const orders=readOrders();
    orders.forEach(o=>{
        const tr=document.createElement('tr');
        tr.innerHTML = `<td>\${o.id}</td><td>\${o.customer}</td><td>\${o.items.join(', ')}</td><td>\${o.status}</td><td><button data-id=\"\${o.id}\" class=\"btn\">Marquer comme prêt</button></td>`;
        tbody.appendChild(tr);
    });
    document.querySelectorAll('#orders-table button').forEach(b=>b.addEventListener('click',e=>{
        const id=parseInt(e.currentTarget.dataset.id,10);
        const list=readOrders();
        for(const it of list) if(it.id===id) it.status='ready';
        saveOrders(list); render();
    }));
}
render();
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
        return "traiteur/orders.html.twig";
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
        return array (  103 => 5,  93 => 4,  76 => 3,  59 => 2,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'traiteur/base.html.twig' %}
{% block title %}Gérer les commandes{% endblock %}
{% block heading %}Gérer les commandes{% endblock %}
{% block content %}
<div class=\"card\">
    <h3>Commandes</h3>
    <table id=\"orders-table\">
        <thead><tr><th>ID</th><th>Client</th><th>Items</th><th>Status</th><th>Action</th></tr></thead>
        <tbody></tbody>
    </table>
    <p style=\"margin-top:12px\"><a class=\"btn\" href=\"/traiteur/dashboard\">Retour</a></p>
</div>

<script>
function readOrders(){try{return JSON.parse(localStorage.getItem('preview_orders')||'null')||[]}catch(e){return[]}}
function saveOrders(o){localStorage.setItem('preview_orders',JSON.stringify(o))}
function render(){
    const tbody=document.querySelector('#orders-table tbody'); tbody.innerHTML='';
    const orders=readOrders();
    orders.forEach(o=>{
        const tr=document.createElement('tr');
        tr.innerHTML = `<td>\${o.id}</td><td>\${o.customer}</td><td>\${o.items.join(', ')}</td><td>\${o.status}</td><td><button data-id=\"\${o.id}\" class=\"btn\">Marquer comme prêt</button></td>`;
        tbody.appendChild(tr);
    });
    document.querySelectorAll('#orders-table button').forEach(b=>b.addEventListener('click',e=>{
        const id=parseInt(e.currentTarget.dataset.id,10);
        const list=readOrders();
        for(const it of list) if(it.id===id) it.status='ready';
        saveOrders(list); render();
    }));
}
render();
</script>

{% endblock %}
", "traiteur/orders.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\traiteur\\orders.html.twig");
    }
}
