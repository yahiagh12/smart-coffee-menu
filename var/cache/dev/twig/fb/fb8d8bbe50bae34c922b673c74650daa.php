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

/* admin/dashboard.html.twig */
class __TwigTemplate_225bb14724009b947fd055b46252b0be extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/dashboard.html.twig"));

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

        yield "Tableau de Bord";
        
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
        yield "    <div class=\"stats-grid\">
        <div class=\"stat-card success\">
            <div class=\"stat-card-label\">👥 Utilisateurs</div>
            <div class=\"stat-card-value\">42</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-card-label\">🍰 Produits</div>
            <div class=\"stat-card-value\">28</div>
        </div>
        <div class=\"stat-card warning\">
            <div class=\"stat-card-label\">📦 Commandes</div>
            <div class=\"stat-card-value\">156</div>
        </div>
        <div class=\"stat-card danger\">
            <div class=\"stat-card-label\">💰 Revenus</div>
            <div class=\"stat-card-value\">2,450€</div>
        </div>
    </div>

    <div class=\"card\">
        <h2>📈 Activité Récente</h2>
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
                        <td><span class=\"badge badge-info\">Nouvelle</span></td>
                    </tr>
                    <tr>
                        <td>2025-01-12 13:15</td>
                        <td>Utilisateur</td>
                        <td>Inscription de Marie Martin</td>
                        <td><span class=\"badge badge-success\">Confirmé</span></td>
                    </tr>
                    <tr>
                        <td>2025-01-12 12:00</td>
                        <td>Produit</td>
                        <td>Cappuccino stock bas (5 unités)</td>
                        <td><span class=\"badge badge-warning\">Attention</span></td>
                    </tr>
                    <tr>
                        <td>2025-01-12 10:45</td>
                        <td>Commande</td>
                        <td>Commande de Pierre Durand livrée</td>
                        <td><span class=\"badge badge-success\">Livré</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;\">
        <div class=\"card\">
            <h2>🔧 Actions Rapides</h2>
            <div style=\"display: flex; flex-direction: column; gap: 10px;\">
                <a href=\"";
        // line 71
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_list");
        yield "\" class=\"btn btn-primary\">Gérer Utilisateurs</a>
                <a href=\"";
        // line 72
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menu_list");
        yield "\" class=\"btn btn-primary\">Gérer Menu</a>
                <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_list");
        yield "\" class=\"btn btn-primary\">Voir Commandes</a>
            </div>
        </div>

        <div class=\"card\">
            <h2>📋 Commandes en Attente</h2>
            <p style=\"margin-bottom: 10px;\">8 commandes à traiter</p>
            <a href=\"";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_list");
        yield "\" class=\"btn btn-warning\" style=\"background: #f39c12;\">Voir Détails</a>
        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/dashboard.html.twig";
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
        return array (  170 => 80,  160 => 73,  156 => 72,  152 => 71,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"admin/base.html.twig\" %}

{% block page_title %}Tableau de Bord{% endblock %}

{% block admin_content %}
    <div class=\"stats-grid\">
        <div class=\"stat-card success\">
            <div class=\"stat-card-label\">👥 Utilisateurs</div>
            <div class=\"stat-card-value\">42</div>
        </div>
        <div class=\"stat-card\">
            <div class=\"stat-card-label\">🍰 Produits</div>
            <div class=\"stat-card-value\">28</div>
        </div>
        <div class=\"stat-card warning\">
            <div class=\"stat-card-label\">📦 Commandes</div>
            <div class=\"stat-card-value\">156</div>
        </div>
        <div class=\"stat-card danger\">
            <div class=\"stat-card-label\">💰 Revenus</div>
            <div class=\"stat-card-value\">2,450€</div>
        </div>
    </div>

    <div class=\"card\">
        <h2>📈 Activité Récente</h2>
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
                        <td><span class=\"badge badge-info\">Nouvelle</span></td>
                    </tr>
                    <tr>
                        <td>2025-01-12 13:15</td>
                        <td>Utilisateur</td>
                        <td>Inscription de Marie Martin</td>
                        <td><span class=\"badge badge-success\">Confirmé</span></td>
                    </tr>
                    <tr>
                        <td>2025-01-12 12:00</td>
                        <td>Produit</td>
                        <td>Cappuccino stock bas (5 unités)</td>
                        <td><span class=\"badge badge-warning\">Attention</span></td>
                    </tr>
                    <tr>
                        <td>2025-01-12 10:45</td>
                        <td>Commande</td>
                        <td>Commande de Pierre Durand livrée</td>
                        <td><span class=\"badge badge-success\">Livré</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style=\"display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;\">
        <div class=\"card\">
            <h2>🔧 Actions Rapides</h2>
            <div style=\"display: flex; flex-direction: column; gap: 10px;\">
                <a href=\"{{ path('admin_users_list') }}\" class=\"btn btn-primary\">Gérer Utilisateurs</a>
                <a href=\"{{ path('admin_menu_list') }}\" class=\"btn btn-primary\">Gérer Menu</a>
                <a href=\"{{ path('admin_orders_list') }}\" class=\"btn btn-primary\">Voir Commandes</a>
            </div>
        </div>

        <div class=\"card\">
            <h2>📋 Commandes en Attente</h2>
            <p style=\"margin-bottom: 10px;\">8 commandes à traiter</p>
            <a href=\"{{ path('admin_orders_list') }}\" class=\"btn btn-warning\" style=\"background: #f39c12;\">Voir Détails</a>
        </div>
    </div>
{% endblock %}
", "admin/dashboard.html.twig", "C:\\Users\\user\\smart-coffee-menu\\templates-only\\admin\\dashboard.html.twig");
    }
}
