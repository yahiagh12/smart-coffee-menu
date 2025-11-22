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

/* admin/menu/manage.html.twig */
class __TwigTemplate_a37ce9b4f15dd74f90cc783328cadd8f extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menu/manage.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_page_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "page_title"));

        yield "Gérer le menu";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 4
        yield "<div class=\"card\">
    <h2>Menu - Gérer les produits</h2>
    <p><button id=\"new-btn\" class=\"btn btn-primary\">Ajouter un produit</button></p>
    <div class=\"table-responsive\">
        <table id=\"menu-table\"><thead><tr><th>ID</th><th>Nom</th><th>Catégorie</th><th>Prix</th><th>Actions</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readMenu(){try{return JSON.parse(localStorage.getItem('preview_menu')||'null')||[]}catch(e){return[]}}
function saveMenu(m){localStorage.setItem('preview_menu',JSON.stringify(m))}
function render(){const tbody=document.querySelector('#menu-table tbody'); tbody.innerHTML=''; const items=readMenu(); items.forEach(it=>{const tr=document.createElement('tr'); tr.innerHTML=`<td>\${it.id}</td><td>\${it.name}</td><td>\${it.category||''}</td><td>\${it.price||''}</td><td><button class=\"btn\" data-id=\"\${it.id}\" data-action=\"edit\">Edit</button> <button class=\"btn btn-danger\" data-id=\"\${it.id}\" data-action=\"del\">Suppr</button></td>`; tbody.appendChild(tr);}); document.querySelectorAll('#menu-table button').forEach(b=>b.addEventListener('click',e=>{const id=parseInt(e.currentTarget.dataset.id,10); const action=e.currentTarget.dataset.action; if(action==='del'){let list=readMenu(); list=list.filter(x=>x.id!==id); saveMenu(list); render(); return;} if(action==='edit'){const list=readMenu(); const item=list.find(x=>x.id===id); const name=prompt('Nom',item.name); if(name===null) return; const category=prompt('Catégorie',item.category||''); const price=prompt('Prix',item.price||''); item.name=name; item.category=category; item.price=price; saveMenu(list); render(); return;} }));}
document.getElementById('new-btn').addEventListener('click',function(){const name=prompt('Nom du produit'); if(!name) return; const category=prompt('Catégorie','Boissons'); const price=prompt('Prix','2.50'); const list=readMenu(); const id=list.length? Math.max(...list.map(x=>x.id))+1:1; list.push({id:id,name:name,category:category,price:price}); saveMenu(list); render();});
// init sample
if(!localStorage.getItem('preview_menu')){const s=[{id:1,name:'Café',category:'Boissons',price:'1.50'},{id:2,name:'Croissant',category:'Viennoiserie',price:'1.20'}]; saveMenu(s);} render();
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
        return "admin/menu/manage.html.twig";
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
        return array (  85 => 4,  75 => 3,  58 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}
{% block page_title %}Gérer le menu{% endblock %}
{% block admin_content %}
<div class=\"card\">
    <h2>Menu - Gérer les produits</h2>
    <p><button id=\"new-btn\" class=\"btn btn-primary\">Ajouter un produit</button></p>
    <div class=\"table-responsive\">
        <table id=\"menu-table\"><thead><tr><th>ID</th><th>Nom</th><th>Catégorie</th><th>Prix</th><th>Actions</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readMenu(){try{return JSON.parse(localStorage.getItem('preview_menu')||'null')||[]}catch(e){return[]}}
function saveMenu(m){localStorage.setItem('preview_menu',JSON.stringify(m))}
function render(){const tbody=document.querySelector('#menu-table tbody'); tbody.innerHTML=''; const items=readMenu(); items.forEach(it=>{const tr=document.createElement('tr'); tr.innerHTML=`<td>\${it.id}</td><td>\${it.name}</td><td>\${it.category||''}</td><td>\${it.price||''}</td><td><button class=\"btn\" data-id=\"\${it.id}\" data-action=\"edit\">Edit</button> <button class=\"btn btn-danger\" data-id=\"\${it.id}\" data-action=\"del\">Suppr</button></td>`; tbody.appendChild(tr);}); document.querySelectorAll('#menu-table button').forEach(b=>b.addEventListener('click',e=>{const id=parseInt(e.currentTarget.dataset.id,10); const action=e.currentTarget.dataset.action; if(action==='del'){let list=readMenu(); list=list.filter(x=>x.id!==id); saveMenu(list); render(); return;} if(action==='edit'){const list=readMenu(); const item=list.find(x=>x.id===id); const name=prompt('Nom',item.name); if(name===null) return; const category=prompt('Catégorie',item.category||''); const price=prompt('Prix',item.price||''); item.name=name; item.category=category; item.price=price; saveMenu(list); render(); return;} }));}
document.getElementById('new-btn').addEventListener('click',function(){const name=prompt('Nom du produit'); if(!name) return; const category=prompt('Catégorie','Boissons'); const price=prompt('Prix','2.50'); const list=readMenu(); const id=list.length? Math.max(...list.map(x=>x.id))+1:1; list.push({id:id,name:name,category:category,price:price}); saveMenu(list); render();});
// init sample
if(!localStorage.getItem('preview_menu')){const s=[{id:1,name:'Café',category:'Boissons',price:'1.50'},{id:2,name:'Croissant',category:'Viennoiserie',price:'1.20'}]; saveMenu(s);} render();
</script>

{% endblock %}
", "admin/menu/manage.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\menu\\manage.html.twig");
    }
}
