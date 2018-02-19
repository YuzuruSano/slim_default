<?php

/* layout.html */
class __TwigTemplate_2b0cb81646f87bcd6ecbf8436e35b81befa25d1d92ba87e6f563bf41557173da extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'pagetitle' => array($this, 'block_pagetitle'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ja\">
<head>
    <meta charset=\"UTF-8\">
    <title>SlimPHP Twig Test-";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
    <h1>";
        // line 8
        $this->displayBlock('pagetitle', $context, $blocks);
        echo "</h1>
    <div id='content'>
        ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "    </div>
    <hr />
    <div id='footer'>
        &copy; Copyright xxx
    </div>
</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 8
    public function block_pagetitle($context, array $blocks = array())
    {
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "        ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  64 => 11,  61 => 10,  56 => 8,  51 => 5,  41 => 12,  39 => 10,  34 => 8,  28 => 5,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"ja\">
<head>
    <meta charset=\"UTF-8\">
    <title>SlimPHP Twig Test-{% block title %}{% endblock %}</title>
</head>
<body>
    <h1>{% block pagetitle %}{% endblock %}</h1>
    <div id='content'>
        {% block content %}
        {% endblock %}
    </div>
    <hr />
    <div id='footer'>
        &copy; Copyright xxx
    </div>
</body>
</html>", "layout.html", "/Applications/MAMP/htdocs/slimtest/templates/layout.html");
    }
}
