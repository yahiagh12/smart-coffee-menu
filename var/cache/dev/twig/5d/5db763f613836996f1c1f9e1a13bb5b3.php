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

/* admin/menu/form.html.twig */
class __TwigTemplate_7509537e7780f1b28f025dc3e790be27 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menu/form.html.twig"));

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

        if ((($tmp = (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 3, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "Éditer Produit";
        } else {
            yield "Ajouter Produit";
        }
        
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
        <h2>";
        // line 7
        if ((($tmp = (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 7, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "✏️ Éditer Produit";
        } else {
            yield "➕ Ajouter un Produit";
        }
        yield "</h2>

        <form method=\"POST\" style=\"max-width: 600px;\">
            <div class=\"form-group\">
                <label for=\"name\">Nom du Produit *</label>
                <input type=\"text\" id=\"name\" name=\"name\" required placeholder=\"Ex: Espresso\">
            </div>

            <div class=\"form-group\">
                <label for=\"category\">Catégorie *</label>
                <select id=\"category\" name=\"category\" required>
                    <option value=\"\">-- Sélectionner une catégorie --</option>
                    <option value=\"1\">Cafés</option>
                    <option value=\"2\">Pâtisseries</option>
                    <option value=\"3\">Desserts</option>
                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"description\">Description *</label>
                <textarea id=\"description\" name=\"description\" required rows=\"4\" placeholder=\"Description du produit\"></textarea>
            </div>

            <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px;\">
                <div class=\"form-group\">
                    <label for=\"price\">Prix (€) *</label>
                    <input type=\"number\" id=\"price\" name=\"price\" required step=\"0.01\" placeholder=\"0.00\">
                </div>

                <div class=\"form-group\">
                    <label for=\"stock\">Stock *</label>
                    <input type=\"number\" id=\"stock\" name=\"stock\" required min=\"0\" placeholder=\"0\">
                </div>
            </div>

            <div class=\"form-group\">
                <label for=\"image\">Image du Produit</label>
                <input type=\"text\" id=\"image\" name=\"image\" placeholder=\"URL de l'image\">
            </div>

            <div class=\"form-group\">
                <label>
                    <input type=\"checkbox\" name=\"available\" checked>
                    Produit disponible
                </label>
            </div>

            <div style=\"display: flex; gap: 10px;\">
                <button type=\"submit\" class=\"btn btn-success\">💾 Enregistrer</button>
                <a href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_menu_list");
        yield "\" class=\"btn btn-secondary\">Annuler</a>
            </div>
        </form>
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
        return "admin/menu/form.html.twig";
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
        return array (  148 => 56,  92 => 7,  89 => 6,  79 => 5,  58 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"admin/base.html.twig\" %}

{% block page_title %}{% if product %}Éditer Produit{% else %}Ajouter Produit{% endif %}{% endblock %}

{% block admin_content %}
    <div class=\"card\">
        <h2>{% if product %}✏️ Éditer Produit{% else %}➕ Ajouter un Produit{% endif %}</h2>

        <form method=\"POST\" style=\"max-width: 600px;\">
            <div class=\"form-group\">
                <label for=\"name\">Nom du Produit *</label>
                <input type=\"text\" id=\"name\" name=\"name\" required placeholder=\"Ex: Espresso\">
            </div>

            <div class=\"form-group\">
                <label for=\"category\">Catégorie *</label>
                <select id=\"category\" name=\"category\" required>
                    <option value=\"\">-- Sélectionner une catégorie --</option>
                    <option value=\"1\">Cafés</option>
                    <option value=\"2\">Pâtisseries</option>
                    <option value=\"3\">Desserts</option>
                </select>
            </div>

            <div class=\"form-group\">
                <label for=\"description\">Description *</label>
                <textarea id=\"description\" name=\"description\" required rows=\"4\" placeholder=\"Description du produit\"></textarea>
            </div>

            <div style=\"display: grid; grid-template-columns: 1fr 1fr; gap: 20px;\">
                <div class=\"form-group\">
                    <label for=\"price\">Prix (€) *</label>
                    <input type=\"number\" id=\"price\" name=\"price\" required step=\"0.01\" placeholder=\"0.00\">
                </div>

                <div class=\"form-group\">
                    <label for=\"stock\">Stock *</label>
                    <input type=\"number\" id=\"stock\" name=\"stock\" required min=\"0\" placeholder=\"0\">
                </div>
            </div>

            <div class=\"form-group\">
                <label for=\"image\">Image du Produit</label>
                <input type=\"text\" id=\"image\" name=\"image\" placeholder=\"URL de l'image\">
            </div>

            <div class=\"form-group\">
                <label>
                    <input type=\"checkbox\" name=\"available\" checked>
                    Produit disponible
                </label>
            </div>

            <div style=\"display: flex; gap: 10px;\">
                <button type=\"submit\" class=\"btn btn-success\">💾 Enregistrer</button>
                <a href=\"{{ path('admin_menu_list') }}\" class=\"btn btn-secondary\">Annuler</a>
            </div>
        </form>
    </div>
{% endblock %}
", "admin/menu/form.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\menu\\form.html.twig");
    }
}
