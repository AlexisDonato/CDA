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

/* artist/index.html.twig */
class __TwigTemplate_006be37e5744f265e91266b18f362059 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "artist/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "artist/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "artist/index.html.twig", 1);
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

        echo "Artists list
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
        echo "\t<div class=\"d-flex justify-content-center mt-3 mb-3\">
\t\t<h1 class=\"text-info\"><b>Artists List</b></h1>
\t</div>
\t\t\t<form class=\"d-flex justify-content-center mb-5\" role=\"search\">
\t\t\t\t<input class=\"form-control col-2\" type=\"search\" placeholder=\"Artist?\" aria-label=\"Search\">
\t\t\t\t<button class=\"btn btn-outline-warning ml-1\" type=\"submit\">Search</button>
\t\t\t</form>

\t<div class=\"row row-cols-1 row-cols-md-4 g-4\">
\t\t";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["artists"]) || array_key_exists("artists", $context) ? $context["artists"] : (function () { throw new RuntimeError('Variable "artists" does not exist.', 16, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["artist"]) {
            // line 17
            echo "\t\t\t<div class=\"col mb-3\">
\t\t\t\t<div class=\"card-header bg-secondary bg-gradient text-center\">
\t\t\t\t\t";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["artist"], "discs", [], "any", false, false, false, 19));
            foreach ($context['_seq'] as $context["_key"] => $context["disc"]) {
                // line 20
                echo "\t\t\t\t\t\t<img src=\"/img/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "picture", [], "any", false, false, false, 20), "html", null, true);
                echo "\" class=\"card-img-top img-thumbnail bg-dark\" style=\"width:80px\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["disc"], "picture", [], "any", false, false, false, 20), "html", null, true);
                echo "\">
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['disc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "
\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t\t\t<b>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artist"], "name", [], "any", false, false, false, 25), "html", null, true);
            echo "</b>
\t\t\t\t\t\t</h5>
\t\t\t\t\t\t<p class=\"card-text\">
\t\t\t\t\t\t\t<li class=\"list-group-item bg-dark bg-gradient\">Id:
\t\t\t\t\t\t\t\t";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artist"], "id", [], "any", false, false, false, 29), "html", null, true);
            echo "<br></li>
\t\t\t\t\t\t\t<li class=\"list-group-item bg-dark\">URL: ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["artist"], "url", [], "any", false, false, false, 30), "html", null, true);
            echo "
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</p>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-group-item bg-dark d-flex justify-content-around\">
\t\t\t\t\t\t<a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_artist_show", ["id" => twig_get_attribute($this->env, $this->source, $context["artist"], "id", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-eye fa-sm\" title=\"Details\" alt=\"Details\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            // line 38
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 39
                echo "\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_artist_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["artist"], "id", [], "any", false, false, false, 39)]), "html", null, true);
                echo "\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-pencil fa-sm\" title=\"Edit\" alt=\"Edit\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t";
            }
            // line 43
            echo "\t\t\t\t\t</li>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 48
            echo "\t\t<tr>
\t\t\t<td colspan=\"4\">no records found</td>
\t\t</tr>
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['artist'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "artist/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 48,  164 => 43,  156 => 39,  154 => 38,  148 => 35,  140 => 30,  136 => 29,  129 => 25,  124 => 22,  113 => 20,  109 => 19,  105 => 17,  100 => 16,  89 => 7,  79 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Artists list
{% endblock %}

{% block body %}
\t<div class=\"d-flex justify-content-center mt-3 mb-3\">
\t\t<h1 class=\"text-info\"><b>Artists List</b></h1>
\t</div>
\t\t\t<form class=\"d-flex justify-content-center mb-5\" role=\"search\">
\t\t\t\t<input class=\"form-control col-2\" type=\"search\" placeholder=\"Artist?\" aria-label=\"Search\">
\t\t\t\t<button class=\"btn btn-outline-warning ml-1\" type=\"submit\">Search</button>
\t\t\t</form>

\t<div class=\"row row-cols-1 row-cols-md-4 g-4\">
\t\t{% for artist in artists %}
\t\t\t<div class=\"col mb-3\">
\t\t\t\t<div class=\"card-header bg-secondary bg-gradient text-center\">
\t\t\t\t\t{% for disc in artist.discs %}
\t\t\t\t\t\t<img src=\"/img/{{ disc.picture }}\" class=\"card-img-top img-thumbnail bg-dark\" style=\"width:80px\" alt=\"{{ disc.picture }}\">
\t\t\t\t\t{% endfor %}

\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<h5 class=\"card-title\">
\t\t\t\t\t\t\t<b>{{ artist.name }}</b>
\t\t\t\t\t\t</h5>
\t\t\t\t\t\t<p class=\"card-text\">
\t\t\t\t\t\t\t<li class=\"list-group-item bg-dark bg-gradient\">Id:
\t\t\t\t\t\t\t\t{{ artist.id }}<br></li>
\t\t\t\t\t\t\t<li class=\"list-group-item bg-dark\">URL: {{ artist.url }}
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</p>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-group-item bg-dark d-flex justify-content-around\">
\t\t\t\t\t\t<a href=\"{{ path('app_artist_show', {'id': artist.id}) }}\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-eye fa-sm\" title=\"Details\" alt=\"Details\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t{% if is_granted('ROLE_ADMIN') %}
\t\t\t\t\t\t<a href=\"{{ path('app_artist_edit', {'id': artist.id}) }}\" style=\"font-size: 2rem; color: #17a2b8;\">
\t\t\t\t\t\t\t<i class=\"fa-solid fa-pencil fa-sm\" title=\"Edit\" alt=\"Edit\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t</li>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t{% else %}
\t\t<tr>
\t\t\t<td colspan=\"4\">no records found</td>
\t\t</tr>
\t{% endfor %}
{% endblock %}
", "artist/index.html.twig", "/home/al/AFPA/MS/DIW22091/Exos/Symfony/Record3/templates/artist/index.html.twig");
    }
}
