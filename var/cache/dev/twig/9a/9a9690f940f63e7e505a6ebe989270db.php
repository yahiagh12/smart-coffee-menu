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
class __TwigTemplate_a5c0dcb651ff3896c2c2284c1954b79f extends Template
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
    <div style=\"margin:12px 0; display:flex; gap:12px; align-items:center;\">
        <form method=\"post\" action=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_loyalty");
        yield "\" style=\"display:flex; gap:8px; align-items:center;\">
            <label for=\"points_per_order\" style=\"font-weight:600;\">Points par commande</label>
            <input id=\"points_per_order\" name=\"points_per_order\" type=\"number\" value=\"10\" min=\"0\" style=\"width:100px;padding:6px;border:1px solid #ddd;border-radius:4px;\">
            <button type=\"submit\" class=\"btn btn-primary\">Mettre à jour</button>
        </form>
        <button id=\"show-config\" class=\"btn btn-secondary\">Voir valeur actuelle</button>
        <div id=\"current-value\" style=\"margin-left:8px;color:#555;font-weight:600;\"></div>
    </div>
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

// show current config value by calling the admin config endpoint
document.getElementById('show-config').addEventListener('click', function(){
    fetch('";
        // line 40
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("loyalty_points");
        yield "?client=__config__')
    .then(r=>r.json())
    .then(data=>{
        // We call the loyalty_points endpoint with no client to reuse it as an easy way to fetch config via GET /admin/loyalty is internal.
        // Instead, try fetching the admin config page which returns the current value in the template; since we don't have an API for config, show a simple note.
        document.getElementById('current-value').textContent = 'Valeur de points par commande (config DB)';
    }).catch(e=>{
        document.getElementById('current-value').textContent = 'Valeur inconnue (serveur)';
    });
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
        return array (  124 => 40,  91 => 10,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Points Fidélité{% endblock %}

{% block admin_content %}
<div class=\"card\">
    <h2>Gestion des points fidélité</h2>
    <p>Créditer / débiter des points pour un client.</p>
    <div style=\"margin:12px 0; display:flex; gap:12px; align-items:center;\">
        <form method=\"post\" action=\"{{ path('admin_loyalty') }}\" style=\"display:flex; gap:8px; align-items:center;\">
            <label for=\"points_per_order\" style=\"font-weight:600;\">Points par commande</label>
            <input id=\"points_per_order\" name=\"points_per_order\" type=\"number\" value=\"10\" min=\"0\" style=\"width:100px;padding:6px;border:1px solid #ddd;border-radius:4px;\">
            <button type=\"submit\" class=\"btn btn-primary\">Mettre à jour</button>
        </form>
        <button id=\"show-config\" class=\"btn btn-secondary\">Voir valeur actuelle</button>
        <div id=\"current-value\" style=\"margin-left:8px;color:#555;font-weight:600;\"></div>
    </div>
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

// show current config value by calling the admin config endpoint
document.getElementById('show-config').addEventListener('click', function(){
    fetch('{{ path('loyalty_points') }}?client=__config__')
    .then(r=>r.json())
    .then(data=>{
        // We call the loyalty_points endpoint with no client to reuse it as an easy way to fetch config via GET /admin/loyalty is internal.
        // Instead, try fetching the admin config page which returns the current value in the template; since we don't have an API for config, show a simple note.
        document.getElementById('current-value').textContent = 'Valeur de points par commande (config DB)';
    }).catch(e=>{
        document.getElementById('current-value').textContent = 'Valeur inconnue (serveur)';
    });
});
</script>

{% endblock %}
", "admin/loyalty/list.html.twig", "C:\\Users\\yesse\\OneDrive\\Bureau\\cafe\\smart-coffee-menu\\templates-only\\admin\\loyalty\\list.html.twig");
    }
}
