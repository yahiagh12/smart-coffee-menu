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

/* admin/suggestions/list.html.twig */
class __TwigTemplate_a9067498b8cf5c5d18c8ceab66b4fafb extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/suggestions/list.html.twig"));

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

        yield "Suggestions";
        
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
    <h2>Suggestions de Produits</h2>
    <p>Sur cette page vous pouvez marquer les produits du menu comme \"suggestion\" (coché = suggéré).</p>
    <div class=\"table-responsive\">
        <table id=\"suggestions-table\"><thead><tr><th></th><th>Nom</th><th>Catégorie</th><th>Prix</th><th>Stock</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readMenu(){try{return JSON.parse(localStorage.getItem('preview_menu')||'null')||[]}catch(e){return[]}}
function readProductSuggestions(){try{return JSON.parse(localStorage.getItem('preview_product_suggestions')||'null')||[]}catch(e){return[]}}
function saveProductSuggestions(s){localStorage.setItem('preview_product_suggestions',JSON.stringify(s))}

function render(){
    const tbody=document.querySelector('#suggestions-table tbody'); tbody.innerHTML='';
    const menu = readMenu();
    const suggestions = readProductSuggestions();
    menu.forEach(it=>{
        const tr=document.createElement('tr');
        const checked = suggestions.indexOf(it.id)!==-1 ? 'checked' : '';
        const price = it.price || '';
        tr.innerHTML = `
            <td style=\"width:40px;text-align:center;\"><input type=\"checkbox\" class=\"suggest-check\" data-id=\"\${it.id}\" \${checked}></td>
            <td>\${escapeHtml(it.name||'')}</td>
            <td>\${escapeHtml(it.category||'')}</td>
            <td>\${escapeHtml(price)}</td>
            <td>\${escapeHtml(String(it.stock||0))}</td>
        `;
        tbody.appendChild(tr);
    });

    document.querySelectorAll('.suggest-check').forEach(cb=>{
        cb.addEventListener('change', function(e){
            const id = parseInt(this.dataset.id,10);
            let list = readProductSuggestions();
            if(this.checked){ if(list.indexOf(id)===-1) list.push(id); }
            else { list = list.filter(x=>x!==id); }
            saveProductSuggestions(list);
        });
    });
}

function escapeHtml(s){ if(!s) return ''; return String(s).replace(/[&<>\\\"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','\\\"':'&quot;',\"'\":'&#39;'}[m]; }); }

// ensure there is a menu to display (init sample if missing)
if(!localStorage.getItem('preview_menu')){
    const sample=[{id:1,name:'Espresso',category:'Cafés',price:'2,50€',stock:45},{id:2,name:'Croissant',category:'Pâtisseries',price:'2,00€',stock:5},{id:3,name:'Tiramisu',category:'Desserts',price:'4,50€',stock:0}];
    localStorage.setItem('preview_menu', JSON.stringify(sample));
}

// initialize suggestions array if missing
if(!localStorage.getItem('preview_product_suggestions')){ localStorage.setItem('preview_product_suggestions', JSON.stringify([])); }

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
        return "admin/suggestions/list.html.twig";
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

{% block page_title %}Suggestions{% endblock %}

{% block admin_content %}
<div class=\"card\">
    <h2>Suggestions de Produits</h2>
    <p>Sur cette page vous pouvez marquer les produits du menu comme \"suggestion\" (coché = suggéré).</p>
    <div class=\"table-responsive\">
        <table id=\"suggestions-table\"><thead><tr><th></th><th>Nom</th><th>Catégorie</th><th>Prix</th><th>Stock</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readMenu(){try{return JSON.parse(localStorage.getItem('preview_menu')||'null')||[]}catch(e){return[]}}
function readProductSuggestions(){try{return JSON.parse(localStorage.getItem('preview_product_suggestions')||'null')||[]}catch(e){return[]}}
function saveProductSuggestions(s){localStorage.setItem('preview_product_suggestions',JSON.stringify(s))}

function render(){
    const tbody=document.querySelector('#suggestions-table tbody'); tbody.innerHTML='';
    const menu = readMenu();
    const suggestions = readProductSuggestions();
    menu.forEach(it=>{
        const tr=document.createElement('tr');
        const checked = suggestions.indexOf(it.id)!==-1 ? 'checked' : '';
        const price = it.price || '';
        tr.innerHTML = `
            <td style=\"width:40px;text-align:center;\"><input type=\"checkbox\" class=\"suggest-check\" data-id=\"\${it.id}\" \${checked}></td>
            <td>\${escapeHtml(it.name||'')}</td>
            <td>\${escapeHtml(it.category||'')}</td>
            <td>\${escapeHtml(price)}</td>
            <td>\${escapeHtml(String(it.stock||0))}</td>
        `;
        tbody.appendChild(tr);
    });

    document.querySelectorAll('.suggest-check').forEach(cb=>{
        cb.addEventListener('change', function(e){
            const id = parseInt(this.dataset.id,10);
            let list = readProductSuggestions();
            if(this.checked){ if(list.indexOf(id)===-1) list.push(id); }
            else { list = list.filter(x=>x!==id); }
            saveProductSuggestions(list);
        });
    });
}

function escapeHtml(s){ if(!s) return ''; return String(s).replace(/[&<>\\\"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','\\\"':'&quot;',\"'\":'&#39;'}[m]; }); }

// ensure there is a menu to display (init sample if missing)
if(!localStorage.getItem('preview_menu')){
    const sample=[{id:1,name:'Espresso',category:'Cafés',price:'2,50€',stock:45},{id:2,name:'Croissant',category:'Pâtisseries',price:'2,00€',stock:5},{id:3,name:'Tiramisu',category:'Desserts',price:'4,50€',stock:0}];
    localStorage.setItem('preview_menu', JSON.stringify(sample));
}

// initialize suggestions array if missing
if(!localStorage.getItem('preview_product_suggestions')){ localStorage.setItem('preview_product_suggestions', JSON.stringify([])); }

render();
</script>

{% endblock %}
", "admin/suggestions/list.html.twig", "C:\\Users\\yesse\\OneDrive\\Bureau\\cafe\\smart-coffee-menu\\templates-only\\admin\\suggestions\\list.html.twig");
    }
}
