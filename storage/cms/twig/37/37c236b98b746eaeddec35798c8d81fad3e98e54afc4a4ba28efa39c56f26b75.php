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

/* /Applications/MAMP/htdocs/larabuilder/themes/spotlayer/partials/settingsmenu.htm */
class __TwigTemplate_3f8d79fd0a92e85ca66a8b887baa390d8749cdfc573e51b1714ff3228dd52ce5 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"kt-grid__item kt-app__toggle kt-app__aside kt-padding-r-20\" id=\"kt_user_profile_aside\">
\t<!--begin:: Widgets/Applications/User/Profile1-->
\t<div class=\"kt-portlet kt-portlet--height-fluid-\">
\t\t<div class=\"kt-inbox__nav\">
\t\t\t<ul class=\"kt-nav kt-nav--active-bg\" id=\"kt_nav\" role=\"tablist\">
\t\t\t\t<li class=\"kt-nav__item ";
        // line 6
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 6), "page", [], "any", false, false, false, 6) == "general") || (twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 6), "page", [], "any", false, false, false, 6)) && twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 6), "child_of_page", [], "any", false, false, false, 6))))) {
            echo "kt-nav__item--active";
        }
        echo "\">
\t\t\t\t\t<a  href=\"";
        // line 7
        echo url("dashboard/settings/general");
        echo "\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z\" id=\"Combined-Shape\" fill=\"#000000\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 14
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["System Configuration"]);
        echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item ";
        // line 17
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 17), "page", [], "any", false, false, false, 17) == "company")) {
            echo "kt-nav__item--active";
        }
        echo "\">
\t\t\t\t\t<a  href=\"";
        // line 18
        echo url("dashboard/settings/company");
        echo "\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M7.70696074,11.6465196 L4.15660341,9.75299572 C3.96167938,9.64903623 3.88793804,9.40674327 3.99189753,9.21181925 C4.08361072,9.03985702 4.28590727,8.95902234 4.47087102,9.0204286 L9.57205231,10.7139738 L7.70696074,11.6465196 Z M12.7322989,14.3267 L16.3686753,12.9703901 L18.6316817,13.7216874 L18.6299527,13.7225513 C20.0084876,14.1925077 21,15.4985341 21,17.0361406 C21,18.9691372 19.4329966,20.5361406 17.5,20.5361406 C15.5670034,20.5361406 14,18.9691372 14,17.0361406 C14,16.3880326 14.176158,15.7810686 14.4832056,15.2605169 L12.7322989,14.3267 Z M17.5,15.5361406 C16.6715729,15.5361406 16,16.2077134 16,17.0361406 C16,17.8645677 16.6715729,18.5361406 17.5,18.5361406 C18.3284271,18.5361406 19,17.8645677 19,17.0361406 C19,16.2077134 18.3284271,15.5361406 17.5,15.5361406 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\"/>
\t\t\t\t\t\t        <path d=\"M17.5,9 C18.3284271,9 19,8.32842712 19,7.5 C19,6.67157288 18.3284271,6 17.5,6 C16.6715729,6 16,6.67157288 16,7.5 C16,8.32842712 16.6715729,9 17.5,9 Z M14.4832056,9.27562366 C14.176158,8.75507197 14,8.14810794 14,7.5 C14,5.56700338 15.5670034,4 17.5,4 C19.4329966,4 21,5.56700338 21,7.5 C21,9.03760648 20.0084876,10.3436328 18.6299527,10.8135893 L18.6316817,10.8144531 L4.47087102,15.515712 C4.28590727,15.5771182 4.08361072,15.4962835 3.99189753,15.3243213 C3.88793804,15.1293973 3.96167938,14.8871043 4.15660341,14.7831448 L14.4832056,9.27562366 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 26
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Setup Company"]);
        echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item ";
        // line 29
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 29), "settings_breadcrumb", [], "any", false, false, false, 29) == "components")) {
            echo "kt-nav__item--active";
        }
        echo "\">
\t\t\t\t\t<a class=\"kt-nav__link ";
        // line 30
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 30), "settings_breadcrumb", [], "any", false, false, false, 30) != "components")) {
            echo "collapsed";
        }
        echo "\" role=\"tab\" id=\"kt_nav_link_3\" data-toggle=\"collapse\" href=\"#kt_nav_sub_3\" aria-expanded=\" true\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z\" id=\"Combined-Shape\" fill=\"#000000\"/>
\t\t\t\t\t\t        <rect id=\"Rectangle-Copy-2\" fill=\"#FFFFFF\" x=\"13\" y=\"8\" width=\"3\" height=\"3\" rx=\"1\"/>
\t\t\t\t\t\t        <path d=\"M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z\" id=\"Rectangle-2\" fill=\"#000000\" opacity=\"0.3\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 39
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Components"]);
        echo "</span>
\t\t\t\t\t\t<span class=\"kt-nav__link-arrow\"></span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"kt-nav__sub collapse ";
        // line 42
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 42), "settings_breadcrumb", [], "any", false, false, false, 42) == "components")) {
            echo "show";
        }
        echo "\" id=\"kt_nav_sub_3\" role=\"tabpanel\" aria-labelledby=\"m_nav_link_3\" data-parent=\"#kt_nav\">
\t\t\t\t\t\t<li class=\"kt-nav__item ";
        // line 43
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 43), "child_of_page", [], "any", false, false, false, 43) == "google") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 43), "page", [], "any", false, false, false, 43) == "google"))) {
            echo "kt-nav__item--active";
        }
        echo "\" aria-haspopup=\"true\" >
\t\t\t\t\t\t\t<a  href=\"";
        // line 44
        echo url("dashboard/settings/google");
        echo "\" class=\"kt-nav__link \">
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-bullet kt-nav__link-bullet--line\"><span></span></span>
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 46
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Google APIs"]);
        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item ";
        // line 51
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 51), "child_of_page", [], "any", false, false, false, 51) == "employees") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 51), "page", [], "any", false, false, false, 51) == "employees"))) {
            echo "kt-nav__item--active";
        }
        echo "\">
\t\t\t\t\t<a  href=\"";
        // line 52
        echo url("dashboard/settings/employees");
        echo "\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <polygon id=\"Shape\" points=\"0 0 24 0 24 24 0 24\"/>
\t\t\t\t\t\t        <path d=\"M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\"/>
\t\t\t\t\t\t        <path d=\"M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 60
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Users"]);
        echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item ";
        // line 63
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 63), "settings_breadcrumb", [], "any", false, false, false, 63) == "languages")) {
            echo "kt-nav__item--active";
        }
        echo "\">
\t\t\t\t\t<a class=\"kt-nav__link ";
        // line 64
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 64), "settings_breadcrumb", [], "any", false, false, false, 64) != "languages")) {
            echo "collapsed";
        }
        echo "\" role=\"tab\" id=\"kt_nav_link_5\" data-toggle=\"collapse\" href=\"#kt_nav_sub_5\" aria-expanded=\" true\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t        <circle id=\"Oval\" fill=\"#000000\" opacity=\"0.3\" cx=\"12\" cy=\"10\" r=\"6\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 72
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Localizations"]);
        echo "</span>
\t\t\t\t\t\t<span class=\"kt-nav__link-arrow\"></span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"kt-nav__sub collapse ";
        // line 75
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 75), "settings_breadcrumb", [], "any", false, false, false, 75) == "languages")) {
            echo "show";
        }
        echo "\" id=\"kt_nav_sub_5\" role=\"tabpanel\" aria-labelledby=\"m_nav_link_5\" data-parent=\"#kt_nav\">
\t\t\t\t\t\t<li class=\"kt-nav__item ";
        // line 76
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 76), "child_of_page", [], "any", false, false, false, 76) == "languages") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 76), "page", [], "any", false, false, false, 76) == "languages"))) {
            echo "kt-nav__item--active";
        }
        echo "\" aria-haspopup=\"true\">
\t\t\t\t\t\t\t<a  href=\"";
        // line 77
        echo url("dashboard/settings/languages");
        echo "\" class=\"kt-nav__link \">
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-bullet kt-nav__link-bullet--line\"><span></span></span>
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 79
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Languages"]);
        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"kt-nav__item ";
        // line 82
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 82), "child_of_page", [], "any", false, false, false, 82) == "translate") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 82), "page", [], "any", false, false, false, 82) == "translate"))) {
            echo "kt-nav__item--active";
        }
        echo "\" aria-haspopup=\"true\">
\t\t\t\t\t\t\t<a  href=\"";
        // line 83
        echo url("dashboard/settings/translate");
        echo "\" class=\"kt-nav__link \">
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-bullet kt-nav__link-bullet--line\"><span></span></span>
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 85
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Translate"]);
        echo "</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item ";
        // line 90
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 90), "child_of_page", [], "any", false, false, false, 90) == "backup") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 90), "page", [], "any", false, false, false, 90) == "backup"))) {
            echo "kt-nav__item--active";
        }
        echo "\">
\t\t\t\t\t<a  href=\"";
        // line 91
        echo url("dashboard/settings/backup");
        echo "\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <polygon id=\"Shape\" points=\"0 0 24 0 24 24 0 24\"/>
\t\t\t\t\t\t        <path d=\"M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z\" id=\"Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t        <rect id=\"Rectangle-16\" fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"4\" width=\"3\" height=\"5\" rx=\"0.5\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">";
        // line 99
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Data Backup"]);
        echo "</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t</div>
</div>

";
        // line 107
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('styles'        );
        // line 108
        echo "\t";
        if ((($context["currentLang"] ?? null) == "ar")) {
            // line 109
            echo "\t    <link href=\"./admin/css/demo1/pages/inbox/inbox.rtl.css\" rel=\"stylesheet\" type=\"text/css\" />
\t";
        } else {
            // line 111
            echo "\t\t<link href=\"./admin/css/demo1/pages/inbox/inbox.css\" rel=\"stylesheet\" type=\"text/css\" />
\t";
        }
        // line 107
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
    }

    public function getTemplateName()
    {
        return "/Applications/MAMP/htdocs/larabuilder/themes/spotlayer/partials/settingsmenu.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 107,  267 => 111,  263 => 109,  260 => 108,  258 => 107,  247 => 99,  236 => 91,  230 => 90,  222 => 85,  217 => 83,  211 => 82,  205 => 79,  200 => 77,  194 => 76,  188 => 75,  182 => 72,  169 => 64,  163 => 63,  157 => 60,  146 => 52,  140 => 51,  132 => 46,  127 => 44,  121 => 43,  115 => 42,  109 => 39,  95 => 30,  89 => 29,  83 => 26,  72 => 18,  66 => 17,  60 => 14,  50 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"kt-grid__item kt-app__toggle kt-app__aside kt-padding-r-20\" id=\"kt_user_profile_aside\">
\t<!--begin:: Widgets/Applications/User/Profile1-->
\t<div class=\"kt-portlet kt-portlet--height-fluid-\">
\t\t<div class=\"kt-inbox__nav\">
\t\t\t<ul class=\"kt-nav kt-nav--active-bg\" id=\"kt_nav\" role=\"tablist\">
\t\t\t\t<li class=\"kt-nav__item {% if this.param.page == 'general' or (this.param.page is empty and this.page.child_of_page is empty) %}kt-nav__item--active{% endif %}\">
\t\t\t\t\t<a  href=\"{{url('dashboard/settings/general')}}\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z\" id=\"Combined-Shape\" fill=\"#000000\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'System Configuration'|__}}</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item {% if this.param.page == 'company' %}kt-nav__item--active{% endif %}\">
\t\t\t\t\t<a  href=\"{{url('dashboard/settings/company')}}\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M7.70696074,11.6465196 L4.15660341,9.75299572 C3.96167938,9.64903623 3.88793804,9.40674327 3.99189753,9.21181925 C4.08361072,9.03985702 4.28590727,8.95902234 4.47087102,9.0204286 L9.57205231,10.7139738 L7.70696074,11.6465196 Z M12.7322989,14.3267 L16.3686753,12.9703901 L18.6316817,13.7216874 L18.6299527,13.7225513 C20.0084876,14.1925077 21,15.4985341 21,17.0361406 C21,18.9691372 19.4329966,20.5361406 17.5,20.5361406 C15.5670034,20.5361406 14,18.9691372 14,17.0361406 C14,16.3880326 14.176158,15.7810686 14.4832056,15.2605169 L12.7322989,14.3267 Z M17.5,15.5361406 C16.6715729,15.5361406 16,16.2077134 16,17.0361406 C16,17.8645677 16.6715729,18.5361406 17.5,18.5361406 C18.3284271,18.5361406 19,17.8645677 19,17.0361406 C19,16.2077134 18.3284271,15.5361406 17.5,15.5361406 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\"/>
\t\t\t\t\t\t        <path d=\"M17.5,9 C18.3284271,9 19,8.32842712 19,7.5 C19,6.67157288 18.3284271,6 17.5,6 C16.6715729,6 16,6.67157288 16,7.5 C16,8.32842712 16.6715729,9 17.5,9 Z M14.4832056,9.27562366 C14.176158,8.75507197 14,8.14810794 14,7.5 C14,5.56700338 15.5670034,4 17.5,4 C19.4329966,4 21,5.56700338 21,7.5 C21,9.03760648 20.0084876,10.3436328 18.6299527,10.8135893 L18.6316817,10.8144531 L4.47087102,15.515712 C4.28590727,15.5771182 4.08361072,15.4962835 3.99189753,15.3243213 C3.88793804,15.1293973 3.96167938,14.8871043 4.15660341,14.7831448 L14.4832056,9.27562366 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Setup Company'|__}}</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item {% if this.page.settings_breadcrumb == 'components' %}kt-nav__item--active{% endif %}\">
\t\t\t\t\t<a class=\"kt-nav__link {% if this.page.settings_breadcrumb != 'components' %}collapsed{% endif %}\" role=\"tab\" id=\"kt_nav_link_3\" data-toggle=\"collapse\" href=\"#kt_nav_sub_3\" aria-expanded=\" true\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z\" id=\"Combined-Shape\" fill=\"#000000\"/>
\t\t\t\t\t\t        <rect id=\"Rectangle-Copy-2\" fill=\"#FFFFFF\" x=\"13\" y=\"8\" width=\"3\" height=\"3\" rx=\"1\"/>
\t\t\t\t\t\t        <path d=\"M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z\" id=\"Rectangle-2\" fill=\"#000000\" opacity=\"0.3\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Components'|__}}</span>
\t\t\t\t\t\t<span class=\"kt-nav__link-arrow\"></span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"kt-nav__sub collapse {% if this.page.settings_breadcrumb == 'components' %}show{% endif %}\" id=\"kt_nav_sub_3\" role=\"tabpanel\" aria-labelledby=\"m_nav_link_3\" data-parent=\"#kt_nav\">
\t\t\t\t\t\t<li class=\"kt-nav__item {% if this.page.child_of_page == 'google' or  this.param.page == 'google' %}kt-nav__item--active{% endif %}\" aria-haspopup=\"true\" >
\t\t\t\t\t\t\t<a  href=\"{{url('dashboard/settings/google')}}\" class=\"kt-nav__link \">
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-bullet kt-nav__link-bullet--line\"><span></span></span>
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Google APIs'|__}}</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item {% if this.page.child_of_page == 'employees' or  this.param.page == 'employees' %}kt-nav__item--active{% endif %}\">
\t\t\t\t\t<a  href=\"{{url('dashboard/settings/employees')}}\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <polygon id=\"Shape\" points=\"0 0 24 0 24 24 0 24\"/>
\t\t\t\t\t\t        <path d=\"M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\" opacity=\"0.3\"/>
\t\t\t\t\t\t        <path d=\"M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Users'|__}}</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item {% if this.page.settings_breadcrumb == 'languages' %}kt-nav__item--active{% endif %}\">
\t\t\t\t\t<a class=\"kt-nav__link {% if this.page.settings_breadcrumb != 'languages' %}collapsed{% endif %}\" role=\"tab\" id=\"kt_nav_link_5\" data-toggle=\"collapse\" href=\"#kt_nav_sub_5\" aria-expanded=\" true\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <rect id=\"bound\" x=\"0\" y=\"0\" width=\"24\" height=\"24\"/>
\t\t\t\t\t\t        <path d=\"M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z\" id=\"Combined-Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t        <circle id=\"Oval\" fill=\"#000000\" opacity=\"0.3\" cx=\"12\" cy=\"10\" r=\"6\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Localizations'|__}}</span>
\t\t\t\t\t\t<span class=\"kt-nav__link-arrow\"></span>
\t\t\t\t\t</a>
\t\t\t\t\t<ul class=\"kt-nav__sub collapse {% if this.page.settings_breadcrumb == 'languages' %}show{% endif %}\" id=\"kt_nav_sub_5\" role=\"tabpanel\" aria-labelledby=\"m_nav_link_5\" data-parent=\"#kt_nav\">
\t\t\t\t\t\t<li class=\"kt-nav__item {% if this.page.child_of_page == 'languages' or  this.param.page == 'languages' %}kt-nav__item--active{% endif %}\" aria-haspopup=\"true\">
\t\t\t\t\t\t\t<a  href=\"{{url('dashboard/settings/languages')}}\" class=\"kt-nav__link \">
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-bullet kt-nav__link-bullet--line\"><span></span></span>
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Languages'|__}}</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"kt-nav__item {% if this.page.child_of_page == 'translate' or  this.param.page == 'translate' %}kt-nav__item--active{% endif %}\" aria-haspopup=\"true\">
\t\t\t\t\t\t\t<a  href=\"{{url('dashboard/settings/translate')}}\" class=\"kt-nav__link \">
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-bullet kt-nav__link-bullet--line\"><span></span></span>
\t\t\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Translate'|__}}</span>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li class=\"kt-nav__item {% if this.page.child_of_page == 'backup' or  this.param.page == 'backup' %}kt-nav__item--active{% endif %}\">
\t\t\t\t\t<a  href=\"{{url('dashboard/settings/backup')}}\" class=\"kt-nav__link\">
\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"24px\" height=\"24px\" viewBox=\"0 0 24 24\" version=\"1.1\" class=\"kt-svg-icon kt-nav__link-icon\">
\t\t\t\t\t\t    <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
\t\t\t\t\t\t        <polygon id=\"Shape\" points=\"0 0 24 0 24 24 0 24\"/>
\t\t\t\t\t\t        <path d=\"M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z\" id=\"Shape\" fill=\"#000000\" fill-rule=\"nonzero\"/>
\t\t\t\t\t\t        <rect id=\"Rectangle-16\" fill=\"#000000\" opacity=\"0.3\" x=\"12\" y=\"4\" width=\"3\" height=\"5\" rx=\"0.5\"/>
\t\t\t\t\t\t    </g>
\t\t\t\t\t\t</svg>
\t\t\t\t\t\t<span class=\"kt-nav__link-text\">{{'Data Backup'|__}}</span>
\t\t\t\t\t</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t</div>
</div>

{% put styles %}
\t{% if currentLang == 'ar'%}
\t    <link href=\"./admin/css/demo1/pages/inbox/inbox.rtl.css\" rel=\"stylesheet\" type=\"text/css\" />
\t{% else %}
\t\t<link href=\"./admin/css/demo1/pages/inbox/inbox.css\" rel=\"stylesheet\" type=\"text/css\" />
\t{% endif %}
{% endput %}", "/Applications/MAMP/htdocs/larabuilder/themes/spotlayer/partials/settingsmenu.htm", "");
    }
}
