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

/* traiteur/dashboard.html.twig */
class __TwigTemplate_7b26b833cd7c18fc2959b06c94c14d5b extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "traiteur/dashboard.html.twig"));

        $this->parent = $this->load("traiteur/base.html.twig", 1);
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

        yield "Tableau de bord";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_heading(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "heading"));

        yield "Tableau de bord Traiteur";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 7
        yield "<div class=\"grid\">
    <div class=\"card\">
        <h3>Commandes en cours</h3>
        <p id=\"orders-count\">--</p>
    </div>
</div>


<div class=\"card\" style=\"width:100%; max-width:1200px; margin:32px auto 0 auto; box-sizing:border-box;\">
    <h2 style=\"color:#1976d2;\">📦 Commandes</h2>
    <div style=\"margin-bottom: 20px; display: flex; gap: 10px;\">
        <button type=\"button\" class=\"btn btn-secondary active\" style=\"background:#f39c12; color:#fff; border:none;\" onclick=\"filterOrders('all')\">Tous</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('pending')\">⏳ En Attente</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('preparing')\">👨‍🍳 En Préparation</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('ready')\">✅ Prêt</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('delivered')\">📦 Livré</button>
    </div>
    <div class=\"table-responsive\">
        <table style=\"width:100%; border-collapse:collapse; background:#e3f2fd; border:2px solid #1976d2; border-radius:8px;\">
            <thead>
                <tr style=\"background:#1976d2; color:#fff;\">
                    <th style=\"padding:12px;\">ID</th>
                    <th style=\"padding:12px;\">Client</th>
                    <th style=\"padding:12px;\">Montant</th>
                    <th style=\"padding:12px;\">Statut</th>
                    <th style=\"padding:12px;\">Date</th>
                    <th style=\"padding:12px;\">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#001</td>
                    <td>Jean Dupont</td>
                    <td>15,50€</td>
                    <td><span class=\"badge badge-warning\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">En Attente</span></td>
                    <td>2025-01-12 14:30</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 1)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\" selected>En Attente</option>
                            <option value=\"En préparation\">En préparation</option>
                            <option value=\"Prêt\">Prêt</option>
                            <option value=\"Livré\">Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                </tr>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#002</td>
                    <td>Marie Martin</td>
                    <td>8,75€</td>
                    <td><span class=\"badge badge-info\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">En Préparation</span></td>
                    <td>2025-01-12 13:45</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 2)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\">En Attente</option>
                            <option value=\"En préparation\" selected>En préparation</option>
                            <option value=\"Prêt\">Prêt</option>
                            <option value=\"Livré\">Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                </tr>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#003</td>
                    <td>Pierre Durand</td>
                    <td>12,25€</td>
                    <td><span class=\"badge badge-success\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">Prêt</span></td>
                    <td>2025-01-12 12:15</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 3)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\">En Attente</option>
                            <option value=\"En préparation\">En préparation</option>
                            <option value=\"Prêt\" selected>Prêt</option>
                            <option value=\"Livré\">Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                </tr>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#004</td>
                    <td>Sophie Bernard</td>
                    <td>10,00€</td>
                    <td><span class=\"badge badge-success\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">Livré</span></td>
                    <td>2025-01-12 11:00</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 4)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\">En Attente</option>
                            <option value=\"En préparation\">En préparation</option>
                            <option value=\"Prêt\">Prêt</option>
                            <option value=\"Livré\" selected>Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                <script>
                function changeStatus(select, rowId) {
                    var status = select.value;
                    var badge = select.parentElement.parentElement.querySelector('span.badge');
                    badge.textContent = status;
                    // Change badge color
                    if (status === 'En Attente') {
                        badge.style.background = '#bbdefb';
                        badge.style.color = '#1976d2';

                    <div class=\"stats-grid\">
                        <div class=\"stat-card success\" style=\"background:#eafaf1; border-left:6px solid #27ae60;\">
                            <div class=\"stat-card-label\" style=\"color:#27ae60;\">👥 Utilisateurs</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">42</div>
                        </div>
                        <div class=\"stat-card\" style=\"background:#fff6e0; border-left:6px solid #f39c12;\">
                            <div class=\"stat-card-label\" style=\"color:#f39c12;\">🍰 Produits</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">28</div>
                        </div>
                        <div class=\"stat-card warning\" style=\"background:#fff6e0; border-left:6px solid #f39c12;\">
                            <div class=\"stat-card-label\" style=\"color:#f39c12;\">📦 Commandes</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">156</div>
                        </div>
                        <div class=\"stat-card danger\" style=\"background:#fdecea; border-left:6px solid #e74c3c;\">
                            <div class=\"stat-card-label\" style=\"color:#e74c3c;\">💰 Revenus</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">2,450€</div>
                        </div>
                    </div>

                    <div class=\"card\" style=\"background:#fff6e0; border:2px solid #f39c12;\">
                        <h2 style=\"color:#f39c12;\">📈 Activité Récente</h2>
                        <div class=\"table-responsive\">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025-01-12 14:30</td>
                                        <td>Commande</td>
                                        <td>Nouvelle commande de Jean Dupont</td>
                                        <td><span class=\"badge badge-info\" style=\"background:#f39c12; color:#fff;\">Nouvelle</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-01-12 13:15</td>
                                        <td>Utilisateur</td>
                                        <td>Inscription de Marie Martin</td>
                                        <td><span class=\"badge badge-success\" style=\"background:#27ae60; color:#fff;\">Confirmé</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-01-12 12:00</td>
                                        <td>Produit</td>
                                        <td>Cappuccino stock bas (5 unités)</td>
                                        <td><span class=\"badge badge-warning\" style=\"background:#f39c12; color:#fff;\">Attention</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-01-12 10:45</td>
                                        <td>Commande</td>
                                        <td>Commande de Pierre Durand livrée</td>
                                        <td><span class=\"badge badge-success\" style=\"background:#27ae60; color:#fff;\">Livré</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;\">
                        <div class=\"card\" style=\"background:#fff6e0; border:2px solid #f39c12;\">
                            <h2 style=\"color:#f39c12;\">📋 Commandes en Attente</h2>
                                <p class=\"mb-2\">";
        // line 178
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["pendingOrders"]) || array_key_exists("pendingOrders", $context) ? $context["pendingOrders"] : (function () { throw new RuntimeError('Variable "pendingOrders" does not exist.', 178, $this->source); })())), "html", null, true);
        yield " commandes à traiter</p>
                                <a href=\"";
        // line 179
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("traiteur_orders_list");
        yield "\" class=\"btn\" style=\"background-color: #FF9800; color: #fff; font-weight: 500; border-radius: 6px; box-shadow: 0 2px 6px rgba(255,152,0,0.12); padding: 8px 24px; border: none;\">Voir Détails</a>
                        </div>
                    </div>
    const avail = products.filter(p=>p.available).length;
    document.getElementById('available-count').textContent = avail + ' / ' + products.length;
}
// initialize sample data if empty
if(!localStorage.getItem('preview_products')){
    const sample=[
        {id:1,name:'Café',available:true},
        {id:2,name:'Croissant',available:true},
        {id:3,name:'Sandwich',available:false}
    ];
    localStorage.setItem('preview_products',JSON.stringify(sample));
}
if(!localStorage.getItem('preview_orders')){
    const sampleOrders=[
        {id:101,customer:'Alice',items:['Café','Croissant'],status:'pending'},
        {id:102,customer:'Bob',items:['Sandwich'],status:'pending'}
    ];
    localStorage.setItem('preview_orders',JSON.stringify(sampleOrders));
}
document.addEventListener('DOMContentLoaded', function(){
    renderPendingOrders();
    updateCounts();
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
        return "traiteur/dashboard.html.twig";
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
        return array (  280 => 179,  276 => 178,  103 => 7,  93 => 6,  76 => 4,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'traiteur/base.html.twig' %}

{% block title %}Tableau de bord{% endblock %}
{% block heading %}Tableau de bord Traiteur{% endblock %}

{% block content %}
<div class=\"grid\">
    <div class=\"card\">
        <h3>Commandes en cours</h3>
        <p id=\"orders-count\">--</p>
    </div>
</div>


<div class=\"card\" style=\"width:100%; max-width:1200px; margin:32px auto 0 auto; box-sizing:border-box;\">
    <h2 style=\"color:#1976d2;\">📦 Commandes</h2>
    <div style=\"margin-bottom: 20px; display: flex; gap: 10px;\">
        <button type=\"button\" class=\"btn btn-secondary active\" style=\"background:#f39c12; color:#fff; border:none;\" onclick=\"filterOrders('all')\">Tous</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('pending')\">⏳ En Attente</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('preparing')\">👨‍🍳 En Préparation</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('ready')\">✅ Prêt</button>
        <button type=\"button\" class=\"btn btn-secondary\" style=\"background:#fff6e0; color:#f39c12; border:none;\" onclick=\"filterOrders('delivered')\">📦 Livré</button>
    </div>
    <div class=\"table-responsive\">
        <table style=\"width:100%; border-collapse:collapse; background:#e3f2fd; border:2px solid #1976d2; border-radius:8px;\">
            <thead>
                <tr style=\"background:#1976d2; color:#fff;\">
                    <th style=\"padding:12px;\">ID</th>
                    <th style=\"padding:12px;\">Client</th>
                    <th style=\"padding:12px;\">Montant</th>
                    <th style=\"padding:12px;\">Statut</th>
                    <th style=\"padding:12px;\">Date</th>
                    <th style=\"padding:12px;\">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#001</td>
                    <td>Jean Dupont</td>
                    <td>15,50€</td>
                    <td><span class=\"badge badge-warning\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">En Attente</span></td>
                    <td>2025-01-12 14:30</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 1)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\" selected>En Attente</option>
                            <option value=\"En préparation\">En préparation</option>
                            <option value=\"Prêt\">Prêt</option>
                            <option value=\"Livré\">Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                </tr>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#002</td>
                    <td>Marie Martin</td>
                    <td>8,75€</td>
                    <td><span class=\"badge badge-info\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">En Préparation</span></td>
                    <td>2025-01-12 13:45</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 2)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\">En Attente</option>
                            <option value=\"En préparation\" selected>En préparation</option>
                            <option value=\"Prêt\">Prêt</option>
                            <option value=\"Livré\">Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                </tr>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#003</td>
                    <td>Pierre Durand</td>
                    <td>12,25€</td>
                    <td><span class=\"badge badge-success\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">Prêt</span></td>
                    <td>2025-01-12 12:15</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 3)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\">En Attente</option>
                            <option value=\"En préparation\">En préparation</option>
                            <option value=\"Prêt\" selected>Prêt</option>
                            <option value=\"Livré\">Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                </tr>
                <tr style=\"border-bottom:1px solid #90caf9;\">
                    <td>#004</td>
                    <td>Sophie Bernard</td>
                    <td>10,00€</td>
                    <td><span class=\"badge badge-success\" style=\"background:#bbdefb; color:#1976d2; padding:4px 10px; border-radius:6px; font-weight:bold;\">Livré</span></td>
                    <td>2025-01-12 11:00</td>
                    <td>
                        <a href=\"#\" class=\"btn btn-primary btn-sm\" style=\"background:#1976d2; color:#fff; border:none;\">Détail</a>
                        <select onchange=\"changeStatus(this, 4)\" style=\"padding: 6px; border-radius: 5px; cursor: pointer; background:#e3f2fd; color:#1976d2; border:1px solid #1976d2;\">
                            <option value=\"En Attente\">En Attente</option>
                            <option value=\"En préparation\">En préparation</option>
                            <option value=\"Prêt\">Prêt</option>
                            <option value=\"Livré\" selected>Livré</option>
                            <option value=\"Annulé\">Annulé</option>
                        </select>
                    </td>
                <script>
                function changeStatus(select, rowId) {
                    var status = select.value;
                    var badge = select.parentElement.parentElement.querySelector('span.badge');
                    badge.textContent = status;
                    // Change badge color
                    if (status === 'En Attente') {
                        badge.style.background = '#bbdefb';
                        badge.style.color = '#1976d2';

                    <div class=\"stats-grid\">
                        <div class=\"stat-card success\" style=\"background:#eafaf1; border-left:6px solid #27ae60;\">
                            <div class=\"stat-card-label\" style=\"color:#27ae60;\">👥 Utilisateurs</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">42</div>
                        </div>
                        <div class=\"stat-card\" style=\"background:#fff6e0; border-left:6px solid #f39c12;\">
                            <div class=\"stat-card-label\" style=\"color:#f39c12;\">🍰 Produits</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">28</div>
                        </div>
                        <div class=\"stat-card warning\" style=\"background:#fff6e0; border-left:6px solid #f39c12;\">
                            <div class=\"stat-card-label\" style=\"color:#f39c12;\">📦 Commandes</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">156</div>
                        </div>
                        <div class=\"stat-card danger\" style=\"background:#fdecea; border-left:6px solid #e74c3c;\">
                            <div class=\"stat-card-label\" style=\"color:#e74c3c;\">💰 Revenus</div>
                            <div class=\"stat-card-value\" style=\"color:#222;\">2,450€</div>
                        </div>
                    </div>

                    <div class=\"card\" style=\"background:#fff6e0; border:2px solid #f39c12;\">
                        <h2 style=\"color:#f39c12;\">📈 Activité Récente</h2>
                        <div class=\"table-responsive\">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025-01-12 14:30</td>
                                        <td>Commande</td>
                                        <td>Nouvelle commande de Jean Dupont</td>
                                        <td><span class=\"badge badge-info\" style=\"background:#f39c12; color:#fff;\">Nouvelle</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-01-12 13:15</td>
                                        <td>Utilisateur</td>
                                        <td>Inscription de Marie Martin</td>
                                        <td><span class=\"badge badge-success\" style=\"background:#27ae60; color:#fff;\">Confirmé</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-01-12 12:00</td>
                                        <td>Produit</td>
                                        <td>Cappuccino stock bas (5 unités)</td>
                                        <td><span class=\"badge badge-warning\" style=\"background:#f39c12; color:#fff;\">Attention</span></td>
                                    </tr>
                                    <tr>
                                        <td>2025-01-12 10:45</td>
                                        <td>Commande</td>
                                        <td>Commande de Pierre Durand livrée</td>
                                        <td><span class=\"badge badge-success\" style=\"background:#27ae60; color:#fff;\">Livré</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;\">
                        <div class=\"card\" style=\"background:#fff6e0; border:2px solid #f39c12;\">
                            <h2 style=\"color:#f39c12;\">📋 Commandes en Attente</h2>
                                <p class=\"mb-2\">{{ pendingOrders|length }} commandes à traiter</p>
                                <a href=\"{{ path('traiteur_orders_list') }}\" class=\"btn\" style=\"background-color: #FF9800; color: #fff; font-weight: 500; border-radius: 6px; box-shadow: 0 2px 6px rgba(255,152,0,0.12); padding: 8px 24px; border: none;\">Voir Détails</a>
                        </div>
                    </div>
    const avail = products.filter(p=>p.available).length;
    document.getElementById('available-count').textContent = avail + ' / ' + products.length;
}
// initialize sample data if empty
if(!localStorage.getItem('preview_products')){
    const sample=[
        {id:1,name:'Café',available:true},
        {id:2,name:'Croissant',available:true},
        {id:3,name:'Sandwich',available:false}
    ];
    localStorage.setItem('preview_products',JSON.stringify(sample));
}
if(!localStorage.getItem('preview_orders')){
    const sampleOrders=[
        {id:101,customer:'Alice',items:['Café','Croissant'],status:'pending'},
        {id:102,customer:'Bob',items:['Sandwich'],status:'pending'}
    ];
    localStorage.setItem('preview_orders',JSON.stringify(sampleOrders));
}
document.addEventListener('DOMContentLoaded', function(){
    renderPendingOrders();
    updateCounts();
});
</script>

{% endblock %}
", "traiteur/dashboard.html.twig", "C:\\projectsymf\\smart-coffee-menu\\templates-only\\traiteur\\dashboard.html.twig");
    }
}
