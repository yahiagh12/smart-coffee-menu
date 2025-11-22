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

/* admin/menu/categories.html.twig */
class __TwigTemplate_1c75a8dfba5b734ecee8e0bf24daef21 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/menu/categories.html.twig"));

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

        yield "Gestion des Catégories";
        
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
        <h2>➕ Nouvelle Catégorie</h2>
        <form id=\"cat-form\">
            <div class=\"form-group\"><label>Nom *</label><input type=\"text\" id=\"cat-name\" required style=\"width:100%\" /></div>
            <div class=\"form-group\"><label>Description</label><textarea id=\"cat-desc\" rows=\"3\" style=\"width:100%\"></textarea></div>
            <div style=\"display:flex; gap:10px; justify-content:flex-end;\"><button type=\"submit\" id=\"cat-add-btn\" class=\"btn btn-success\">Créer</button></div>
        </form>

        <h2 style=\"margin-top:20px;\">📂 Catégories</h2>
        <div class=\"table-responsive\">
            <table>
                <thead>
                    <tr><th>Nom</th><th>Description</th><th>Actions</th></tr>
                </thead>
                <tbody id=\"cats-tbody\"></tbody>
            </table>
        </div>

        <!-- Modal for edit/delete category -->
        <div id=\"cat-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
            <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:420px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
                <h3 id=\"cat-modal-title\">Éditer la catégorie</h3>
                <form id=\"cat-edit-form\">
                    <input type=\"hidden\" id=\"cat-id\" />
                    <div class=\"form-group\"><label>Nom</label><input type=\"text\" id=\"cat-edit-name\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Description</label><textarea id=\"cat-edit-desc\" rows=\"3\" style=\"width:100%\"></textarea></div>
                    <div style=\"display:flex; gap:10px; justify-content:flex-end; margin-top:10px;\"><button type=\"button\" id=\"cat-cancel\" class=\"btn btn-secondary\">Annuler</button><button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button></div>
                </form>
                <div style=\"margin-top:10px; text-align:right;\"><button id=\"cat-delete\" class=\"btn btn-danger\">Supprimer la catégorie</button></div>
            </div>
        </div>
    </div>

    <script>
    (function(){
        function readCats(){try{return JSON.parse(localStorage.getItem('preview_menu_categories')||'null')||[]}catch(e){return[]}}
        function saveCats(c){localStorage.setItem('preview_menu_categories',JSON.stringify(c))}
        const tbody=document.getElementById('cats-tbody');

        function escapeHtml(s){ if(!s) return ''; return String(s).replace(/[&<>\"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;',\"'\":'&#39;'}[m]; }); }

        function render(){
            tbody.innerHTML='';
            const cats=readCats();
            cats.forEach((c,idx)=>{
                const tr=document.createElement('tr');
                const name = c && c.name ? c.name : '';
                const desc = c && c.desc ? c.desc : '';
                tr.innerHTML = `<td>\${escapeHtml(name)}</td><td>\${escapeHtml(desc)}</td><td><button class=\"btn btn-primary btn-sm\" data-id=\"\${idx}\" data-action=\"edit\">Éditer</button> <button class=\"btn btn-danger btn-sm\" data-id=\"\${idx}\" data-action=\"del\">Supprimer</button></td>`;
                tbody.appendChild(tr);
            });
            tbody.querySelectorAll('button').forEach(b=>b.onclick=function(){ const id=parseInt(this.dataset.id,10); const action=this.dataset.action; if(action==='edit'){ openCatModal(id); } if(action==='del'){ if(!confirm('Supprimer cette catégorie ?')) return; let c=readCats(); c.splice(id,1); saveCats(c); render(); } });
        }

        document.getElementById('cat-form').addEventListener('submit', function(e){
            e.preventDefault();
            const name=document.getElementById('cat-name').value.trim();
            const desc=document.getElementById('cat-desc').value.trim();
            if(!name) return;
            let c=readCats();
            c.push({name:name, desc:desc});
            saveCats(c);
            document.getElementById('cat-name').value=''; document.getElementById('cat-desc').value='';
            render();
        });

        function openCatModal(id){ const modal=document.getElementById('cat-modal'); const title=document.getElementById('cat-modal-title'); const hid=document.getElementById('cat-id'); const name=document.getElementById('cat-edit-name'); const desc=document.getElementById('cat-edit-desc'); const cats=readCats(); const item = cats[id] || {name:'',desc:''}; hid.value=id; name.value=item.name||''; desc.value=item.desc||''; modal.style.display='flex'; }
        function closeCatModal(){ document.getElementById('cat-modal').style.display='none'; }
        document.getElementById('cat-cancel').addEventListener('click', closeCatModal);
        document.getElementById('cat-edit-form').addEventListener('submit', function(e){ e.preventDefault(); const id=parseInt(document.getElementById('cat-id').value,10); const name=document.getElementById('cat-edit-name').value.trim(); const desc=document.getElementById('cat-edit-desc').value.trim(); if(!name) return; let c=readCats(); c[id]={name:name, desc:desc}; saveCats(c); closeCatModal(); render(); });
        document.getElementById('cat-delete').addEventListener('click', function(){ if(!confirm('Supprimer définitivement cette catégorie ?')) return; const id=parseInt(document.getElementById('cat-id').value,10); let c=readCats(); c.splice(id,1); saveCats(c); closeCatModal(); render(); });

        // initialize defaults if empty
        if(!localStorage.getItem('preview_menu_categories')){ saveCats([{name:'Cafés',desc:''},{name:'Boissons',desc:''},{name:'Pâtisseries',desc:''},{name:'Desserts',desc:''}]); }
        render();
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
        return "admin/menu/categories.html.twig";
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

{% block page_title %}Gestion des Catégories{% endblock %}

{% block admin_content %}
    <div class=\"card\">
        <h2>➕ Nouvelle Catégorie</h2>
        <form id=\"cat-form\">
            <div class=\"form-group\"><label>Nom *</label><input type=\"text\" id=\"cat-name\" required style=\"width:100%\" /></div>
            <div class=\"form-group\"><label>Description</label><textarea id=\"cat-desc\" rows=\"3\" style=\"width:100%\"></textarea></div>
            <div style=\"display:flex; gap:10px; justify-content:flex-end;\"><button type=\"submit\" id=\"cat-add-btn\" class=\"btn btn-success\">Créer</button></div>
        </form>

        <h2 style=\"margin-top:20px;\">📂 Catégories</h2>
        <div class=\"table-responsive\">
            <table>
                <thead>
                    <tr><th>Nom</th><th>Description</th><th>Actions</th></tr>
                </thead>
                <tbody id=\"cats-tbody\"></tbody>
            </table>
        </div>

        <!-- Modal for edit/delete category -->
        <div id=\"cat-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
            <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:420px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
                <h3 id=\"cat-modal-title\">Éditer la catégorie</h3>
                <form id=\"cat-edit-form\">
                    <input type=\"hidden\" id=\"cat-id\" />
                    <div class=\"form-group\"><label>Nom</label><input type=\"text\" id=\"cat-edit-name\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Description</label><textarea id=\"cat-edit-desc\" rows=\"3\" style=\"width:100%\"></textarea></div>
                    <div style=\"display:flex; gap:10px; justify-content:flex-end; margin-top:10px;\"><button type=\"button\" id=\"cat-cancel\" class=\"btn btn-secondary\">Annuler</button><button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button></div>
                </form>
                <div style=\"margin-top:10px; text-align:right;\"><button id=\"cat-delete\" class=\"btn btn-danger\">Supprimer la catégorie</button></div>
            </div>
        </div>
    </div>

    <script>
    (function(){
        function readCats(){try{return JSON.parse(localStorage.getItem('preview_menu_categories')||'null')||[]}catch(e){return[]}}
        function saveCats(c){localStorage.setItem('preview_menu_categories',JSON.stringify(c))}
        const tbody=document.getElementById('cats-tbody');

        function escapeHtml(s){ if(!s) return ''; return String(s).replace(/[&<>\"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;',\"'\":'&#39;'}[m]; }); }

        function render(){
            tbody.innerHTML='';
            const cats=readCats();
            cats.forEach((c,idx)=>{
                const tr=document.createElement('tr');
                const name = c && c.name ? c.name : '';
                const desc = c && c.desc ? c.desc : '';
                tr.innerHTML = `<td>\${escapeHtml(name)}</td><td>\${escapeHtml(desc)}</td><td><button class=\"btn btn-primary btn-sm\" data-id=\"\${idx}\" data-action=\"edit\">Éditer</button> <button class=\"btn btn-danger btn-sm\" data-id=\"\${idx}\" data-action=\"del\">Supprimer</button></td>`;
                tbody.appendChild(tr);
            });
            tbody.querySelectorAll('button').forEach(b=>b.onclick=function(){ const id=parseInt(this.dataset.id,10); const action=this.dataset.action; if(action==='edit'){ openCatModal(id); } if(action==='del'){ if(!confirm('Supprimer cette catégorie ?')) return; let c=readCats(); c.splice(id,1); saveCats(c); render(); } });
        }

        document.getElementById('cat-form').addEventListener('submit', function(e){
            e.preventDefault();
            const name=document.getElementById('cat-name').value.trim();
            const desc=document.getElementById('cat-desc').value.trim();
            if(!name) return;
            let c=readCats();
            c.push({name:name, desc:desc});
            saveCats(c);
            document.getElementById('cat-name').value=''; document.getElementById('cat-desc').value='';
            render();
        });

        function openCatModal(id){ const modal=document.getElementById('cat-modal'); const title=document.getElementById('cat-modal-title'); const hid=document.getElementById('cat-id'); const name=document.getElementById('cat-edit-name'); const desc=document.getElementById('cat-edit-desc'); const cats=readCats(); const item = cats[id] || {name:'',desc:''}; hid.value=id; name.value=item.name||''; desc.value=item.desc||''; modal.style.display='flex'; }
        function closeCatModal(){ document.getElementById('cat-modal').style.display='none'; }
        document.getElementById('cat-cancel').addEventListener('click', closeCatModal);
        document.getElementById('cat-edit-form').addEventListener('submit', function(e){ e.preventDefault(); const id=parseInt(document.getElementById('cat-id').value,10); const name=document.getElementById('cat-edit-name').value.trim(); const desc=document.getElementById('cat-edit-desc').value.trim(); if(!name) return; let c=readCats(); c[id]={name:name, desc:desc}; saveCats(c); closeCatModal(); render(); });
        document.getElementById('cat-delete').addEventListener('click', function(){ if(!confirm('Supprimer définitivement cette catégorie ?')) return; const id=parseInt(document.getElementById('cat-id').value,10); let c=readCats(); c.splice(id,1); saveCats(c); closeCatModal(); render(); });

        // initialize defaults if empty
        if(!localStorage.getItem('preview_menu_categories')){ saveCats([{name:'Cafés',desc:''},{name:'Boissons',desc:''},{name:'Pâtisseries',desc:''},{name:'Desserts',desc:''}]); }
        render();
    })();
    </script>
{% endblock %}
", "admin/menu/categories.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\menu\\categories.html.twig");
    }
}
