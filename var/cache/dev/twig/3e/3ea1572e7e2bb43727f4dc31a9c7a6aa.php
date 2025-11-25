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

/* admin/events/list.html.twig */
class __TwigTemplate_7b7cd61e8167e17f36d478d9816b0e21 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/events/list.html.twig"));

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

        yield "Événements";
        
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
    <h2>Événements</h2>
    <p style=\"display:flex; gap:10px;\">
        <button id=\"open-add-event\" class=\"btn btn-primary\">Nouveau événement</button>
        <button id=\"open-requests-global\" class=\"btn btn-secondary\">Demandes clients</button>
    </p>
    <div class=\"table-responsive\">
        <table id=\"events-table\">
<<<<<<< HEAD
            <thead><tr><th>ID</th><th>Nom</th><th>Date</th><th>Actions</th></tr></thead>
=======
            <thead><tr><th>ID</th><th>Image</th><th>Nom</th><th>Date</th><th>Actions</th></tr></thead>
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Modal for adding an event -->
<div id=\"event-add-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
    <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:560px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
        <h3>Créer un événement</h3>
        <form id=\"event-add-form\">
            <div class=\"form-group\"><label>Nom</label><input id=\"new-title\" required style=\"width:100%\" /></div>
            <div class=\"form-group\"><label>Date</label><input type=\"date\" id=\"new-date\" required style=\"width:100%\" /></div>
            <div class=\"form-group\"><label>Description</label><textarea id=\"new-description\" rows=\"4\" style=\"width:100%\"></textarea></div>
            <div class=\"form-group\"><label>Image</label><input type=\"file\" id=\"new-event-image\" accept=\"image/*\" /></div>
            <div style=\"margin-bottom:10px;\"><img id=\"new-event-image-preview\" src=\"\" style=\"display:none; max-width:280px; max-height:180px; object-fit:cover; border:1px solid #ddd; border-radius:4px;\" /></div>
            <div style=\"display:flex; gap:10px; justify-content:flex-end;\"><button type=\"button\" id=\"new-cancel\" class=\"btn btn-secondary\">Annuler</button><button type=\"submit\" class=\"btn btn-primary\">Créer</button></div>
        </form>
    </div>
</div>

<!-- Modal for viewing/adding demandes (global) -->
<div id=\"requests-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
    <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:640px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
        <h3 id=\"requests-title\">Demandes</h3>
        <div id=\"requests-list\" style=\"max-height:240px; overflow:auto; margin-bottom:12px;\"></div>
            <h4>Ajouter une demande client</h4>
            <form id=\"request-form\">
                <div class=\"form-group\"><label>Événement</label><select id=\"request-event-select\" style=\"width:100%\"></select></div>
                <div class=\"form-group\"><label>Nom</label><input id=\"request-name\" required style=\"width:100%\" /></div>
                <div class=\"form-group\"><label>Message</label><textarea id=\"request-message\" rows=\"3\" style=\"width:100%\"></textarea></div>
                <div style=\"display:flex; gap:10px; justify-content:flex-end;\"><button type=\"button\" id=\"request-cancel\" class=\"btn btn-secondary\">Fermer</button><button type=\"submit\" class=\"btn btn-primary\">Ajouter</button></div>
            </form>
    </div>
</div>

<script>
function readEvents(){try{return JSON.parse(localStorage.getItem('preview_events')||'null')||[]}catch(e){return[]}}
function saveEvents(e){localStorage.setItem('preview_events',JSON.stringify(e))}

function readRequests(){try{return JSON.parse(localStorage.getItem('preview_event_requests')||'null')||[]}catch(e){return[]}}
function saveRequests(r){localStorage.setItem('preview_event_requests',JSON.stringify(r))}
function countRequestsForEvent(eid){ return readRequests().filter(x=>x.eventId===eid).length; }

function escapeHtml(s){ if(!s) return ''; return String(s).replace(/[&<>\\\"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','\\\"':'&quot;',\"'\":'&#39;'}[m]; }); }

function render(){
    const tbody=document.querySelector('#events-table tbody'); tbody.innerHTML='';
    const events=readEvents();
    events.forEach(ev=>{
        const tr=document.createElement('tr');
<<<<<<< HEAD
        tr.innerHTML = `<td>\${ev.id}</td><td>\${escapeHtml(ev.title)}</td><td>\${escapeHtml(ev.date||'')}</td><td><a class=\"btn\" href=\"/admin/events/edit?id=\${ev.id}\">Edit</a> <button class=\"btn btn-danger\" data-id=\${ev.id}>Delete</button></td>`;
=======
        const imgHtml = ev.image ? `<img src=\"\${ev.image}\" style=\"max-width:120px;max-height:80px;object-fit:cover;border-radius:4px;border:1px solid #eee;\"/>` : '';
        tr.innerHTML = `<td>\${ev.id}</td><td>\${imgHtml}</td><td>\${escapeHtml(ev.title)}</td><td>\${escapeHtml(ev.date||'')}</td><td><a class=\"btn\" href=\"/admin/events/edit?id=\${ev.id}\">Edit</a> <button class=\"btn btn-danger\" data-id=\${ev.id}>Delete</button></td>`;
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2
        tbody.appendChild(tr);
    });
    document.querySelectorAll('#events-table button[data-id]').forEach(b=>b.addEventListener('click',e=>{ const id=parseInt(e.currentTarget.dataset.id,10); let list=readEvents(); list = list.filter(it=>it.id!==id); saveEvents(list); render(); }));
}

function openRequestsModal(eid){
    const modal=document.getElementById('requests-modal');
    document.getElementById('request-event-id').value = eid;
    document.getElementById('requests-title').textContent = 'Demandes pour événement #' + eid;
    renderRequests(eid);
    modal.style.display='flex';
}
function closeRequestsModal(){ document.getElementById('requests-modal').style.display='none'; }

function renderRequests(eid){ const list=document.getElementById('requests-list'); list.innerHTML=''; const reqs=readRequests().filter(x=>x.eventId===eid); if(reqs.length===0){ list.innerHTML='<p>Aucune demande pour cet événement.</p>'; return; } reqs.forEach(r=>{ const d=document.createElement('div'); d.style.borderBottom='1px solid #eee'; d.style.padding='8px 0'; d.innerHTML = `<strong>\${escapeHtml(r.name)}</strong> <small style=\"color:#666;\">\${r.created}</small><div>\${escapeHtml(r.message)}</div><div style=\"text-align:right;margin-top:6px;\"><button class=\"btn btn-danger btn-sm\" data-req-id=\"\${r.id}\">Supprimer</button></div>`; list.appendChild(d); }); list.querySelectorAll('button[data-req-id]').forEach(b=>b.addEventListener('click', e=>{ const rid=parseInt(e.currentTarget.dataset.reqId,10); let rs=readRequests(); rs=rs.filter(x=>x.id!==rid); saveRequests(rs); renderRequests(eid); })); }

document.getElementById('request-cancel').addEventListener('click', closeRequestsModal);
document.getElementById('request-form').addEventListener('submit', function(e){ e.preventDefault(); const eid = parseInt(document.getElementById('request-event-select').value,10); const name=document.getElementById('request-name').value.trim(); const msg=document.getElementById('request-message').value.trim(); if(!name || !msg) return; const rs=readRequests(); const id = rs.length? Math.max(...rs.map(x=>x.id))+1 : 1; const now = new Date().toISOString().slice(0,10); rs.push({id:id,eventId:eid,name:name,message:msg,created:now}); saveRequests(rs); document.getElementById('request-name').value=''; document.getElementById('request-message').value=''; renderRequests(eid); render(); });

// populate event select for requests
function populateEventSelect(){ const sel=document.getElementById('request-event-select'); sel.innerHTML=''; const events=readEvents(); events.forEach(ev=>{ const opt=document.createElement('option'); opt.value=ev.id; opt.textContent = `#\${ev.id} — \${ev.title}`; sel.appendChild(opt); }); }

// add-event modal behavior
document.getElementById('open-add-event').addEventListener('click', function(){ document.getElementById('event-add-modal').style.display='flex'; });
document.getElementById('new-cancel').addEventListener('click', function(){ document.getElementById('event-add-modal').style.display='none'; });
<<<<<<< HEAD
document.getElementById('new-event-image').addEventListener('change', function(){ const f=this.files[0]; const prev=document.getElementById('new-event-image-preview'); if(!f){ prev.style.display='none'; prev.src=''; delete prev.dataset.data; return; } const r=new FileReader(); r.onload=function(){ prev.src=r.result; prev.style.display='inline-block'; prev.dataset.data = r.result; }; r.readAsDataURL(f); });
document.getElementById('event-add-form').addEventListener('submit', function(e){ e.preventDefault(); const title=document.getElementById('new-title').value.trim(); const date=document.getElementById('new-date').value; const desc=document.getElementById('new-description').value.trim(); const prev=document.getElementById('new-event-image-preview'); if(!title || !date) return; const list=readEvents(); const id = list.length? Math.max(...list.map(x=>x.id))+1 : 1; const image = prev && prev.dataset && prev.dataset.data ? prev.dataset.data : null; list.push({id:id,title:title,date:date,description:desc,image:image}); saveEvents(list); document.getElementById('event-add-modal').style.display='none'; document.getElementById('new-title').value=''; document.getElementById('new-date').value=''; document.getElementById('new-description').value=''; document.getElementById('new-event-image-preview').style.display='none'; render(); populateEventSelect(); });
=======
document.getElementById('new-event-image').addEventListener('change', async function(){
    const f=this.files[0]; const prev=document.getElementById('new-event-image-preview');
    if(!f){ prev.style.display='none'; prev.src=''; delete prev.dataset.url; return; }
    try{
        const fd = new FormData(); fd.append('file', f);
        const res = await fetch('/api/upload/event', { method: 'POST', body: fd });
        if(!res.ok) throw new Error('Upload failed: ' + res.status);
        const data = await res.json();
        if(data.url){ prev.src = data.url; prev.dataset.url = data.url; prev.style.display = 'inline-block'; }
        else { throw new Error('No url returned'); }
    }catch(err){
        console.error('Event image upload failed', err);
        const r=new FileReader(); r.onload=function(){ prev.src=r.result; prev.style.display='inline-block'; prev.dataset.url = r.result; }; r.readAsDataURL(f);
    }
});
document.getElementById('event-add-form').addEventListener('submit', function(e){ e.preventDefault(); const title=document.getElementById('new-title').value.trim(); const date=document.getElementById('new-date').value; const desc=document.getElementById('new-description').value.trim(); const prev=document.getElementById('new-event-image-preview'); if(!title || !date) return; const list=readEvents(); const id = list.length? Math.max(...list.map(x=>x.id))+1 : 1; const image = prev && prev.dataset && prev.dataset.url ? prev.dataset.url : null; list.push({id:id,title:title,date:date,description:desc,image:image}); saveEvents(list); document.getElementById('event-add-modal').style.display='none'; document.getElementById('new-title').value=''; document.getElementById('new-date').value=''; document.getElementById('new-description').value=''; document.getElementById('new-event-image-preview').style.display='none'; render(); populateEventSelect(); });
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2

// global requests button
document.getElementById('open-requests-global').addEventListener('click', function(){ populateEventSelect(); document.getElementById('requests-title').textContent='Demandes clients (global)'; renderRequests(); document.getElementById('requests-modal').style.display='flex'; });

// init sample
if(!localStorage.getItem('preview_events')){
    const sample=[{id:1,title:'Brunch du dimanche',date:'2025-12-07'},{id:2,title:'Soirée dégustation',date:'2025-12-20'}];
    saveEvents(sample);
}
// init sample requests
if(!localStorage.getItem('preview_event_requests')){ saveRequests([{id:1,eventId:1,name:'Alice',message:'Je voudrais réserver 4 places',created:'2025-11-01'},{id:2,eventId:2,name:'Bob',message:'Allergie: sans gluten',created:'2025-11-05'}]); }
render();
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
        return "admin/events/list.html.twig";
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
        return new Source("{% extends 'admin/base.html.twig' %}

{% block page_title %}Événements{% endblock %}

{% block admin_content %}
<div class=\"card\">
    <h2>Événements</h2>
    <p style=\"display:flex; gap:10px;\">
        <button id=\"open-add-event\" class=\"btn btn-primary\">Nouveau événement</button>
        <button id=\"open-requests-global\" class=\"btn btn-secondary\">Demandes clients</button>
    </p>
    <div class=\"table-responsive\">
        <table id=\"events-table\">
<<<<<<< HEAD
            <thead><tr><th>ID</th><th>Nom</th><th>Date</th><th>Actions</th></tr></thead>
=======
            <thead><tr><th>ID</th><th>Image</th><th>Nom</th><th>Date</th><th>Actions</th></tr></thead>
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Modal for adding an event -->
<div id=\"event-add-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
    <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:560px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
        <h3>Créer un événement</h3>
        <form id=\"event-add-form\">
            <div class=\"form-group\"><label>Nom</label><input id=\"new-title\" required style=\"width:100%\" /></div>
            <div class=\"form-group\"><label>Date</label><input type=\"date\" id=\"new-date\" required style=\"width:100%\" /></div>
            <div class=\"form-group\"><label>Description</label><textarea id=\"new-description\" rows=\"4\" style=\"width:100%\"></textarea></div>
            <div class=\"form-group\"><label>Image</label><input type=\"file\" id=\"new-event-image\" accept=\"image/*\" /></div>
            <div style=\"margin-bottom:10px;\"><img id=\"new-event-image-preview\" src=\"\" style=\"display:none; max-width:280px; max-height:180px; object-fit:cover; border:1px solid #ddd; border-radius:4px;\" /></div>
            <div style=\"display:flex; gap:10px; justify-content:flex-end;\"><button type=\"button\" id=\"new-cancel\" class=\"btn btn-secondary\">Annuler</button><button type=\"submit\" class=\"btn btn-primary\">Créer</button></div>
        </form>
    </div>
</div>

<!-- Modal for viewing/adding demandes (global) -->
<div id=\"requests-modal\" class=\"modal\" style=\"display:none; position:fixed; left:0; top:0; right:0; bottom:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center;\">
    <div class=\"modal-card\" style=\"background:#fff; padding:20px; width:640px; border-radius:6px; box-shadow:0 2px 12px rgba(0,0,0,0.2);\">
        <h3 id=\"requests-title\">Demandes</h3>
        <div id=\"requests-list\" style=\"max-height:240px; overflow:auto; margin-bottom:12px;\"></div>
            <h4>Ajouter une demande client</h4>
            <form id=\"request-form\">
                <div class=\"form-group\"><label>Événement</label><select id=\"request-event-select\" style=\"width:100%\"></select></div>
                <div class=\"form-group\"><label>Nom</label><input id=\"request-name\" required style=\"width:100%\" /></div>
                <div class=\"form-group\"><label>Message</label><textarea id=\"request-message\" rows=\"3\" style=\"width:100%\"></textarea></div>
                <div style=\"display:flex; gap:10px; justify-content:flex-end;\"><button type=\"button\" id=\"request-cancel\" class=\"btn btn-secondary\">Fermer</button><button type=\"submit\" class=\"btn btn-primary\">Ajouter</button></div>
            </form>
    </div>
</div>

<script>
function readEvents(){try{return JSON.parse(localStorage.getItem('preview_events')||'null')||[]}catch(e){return[]}}
function saveEvents(e){localStorage.setItem('preview_events',JSON.stringify(e))}

function readRequests(){try{return JSON.parse(localStorage.getItem('preview_event_requests')||'null')||[]}catch(e){return[]}}
function saveRequests(r){localStorage.setItem('preview_event_requests',JSON.stringify(r))}
function countRequestsForEvent(eid){ return readRequests().filter(x=>x.eventId===eid).length; }

function escapeHtml(s){ if(!s) return ''; return String(s).replace(/[&<>\\\"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','\\\"':'&quot;',\"'\":'&#39;'}[m]; }); }

function render(){
    const tbody=document.querySelector('#events-table tbody'); tbody.innerHTML='';
    const events=readEvents();
    events.forEach(ev=>{
        const tr=document.createElement('tr');
<<<<<<< HEAD
        tr.innerHTML = `<td>\${ev.id}</td><td>\${escapeHtml(ev.title)}</td><td>\${escapeHtml(ev.date||'')}</td><td><a class=\"btn\" href=\"/admin/events/edit?id=\${ev.id}\">Edit</a> <button class=\"btn btn-danger\" data-id=\${ev.id}>Delete</button></td>`;
=======
        const imgHtml = ev.image ? `<img src=\"\${ev.image}\" style=\"max-width:120px;max-height:80px;object-fit:cover;border-radius:4px;border:1px solid #eee;\"/>` : '';
        tr.innerHTML = `<td>\${ev.id}</td><td>\${imgHtml}</td><td>\${escapeHtml(ev.title)}</td><td>\${escapeHtml(ev.date||'')}</td><td><a class=\"btn\" href=\"/admin/events/edit?id=\${ev.id}\">Edit</a> <button class=\"btn btn-danger\" data-id=\${ev.id}>Delete</button></td>`;
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2
        tbody.appendChild(tr);
    });
    document.querySelectorAll('#events-table button[data-id]').forEach(b=>b.addEventListener('click',e=>{ const id=parseInt(e.currentTarget.dataset.id,10); let list=readEvents(); list = list.filter(it=>it.id!==id); saveEvents(list); render(); }));
}

function openRequestsModal(eid){
    const modal=document.getElementById('requests-modal');
    document.getElementById('request-event-id').value = eid;
    document.getElementById('requests-title').textContent = 'Demandes pour événement #' + eid;
    renderRequests(eid);
    modal.style.display='flex';
}
function closeRequestsModal(){ document.getElementById('requests-modal').style.display='none'; }

function renderRequests(eid){ const list=document.getElementById('requests-list'); list.innerHTML=''; const reqs=readRequests().filter(x=>x.eventId===eid); if(reqs.length===0){ list.innerHTML='<p>Aucune demande pour cet événement.</p>'; return; } reqs.forEach(r=>{ const d=document.createElement('div'); d.style.borderBottom='1px solid #eee'; d.style.padding='8px 0'; d.innerHTML = `<strong>\${escapeHtml(r.name)}</strong> <small style=\"color:#666;\">\${r.created}</small><div>\${escapeHtml(r.message)}</div><div style=\"text-align:right;margin-top:6px;\"><button class=\"btn btn-danger btn-sm\" data-req-id=\"\${r.id}\">Supprimer</button></div>`; list.appendChild(d); }); list.querySelectorAll('button[data-req-id]').forEach(b=>b.addEventListener('click', e=>{ const rid=parseInt(e.currentTarget.dataset.reqId,10); let rs=readRequests(); rs=rs.filter(x=>x.id!==rid); saveRequests(rs); renderRequests(eid); })); }

document.getElementById('request-cancel').addEventListener('click', closeRequestsModal);
document.getElementById('request-form').addEventListener('submit', function(e){ e.preventDefault(); const eid = parseInt(document.getElementById('request-event-select').value,10); const name=document.getElementById('request-name').value.trim(); const msg=document.getElementById('request-message').value.trim(); if(!name || !msg) return; const rs=readRequests(); const id = rs.length? Math.max(...rs.map(x=>x.id))+1 : 1; const now = new Date().toISOString().slice(0,10); rs.push({id:id,eventId:eid,name:name,message:msg,created:now}); saveRequests(rs); document.getElementById('request-name').value=''; document.getElementById('request-message').value=''; renderRequests(eid); render(); });

// populate event select for requests
function populateEventSelect(){ const sel=document.getElementById('request-event-select'); sel.innerHTML=''; const events=readEvents(); events.forEach(ev=>{ const opt=document.createElement('option'); opt.value=ev.id; opt.textContent = `#\${ev.id} — \${ev.title}`; sel.appendChild(opt); }); }

// add-event modal behavior
document.getElementById('open-add-event').addEventListener('click', function(){ document.getElementById('event-add-modal').style.display='flex'; });
document.getElementById('new-cancel').addEventListener('click', function(){ document.getElementById('event-add-modal').style.display='none'; });
<<<<<<< HEAD
document.getElementById('new-event-image').addEventListener('change', function(){ const f=this.files[0]; const prev=document.getElementById('new-event-image-preview'); if(!f){ prev.style.display='none'; prev.src=''; delete prev.dataset.data; return; } const r=new FileReader(); r.onload=function(){ prev.src=r.result; prev.style.display='inline-block'; prev.dataset.data = r.result; }; r.readAsDataURL(f); });
document.getElementById('event-add-form').addEventListener('submit', function(e){ e.preventDefault(); const title=document.getElementById('new-title').value.trim(); const date=document.getElementById('new-date').value; const desc=document.getElementById('new-description').value.trim(); const prev=document.getElementById('new-event-image-preview'); if(!title || !date) return; const list=readEvents(); const id = list.length? Math.max(...list.map(x=>x.id))+1 : 1; const image = prev && prev.dataset && prev.dataset.data ? prev.dataset.data : null; list.push({id:id,title:title,date:date,description:desc,image:image}); saveEvents(list); document.getElementById('event-add-modal').style.display='none'; document.getElementById('new-title').value=''; document.getElementById('new-date').value=''; document.getElementById('new-description').value=''; document.getElementById('new-event-image-preview').style.display='none'; render(); populateEventSelect(); });
=======
document.getElementById('new-event-image').addEventListener('change', async function(){
    const f=this.files[0]; const prev=document.getElementById('new-event-image-preview');
    if(!f){ prev.style.display='none'; prev.src=''; delete prev.dataset.url; return; }
    try{
        const fd = new FormData(); fd.append('file', f);
        const res = await fetch('/api/upload/event', { method: 'POST', body: fd });
        if(!res.ok) throw new Error('Upload failed: ' + res.status);
        const data = await res.json();
        if(data.url){ prev.src = data.url; prev.dataset.url = data.url; prev.style.display = 'inline-block'; }
        else { throw new Error('No url returned'); }
    }catch(err){
        console.error('Event image upload failed', err);
        const r=new FileReader(); r.onload=function(){ prev.src=r.result; prev.style.display='inline-block'; prev.dataset.url = r.result; }; r.readAsDataURL(f);
    }
});
document.getElementById('event-add-form').addEventListener('submit', function(e){ e.preventDefault(); const title=document.getElementById('new-title').value.trim(); const date=document.getElementById('new-date').value; const desc=document.getElementById('new-description').value.trim(); const prev=document.getElementById('new-event-image-preview'); if(!title || !date) return; const list=readEvents(); const id = list.length? Math.max(...list.map(x=>x.id))+1 : 1; const image = prev && prev.dataset && prev.dataset.url ? prev.dataset.url : null; list.push({id:id,title:title,date:date,description:desc,image:image}); saveEvents(list); document.getElementById('event-add-modal').style.display='none'; document.getElementById('new-title').value=''; document.getElementById('new-date').value=''; document.getElementById('new-description').value=''; document.getElementById('new-event-image-preview').style.display='none'; render(); populateEventSelect(); });
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2

// global requests button
document.getElementById('open-requests-global').addEventListener('click', function(){ populateEventSelect(); document.getElementById('requests-title').textContent='Demandes clients (global)'; renderRequests(); document.getElementById('requests-modal').style.display='flex'; });

// init sample
if(!localStorage.getItem('preview_events')){
    const sample=[{id:1,title:'Brunch du dimanche',date:'2025-12-07'},{id:2,title:'Soirée dégustation',date:'2025-12-20'}];
    saveEvents(sample);
}
// init sample requests
if(!localStorage.getItem('preview_event_requests')){ saveRequests([{id:1,eventId:1,name:'Alice',message:'Je voudrais réserver 4 places',created:'2025-11-01'},{id:2,eventId:2,name:'Bob',message:'Allergie: sans gluten',created:'2025-11-05'}]); }
render();
</script>

{% endblock %}
<<<<<<< HEAD
", "admin/events/list.html.twig", "C:\\Users\\user\\smart-coffee-menu\\templates-only\\admin\\events\\list.html.twig");
=======
", "admin/events/list.html.twig", "C:\\Users\\yesse\\OneDrive\\Bureau\\cafe\\smart-coffee-menu\\templates-only\\admin\\events\\list.html.twig");
>>>>>>> 19a23c77de73f40ea66a2f3d975ee12f2a5c07d2
    }
}
