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

/* admin/users/list.html.twig */
class __TwigTemplate_49a5c5324056ed4e7866f04bb95fedf6 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/users/list.html.twig"));

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

        yield "Gestion des Utilisateurs";
        
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
        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;\">
            <h2>👥 Liste des Utilisateurs</h2>
            <button id=\"add-user\" class=\"btn btn-success\">+ Ajouter Utilisateur</button>
        </div>

        <div class=\"table-responsive\">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Statut</th>
                        <th>Inscrit le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id=\"users-tbody\"></tbody>
            </table>
        </div>
        </div>

        <!-- Modal for Add / Edit User -->
        <div id=\"user-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
            <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:420px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
                <h3 id=\"modal-title\">Ajouter un utilisateur</h3>
                <form id=\"user-form\">
                    <input type=\"hidden\" id=\"user-id\" />
                    <div class=\"form-group\"><label>Nom</label><input type=\"text\" id=\"user-lastname\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Prénom</label><input type=\"text\" id=\"user-firstname\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Email</label><input type=\"email\" id=\"user-email\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Téléphone</label><input type=\"text\" id=\"user-phone\" style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Adresse</label><input type=\"text\" id=\"user-address\" style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Rôle</label>
                        <select id=\"user-role\" style=\"width:100%\">
                            <option value=\"client\">Client</option>
                            <option value=\"traiteur\">Traiteur</option>
                            <option value=\"admin\">Admin</option>
                        </select>
                    </div>
                    <div class=\"form-group\" id=\"points-row\" style=\"display:none\"><label>Points fidél</label><input type=\"number\" id=\"user-points\" min=\"0\" value=\"0\" style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Mot de passe</label><input type=\"password\" id=\"user-password\" style=\"width:100%\" autocomplete=\"new-password\" /></div>
                    <div class=\"form-group\"><label>Confirmer mot de passe</label><input type=\"password\" id=\"user-password-confirm\" style=\"width:100%\" autocomplete=\"new-password\" /></div>
                    <div style=\"display:flex; gap:10px; justify-content:flex-end; margin-top:10px;\"><button type=\"button\" id=\"user-cancel\" class=\"btn btn-secondary\">Annuler</button><button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button></div>
                </form>
            </div>
        </div>

        <script>
        (function(){
            function readUsers(){try{return JSON.parse(localStorage.getItem('preview_users')||'null')||[]}catch(e){return[]}}
            function saveUsers(u){localStorage.setItem('preview_users',JSON.stringify(u))}
            const tbody=document.getElementById('users-tbody');
            function render(){
                tbody.innerHTML='';
                const users=readUsers();
                users.forEach(u=>{
                    const tr=document.createElement('tr');
                    const status = u.active? '<span class=\"badge badge-success\">Actif</span>' : '<span class=\"badge badge-danger\">Inactif</span>';
                    const points = (u.role==='client')? (u.points||0) : '-';
                    tr.innerHTML = `<td>\${u.id}</td><td>\${u.lastname||''}</td><td>\${u.firstname||''}</td><td>\${u.email}</td><td>\${u.phone||''}</td><td>\${u.address||''}</td><td>\${u.role||''}</td><td>\${points}</td><td>\${status}</td><td>\${u.created||''}</td><td><button class=\"btn btn-primary btn-sm\" data-id=\"\${u.id}\" data-action=\"edit\">Éditer</button> <button class=\"btn btn-danger btn-sm\" data-id=\"\${u.id}\" data-action=\"del\">Supprimer</button></td>`;
                    tbody.appendChild(tr);
                });
                tbody.querySelectorAll('button').forEach(b=>b.onclick = function(e){
                    const id=parseInt(this.dataset.id,10); const action=this.dataset.action;
                    if(action==='del'){ if(!confirm('Supprimer cet utilisateur ?')) return; let list=readUsers(); list=list.filter(x=>x.id!==id); saveUsers(list); render(); return; }
                    if(action==='edit'){ openUserModal('edit', id); }
                });
            }

            function openUserModal(mode, id){
                const modal=document.getElementById('user-modal');
                const title=document.getElementById('modal-title');
                const hid=document.getElementById('user-id');
                const lastname=document.getElementById('user-lastname');
                const firstname=document.getElementById('user-firstname');
                const email=document.getElementById('user-email');
                const phone=document.getElementById('user-phone');
                const address=document.getElementById('user-address');
                const role=document.getElementById('user-role');
                const pointsRow=document.getElementById('points-row');
                const points=document.getElementById('user-points');
                const pwd=document.getElementById('user-password');
                const pwdc=document.getElementById('user-password-confirm');
                if(mode==='edit'){
                    const list=readUsers(); const item=list.find(x=>x.id===id);
                    title.textContent='Éditer un utilisateur'; hid.value=item.id;
                    lastname.value=item.lastname||''; firstname.value=item.firstname||''; email.value=item.email||''; phone.value=item.phone||''; address.value=item.address||'';
                    role.value=item.role||'client';
                    if(role.value==='client'){ pointsRow.style.display='block'; points.value=item.points||0; } else { pointsRow.style.display='none'; points.value=0; }
                    pwd.value=''; pwdc.value='';
                } else {
                    title.textContent='Ajouter un utilisateur'; hid.value=''; lastname.value=''; firstname.value=''; email.value=''; phone.value=''; address.value=''; role.value='client'; pointsRow.style.display='block'; points.value=0; pwd.value=''; pwdc.value='';
                }
                modal.style.display='flex';
            }

            function closeUserModal(){ document.getElementById('user-modal').style.display='none'; }

            document.getElementById('add-user').addEventListener('click', function(){ openUserModal('add'); });
            document.getElementById('user-cancel').addEventListener('click', function(){ closeUserModal(); });
            document.getElementById('user-role').addEventListener('change', function(){ const pointsRow=document.getElementById('points-row'); if(this.value==='client'){ pointsRow.style.display='block'; } else { pointsRow.style.display='none'; } });

            document.getElementById('user-form').addEventListener('submit', function(e){
                e.preventDefault();
                const hid=document.getElementById('user-id').value;
                const lastname=document.getElementById('user-lastname').value.trim();
                const firstname=document.getElementById('user-firstname').value.trim();
                const email=document.getElementById('user-email').value.trim();
                const phone=document.getElementById('user-phone').value.trim();
                const address=document.getElementById('user-address').value.trim();
                const role=document.getElementById('user-role').value;
                const points=parseInt(document.getElementById('user-points').value,10)||0;
                const pwd=document.getElementById('user-password').value;
                const pwdc=document.getElementById('user-password-confirm').value;
                if(pwd || pwdc){ if(pwd!==pwdc){ alert('Les mots de passe ne correspondent pas.'); return; } }
                let list=readUsers();
                if(hid){
                    const id=parseInt(hid,10); const item=list.find(x=>x.id===id);
                    item.lastname=lastname; item.firstname=firstname; item.email=email; item.phone=phone; item.address=address; item.role=role; if(role==='client'){ item.points=points; } else { item.points=0; }
                    if(pwd){ item.password=pwd; }
                    saveUsers(list);
                } else {
                    if(!pwd){ alert('Mot de passe requis pour un nouvel utilisateur.'); return; }
                    const id = list.length? Math.max(...list.map(x=>x.id))+1 : 1; const now = new Date().toISOString().slice(0,10);
                    list.push({id:id,lastname:lastname,firstname:firstname,email:email,phone:phone,address:address,role:role,points: role==='client'? points:0,password:pwd,active:true,created:now});
                    saveUsers(list);
                }
                closeUserModal(); render();
            });

            if(!localStorage.getItem('preview_users')){
                const s=[
                    {id:1,lastname:'Dupont',firstname:'Jean',email:'jean.dupont@email.com',phone:'06 12 34 56 78',address:'1 rue Principale',role:'client',points:120,password:'',active:true,created:'2025-01-05'},
                    {id:2,lastname:'Martin',firstname:'Marie',email:'marie.martin@email.com',phone:'06 98 76 54 32',address:'12 avenue du Parc',role:'traiteur',points:0,password:'',active:true,created:'2025-01-10'}
                ]; saveUsers(s);
            }
            render();
        })();
        </script>
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
        return "admin/users/list.html.twig";
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

{% block page_title %}Gestion des Utilisateurs{% endblock %}

{% block admin_content %}
    <div class=\"card\">
        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;\">
            <h2>👥 Liste des Utilisateurs</h2>
            <button id=\"add-user\" class=\"btn btn-success\">+ Ajouter Utilisateur</button>
        </div>

        <div class=\"table-responsive\">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Statut</th>
                        <th>Inscrit le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id=\"users-tbody\"></tbody>
            </table>
        </div>
        </div>

        <!-- Modal for Add / Edit User -->
        <div id=\"user-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
            <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:420px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
                <h3 id=\"modal-title\">Ajouter un utilisateur</h3>
                <form id=\"user-form\">
                    <input type=\"hidden\" id=\"user-id\" />
                    <div class=\"form-group\"><label>Nom</label><input type=\"text\" id=\"user-lastname\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Prénom</label><input type=\"text\" id=\"user-firstname\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Email</label><input type=\"email\" id=\"user-email\" required style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Téléphone</label><input type=\"text\" id=\"user-phone\" style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Adresse</label><input type=\"text\" id=\"user-address\" style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Rôle</label>
                        <select id=\"user-role\" style=\"width:100%\">
                            <option value=\"client\">Client</option>
                            <option value=\"traiteur\">Traiteur</option>
                            <option value=\"admin\">Admin</option>
                        </select>
                    </div>
                    <div class=\"form-group\" id=\"points-row\" style=\"display:none\"><label>Points fidél</label><input type=\"number\" id=\"user-points\" min=\"0\" value=\"0\" style=\"width:100%\" /></div>
                    <div class=\"form-group\"><label>Mot de passe</label><input type=\"password\" id=\"user-password\" style=\"width:100%\" autocomplete=\"new-password\" /></div>
                    <div class=\"form-group\"><label>Confirmer mot de passe</label><input type=\"password\" id=\"user-password-confirm\" style=\"width:100%\" autocomplete=\"new-password\" /></div>
                    <div style=\"display:flex; gap:10px; justify-content:flex-end; margin-top:10px;\"><button type=\"button\" id=\"user-cancel\" class=\"btn btn-secondary\">Annuler</button><button type=\"submit\" class=\"btn btn-primary\">Enregistrer</button></div>
                </form>
            </div>
        </div>

        <script>
        (function(){
            function readUsers(){try{return JSON.parse(localStorage.getItem('preview_users')||'null')||[]}catch(e){return[]}}
            function saveUsers(u){localStorage.setItem('preview_users',JSON.stringify(u))}
            const tbody=document.getElementById('users-tbody');
            function render(){
                tbody.innerHTML='';
                const users=readUsers();
                users.forEach(u=>{
                    const tr=document.createElement('tr');
                    const status = u.active? '<span class=\"badge badge-success\">Actif</span>' : '<span class=\"badge badge-danger\">Inactif</span>';
                    const points = (u.role==='client')? (u.points||0) : '-';
                    tr.innerHTML = `<td>\${u.id}</td><td>\${u.lastname||''}</td><td>\${u.firstname||''}</td><td>\${u.email}</td><td>\${u.phone||''}</td><td>\${u.address||''}</td><td>\${u.role||''}</td><td>\${points}</td><td>\${status}</td><td>\${u.created||''}</td><td><button class=\"btn btn-primary btn-sm\" data-id=\"\${u.id}\" data-action=\"edit\">Éditer</button> <button class=\"btn btn-danger btn-sm\" data-id=\"\${u.id}\" data-action=\"del\">Supprimer</button></td>`;
                    tbody.appendChild(tr);
                });
                tbody.querySelectorAll('button').forEach(b=>b.onclick = function(e){
                    const id=parseInt(this.dataset.id,10); const action=this.dataset.action;
                    if(action==='del'){ if(!confirm('Supprimer cet utilisateur ?')) return; let list=readUsers(); list=list.filter(x=>x.id!==id); saveUsers(list); render(); return; }
                    if(action==='edit'){ openUserModal('edit', id); }
                });
            }

            function openUserModal(mode, id){
                const modal=document.getElementById('user-modal');
                const title=document.getElementById('modal-title');
                const hid=document.getElementById('user-id');
                const lastname=document.getElementById('user-lastname');
                const firstname=document.getElementById('user-firstname');
                const email=document.getElementById('user-email');
                const phone=document.getElementById('user-phone');
                const address=document.getElementById('user-address');
                const role=document.getElementById('user-role');
                const pointsRow=document.getElementById('points-row');
                const points=document.getElementById('user-points');
                const pwd=document.getElementById('user-password');
                const pwdc=document.getElementById('user-password-confirm');
                if(mode==='edit'){
                    const list=readUsers(); const item=list.find(x=>x.id===id);
                    title.textContent='Éditer un utilisateur'; hid.value=item.id;
                    lastname.value=item.lastname||''; firstname.value=item.firstname||''; email.value=item.email||''; phone.value=item.phone||''; address.value=item.address||'';
                    role.value=item.role||'client';
                    if(role.value==='client'){ pointsRow.style.display='block'; points.value=item.points||0; } else { pointsRow.style.display='none'; points.value=0; }
                    pwd.value=''; pwdc.value='';
                } else {
                    title.textContent='Ajouter un utilisateur'; hid.value=''; lastname.value=''; firstname.value=''; email.value=''; phone.value=''; address.value=''; role.value='client'; pointsRow.style.display='block'; points.value=0; pwd.value=''; pwdc.value='';
                }
                modal.style.display='flex';
            }

            function closeUserModal(){ document.getElementById('user-modal').style.display='none'; }

            document.getElementById('add-user').addEventListener('click', function(){ openUserModal('add'); });
            document.getElementById('user-cancel').addEventListener('click', function(){ closeUserModal(); });
            document.getElementById('user-role').addEventListener('change', function(){ const pointsRow=document.getElementById('points-row'); if(this.value==='client'){ pointsRow.style.display='block'; } else { pointsRow.style.display='none'; } });

            document.getElementById('user-form').addEventListener('submit', function(e){
                e.preventDefault();
                const hid=document.getElementById('user-id').value;
                const lastname=document.getElementById('user-lastname').value.trim();
                const firstname=document.getElementById('user-firstname').value.trim();
                const email=document.getElementById('user-email').value.trim();
                const phone=document.getElementById('user-phone').value.trim();
                const address=document.getElementById('user-address').value.trim();
                const role=document.getElementById('user-role').value;
                const points=parseInt(document.getElementById('user-points').value,10)||0;
                const pwd=document.getElementById('user-password').value;
                const pwdc=document.getElementById('user-password-confirm').value;
                if(pwd || pwdc){ if(pwd!==pwdc){ alert('Les mots de passe ne correspondent pas.'); return; } }
                let list=readUsers();
                if(hid){
                    const id=parseInt(hid,10); const item=list.find(x=>x.id===id);
                    item.lastname=lastname; item.firstname=firstname; item.email=email; item.phone=phone; item.address=address; item.role=role; if(role==='client'){ item.points=points; } else { item.points=0; }
                    if(pwd){ item.password=pwd; }
                    saveUsers(list);
                } else {
                    if(!pwd){ alert('Mot de passe requis pour un nouvel utilisateur.'); return; }
                    const id = list.length? Math.max(...list.map(x=>x.id))+1 : 1; const now = new Date().toISOString().slice(0,10);
                    list.push({id:id,lastname:lastname,firstname:firstname,email:email,phone:phone,address:address,role:role,points: role==='client'? points:0,password:pwd,active:true,created:now});
                    saveUsers(list);
                }
                closeUserModal(); render();
            });

            if(!localStorage.getItem('preview_users')){
                const s=[
                    {id:1,lastname:'Dupont',firstname:'Jean',email:'jean.dupont@email.com',phone:'06 12 34 56 78',address:'1 rue Principale',role:'client',points:120,password:'',active:true,created:'2025-01-05'},
                    {id:2,lastname:'Martin',firstname:'Marie',email:'marie.martin@email.com',phone:'06 98 76 54 32',address:'12 avenue du Parc',role:'traiteur',points:0,password:'',active:true,created:'2025-01-10'}
                ]; saveUsers(s);
            }
            render();
        })();
        </script>
    </div>
{% endblock %}
", "admin/users/list.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\admin\\users\\list.html.twig");
    }
}
