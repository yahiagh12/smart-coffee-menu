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

/* traiteur/products.html.twig */
class __TwigTemplate_32b2f0180829f0162d13fb562038039a extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "traiteur/products.html.twig"));

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

        yield "Disponibilité des produits";
        
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

        yield "Disponibilité des produits";
        
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
    <h3>Produits</h3>
    <table id=\"products-table\">
        <thead><tr><th>Produit</th><th>Disponible</th></tr></thead>
        <tbody></tbody>
    </table>
    <p style=\"margin-top:12px\"><a class=\"btn\" href=\"/traiteur/dashboard\">Retour</a></p>
</div>

<script>
function readProducts(){try{return JSON.parse(localStorage.getItem('preview_products')||'null')||[]}catch(e){return[]}}
function saveProducts(p){localStorage.setItem('preview_products',JSON.stringify(p))}
function render(){
    const tbody=document.querySelector('#products-table tbody'); tbody.innerHTML='';
    const products=readProducts();
    products.forEach(p=>{
        const tr=document.createElement('tr');
        const btn=document.createElement('span');
        btn.className='toggle '+(p.available? 'on':''); btn.textContent = p.available? 'Oui':'Non';
        btn.style.cursor='pointer'; btn.dataset.id=p.id;
        btn.addEventListener('click',()=>{
            p.available = !p.available; saveProducts(products); render();
        });
        const tdName=document.createElement('td'); tdName.textContent=p.name;
        const tdToggle=document.createElement('td'); tdToggle.appendChild(btn);
        tr.appendChild(tdName); tr.appendChild(tdToggle); tbody.appendChild(tr);
    });
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
        return "traiteur/products.html.twig";
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
{% block title %}Disponibilité des produits{% endblock %}
{% block heading %}Disponibilité des produits{% endblock %}
{% block content %}
<div class=\"card\">
    <h3>Produits</h3>
    <table id=\"products-table\">
        <thead><tr><th>Produit</th><th>Disponible</th></tr></thead>
        <tbody></tbody>
    </table>
    <p style=\"margin-top:12px\"><a class=\"btn\" href=\"/traiteur/dashboard\">Retour</a></p>
</div>

<script>
function readProducts(){try{return JSON.parse(localStorage.getItem('preview_products')||'null')||[]}catch(e){return[]}}
function saveProducts(p){localStorage.setItem('preview_products',JSON.stringify(p))}
function render(){
    const tbody=document.querySelector('#products-table tbody'); tbody.innerHTML='';
    const products=readProducts();
    products.forEach(p=>{
        const tr=document.createElement('tr');
        const btn=document.createElement('span');
        btn.className='toggle '+(p.available? 'on':''); btn.textContent = p.available? 'Oui':'Non';
        btn.style.cursor='pointer'; btn.dataset.id=p.id;
        btn.addEventListener('click',()=>{
            p.available = !p.available; saveProducts(products); render();
        });
        const tdName=document.createElement('td'); tdName.textContent=p.name;
        const tdToggle=document.createElement('td'); tdToggle.appendChild(btn);
        tr.appendChild(tdName); tr.appendChild(tdToggle); tbody.appendChild(tr);
    });
}
render();
</script>

{% endblock %}
", "traiteur/products.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\traiteur\\products.html.twig");
    }
}
