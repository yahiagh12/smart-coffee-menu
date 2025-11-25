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

/* @Maker/test/KernelTestCase.tpl.php */
class __TwigTemplate_dd5507064cae0ad44a96b2ee862d4ff9 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Maker/test/KernelTestCase.tpl.php"));

        // line 1
        yield "<?= \"<?php\\n\" ?>

namespace <?= \$namespace; ?>;

use Symfony\\Bundle\\FrameworkBundle\\Test\\KernelTestCase;

class <?= \$class_name ?> extends KernelTestCase
{
    public function testSomething(): void
    {
        \$kernel = self::bootKernel();

        \$this->assertSame('test', \$kernel->getEnvironment());
        // \$routerService = static::getContainer()->get('router');
        // \$myCustomService = static::getContainer()->get(CustomService::class);
    }
}
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@Maker/test/KernelTestCase.tpl.php";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?= \"<?php\\n\" ?>

namespace <?= \$namespace; ?>;

use Symfony\\Bundle\\FrameworkBundle\\Test\\KernelTestCase;

class <?= \$class_name ?> extends KernelTestCase
{
    public function testSomething(): void
    {
        \$kernel = self::bootKernel();

        \$this->assertSame('test', \$kernel->getEnvironment());
        // \$routerService = static::getContainer()->get('router');
        // \$myCustomService = static::getContainer()->get(CustomService::class);
    }
}
", "@Maker/test/KernelTestCase.tpl.php", "C:\\projectsymf\\smart-coffee-menu\\vendor\\symfony\\maker-bundle\\templates\\test\\KernelTestCase.tpl.php");
    }
}
