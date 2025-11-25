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
class __TwigTemplate_fe76a04dcbd1a4c9dc8d5a809a22380d extends Template
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
        <form id=\"points-form\" method=\"post\" action=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_loyalty");
        yield "\" style=\"display:flex; gap:8px; align-items:center;\">
            <label for=\"points_per_order\" style=\"font-weight:600;\">Points par commande</label>
            <input id=\"points_per_order\" name=\"points_per_order\" type=\"number\" value=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("current", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 12, $this->source); })()), 10)) : (10)), "html", null, true);
        yield "\" min=\"0\" style=\"width:100px;padding:6px;border:1px solid #ddd;border-radius:4px;\">
            <button type=\"submit\" class=\"btn btn-primary\">Mettre à jour</button>
        </form>
        <button id=\"show-config\" class=\"btn btn-secondary\">Voir valeur actuelle</button>
        <div id=\"current-value\" style=\"margin-left:8px;color:#555;font-weight:600;\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("current", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 16, $this->source); })()), 10)) : (10)), "html", null, true);
        yield "</div>
    </div>
    <div class=\"table-responsive\">
        <table id=\"loyalty-table\">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client Identifier</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 28
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["records"]) || array_key_exists("records", $context) ? $context["records"] : (function () { throw new RuntimeError('Variable "records" does not exist.', 28, $this->source); })()))) {
            // line 29
            yield "                    <tr><td colspan=\"3\">Aucun enregistrement trouvé.</td></tr>
                ";
        } else {
            // line 31
            yield "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["records"]) || array_key_exists("records", $context) ? $context["records"] : (function () { throw new RuntimeError('Variable "records" does not exist.', 31, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 32
                yield "                        <tr>
                            <td>";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 33), "html", null, true);
                yield "</td>
                            <td>";
                // line 34
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["r"], "clientIdentifier", [], "any", false, false, false, 34)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "clientIdentifier", [], "any", false, false, false, 34), "html", null, true)) : ("(non renseigné)"));
                yield "</td>
                            <td>";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "points", [], "any", false, false, false, 35), "html", null, true);
                yield "</td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            yield "                ";
        }
        // line 39
        yield "            </tbody>
        </table>
    </div>
</div>

    <script>
    (function(){
        const form = document.getElementById('points-form');
        const currentEl = document.getElementById('current-value');

        // AJAX submit to update config without full reload
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const fd = new URLSearchParams();
            fd.append('points_per_order', document.getElementById('points_per_order').value);

            // Prefer calling the dedicated API endpoint for JSON responses
            const apiUrl = '";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_loyalty_api");
        yield "';
            fetch(apiUrl, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/x-www-form-urlencoded' },
                body: fd.toString()
            }).then(r=>{
                if (!r.ok) throw new Error('Network response was not ok');
                // Try to parse JSON, but if it's not JSON, reload the page
                return r.text().then(text => {
                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.warn('Response not JSON, reloading page to reflect changes');
                        window.location.reload();
                        // return a resolved promise to stop further processing
                        return Promise.reject('reloaded');
                    }
                });
            }).then(data=>{
                if (data && data.current !== undefined) {
                    // update both the displayed current value and the input value
                    currentEl.textContent = data.current;
                    const input = document.getElementById('points_per_order');
                    if (input) input.value = data.current;
                    if (data.debug) console.info('Server debug:', data.debug);
                }
                if (data && data.error) {
                    alert('Server error: ' + (data.exception || data.error));
                }
            }).catch(err=>{
                if (err === 'reloaded') return;
                // on error fallback to form submit to keep behavior working
                console.error('Update failed, falling back to full submit', err);
                form.submit();
            });
        });

        // show-config button reveals current value (already rendered server-side)
        document.getElementById('show-config').addEventListener('click', function(){
            currentEl.style.display = 'inline-block';
        });
    })();
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
        return array (  171 => 56,  152 => 39,  149 => 38,  140 => 35,  136 => 34,  132 => 33,  129 => 32,  124 => 31,  120 => 29,  118 => 28,  103 => 16,  96 => 12,  91 => 10,  85 => 6,  75 => 5,  58 => 3,  41 => 1,);
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
        <form id=\"points-form\" method=\"post\" action=\"{{ path('admin_loyalty') }}\" style=\"display:flex; gap:8px; align-items:center;\">
            <label for=\"points_per_order\" style=\"font-weight:600;\">Points par commande</label>
            <input id=\"points_per_order\" name=\"points_per_order\" type=\"number\" value=\"{{ current|default(10) }}\" min=\"0\" style=\"width:100px;padding:6px;border:1px solid #ddd;border-radius:4px;\">
            <button type=\"submit\" class=\"btn btn-primary\">Mettre à jour</button>
        </form>
        <button id=\"show-config\" class=\"btn btn-secondary\">Voir valeur actuelle</button>
        <div id=\"current-value\" style=\"margin-left:8px;color:#555;font-weight:600;\">{{ current|default(10) }}</div>
    </div>
    <div class=\"table-responsive\">
        <table id=\"loyalty-table\">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client Identifier</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                {% if records is empty %}
                    <tr><td colspan=\"3\">Aucun enregistrement trouvé.</td></tr>
                {% else %}
                    {% for r in records %}
                        <tr>
                            <td>{{ r.id }}</td>
                            <td>{{ r.clientIdentifier ?: '(non renseigné)' }}</td>
                            <td>{{ r.points }}</td>
                        </tr>
                    {% endfor %}
                {% endif %}
            </tbody>
        </table>
    </div>
</div>

    <script>
    (function(){
        const form = document.getElementById('points-form');
        const currentEl = document.getElementById('current-value');

        // AJAX submit to update config without full reload
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const fd = new URLSearchParams();
            fd.append('points_per_order', document.getElementById('points_per_order').value);

            // Prefer calling the dedicated API endpoint for JSON responses
            const apiUrl = '{{ path('admin_loyalty_api') }}';
            fetch(apiUrl, {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/x-www-form-urlencoded' },
                body: fd.toString()
            }).then(r=>{
                if (!r.ok) throw new Error('Network response was not ok');
                // Try to parse JSON, but if it's not JSON, reload the page
                return r.text().then(text => {
                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.warn('Response not JSON, reloading page to reflect changes');
                        window.location.reload();
                        // return a resolved promise to stop further processing
                        return Promise.reject('reloaded');
                    }
                });
            }).then(data=>{
                if (data && data.current !== undefined) {
                    // update both the displayed current value and the input value
                    currentEl.textContent = data.current;
                    const input = document.getElementById('points_per_order');
                    if (input) input.value = data.current;
                    if (data.debug) console.info('Server debug:', data.debug);
                }
                if (data && data.error) {
                    alert('Server error: ' + (data.exception || data.error));
                }
            }).catch(err=>{
                if (err === 'reloaded') return;
                // on error fallback to form submit to keep behavior working
                console.error('Update failed, falling back to full submit', err);
                form.submit();
            });
        });

        // show-config button reveals current value (already rendered server-side)
        document.getElementById('show-config').addEventListener('click', function(){
            currentEl.style.display = 'inline-block';
        });
    })();
    </script>

{% endblock %}
", "admin/loyalty/list.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\loyalty\\list.html.twig");
    }
}
