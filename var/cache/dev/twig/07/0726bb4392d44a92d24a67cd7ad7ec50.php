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

/* admin/users/manage.html.twig */
class __TwigTemplate_2e40746c41620ea702e90a7c2407e6df extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/manage.html.twig"));

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

        yield "Gérer les utilisateurs";
        
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
    <h2>Utilisateurs</h2>
    <p><button id=\"new-user\" class=\"btn btn-primary\">Ajouter un utilisateur</button></p>
    <div class=\"table-responsive\">
        <table id=\"users-table\"><thead><tr><th>ID</th><th>Email</th><th>Nom</th><th>Rôles</th><th>Actions</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readUsers(){try{return JSON.parse(localStorage.getItem('preview_users')||'null')||[]}catch(e){return[]}}
function saveUsers(u){localStorage.setItem('preview_users',JSON.stringify(u))}
function render(){const tbody=document.querySelector('#users-table tbody'); tbody.innerHTML=''; const users=readUsers(); users.forEach(u=>{const tr=document.createElement('tr'); tr.innerHTML=`<td>\${u.id}</td><td>\${u.email}</td><td>\${u.name||''}</td><td>\${(u.roles||[]).join(', ')}</td><td><button class=\"btn\" data-id=\"\${u.id}\" data-action=\"edit\">Edit</button> <button class=\"btn btn-danger\" data-id=\"\${u.id}\" data-action=\"del\">Suppr</button></td>`; tbody.appendChild(tr);}); document.querySelectorAll('#users-table button').forEach(b=>b.addEventListener('click',e=>{const id=parseInt(e.currentTarget.dataset.id,10); const action=e.currentTarget.dataset.action; if(action==='del'){let list=readUsers(); list=list.filter(x=>x.id!==id); saveUsers(list); render(); return;} if(action==='edit'){const list=readUsers(); const item=list.find(x=>x.id===id); const email=prompt('Email',item.email); if(email===null) return; const name=prompt('Nom',item.name||''); const roles=prompt('Roles (comma separated)',(item.roles||[]).join(',')); item.email=email; item.name=name; item.roles = roles? roles.split(',').map(s=>s.trim()):[]; saveUsers(list); render(); return;} }));}
document.getElementById('new-user').addEventListener('click',function(){const email=prompt('Email'); if(!email) return; const name=prompt('Nom',''); const roles=prompt('Roles (comma separated)','ROLE_USER'); const list=readUsers(); const id=list.length? Math.max(...list.map(x=>x.id))+1:1; list.push({id:id,email:email,name:name,roles:roles?roles.split(',').map(s=>s.trim()):[]}); saveUsers(list); render();});
// init sample
if(!localStorage.getItem('preview_users')){const s=[{id:1,email:'admin@example.com',name:'Admin',roles:['ROLE_ADMIN']},{id:2,email:'user@example.com',name:'Client',roles:['ROLE_USER']}]; saveUsers(s);} render();
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
        return "admin/users/manage.html.twig";
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
{% block page_title %}Gérer les utilisateurs{% endblock %}
{% block admin_content %}
<div class=\"card\">
    <h2>Utilisateurs</h2>
    <p><button id=\"new-user\" class=\"btn btn-primary\">Ajouter un utilisateur</button></p>
    <div class=\"table-responsive\">
        <table id=\"users-table\"><thead><tr><th>ID</th><th>Email</th><th>Nom</th><th>Rôles</th><th>Actions</th></tr></thead><tbody></tbody></table>
    </div>
</div>

<script>
function readUsers(){try{return JSON.parse(localStorage.getItem('preview_users')||'null')||[]}catch(e){return[]}}
function saveUsers(u){localStorage.setItem('preview_users',JSON.stringify(u))}
function render(){const tbody=document.querySelector('#users-table tbody'); tbody.innerHTML=''; const users=readUsers(); users.forEach(u=>{const tr=document.createElement('tr'); tr.innerHTML=`<td>\${u.id}</td><td>\${u.email}</td><td>\${u.name||''}</td><td>\${(u.roles||[]).join(', ')}</td><td><button class=\"btn\" data-id=\"\${u.id}\" data-action=\"edit\">Edit</button> <button class=\"btn btn-danger\" data-id=\"\${u.id}\" data-action=\"del\">Suppr</button></td>`; tbody.appendChild(tr);}); document.querySelectorAll('#users-table button').forEach(b=>b.addEventListener('click',e=>{const id=parseInt(e.currentTarget.dataset.id,10); const action=e.currentTarget.dataset.action; if(action==='del'){let list=readUsers(); list=list.filter(x=>x.id!==id); saveUsers(list); render(); return;} if(action==='edit'){const list=readUsers(); const item=list.find(x=>x.id===id); const email=prompt('Email',item.email); if(email===null) return; const name=prompt('Nom',item.name||''); const roles=prompt('Roles (comma separated)',(item.roles||[]).join(',')); item.email=email; item.name=name; item.roles = roles? roles.split(',').map(s=>s.trim()):[]; saveUsers(list); render(); return;} }));}
document.getElementById('new-user').addEventListener('click',function(){const email=prompt('Email'); if(!email) return; const name=prompt('Nom',''); const roles=prompt('Roles (comma separated)','ROLE_USER'); const list=readUsers(); const id=list.length? Math.max(...list.map(x=>x.id))+1:1; list.push({id:id,email:email,name:name,roles:roles?roles.split(',').map(s=>s.trim()):[]}); saveUsers(list); render();});
// init sample
if(!localStorage.getItem('preview_users')){const s=[{id:1,email:'admin@example.com',name:'Admin',roles:['ROLE_ADMIN']},{id:2,email:'user@example.com',name:'Client',roles:['ROLE_USER']}]; saveUsers(s);} render();
</script>

{% endblock %}
", "admin/users/manage.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\users\\manage.html.twig");
    }
}
