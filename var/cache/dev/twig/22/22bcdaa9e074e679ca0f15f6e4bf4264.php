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

/* admin/events/edit.html.twig */
class __TwigTemplate_6b6b9b533a274fdac24bd91b35fcb408 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/events/edit.html.twig"));

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

        yield "Modifier événement";
        
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
    <h2>Modifier un événement</h2>
    <form id=\"event-form\">
        <div class=\"form-group\">
            <label>Nom</label>
            <input type=\"text\" id=\"title\" required />
        </div>
        <div class=\"form-group\">
            <label>Date</label>
            <input type=\"date\" id=\"date\" required />
        </div>
        <div class=\"form-group\">
            <label>Description</label>
            <textarea id=\"description\" rows=\"4\" style=\"width:100%\"></textarea>
        </div>
        <div class=\"form-group\">
            <label>Image</label>
            <input type=\"file\" id=\"event-image\" accept=\"image/*\" />
            <div style=\"margin-top:8px;\"><img id=\"event-image-preview\" src=\"\" style=\"display:none; max-width:240px; max-height:160px; object-fit:cover; border:1px solid #ddd; border-radius:4px;\" /></div>
        </div>
        <p><button class=\"btn btn-primary\" type=\"submit\">Enregistrer</button> <a class=\"btn btn-secondary\" href=\"/admin/events\">Annuler</a></p>
    </form>
</div>

<script>
function readEvents(){try{return JSON.parse(localStorage.getItem('preview_events')||'null')||[]}catch(e){return[]}}
function saveEvents(e){localStorage.setItem('preview_events',JSON.stringify(e))}
function getParam(name){ const params = new URLSearchParams(window.location.search); return params.get(name); }
const id = parseInt(getParam('id'),10);
const list=readEvents();
const ev = list.find(x=>x.id===id);
if(!ev){ document.querySelector('.admin-content').innerHTML='<p>Événement non trouvé.</p>'; } else {
    document.getElementById('title').value = ev.title;
    document.getElementById('date').value = ev.date;
    document.getElementById('description').value = ev.description || '';
    const preview=document.getElementById('event-image-preview');
    if(ev.image){ preview.src = ev.image; preview.style.display='inline-block'; preview.dataset.data = ev.image; } else { preview.style.display='none'; preview.src=''; }
}
// image selection handling
document.getElementById('event-image').addEventListener('change', function(){ const f=this.files[0]; const prev=document.getElementById('event-image-preview'); if(!f){ prev.style.display='none'; prev.src=''; delete prev.dataset.data; return; } const r=new FileReader(); r.onload=function(){ prev.src=r.result; prev.style.display='inline-block'; prev.dataset.data = r.result; }; r.readAsDataURL(f); });

document.getElementById('event-form').addEventListener('submit',function(e){
    e.preventDefault();
    if(!ev) return;
    ev.title = document.getElementById('title').value.trim();
    ev.date = document.getElementById('date').value;
    ev.description = document.getElementById('description').value.trim();
    const prev=document.getElementById('event-image-preview');
    if(prev && prev.dataset && prev.dataset.data){ ev.image = prev.dataset.data; }
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
        return "admin/events/edit.html.twig";
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

{% block page_title %}Modifier événement{% endblock %}

{% block admin_content %}
<div class=\"card\">
    <h2>Modifier un événement</h2>
    <form id=\"event-form\">
        <div class=\"form-group\">
            <label>Nom</label>
            <input type=\"text\" id=\"title\" required />
        </div>
        <div class=\"form-group\">
            <label>Date</label>
            <input type=\"date\" id=\"date\" required />
        </div>
        <div class=\"form-group\">
            <label>Description</label>
            <textarea id=\"description\" rows=\"4\" style=\"width:100%\"></textarea>
        </div>
        <div class=\"form-group\">
            <label>Image</label>
            <input type=\"file\" id=\"event-image\" accept=\"image/*\" />
            <div style=\"margin-top:8px;\"><img id=\"event-image-preview\" src=\"\" style=\"display:none; max-width:240px; max-height:160px; object-fit:cover; border:1px solid #ddd; border-radius:4px;\" /></div>
        </div>
        <p><button class=\"btn btn-primary\" type=\"submit\">Enregistrer</button> <a class=\"btn btn-secondary\" href=\"/admin/events\">Annuler</a></p>
    </form>
</div>

<script>
function readEvents(){try{return JSON.parse(localStorage.getItem('preview_events')||'null')||[]}catch(e){return[]}}
function saveEvents(e){localStorage.setItem('preview_events',JSON.stringify(e))}
function getParam(name){ const params = new URLSearchParams(window.location.search); return params.get(name); }
const id = parseInt(getParam('id'),10);
const list=readEvents();
const ev = list.find(x=>x.id===id);
if(!ev){ document.querySelector('.admin-content').innerHTML='<p>Événement non trouvé.</p>'; } else {
    document.getElementById('title').value = ev.title;
    document.getElementById('date').value = ev.date;
    document.getElementById('description').value = ev.description || '';
    const preview=document.getElementById('event-image-preview');
    if(ev.image){ preview.src = ev.image; preview.style.display='inline-block'; preview.dataset.data = ev.image; } else { preview.style.display='none'; preview.src=''; }
}
// image selection handling
document.getElementById('event-image').addEventListener('change', function(){ const f=this.files[0]; const prev=document.getElementById('event-image-preview'); if(!f){ prev.style.display='none'; prev.src=''; delete prev.dataset.data; return; } const r=new FileReader(); r.onload=function(){ prev.src=r.result; prev.style.display='inline-block'; prev.dataset.data = r.result; }; r.readAsDataURL(f); });

document.getElementById('event-form').addEventListener('submit',function(e){
    e.preventDefault();
    if(!ev) return;
    ev.title = document.getElementById('title').value.trim();
    ev.date = document.getElementById('date').value;
    ev.description = document.getElementById('description').value.trim();
    const prev=document.getElementById('event-image-preview');
    if(prev && prev.dataset && prev.dataset.data){ ev.image = prev.dataset.data; }
    saveEvents(list);
    location.href='/admin/events';
});
</script>

{% endblock %}
", "admin/events/edit.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\events\\edit.html.twig");
    }
}
