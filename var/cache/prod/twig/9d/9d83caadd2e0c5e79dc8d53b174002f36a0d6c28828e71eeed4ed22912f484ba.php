<?php

/* base.html.twig */
class __TwigTemplate_692f1ba657aa1701f68b6fb22f219f5e1aef544b596be8fa40bb71169ac93bb8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 38
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>

    <nav class=\"navbar navbar-expand-sm navbar-custom\">
        <a href=\"";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("accueil");
        echo "\" class=\"navbar-brand\">JOBINDER</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarCustom\">
            <i class=\"fa fa-bars fa-lg py-1 text-white\"></i>
        </button>
        <div class=\"navbar-collapse collapse\" id=\"navbarCustom\">
            <ul class=\"navbar-nav\">
                <li class=\"nav-item active\">
                    <a class=\"nav-link\" href=\"#\">Se connecter/Changer de compte</a>
                </li>
                <li class=\"nav-item dropdown\">
                    <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                      Petit Dropdown
                    </a>
                    <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">
                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


        <div class=\"container\">
            <div class=\"row justify-content-md-center\">
                <div class=\"col-sm-12\">
                <br>
        ";
        // line 71
        $this->displayBlock('body', $context, $blocks);
        // line 73
        echo "                </div>
            </div>
        </div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "
            <!-- Latest compiled and minified CSS -->
            <link rel=\"stylesheet\" href =\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/css/bootstrap.min.css"), "html", null, true);
        echo "\" type =\"text/css\" />
            <!-- Optional theme -->
            <link rel=\"stylesheet\" href =\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/css/bootstrap-theme.min.css"), "html", null, true);
        echo "\" type =\"text/css\" />
            <link rel=\"stylesheet\" href =\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/css/main.css"), "html", null, true);
        echo "\" type =\"text/css\" />

            <link rel=\"stylesheet\" href=\"https://unpkg.com/leaflet@1.3.1/dist/leaflet.css\"
  integrity=\"sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==\"
  crossorigin=\"\"/>



        ";
    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
        // line 22
        echo "
            <script src=\"https://unpkg.com/leaflet@1.3.1/dist/leaflet.js\"
  integrity=\"sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==\"
  crossorigin=\"\"></script>

            <script src =\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/jquery-3.2.1.min.js"), "html", null, true);
        echo "\"></script>
            <script src =\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/index.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/main.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/jquery.paginate.js"), "html", null, true);
        echo "\"></script>
            <script type=\"text/javascript\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/app/js/script.js"), "html", null, true);
        echo "\"></script>

            


        ";
    }

    // line 71
    public function block_body($context, array $blocks = array())
    {
        // line 72
        echo "        ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 72,  164 => 71,  154 => 32,  150 => 31,  146 => 30,  142 => 29,  138 => 28,  134 => 27,  127 => 22,  124 => 21,  111 => 12,  107 => 11,  102 => 9,  98 => 7,  95 => 6,  89 => 5,  80 => 73,  78 => 71,  47 => 43,  38 => 38,  35 => 21,  33 => 6,  29 => 5,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.html.twig", "C:\\wamp64\\www\\Jobinder\\app\\Resources\\views\\base.html.twig");
    }
}
