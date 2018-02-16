<?php

/* single_post.html */
class __TwigTemplate_ed7e8f04ebaeacca6a117d43b2929e85db35de8d47148f9f79c4c4ba63e6504a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "single_post.html", 1);
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
        echo "single post";
    }

    // line 3
    public function block_pagetitle($context, array $blocks = array())
    {
        echo "single post test";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <p>";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "single_post.html";
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
        return new Twig_Source("", "single_post.html", "/Applications/MAMP/htdocs/slimtest/templates/single_post.html");
    }
}
