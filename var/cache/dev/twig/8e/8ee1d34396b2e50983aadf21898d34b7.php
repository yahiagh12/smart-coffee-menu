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

/* client/account.html.twig */
class __TwigTemplate_a66579ee453b139bbeb8e5c572cc4df7 extends Template
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
            'client_content' => [$this, 'block_client_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base_notification.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "client/account.html.twig"));

        $this->parent = $this->load("base_notification.html.twig", 1);
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

        yield "Mon Compte Client";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_client_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "client_content"));

        // line 6
        yield "
    <!-- Profile card -->
    <div class=\"profile-card\">
        <img id=\"profile-pic\" src=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "picture", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 9, $this->source); })()), "picture", [], "any", false, false, false, 9), "data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"120\" height=\"120\"><rect width=\"100%\" height=\"100%\" fill=\"%23e2e8f0\"/><text x=\"50%\" y=\"50%\" dominant-baseline=\"middle\" text-anchor=\"middle\" font-size=\"20\" fill=\"%23222\">User</text></svg>")) : ("data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"120\" height=\"120\"><rect width=\"100%\" height=\"100%\" fill=\"%23e2e8f0\"/><text x=\"50%\" y=\"50%\" dominant-baseline=\"middle\" text-anchor=\"middle\" font-size=\"20\" fill=\"%23222\">User</text></svg>")), "html", null, true);
        yield "\" class=\"profile-pic\">
        <div style=\"margin-top:8px;\">
            <input type=\"file\" id=\"profile-image-input\" accept=\"image/*\" />
        </div>
        <div class=\"profile-info\">
            <h2>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "name", [], "any", true, true, false, 14)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 14, $this->source); })()), "name", [], "any", false, false, false, 14), "Nom Client")) : ("Nom Client")), "html", null, true);
        yield "</h2>
            <p>✉️ Email : ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", true, true, false, 15)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 15, $this->source); })()), "email", [], "any", false, false, false, 15), "email@example.com")) : ("email@example.com")), "html", null, true);
        yield "</p>
            <p>📞 Téléphone : ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "phone", [], "any", true, true, false, 16)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 16, $this->source); })()), "phone", [], "any", false, false, false, 16), "N/A")) : ("N/A")), "html", null, true);
        yield "</p>
            <button class=\"edit-profile-btn\">✏️ Modifier le profil</button>
        </div>
    </div>

    <!-- Summary cards -->
    <div class=\"summary-cards\">
        <div class=\"card\">
            <h3>⭐ Points Fidèle</h3>
            <p>";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "loyalty_points", [], "any", true, true, false, 25)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 25, $this->source); })()), "loyalty_points", [], "any", false, false, false, 25), ((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "points", [], "any", true, true, false, 25)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 25, $this->source); })()), "points", [], "any", false, false, false, 25), 0)) : (0)))) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "points", [], "any", true, true, false, 25)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 25, $this->source); })()), "points", [], "any", false, false, false, 25), 0)) : (0)))), "html", null, true);
        yield "</p>
        </div>
        <div class=\"card\">
            <h3>✅ Événements Approuvés</h3>
            ";
        // line 29
        $context["approvedCount"] = 0;
        // line 30
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "events", [], "any", true, true, false, 30)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 30, $this->source); })()), "events", [], "any", false, false, false, 30), [])) : ([])));
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 31
            yield "                ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "approved", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                $context["approvedCount"] = ((isset($context["approvedCount"]) || array_key_exists("approvedCount", $context) ? $context["approvedCount"] : (function () { throw new RuntimeError('Variable "approvedCount" does not exist.', 31, $this->source); })()) + 1);
            }
            // line 32
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        yield "            <p>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["approvedCount"]) || array_key_exists("approvedCount", $context) ? $context["approvedCount"] : (function () { throw new RuntimeError('Variable "approvedCount" does not exist.', 33, $this->source); })()), "html", null, true);
        yield "</p>
        </div>
    </div>

    <!-- Events section (overridable) -->
    <div class=\"section\">
        <h3>📅 Mes Demandes d'Événement</h3>
        <ul class=\"event-list\">
            ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "events", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 41, $this->source); })()), "events", [], "any", false, false, false, 41), [])) : ([])));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
            // line 42
            yield "                <li style=\"margin-bottom:12px;\">
                    <div style=\"display:flex;gap:12px;align-items:flex-start;\">
                        ";
            // line 44
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 45
                yield "                            <div style=\"flex:0 0 auto;\">
                                <img src=\"";
                // line 46
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "image", [], "any", false, false, false, 46), "html", null, true);
                yield "\" alt=\"Événement image\" style=\"max-width:160px;max-height:120px;border-radius:6px;border:1px solid #ddd;\" />
                            </div>
                        ";
            }
            // line 49
            yield "                        <div style=\"flex:1 1 auto;\">
                            <strong>";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "name", [], "any", false, false, false, 50), "html", null, true);
            yield "</strong><br>
                            Date : ";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "date", [], "any", false, false, false, 51), "html", null, true);
            yield "<br>
                            Description : ";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "description", [], "any", false, false, false, 52), "html", null, true);
            yield "<br>
                            Statut : ";
            // line 53
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "approved", [], "any", false, false, false, 53)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "✅ Approuvé";
            } else {
                yield "⏳ En attente";
            }
            // line 54
            yield "                        </div>
                    </div>
                </li>
            ";
            $context['_iterated'] = true;
        }
        // line 57
        if (!$context['_iterated']) {
            // line 58
            yield "                <li>Aucune demande d'événement pour le moment.</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        yield "        </ul>
    </div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 66
        yield "<script>
// Profile edit + upload handling
(function(){
    function init(){
    const STORAGE_KEY = 'preview_client';

    function safeParse(v){ try{ return JSON.parse(v||'null')||null }catch(e){ return null } }
    function safeParseObj(v){ try{ return JSON.parse(v||'null')||{} }catch(e){ return {} } }
    function escapeHtml(s){ return String(s).replace(/[&<>\\\"']/g, function(m){ return { '&':'&amp;','<':'&lt;','>':'&gt;','\\\"':'&quot;',\"'\":'&#39;' }[m] }) }

    const stored = safeParse(localStorage.getItem(STORAGE_KEY));
    const img = document.getElementById('profile-pic');
    const nameEl = () => document.querySelector('.profile-info h2');
    const emailEl = () => document.querySelector('.profile-info p:nth-of-type(1)');
    const phoneEl = () => document.querySelector('.profile-info p:nth-of-type(2)');

    if(stored){
        if(stored.picture) img.src = stored.picture;
        if(stored.name && nameEl()) nameEl().textContent = stored.name;
        if(stored.email && emailEl()) emailEl().textContent = '✉️ Email : ' + stored.email;
        if(stored.phone && phoneEl()) phoneEl().textContent = '📞 Téléphone : ' + stored.phone;
    }

    async function uploadFile(file){
        const fd = new FormData(); fd.append('file', file);
        // Use the normal client profile upload endpoint instead of generic API
        const res = await fetch('/client/profile/upload', { method: 'POST', body: fd });
        if(!res.ok) throw new Error('Upload failed: ' + res.status);
        return await res.json();
    }

    const fileInput = document.getElementById('profile-image-input');
    if (fileInput) {
        fileInput.addEventListener('change', async function(){
            const f = this.files[0]; if(!f) return;
        try{
            const data = await uploadFile(f);
            if(data && data.url){
                img.src = data.url;
                const existing = safeParseObj(localStorage.getItem(STORAGE_KEY));
                existing.picture = data.url; localStorage.setItem(STORAGE_KEY, JSON.stringify(existing));
            }
        }catch(err){
            console.error('Profile upload failed, falling back to local preview', err);
            const r = new FileReader(); r.onload = function(){ img.src = r.result; const existing = safeParseObj(localStorage.getItem(STORAGE_KEY)); existing.picture = r.result; localStorage.setItem(STORAGE_KEY, JSON.stringify(existing)); }; r.readAsDataURL(f);
        }
        });
    }

    // Edit profile behaviour
    function createEditButton(){
        const b = document.createElement('button'); b.className = 'edit-profile-btn btn btn-sm btn-primary'; b.textContent = '✏️ Modifier le profil';
        b.addEventListener('click', function(e){
            enterEditMode();
            // open file picker so user can immediately change photo
            const input = document.getElementById('profile-image-input'); if(input) input.click();
        });
        return b;
    }

    function enterEditMode(e){
        const profileInfo = document.querySelector('.profile-info');
        if(!profileInfo) return;
        const currentName = nameEl() ? nameEl().textContent : '';
        const currentEmail = emailEl() ? emailEl().textContent.replace('✉️ Email : ','') : '';
        const currentPhone = phoneEl() ? phoneEl().textContent.replace('📞 Téléphone : ','') : '';

        profileInfo.dataset.backup = profileInfo.innerHTML;

        profileInfo.innerHTML = `
            <div class=\"form-group\">
                <label>Nom</label>
                <input id=\"input-name\" type=\"text\" value=\"\${escapeHtml(currentName)}\" />
            </div>
            <div class=\"form-group\">
                <label>Email</label>
                <input id=\"input-email\" type=\"email\" value=\"\${escapeHtml(currentEmail)}\" />
            </div>
            <div class=\"form-group\">
                <label>Téléphone</label>
                <input id=\"input-phone\" type=\"text\" value=\"\${escapeHtml(currentPhone)}\" />
            </div>
            <div style=\"display:flex;gap:8px;margin-top:8px;\">
                <button id=\"save-profile-btn\" class=\"btn btn-success btn-sm\">💾 Enregistrer</button>
                <button id=\"cancel-profile-btn\" class=\"btn btn-secondary btn-sm\">✖ Annuler</button>
            </div>
        `;

        document.getElementById('save-profile-btn').addEventListener('click', function(){
            const name = document.getElementById('input-name').value.trim();
            const email = document.getElementById('input-email').value.trim();
            const phone = document.getElementById('input-phone').value.trim();

            // restore display
            profileInfo.innerHTML = `
                <h2>\${escapeHtml(name||'Nom Client')}</h2>
                <p>✉️ Email : \${escapeHtml(email||'email@example.com')}</p>
                <p>📞 Téléphone : \${escapeHtml(phone||'N/A')}</p>
            `;
            // re-add edit button
            profileInfo.appendChild(createEditButton());

            // persist
            const existing = safeParseObj(localStorage.getItem(STORAGE_KEY));
            if(name) existing.name = name; if(email) existing.email = email; if(phone) existing.phone = phone; localStorage.setItem(STORAGE_KEY, JSON.stringify(existing));
        });

        document.getElementById('cancel-profile-btn').addEventListener('click', function(){
            const backup = profileInfo.dataset.backup || '';
            profileInfo.innerHTML = backup;
            // rewire edit button
            const btn = profileInfo.querySelector('.edit-profile-btn');
            if(btn) btn.addEventListener('click', enterEditMode);
        });
    }

    // Ensure edit button is wired (in case template rendered static button)
    (function wireButton(){
        const existing = document.querySelector('.profile-info .edit-profile-btn');
        if(existing){
            existing.addEventListener('click', function(e){
                enterEditMode();
                const input = document.getElementById('profile-image-input'); if(input) input.click();
            });
        } else {
            const profileInfo = document.querySelector('.profile-info');
            if(profileInfo) profileInfo.appendChild(createEditButton());
        }
    })();

    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
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
        return "client/account.html.twig";
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
        return array (  234 => 66,  224 => 65,  213 => 60,  206 => 58,  204 => 57,  197 => 54,  191 => 53,  187 => 52,  183 => 51,  179 => 50,  176 => 49,  170 => 46,  167 => 45,  165 => 44,  161 => 42,  156 => 41,  144 => 33,  138 => 32,  133 => 31,  128 => 30,  126 => 29,  119 => 25,  107 => 16,  103 => 15,  99 => 14,  91 => 9,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base_notification.html.twig\" %}

{% block title %}Mon Compte Client{% endblock %}

{% block client_content %}

    <!-- Profile card -->
    <div class=\"profile-card\">
        <img id=\"profile-pic\" src=\"{{ client.picture|default('data:image/svg+xml;utf8,<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" width=\\\"120\\\" height=\\\"120\\\"><rect width=\\\"100%\\\" height=\\\"100%\\\" fill=\\\"%23e2e8f0\\\"/><text x=\\\"50%\\\" y=\\\"50%\\\" dominant-baseline=\\\"middle\\\" text-anchor=\\\"middle\\\" font-size=\\\"20\\\" fill=\\\"%23222\\\">User</text></svg>') }}\" class=\"profile-pic\">
        <div style=\"margin-top:8px;\">
            <input type=\"file\" id=\"profile-image-input\" accept=\"image/*\" />
        </div>
        <div class=\"profile-info\">
            <h2>{{ client.name|default('Nom Client') }}</h2>
            <p>✉️ Email : {{ client.email|default('email@example.com') }}</p>
            <p>📞 Téléphone : {{ client.phone|default('N/A') }}</p>
            <button class=\"edit-profile-btn\">✏️ Modifier le profil</button>
        </div>
    </div>

    <!-- Summary cards -->
    <div class=\"summary-cards\">
        <div class=\"card\">
            <h3>⭐ Points Fidèle</h3>
            <p>{{ client.loyalty_points|default(client.points|default(0)) }}</p>
        </div>
        <div class=\"card\">
            <h3>✅ Événements Approuvés</h3>
            {% set approvedCount = 0 %}
            {% for event in client.events|default([]) %}
                {% if event.approved %}{% set approvedCount = approvedCount + 1 %}{% endif %}
            {% endfor %}
            <p>{{ approvedCount }}</p>
        </div>
    </div>

    <!-- Events section (overridable) -->
    <div class=\"section\">
        <h3>📅 Mes Demandes d'Événement</h3>
        <ul class=\"event-list\">
            {% for event in client.events|default([]) %}
                <li style=\"margin-bottom:12px;\">
                    <div style=\"display:flex;gap:12px;align-items:flex-start;\">
                        {% if event.image %}
                            <div style=\"flex:0 0 auto;\">
                                <img src=\"{{ event.image }}\" alt=\"Événement image\" style=\"max-width:160px;max-height:120px;border-radius:6px;border:1px solid #ddd;\" />
                            </div>
                        {% endif %}
                        <div style=\"flex:1 1 auto;\">
                            <strong>{{ event.name }}</strong><br>
                            Date : {{ event.date }}<br>
                            Description : {{ event.description }}<br>
                            Statut : {% if event.approved %}✅ Approuvé{% else %}⏳ En attente{% endif %}
                        </div>
                    </div>
                </li>
            {% else %}
                <li>Aucune demande d'événement pour le moment.</li>
            {% endfor %}
        </ul>
    </div>

{% endblock %}

{% block javascripts %}
<script>
// Profile edit + upload handling
(function(){
    function init(){
    const STORAGE_KEY = 'preview_client';

    function safeParse(v){ try{ return JSON.parse(v||'null')||null }catch(e){ return null } }
    function safeParseObj(v){ try{ return JSON.parse(v||'null')||{} }catch(e){ return {} } }
    function escapeHtml(s){ return String(s).replace(/[&<>\\\"']/g, function(m){ return { '&':'&amp;','<':'&lt;','>':'&gt;','\\\"':'&quot;',\"'\":'&#39;' }[m] }) }

    const stored = safeParse(localStorage.getItem(STORAGE_KEY));
    const img = document.getElementById('profile-pic');
    const nameEl = () => document.querySelector('.profile-info h2');
    const emailEl = () => document.querySelector('.profile-info p:nth-of-type(1)');
    const phoneEl = () => document.querySelector('.profile-info p:nth-of-type(2)');

    if(stored){
        if(stored.picture) img.src = stored.picture;
        if(stored.name && nameEl()) nameEl().textContent = stored.name;
        if(stored.email && emailEl()) emailEl().textContent = '✉️ Email : ' + stored.email;
        if(stored.phone && phoneEl()) phoneEl().textContent = '📞 Téléphone : ' + stored.phone;
    }

    async function uploadFile(file){
        const fd = new FormData(); fd.append('file', file);
        // Use the normal client profile upload endpoint instead of generic API
        const res = await fetch('/client/profile/upload', { method: 'POST', body: fd });
        if(!res.ok) throw new Error('Upload failed: ' + res.status);
        return await res.json();
    }

    const fileInput = document.getElementById('profile-image-input');
    if (fileInput) {
        fileInput.addEventListener('change', async function(){
            const f = this.files[0]; if(!f) return;
        try{
            const data = await uploadFile(f);
            if(data && data.url){
                img.src = data.url;
                const existing = safeParseObj(localStorage.getItem(STORAGE_KEY));
                existing.picture = data.url; localStorage.setItem(STORAGE_KEY, JSON.stringify(existing));
            }
        }catch(err){
            console.error('Profile upload failed, falling back to local preview', err);
            const r = new FileReader(); r.onload = function(){ img.src = r.result; const existing = safeParseObj(localStorage.getItem(STORAGE_KEY)); existing.picture = r.result; localStorage.setItem(STORAGE_KEY, JSON.stringify(existing)); }; r.readAsDataURL(f);
        }
        });
    }

    // Edit profile behaviour
    function createEditButton(){
        const b = document.createElement('button'); b.className = 'edit-profile-btn btn btn-sm btn-primary'; b.textContent = '✏️ Modifier le profil';
        b.addEventListener('click', function(e){
            enterEditMode();
            // open file picker so user can immediately change photo
            const input = document.getElementById('profile-image-input'); if(input) input.click();
        });
        return b;
    }

    function enterEditMode(e){
        const profileInfo = document.querySelector('.profile-info');
        if(!profileInfo) return;
        const currentName = nameEl() ? nameEl().textContent : '';
        const currentEmail = emailEl() ? emailEl().textContent.replace('✉️ Email : ','') : '';
        const currentPhone = phoneEl() ? phoneEl().textContent.replace('📞 Téléphone : ','') : '';

        profileInfo.dataset.backup = profileInfo.innerHTML;

        profileInfo.innerHTML = `
            <div class=\"form-group\">
                <label>Nom</label>
                <input id=\"input-name\" type=\"text\" value=\"\${escapeHtml(currentName)}\" />
            </div>
            <div class=\"form-group\">
                <label>Email</label>
                <input id=\"input-email\" type=\"email\" value=\"\${escapeHtml(currentEmail)}\" />
            </div>
            <div class=\"form-group\">
                <label>Téléphone</label>
                <input id=\"input-phone\" type=\"text\" value=\"\${escapeHtml(currentPhone)}\" />
            </div>
            <div style=\"display:flex;gap:8px;margin-top:8px;\">
                <button id=\"save-profile-btn\" class=\"btn btn-success btn-sm\">💾 Enregistrer</button>
                <button id=\"cancel-profile-btn\" class=\"btn btn-secondary btn-sm\">✖ Annuler</button>
            </div>
        `;

        document.getElementById('save-profile-btn').addEventListener('click', function(){
            const name = document.getElementById('input-name').value.trim();
            const email = document.getElementById('input-email').value.trim();
            const phone = document.getElementById('input-phone').value.trim();

            // restore display
            profileInfo.innerHTML = `
                <h2>\${escapeHtml(name||'Nom Client')}</h2>
                <p>✉️ Email : \${escapeHtml(email||'email@example.com')}</p>
                <p>📞 Téléphone : \${escapeHtml(phone||'N/A')}</p>
            `;
            // re-add edit button
            profileInfo.appendChild(createEditButton());

            // persist
            const existing = safeParseObj(localStorage.getItem(STORAGE_KEY));
            if(name) existing.name = name; if(email) existing.email = email; if(phone) existing.phone = phone; localStorage.setItem(STORAGE_KEY, JSON.stringify(existing));
        });

        document.getElementById('cancel-profile-btn').addEventListener('click', function(){
            const backup = profileInfo.dataset.backup || '';
            profileInfo.innerHTML = backup;
            // rewire edit button
            const btn = profileInfo.querySelector('.edit-profile-btn');
            if(btn) btn.addEventListener('click', enterEditMode);
        });
    }

    // Ensure edit button is wired (in case template rendered static button)
    (function wireButton(){
        const existing = document.querySelector('.profile-info .edit-profile-btn');
        if(existing){
            existing.addEventListener('click', function(e){
                enterEditMode();
                const input = document.getElementById('profile-image-input'); if(input) input.click();
            });
        } else {
            const profileInfo = document.querySelector('.profile-info');
            if(profileInfo) profileInfo.appendChild(createEditButton());
        }
    })();

    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
</script>
{% endblock %}
", "client/account.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\client\\account.html.twig");
    }
}
