<?php

/* hello.html */
class __TwigTemplate_98288d11122c43aa8fa26ee36e387642a7c1c2b8489fba9c2ec286f16906e645 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "hello.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'pagetitle' => array($this, 'block_pagetitle'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Hello";
    }

    // line 3
    public function block_pagetitle($context, array $blocks = array())
    {
        echo "Hello test";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <p>";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "hello.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 5,  42 => 4,  36 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "hello.html", "/Applications/MAMP/htdocs/slimtest/templates/hello.html");
    }
}
