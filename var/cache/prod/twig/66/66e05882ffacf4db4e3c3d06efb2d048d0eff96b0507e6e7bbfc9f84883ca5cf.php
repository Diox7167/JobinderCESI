<?php

/* default/accueil.html.twig */
class __TwigTemplate_4b94a16b4347ad3a1e378f32040c6d1054e3a1b56b5522837f7206e5ee6f9a12 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "default/accueil.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "
<br>

<div class=\"jumbotron jumbotron-fluid\">
  <div class=\"container\">
    <h1 class=\"display-4\">Accueil</h1>
    <p class=\"lead\">Bienvenue sur le célèbre Jobinder !</p>
    <p class=\"lead\">Envie de matcher avec une entreprise ? Ce site est fait pour toi !</p>
    <br>
    <button type=\"button\" class=\"btn btn-primary btn-lg\"><a href=\"#\">Se connecter / Changer de compte</a></button>
\t<button type=\"button\" class=\"btn btn-secondary btn-lg\"><a href=\"#\">Page admin</a></button>
\t<button type=\"button\" class=\"btn btn-secondary btn-lg\"><a href=\"#\">Page utilisateur</a></button>
  </div>
</div>







";
    }

    public function getTemplateName()
    {
        return "default/accueil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "default/accueil.html.twig", "C:\\wamp64\\www\\Jobinder\\app\\Resources\\views\\default\\accueil.html.twig");
    }
}
