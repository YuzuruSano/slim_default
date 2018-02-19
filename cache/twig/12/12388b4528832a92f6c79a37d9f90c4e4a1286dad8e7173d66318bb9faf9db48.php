<?php

/* single_post.html */
class __TwigTemplate_f3066e245cb51cd381eae62cd703cf354fb01631156701eae48876080893794d extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "title", array()), "html", null, true);
        echo "</p>
    <p>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["entry"] ?? null), "content", array()), "html", null, true);
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
        return array (  50 => 6,  45 => 5,  42 => 4,  36 => 3,  30 => 2,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html\" %}
{% block title %}single post{% endblock %}
{% block pagetitle %}single post test{% endblock %}
{% block content %}
    <p>{{entry.title}}</p>
    <p>{{entry.content}}</p>
{% endblock %}", "single_post.html", "/Applications/MAMP/htdocs/slimtest/templates/single_post.html");
    }
}
