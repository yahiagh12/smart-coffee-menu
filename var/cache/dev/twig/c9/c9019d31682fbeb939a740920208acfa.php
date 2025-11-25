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

/* base_notification.html.twig */
class __TwigTemplate_22ee2c6473932d51d7e5b579c8039074 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base_notification.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>âš«ï¸</text><text y=%221.3em%22 x=%220.2em%22 font-size=%2276%22 fill=%22%23fff%22>sf</text></svg>\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    ";
        // line 8
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 9
        yield "    ";
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 10
        yield "    <style>
      .notification {
        position: fixed;
        top: 32px;
        right: 32px;
        min-width: 280px;
        max-width: 420px;
        background: #fff;
        color: #222;
        border-radius: 8px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.12);
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 24px;
        font-size: 1rem;
        z-index: 9999;
        border-left: 6px solid #1976d2;
        transition: opacity 0.3s, transform 0.3s;
        opacity: 1;
        transform: translateY(0);
      }
      .notification-success { border-left-color: #43a047; }
      .notification-error { border-left-color: #d32f2f; }
      .notification-info { border-left-color: #1976d2; }
      .notification-warning { border-left-color: #ffa000; }
      .notification-hidden {
        opacity: 0;
        pointer-events: none;
        transform: translateY(-32px);
      }
      .notification-icon {
        font-size: 1.5em;
        display: flex;
        align-items: center;
      }
      .notification-close {
        background: none;
        border: none;
        color: #888;
        font-size: 1.5em;
        cursor: pointer;
        margin-left: auto;
      }
    </style>
    <script>
      window.showNotification = function(type, message) {
        const notif = document.getElementById('app-notification');
        const icon = document.getElementById('notif-icon');
        const msg = document.getElementById('notif-message');
        notif.className = 'notification notification-' + type;
        msg.textContent = message;
        icon.innerHTML = {
          success: '✅',
          error: '❌',
          info: 'ℹ️',
          warning: '⚠️'
        }[type] || '';
        notif.classList.remove('notification-hidden');
        setTimeout(() => notif.classList.add('notification-hidden'), 3500);
      };
    </script>
  </head>
  <body>
    <div id=\"app-notification\" class=\"notification notification-hidden\">
      <span class=\"notification-icon\" id=\"notif-icon\"></span>
      <span class=\"notification-message\" id=\"notif-message\"></span>
      <button class=\"notification-close\" onclick=\"document.getElementById('app-notification').classList.add('notification-hidden')\">&times;</button>
    </div>
    ";
        // line 79
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 80
        yield "  </body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Welcome!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base_notification.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  198 => 79,  182 => 9,  166 => 8,  149 => 5,  139 => 80,  137 => 79,  66 => 10,  63 => 9,  61 => 8,  55 => 5,  49 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"UTF-8\">
    <title>{% block title %}Welcome!{% endblock %}</title>
    <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>âš«ï¸</text><text y=%221.3em%22 x=%220.2em%22 font-size=%2276%22 fill=%22%23fff%22>sf</text></svg>\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    {% block stylesheets %}{% endblock %}
    {% block javascripts %}{% endblock %}
    <style>
      .notification {
        position: fixed;
        top: 32px;
        right: 32px;
        min-width: 280px;
        max-width: 420px;
        background: #fff;
        color: #222;
        border-radius: 8px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.12);
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 24px;
        font-size: 1rem;
        z-index: 9999;
        border-left: 6px solid #1976d2;
        transition: opacity 0.3s, transform 0.3s;
        opacity: 1;
        transform: translateY(0);
      }
      .notification-success { border-left-color: #43a047; }
      .notification-error { border-left-color: #d32f2f; }
      .notification-info { border-left-color: #1976d2; }
      .notification-warning { border-left-color: #ffa000; }
      .notification-hidden {
        opacity: 0;
        pointer-events: none;
        transform: translateY(-32px);
      }
      .notification-icon {
        font-size: 1.5em;
        display: flex;
        align-items: center;
      }
      .notification-close {
        background: none;
        border: none;
        color: #888;
        font-size: 1.5em;
        cursor: pointer;
        margin-left: auto;
      }
    </style>
    <script>
      window.showNotification = function(type, message) {
        const notif = document.getElementById('app-notification');
        const icon = document.getElementById('notif-icon');
        const msg = document.getElementById('notif-message');
        notif.className = 'notification notification-' + type;
        msg.textContent = message;
        icon.innerHTML = {
          success: '✅',
          error: '❌',
          info: 'ℹ️',
          warning: '⚠️'
        }[type] || '';
        notif.classList.remove('notification-hidden');
        setTimeout(() => notif.classList.add('notification-hidden'), 3500);
      };
    </script>
  </head>
  <body>
    <div id=\"app-notification\" class=\"notification notification-hidden\">
      <span class=\"notification-icon\" id=\"notif-icon\"></span>
      <span class=\"notification-message\" id=\"notif-message\"></span>
      <button class=\"notification-close\" onclick=\"document.getElementById('app-notification').classList.add('notification-hidden')\">&times;</button>
    </div>
    {% block body %}{% endblock %}
  </body>
</html>
", "base_notification.html.twig", "C:\\Users\\utilisateur\\Documents\\symphony\\smart-coffee-menu\\templates-only\\base_notification.html.twig");
    }
}
