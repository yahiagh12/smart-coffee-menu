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

/* cafe_virtuel_client.html.twig */
class __TwigTemplate_37918ca3a25615d5301b07949334459e extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "cafe_virtuel_client.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Café Virtuel - Menu & Commandes";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #333;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .admin-link {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .admin-link:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Navigation */
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .nav button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .nav button:hover, .nav button.active {
            background: white;
            color: #8B4513;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Main Grid */
        .client-main {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 20px;
        }

        /* Sections */
        .section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section h2 {
            color: #8B4513;
            margin-bottom: 20px;
            font-size: 2em;
            border-bottom: 3px solid #D2691E;
            padding-bottom: 10px;
        }

        /* Menu Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .menu-item {
            background: linear-gradient(135deg, #fff5f1 0%, #ffe4d6 100%);
            border-left: 5px solid #8B4513;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .menu-item h3 {
            color: #8B4513;
            margin-bottom: 10px;
            font-size: 1.3em;
        }

        .menu-item .description {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .menu-item .price {
            color: #D2691E;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .menu-item-footer {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .menu-item-footer input {
            width: 50px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .menu-item-footer button {
            flex: 1;
            background: #8B4513;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu-item-footer button:hover {
            background: #A0522D;
        }

        /* Sidebar - Cart */
        .sidebar {
            height: fit-content;
        }

        .cart-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 100px;
        }

        .cart-card h3 {
            color: #8B4513;
            margin-bottom: 15px;
            font-size: 1.3em;
            border-bottom: 2px solid #D2691E;
            padding-bottom: 10px;
        }

        .cart-items {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        .cart-item {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9em;
        }

        .cart-item-name {
            flex: 1;
        }

        .cart-item-qty {
            color: #8B4513;
            font-weight: bold;
            margin: 0 10px;
        }

        .cart-item-remove {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 3px 8px;
            cursor: pointer;
            font-size: 0.85em;
        }

        .cart-item-remove:hover {
            background: #c0392b;
        }

        .cart-total {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .cart-total-label {
            color: #666;
            font-size: 0.9em;
        }

        .cart-total-amount {
            color: #8B4513;
            font-size: 1.5em;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-decoration: none;
            transition: all 0.3s;
            width: 100%;
            text-align: center;
        }

        .btn-primary {
            background: #8B4513;
            color: white;
        }

        .btn-primary:hover {
            background: #A0522D;
        }

        .btn-success {
            background: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        /* Footer */
        .footer {
            background: #1a1a2e;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .client-main {
                grid-template-columns: 1fr;
            }

            .cart-card {
                position: relative;
                top: auto;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .header-top {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 348
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 349
        yield "    <!-- Header -->
    <div class=\"header\">
        <div class=\"header-top\">
            <div>
                <h1>☕ Café Virtuel</h1>
                <p>Votre espace de détente et de convivialité en ligne</p>
            </div>
            <div style=\"display: flex; gap: 10px;\">
                <a href=\"";
        // line 357
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" class=\"admin-link\" style=\"display: none;\">👨‍💼 Espace Admin</a>
                <a href=\"";
        // line 358
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"admin-link\" style=\"background: #c0392b;\">🚪 Déconnexion</a>
            </div>
        </div>
        <div class=\"nav\">
            <button type=\"button\" onclick=\"showSection('menu')\" class=\"active\">Menu</button>
            <button type=\"button\" onclick=\"showSection('about')\">À Propos</button>
            <button type=\"button\" onclick=\"showSection('contact')\">Contact</button>
        </div>
    </div>

    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"client-main\">
            <!-- Content -->
            <div>
                <!-- Menu Section -->
                <div class=\"section active\" id=\"menu\">
                    <h2>🍰 Notre Menu</h2>

                    ";
        // line 377
        if ((array_key_exists("groupedMenu", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["groupedMenu"]) || array_key_exists("groupedMenu", $context) ? $context["groupedMenu"] : (function () { throw new RuntimeError('Variable "groupedMenu" does not exist.', 377, $this->source); })())) > 0))) {
            // line 378
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["groupedMenu"]) || array_key_exists("groupedMenu", $context) ? $context["groupedMenu"] : (function () { throw new RuntimeError('Variable "groupedMenu" does not exist.', 378, $this->source); })()));
            foreach ($context['_seq'] as $context["category"] => $context["items"]) {
                // line 379
                yield "                            <h3 style=\"color: #8B4513; margin-top: 30px; margin-bottom: 15px;\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["category"], "html", null, true);
                yield "</h3>
                            <div class=\"menu-grid\">
                                ";
                // line 381
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["items"]);
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 382
                    yield "                                    <div class=\"menu-item\">
                                        <h3>";
                    // line 383
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 383), "html", null, true);
                    yield "</h3>
                                        <p class=\"description\">";
                    // line 384
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "description", [], "any", false, false, false, 384), "html", null, true);
                    yield "</p>
                                        <p class=\"price\">";
                    // line 385
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 385), "html", null, true);
                    yield "€</p>
                                        <div class=\"menu-item-footer\">
                                            <input type=\"number\" value=\"1\" min=\"1\">
                                            <button type=\"button\" onclick=\"addToCart('";
                    // line 388
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 388), "html", null, true);
                    yield "', ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 388), "html", null, true);
                    yield ", this)\">Ajouter</button>
                                        </div>
                                    </div>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 392
                yield "                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['category'], $context['items'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 394
            yield "                    ";
        } else {
            // line 395
            yield "                        <p>Aucun produit disponible pour le moment.</p>
                    ";
        }
        // line 397
        yield "                </div>

                <!-- About Section -->
                <div class=\"section\" id=\"about\">
                    <h2>À Propos de Nous</h2>
                    <p style=\"margin-bottom: 15px; line-height: 1.6;\">
                        Le Café Virtuel est un projet communautaire créé pour offrir un espace 
                        de détente et de convivialité en ligne. Notre mission est de créer un lieu où les gens 
                        peuvent se rencontrer, discuter, partager leurs passions pour le café et simplement 
                        profiter d'un moment de détente.
                    </p>
                    <h3 style=\"color: #8B4513; margin-top: 20px; margin-bottom: 10px;\">✨ Nos Valeurs</h3>
                    <ul style=\"margin-left: 20px; margin-bottom: 20px;\">
                        <li>🤝 Communauté et entraide</li>
                        <li>☕ Passion pour le café</li>
                        <li>🌍 Inclusivité et diversité</li>
                        <li>💡 Innovation et créativité</li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div class=\"section\" id=\"contact\">
                    <h2>Nous Contacter</h2>
                    <div style=\"max-width: 500px;\">
                        <div style=\"margin-bottom: 20px;\">
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">📍 Adresse</h3>
                            <p>123 Rue de la Paix<br>75000 Paris, France</p>
                        </div>
                        <div style=\"margin-bottom: 20px;\">
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">📱 Téléphone</h3>
                            <p>+33 1 23 45 67 89</p>
                        </div>
                        <div style=\"margin-bottom: 20px;\">
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">✉️ Email</h3>
                            <p>info@cafevirtuel.com</p>
                        </div>
                        <div>
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">⏰ Horaires</h3>
                            <p>Ouvert 24h/24, 7 jours sur 7</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Cart -->
            <div class=\"sidebar\">
                ";
        // line 444
        yield "                <div class=\"cart-card\" style=\"margin-bottom: 20px;\">
                    <h3>👤 Votre Profil</h3>
                    ";
        // line 446
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", true, true, false, 446) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 446, $this->source); })()), "user", [], "any", false, false, false, 446)))) {
            // line 447
            yield "                        <p><strong>Nom:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 447, $this->source); })()), "user", [], "any", false, false, false, 447), "getName", [], "method", false, false, false, 447), "html", null, true);
            yield "</p>
                        <p><strong>Email:</strong> ";
            // line 448
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 448, $this->source); })()), "user", [], "any", false, false, false, 448), "getEmail", [], "method", false, false, false, 448), "html", null, true);
            yield "</p>
                        <p><strong>Téléphone:</strong> ";
            // line 449
            yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 449, $this->source); })()), "user", [], "any", false, false, false, 449), "getPhone", [], "method", false, false, false, 449)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 449, $this->source); })()), "user", [], "any", false, false, false, 449), "getPhone", [], "method", false, false, false, 449), "html", null, true)) : ("—"));
            yield "</p>
                        <p><strong>Fidélité:</strong> ";
            // line 450
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 450, $this->source); })()), "user", [], "any", false, false, false, 450), "getFidelite", [], "method", false, false, false, 450), "html", null, true);
            yield " pts</p>
                    ";
        } else {
            // line 452
            yield "                        <p>Vous n'êtes pas connecté.</p>
                        <a href=\"";
            // line 453
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-primary\" style=\"margin-top:10px;\">Se connecter</a>
                    ";
        }
        // line 455
        yield "                </div>

                <div class=\"cart-card\">
                    <h3>🛒 Panier</h3>
                    <div class=\"cart-items\" id=\"cartItems\">
                        <p style=\"color: #999; text-align: center; padding: 20px 0;\">Panier vide</p>
                    </div>
                    <div class=\"cart-total\">
                        <div class=\"cart-total-label\">Total</div>
                        <div class=\"cart-total-amount\" id=\"cartTotal\">0,00€</div>
                    </div>
                    <button type=\"button\" class=\"btn btn-success\" id=\"checkoutBtn\" onclick=\"checkout()\" style=\"margin-bottom: 10px; display: none;\">
                        ✅ Commander
                    </button>
                    <button type=\"button\" class=\"btn btn-primary\" onclick=\"clearCart()\">🗑️ Vider</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class=\"footer\">
        <p>&copy; 2025 Café Virtuel. Tous droits réservés. ☕</p>
    </div>

    <!-- Scripts -->
    <script>
        let cart = [];

        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.remove('active'));

            const buttons = document.querySelectorAll('.nav button');
            buttons.forEach(button => button.classList.remove('active'));

            document.getElementById(sectionId).classList.add('active');
            event.target.classList.add('active');
            window.scrollTo(0, 0);
        }

        function addToCart(name, price, button) {
            const input = button.previousElementSibling;
            const qty = parseInt(input.value) || 1;

            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.qty += qty;
            } else {
                cart.push({ name, price, qty });
            }

            updateCart();
            input.value = 1;
        }

        function removeFromCart(name) {
            cart = cart.filter(item => item.name !== name);
            updateCart();
        }

        function updateCart() {
            const cartItems = document.getElementById('cartItems');
            const checkoutBtn = document.getElementById('checkoutBtn');

            if (cart.length === 0) {
                cartItems.innerHTML = '<p style=\"color: #999; text-align: center; padding: 20px 0;\">Panier vide</p>';
                checkoutBtn.style.display = 'none';
            } else {
                cartItems.innerHTML = cart.map(item => `
                    <div class=\"cart-item\">
                        <div class=\"cart-item-name\">\${item.name}</div>
                        <div class=\"cart-item-qty\">\${item.qty}</div>
                        <button type=\"button\" class=\"cart-item-remove\" onclick=\"removeFromCart('\${item.name}')\">✕</button>
                    </div>
                `).join('');
                checkoutBtn.style.display = 'block';
            }

            const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            document.getElementById('cartTotal').textContent = total.toFixed(2) + '€';
        }

        function clearCart() {
            cart = [];
            updateCart();
        }

        function checkout() {
            if (cart.length === 0) {
                alert('Votre panier est vide!');
                return;
            }

            const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            alert(`Commande confirmée!\\nMontant total: \${total.toFixed(2)}€\\nVotre commande a été enregistrée.`);
            clearCart();
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
        return "cafe_virtuel_client.html.twig";
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
        return array (  620 => 455,  615 => 453,  612 => 452,  607 => 450,  603 => 449,  599 => 448,  594 => 447,  592 => 446,  588 => 444,  540 => 397,  536 => 395,  533 => 394,  526 => 392,  514 => 388,  508 => 385,  504 => 384,  500 => 383,  497 => 382,  493 => 381,  487 => 379,  482 => 378,  480 => 377,  458 => 358,  454 => 357,  444 => 349,  434 => 348,  86 => 6,  76 => 5,  59 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \"base.html.twig\" %}

{% block title %}Café Virtuel - Menu & Commandes{% endblock %}

{% block stylesheets %}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #333;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .admin-link {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .admin-link:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Navigation */
        .nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .nav button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        .nav button:hover, .nav button.active {
            background: white;
            color: #8B4513;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        /* Main Grid */
        .client-main {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 20px;
        }

        /* Sections */
        .section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section h2 {
            color: #8B4513;
            margin-bottom: 20px;
            font-size: 2em;
            border-bottom: 3px solid #D2691E;
            padding-bottom: 10px;
        }

        /* Menu Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .menu-item {
            background: linear-gradient(135deg, #fff5f1 0%, #ffe4d6 100%);
            border-left: 5px solid #8B4513;
            padding: 20px;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .menu-item h3 {
            color: #8B4513;
            margin-bottom: 10px;
            font-size: 1.3em;
        }

        .menu-item .description {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .menu-item .price {
            color: #D2691E;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .menu-item-footer {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .menu-item-footer input {
            width: 50px;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .menu-item-footer button {
            flex: 1;
            background: #8B4513;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu-item-footer button:hover {
            background: #A0522D;
        }

        /* Sidebar - Cart */
        .sidebar {
            height: fit-content;
        }

        .cart-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            position: sticky;
            top: 100px;
        }

        .cart-card h3 {
            color: #8B4513;
            margin-bottom: 15px;
            font-size: 1.3em;
            border-bottom: 2px solid #D2691E;
            padding-bottom: 10px;
        }

        .cart-items {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        .cart-item {
            background: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9em;
        }

        .cart-item-name {
            flex: 1;
        }

        .cart-item-qty {
            color: #8B4513;
            font-weight: bold;
            margin: 0 10px;
        }

        .cart-item-remove {
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 3px 8px;
            cursor: pointer;
            font-size: 0.85em;
        }

        .cart-item-remove:hover {
            background: #c0392b;
        }

        .cart-total {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }

        .cart-total-label {
            color: #666;
            font-size: 0.9em;
        }

        .cart-total-amount {
            color: #8B4513;
            font-size: 1.5em;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            text-decoration: none;
            transition: all 0.3s;
            width: 100%;
            text-align: center;
        }

        .btn-primary {
            background: #8B4513;
            color: white;
        }

        .btn-primary:hover {
            background: #A0522D;
        }

        .btn-success {
            background: #27ae60;
            color: white;
        }

        .btn-success:hover {
            background: #229954;
        }

        /* Footer */
        .footer {
            background: #1a1a2e;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .client-main {
                grid-template-columns: 1fr;
            }

            .cart-card {
                position: relative;
                top: auto;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .header-top {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
{% endblock %}

{% block body %}
    <!-- Header -->
    <div class=\"header\">
        <div class=\"header-top\">
            <div>
                <h1>☕ Café Virtuel</h1>
                <p>Votre espace de détente et de convivialité en ligne</p>
            </div>
            <div style=\"display: flex; gap: 10px;\">
                <a href=\"{{ path('admin_dashboard') }}\" class=\"admin-link\" style=\"display: none;\">👨‍💼 Espace Admin</a>
                <a href=\"{{ path('app_logout') }}\" class=\"admin-link\" style=\"background: #c0392b;\">🚪 Déconnexion</a>
            </div>
        </div>
        <div class=\"nav\">
            <button type=\"button\" onclick=\"showSection('menu')\" class=\"active\">Menu</button>
            <button type=\"button\" onclick=\"showSection('about')\">À Propos</button>
            <button type=\"button\" onclick=\"showSection('contact')\">Contact</button>
        </div>
    </div>

    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"client-main\">
            <!-- Content -->
            <div>
                <!-- Menu Section -->
                <div class=\"section active\" id=\"menu\">
                    <h2>🍰 Notre Menu</h2>

                    {% if groupedMenu is defined and groupedMenu|length > 0 %}
                        {% for category, items in groupedMenu %}
                            <h3 style=\"color: #8B4513; margin-top: 30px; margin-bottom: 15px;\">{{ category }}</h3>
                            <div class=\"menu-grid\">
                                {% for item in items %}
                                    <div class=\"menu-item\">
                                        <h3>{{ item.name }}</h3>
                                        <p class=\"description\">{{ item.description }}</p>
                                        <p class=\"price\">{{ item.price }}€</p>
                                        <div class=\"menu-item-footer\">
                                            <input type=\"number\" value=\"1\" min=\"1\">
                                            <button type=\"button\" onclick=\"addToCart('{{ item.name }}', {{ item.price }}, this)\">Ajouter</button>
                                        </div>
                                    </div>
                                {% endfor %}
                            </div>
                        {% endfor %}
                    {% else %}
                        <p>Aucun produit disponible pour le moment.</p>
                    {% endif %}
                </div>

                <!-- About Section -->
                <div class=\"section\" id=\"about\">
                    <h2>À Propos de Nous</h2>
                    <p style=\"margin-bottom: 15px; line-height: 1.6;\">
                        Le Café Virtuel est un projet communautaire créé pour offrir un espace 
                        de détente et de convivialité en ligne. Notre mission est de créer un lieu où les gens 
                        peuvent se rencontrer, discuter, partager leurs passions pour le café et simplement 
                        profiter d'un moment de détente.
                    </p>
                    <h3 style=\"color: #8B4513; margin-top: 20px; margin-bottom: 10px;\">✨ Nos Valeurs</h3>
                    <ul style=\"margin-left: 20px; margin-bottom: 20px;\">
                        <li>🤝 Communauté et entraide</li>
                        <li>☕ Passion pour le café</li>
                        <li>🌍 Inclusivité et diversité</li>
                        <li>💡 Innovation et créativité</li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div class=\"section\" id=\"contact\">
                    <h2>Nous Contacter</h2>
                    <div style=\"max-width: 500px;\">
                        <div style=\"margin-bottom: 20px;\">
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">📍 Adresse</h3>
                            <p>123 Rue de la Paix<br>75000 Paris, France</p>
                        </div>
                        <div style=\"margin-bottom: 20px;\">
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">📱 Téléphone</h3>
                            <p>+33 1 23 45 67 89</p>
                        </div>
                        <div style=\"margin-bottom: 20px;\">
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">✉️ Email</h3>
                            <p>info@cafevirtuel.com</p>
                        </div>
                        <div>
                            <h3 style=\"color: #8B4513; margin-bottom: 10px;\">⏰ Horaires</h3>
                            <p>Ouvert 24h/24, 7 jours sur 7</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar - Cart -->
            <div class=\"sidebar\">
                {# Client info card (populate from logged-in user's data) #}
                <div class=\"cart-card\" style=\"margin-bottom: 20px;\">
                    <h3>👤 Votre Profil</h3>
                    {% if app.user is defined and app.user is not null %}
                        <p><strong>Nom:</strong> {{ app.user.getName() }}</p>
                        <p><strong>Email:</strong> {{ app.user.getEmail() }}</p>
                        <p><strong>Téléphone:</strong> {{ app.user.getPhone() ?: '—' }}</p>
                        <p><strong>Fidélité:</strong> {{ app.user.getFidelite() }} pts</p>
                    {% else %}
                        <p>Vous n'êtes pas connecté.</p>
                        <a href=\"{{ path('app_login') }}\" class=\"btn btn-primary\" style=\"margin-top:10px;\">Se connecter</a>
                    {% endif %}
                </div>

                <div class=\"cart-card\">
                    <h3>🛒 Panier</h3>
                    <div class=\"cart-items\" id=\"cartItems\">
                        <p style=\"color: #999; text-align: center; padding: 20px 0;\">Panier vide</p>
                    </div>
                    <div class=\"cart-total\">
                        <div class=\"cart-total-label\">Total</div>
                        <div class=\"cart-total-amount\" id=\"cartTotal\">0,00€</div>
                    </div>
                    <button type=\"button\" class=\"btn btn-success\" id=\"checkoutBtn\" onclick=\"checkout()\" style=\"margin-bottom: 10px; display: none;\">
                        ✅ Commander
                    </button>
                    <button type=\"button\" class=\"btn btn-primary\" onclick=\"clearCart()\">🗑️ Vider</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class=\"footer\">
        <p>&copy; 2025 Café Virtuel. Tous droits réservés. ☕</p>
    </div>

    <!-- Scripts -->
    <script>
        let cart = [];

        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.remove('active'));

            const buttons = document.querySelectorAll('.nav button');
            buttons.forEach(button => button.classList.remove('active'));

            document.getElementById(sectionId).classList.add('active');
            event.target.classList.add('active');
            window.scrollTo(0, 0);
        }

        function addToCart(name, price, button) {
            const input = button.previousElementSibling;
            const qty = parseInt(input.value) || 1;

            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.qty += qty;
            } else {
                cart.push({ name, price, qty });
            }

            updateCart();
            input.value = 1;
        }

        function removeFromCart(name) {
            cart = cart.filter(item => item.name !== name);
            updateCart();
        }

        function updateCart() {
            const cartItems = document.getElementById('cartItems');
            const checkoutBtn = document.getElementById('checkoutBtn');

            if (cart.length === 0) {
                cartItems.innerHTML = '<p style=\"color: #999; text-align: center; padding: 20px 0;\">Panier vide</p>';
                checkoutBtn.style.display = 'none';
            } else {
                cartItems.innerHTML = cart.map(item => `
                    <div class=\"cart-item\">
                        <div class=\"cart-item-name\">\${item.name}</div>
                        <div class=\"cart-item-qty\">\${item.qty}</div>
                        <button type=\"button\" class=\"cart-item-remove\" onclick=\"removeFromCart('\${item.name}')\">✕</button>
                    </div>
                `).join('');
                checkoutBtn.style.display = 'block';
            }

            const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            document.getElementById('cartTotal').textContent = total.toFixed(2) + '€';
        }

        function clearCart() {
            cart = [];
            updateCart();
        }

        function checkout() {
            if (cart.length === 0) {
                alert('Votre panier est vide!');
                return;
            }

            const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
            alert(`Commande confirmée!\\nMontant total: \${total.toFixed(2)}€\\nVotre commande a été enregistrée.`);
            clearCart();
        }
    </script>
{% endblock %}
", "cafe_virtuel_client.html.twig", "C:\\projectsymf\\smart-coffee-menu\\templates-only\\cafe_virtuel_client.html.twig");
    }
}
