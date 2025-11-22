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

/* admin/orders/detail.html.twig */
class __TwigTemplate_64ac22ff2d4d765386222ee84510e905 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/orders/detail.html.twig"));

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

        yield "Détail Commande";
        
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
        yield "    <div style=\"display: grid; grid-template-columns: 2fr 1fr; gap: 20px;\">
        <!-- Order Details -->
        <div class=\"card\">
            <h2>📦 Commande #001</h2>

            <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;\">
                <div>
                    <h3 style=\"color: #2c3e50; margin-bottom: 10px;\">👤 Client</h3>
                    <p><strong>Jean Dupont</strong></p>
                    <p>jean.dupont@email.com</p>
                    <p>06 12 34 56 78</p>
                    <p>123 Rue de la Paix, 75000 Paris</p>
                </div>

                <div>
                    <h3 style=\"color: #2c3e50; margin-bottom: 10px;\">📅 Informations</h3>
                    <p><strong>Date:</strong> 2025-01-12 14:30</p>
                    <p><strong>Statut:</strong> <span class=\"badge badge-warning\">En Attente</span></p>
                    <p><strong>Montant:</strong> 15,50€</p>
                </div>
            </div>

            <h3 style=\"color: #2c3e50; margin-bottom: 15px;\">🛒 Articles</h3>
            <div class=\"table-responsive\">
                <table>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Espresso</td>
                            <td>2</td>
                            <td>2,50€</td>
                            <td>5,00€</td>
                        </tr>
                        <tr>
                            <td>Croissant</td>
                            <td>3</td>
                            <td>2,00€</td>
                            <td>6,00€</td>
                        </tr>
                        <tr>
                            <td>Cappuccino</td>
                            <td>1</td>
                            <td>3,50€</td>
                            <td>3,50€</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style=\"text-align: right; margin-top: 20px; padding-top: 20px; border-top: 2px solid #ddd;\">
                <p style=\"font-size: 1.2em;\"><strong>Total: 15,50€</strong></p>
            </div>

            <div style=\"margin-top: 20px;\">
                <label for=\"notes\">📝 Notes</label>
                <textarea id=\"notes\" rows=\"3\" style=\"margin-top: 10px;\">Pas de sucre dans le café</textarea>
            </div>
        </div>

        <!-- Status & Actions -->
        <div class=\"card\">
            <h2>⚙️ Actions</h2>

            <div style=\"margin-bottom: 20px;\">
                <label for=\"status\"><strong>Changer Statut</strong></label>
                <select id=\"status\" style=\"margin-top: 10px; width: 100%;\">
                    <option>⏳ En Attente</option>
                    <option>👨‍🍳 En Préparation</option>
                    <option>✅ Prêt</option>
                    <option>📦 Livré</option>
                    <option>❌ Annulé</option>
                </select>
            </div>

            <button type=\"button\" class=\"btn btn-primary\" style=\"width: 100%; margin-bottom: 10px;\">💾 Mettre à Jour</button>
            <button type=\"button\" class=\"btn btn-secondary\" style=\"width: 100%; margin-bottom: 10px;\">🖨️ Imprimer</button>
            <button type=\"button\" class=\"btn btn-danger\" style=\"width: 100%;\">❌ Annuler Commande</button>

            <div style=\"margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;\">
                <h3 style=\"color: #2c3e50; margin-bottom: 10px;\">📊 Statut</h3>
                <div style=\"background: #f8f9fa; padding: 15px; border-radius: 5px;\">
                    <p style=\"margin-bottom: 5px;\"><strong>Actuel:</strong> En Attente</p>
                    <p style=\"color: #95a5a6; font-size: 0.9em;\">Créé il y a 30 minutes</p>
                </div>
            </div>
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
        return "admin/orders/detail.html.twig";
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
        return new Source("{% extends \"admin/base.html.twig\" %}

{% block page_title %}Détail Commande{% endblock %}

{% block admin_content %}
    <div style=\"display: grid; grid-template-columns: 2fr 1fr; gap: 20px;\">
        <!-- Order Details -->
        <div class=\"card\">
            <h2>📦 Commande #001</h2>

            <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;\">
                <div>
                    <h3 style=\"color: #2c3e50; margin-bottom: 10px;\">👤 Client</h3>
                    <p><strong>Jean Dupont</strong></p>
                    <p>jean.dupont@email.com</p>
                    <p>06 12 34 56 78</p>
                    <p>123 Rue de la Paix, 75000 Paris</p>
                </div>

                <div>
                    <h3 style=\"color: #2c3e50; margin-bottom: 10px;\">📅 Informations</h3>
                    <p><strong>Date:</strong> 2025-01-12 14:30</p>
                    <p><strong>Statut:</strong> <span class=\"badge badge-warning\">En Attente</span></p>
                    <p><strong>Montant:</strong> 15,50€</p>
                </div>
            </div>

            <h3 style=\"color: #2c3e50; margin-bottom: 15px;\">🛒 Articles</h3>
            <div class=\"table-responsive\">
                <table>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Unitaire</th>
                            <th>Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Espresso</td>
                            <td>2</td>
                            <td>2,50€</td>
                            <td>5,00€</td>
                        </tr>
                        <tr>
                            <td>Croissant</td>
                            <td>3</td>
                            <td>2,00€</td>
                            <td>6,00€</td>
                        </tr>
                        <tr>
                            <td>Cappuccino</td>
                            <td>1</td>
                            <td>3,50€</td>
                            <td>3,50€</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style=\"text-align: right; margin-top: 20px; padding-top: 20px; border-top: 2px solid #ddd;\">
                <p style=\"font-size: 1.2em;\"><strong>Total: 15,50€</strong></p>
            </div>

            <div style=\"margin-top: 20px;\">
                <label for=\"notes\">📝 Notes</label>
                <textarea id=\"notes\" rows=\"3\" style=\"margin-top: 10px;\">Pas de sucre dans le café</textarea>
            </div>
        </div>

        <!-- Status & Actions -->
        <div class=\"card\">
            <h2>⚙️ Actions</h2>

            <div style=\"margin-bottom: 20px;\">
                <label for=\"status\"><strong>Changer Statut</strong></label>
                <select id=\"status\" style=\"margin-top: 10px; width: 100%;\">
                    <option>⏳ En Attente</option>
                    <option>👨‍🍳 En Préparation</option>
                    <option>✅ Prêt</option>
                    <option>📦 Livré</option>
                    <option>❌ Annulé</option>
                </select>
            </div>

            <button type=\"button\" class=\"btn btn-primary\" style=\"width: 100%; margin-bottom: 10px;\">💾 Mettre à Jour</button>
            <button type=\"button\" class=\"btn btn-secondary\" style=\"width: 100%; margin-bottom: 10px;\">🖨️ Imprimer</button>
            <button type=\"button\" class=\"btn btn-danger\" style=\"width: 100%;\">❌ Annuler Commande</button>

            <div style=\"margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;\">
                <h3 style=\"color: #2c3e50; margin-bottom: 10px;\">📊 Statut</h3>
                <div style=\"background: #f8f9fa; padding: 15px; border-radius: 5px;\">
                    <p style=\"margin-bottom: 5px;\"><strong>Actuel:</strong> En Attente</p>
                    <p style=\"color: #95a5a6; font-size: 0.9em;\">Créé il y a 30 minutes</p>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "admin/orders/detail.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\orders\\detail.html.twig");
    }
}
