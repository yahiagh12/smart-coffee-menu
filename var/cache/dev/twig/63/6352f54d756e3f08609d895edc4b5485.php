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

/* admin/orders/list.html.twig */
class __TwigTemplate_cd25e4bf823e1d62aeac81207204e3fc extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/orders/list.html.twig"));

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

        yield "Gestion des Commandes";
        
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
        yield "    <div class=\"card\">
        <h2>📦 Commandes</h2>

        <div style=\"margin-bottom: 20px; display: flex; gap: 10px;\">
            <button type=\"button\" class=\"btn btn-secondary active\" onclick=\"filterOrders('all')\">Tous</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('pending')\">⏳ En Attente</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('preparing')\">👨‍🍳 En Préparation</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('ready')\">✅ Prêt</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('delivered')\">📦 Livré</button>
        </div>

        <div class=\"table-responsive\">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Jean Dupont</td>
                        <td>15,50€</td>
                        <td><span class=\"badge badge-warning\">En Attente</span></td>
                        <td>2025-01-12 14:30</td>
                        <td>
                            <a href=\"";
        // line 37
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_detail", ["id" => 1]);
        yield "\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Marie Martin</td>
                        <td>8,75€</td>
                        <td><span class=\"badge badge-info\">En Préparation</span></td>
                        <td>2025-01-12 13:45</td>
                        <td>
                            <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_detail", ["id" => 2]);
        yield "\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>Pierre Durand</td>
                        <td>12,25€</td>
                        <td><span class=\"badge badge-success\">Prêt</span></td>
                        <td>2025-01-12 12:15</td>
                        <td>
                            <a href=\"";
        // line 71
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_detail", ["id" => 3]);
        yield "\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#004</td>
                        <td>Sophie Bernard</td>
                        <td>10,00€</td>
                        <td><span class=\"badge badge-success\">Livré</span></td>
                        <td>2025-01-12 11:00</td>
                        <td>
                            <a href=\"";
        // line 88
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_orders_detail", ["id" => 4]);
        yield "\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterOrders(status) {
            console.log('Filtrer par statut:', status);
            // Logic to filter orders
        }
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
        return "admin/orders/list.html.twig";
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
        return array (  178 => 88,  158 => 71,  138 => 54,  118 => 37,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"admin/base.html.twig\" %}

{% block page_title %}Gestion des Commandes{% endblock %}

{% block admin_content %}
    <div class=\"card\">
        <h2>📦 Commandes</h2>

        <div style=\"margin-bottom: 20px; display: flex; gap: 10px;\">
            <button type=\"button\" class=\"btn btn-secondary active\" onclick=\"filterOrders('all')\">Tous</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('pending')\">⏳ En Attente</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('preparing')\">👨‍🍳 En Préparation</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('ready')\">✅ Prêt</button>
            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"filterOrders('delivered')\">📦 Livré</button>
        </div>

        <div class=\"table-responsive\">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Jean Dupont</td>
                        <td>15,50€</td>
                        <td><span class=\"badge badge-warning\">En Attente</span></td>
                        <td>2025-01-12 14:30</td>
                        <td>
                            <a href=\"{{ path('admin_orders_detail', {id: 1}) }}\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Marie Martin</td>
                        <td>8,75€</td>
                        <td><span class=\"badge badge-info\">En Préparation</span></td>
                        <td>2025-01-12 13:45</td>
                        <td>
                            <a href=\"{{ path('admin_orders_detail', {id: 2}) }}\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>Pierre Durand</td>
                        <td>12,25€</td>
                        <td><span class=\"badge badge-success\">Prêt</span></td>
                        <td>2025-01-12 12:15</td>
                        <td>
                            <a href=\"{{ path('admin_orders_detail', {id: 3}) }}\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>#004</td>
                        <td>Sophie Bernard</td>
                        <td>10,00€</td>
                        <td><span class=\"badge badge-success\">Livré</span></td>
                        <td>2025-01-12 11:00</td>
                        <td>
                            <a href=\"{{ path('admin_orders_detail', {id: 4}) }}\" class=\"btn btn-primary btn-sm\">Détail</a>
                            <select style=\"padding: 6px; border-radius: 5px; cursor: pointer;\">
                                <option>Changer Statut</option>
                                <option>En préparation</option>
                                <option>Prêt</option>
                                <option>Livré</option>
                                <option>Annulé</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterOrders(status) {
            console.log('Filtrer par statut:', status);
            // Logic to filter orders
        }
    </script>
{% endblock %}
", "admin/orders/list.html.twig", "C:\\projectsymf\\smart-coffee-menu\\templates-only\\admin\\orders\\list.html.twig");
    }
}
