<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* disc/index.html.twig */
class __TwigTemplate_af084a362e9aa2055dd3b069b43149a2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "disc/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "disc/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "disc/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Discs list
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "
\t\t<div class=\"text-center pt-3\">
\t\t\t<h1 class=\"text-info\">
\t\t\t\t<b>Discs List</b>
\t\t\t</h1>
\t\t\t<form class=\"d-flex justify-content-end mb-3\" role=\"search\">
\t\t\t\t<input class=\"form-control col-2\" type=\"search\" placeholder=\"Disc info?\" aria-label=\"Search\">
\t\t\t\t<button class=\"btn btn-outline-warning ml-1 mr-1\" type=\"submit\">Search</button>
\t\t\t</form>
\t\t\t<br>
\t\t</div>

\t\t<div class=\"container\">
\t\t\t";
        // line 20
        $context["col"] = 1;
        // line 21
        echo "\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["discs"]) || array_key_exists("discs", $context) ? $context["discs"] : (function () { throw new RuntimeError('Variable "discs" does not exist.', 21, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["disc"]) {
            // line 22
            echo "\t\t\t";
            if (((isset($context["col"]) || array_key_exists("col", $context) ? $context["col"] : (function () { throw new RuntimeError('Variable "col" does not exist.', 22, $this->source); })()) == 1)) {
                // line 23
                echo "\t\t\t\t<div class=\"row mb-2 justify-content-around\">
\t\t\t\t";
            }
            // line 25
            echo "
\t\t\t\t<div class=\"col-2 p-0\">
\t\t\t\t\t<img class=\"img-fluid img-thumbnail\" src=\"/img/";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "picture", [], "any", false, false, false, 27), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "picture", [], "any", false, false, false, 27), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "picture", [], "any", false, false, false, 27), "html", null, true);
            echo "\" width=\"200px\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-3 d-flex flex-column p-0\">
\t\t\t\t\t<div class=\"small\">
\t\t\t\t\t\t<h5>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "title", [], "any", false, false, false, 31), "html", null, true);
            echo "<br></h5>
\t\t\t\t\t\t<b>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["disc"], "artist", [], "any", false, false, false, 32), "name", [], "any", false, false, false, 32), "html", null, true);
            echo "</b><br>
\t\t\t\t\t\t<b>Label :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "label", [], "any", false, false, false, 35), "html", null, true);
            echo "<br>
\t\t\t\t\t\t<b>Year :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "year", [], "any", false, false, false, 38), "html", null, true);
            echo "<br>
\t\t\t\t\t\t<b>Genre :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "genre", [], "any", false, false, false, 41), "html", null, true);
            echo "<br>
\t\t\t\t\t\t<b>Price :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "price", [], "any", false, false, false, 44), "html", null, true);
            echo "<br>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mt-auto mb-2 d-flex justify-content-around\">
\t\t\t\t\t\t<a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_disc_show", ["id" => twig_get_attribute($this->env, $this->source, $context["disc"], "id", [], "any", false, false, false, 47)]), "html", null, true);
            echo "\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-eye fa-sm\" title=\"Details\" alt=\"Details\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            // line 50
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 51
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_disc_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["disc"], "id", [], "any", false, false, false, 51)]), "html", null, true);
                echo "\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t\t<i class=\"fa-solid fa-pencil fa-sm\" title=\"Edit\" alt=\"Edit\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 55
            echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
            // line 57
            if (((isset($context["col"]) || array_key_exists("col", $context) ? $context["col"] : (function () { throw new RuntimeError('Variable "col" does not exist.', 57, $this->source); })()) == 2)) {
                // line 58
                echo "\t\t\t\t</div>
\t\t\t\t";
                // line 59
                $context["col"] = 1;
                // line 60
                echo "\t\t\t";
            } else {
                // line 61
                echo "\t\t\t\t";
                $context["col"] = ((isset($context["col"]) || array_key_exists("col", $context) ? $context["col"] : (function () { throw new RuntimeError('Variable "col" does not exist.', 61, $this->source); })()) + 1);
                // line 62
                echo "\t\t\t";
            }
            // line 63
            echo "
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['disc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "\t</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "disc/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 65,  203 => 63,  200 => 62,  197 => 61,  194 => 60,  192 => 59,  189 => 58,  187 => 57,  183 => 55,  175 => 51,  173 => 50,  167 => 47,  161 => 44,  155 => 41,  149 => 38,  143 => 35,  137 => 32,  133 => 31,  122 => 27,  118 => 25,  114 => 23,  111 => 22,  106 => 21,  104 => 20,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Discs list
{% endblock %}

{% block body %}

\t\t<div class=\"text-center pt-3\">
\t\t\t<h1 class=\"text-info\">
\t\t\t\t<b>Discs List</b>
\t\t\t</h1>
\t\t\t<form class=\"d-flex justify-content-end mb-3\" role=\"search\">
\t\t\t\t<input class=\"form-control col-2\" type=\"search\" placeholder=\"Disc info?\" aria-label=\"Search\">
\t\t\t\t<button class=\"btn btn-outline-warning ml-1 mr-1\" type=\"submit\">Search</button>
\t\t\t</form>
\t\t\t<br>
\t\t</div>

\t\t<div class=\"container\">
\t\t\t{% set col = 1 %}
\t\t{% for disc in discs %}
\t\t\t{% if (col == 1)%}
\t\t\t\t<div class=\"row mb-2 justify-content-around\">
\t\t\t\t{% endif %}

\t\t\t\t<div class=\"col-2 p-0\">
\t\t\t\t\t<img class=\"img-fluid img-thumbnail\" src=\"/img/{{disc.picture}}\" alt=\"{{disc.picture}}\" title=\"{{disc.picture}}\" width=\"200px\">
\t\t\t\t</div>
\t\t\t\t<div class=\"col-3 d-flex flex-column p-0\">
\t\t\t\t\t<div class=\"small\">
\t\t\t\t\t\t<h5>{{disc.title}}<br></h5>
\t\t\t\t\t\t<b>{{disc.artist.name}}</b><br>
\t\t\t\t\t\t<b>Label :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t{{disc.label}}<br>
\t\t\t\t\t\t<b>Year :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t{{disc.year}}<br>
\t\t\t\t\t\t<b>Genre :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t{{disc.genre}}<br>
\t\t\t\t\t\t<b>Price :
\t\t\t\t\t\t</b>
\t\t\t\t\t\t{{disc.price}}<br>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"mt-auto mb-2 d-flex justify-content-around\">
\t\t\t\t\t\t<a href=\"{{ path('app_disc_show', {'id': disc.id}) }}\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-eye fa-sm\" title=\"Details\" alt=\"Details\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t{% if is_granted('ROLE_ADMIN') %}
\t\t\t\t\t\t\t<a href=\"{{ path('app_disc_edit', {'id': disc.id}) }}\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t\t<i class=\"fa-solid fa-pencil fa-sm\" title=\"Edit\" alt=\"Edit\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t{% if (col == 2) %}
\t\t\t\t</div>
\t\t\t\t{% set col = 1 %}
\t\t\t{% else %}
\t\t\t\t{% set col = col + 1 %}
\t\t\t{% endif %}

\t\t{% endfor %}
\t</div>

{% endblock %}
", "disc/index.html.twig", "/home/al/AFPA/MS/DIW22091/Exos/Symfony/Record3/templates/disc/index.html.twig");
    }
}
