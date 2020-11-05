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

/* /Applications/MAMP/htdocs/larabuilder/themes/spotlayer/pages/dashboard/settings.htm */
class __TwigTemplate_7406bd3f4a8686ff04623831495d1e8521f2b6f771072c5d45f5f4ae3330cf22 extends \Twig\Template
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
        echo "<div class=\"kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app\">

    <!--Begin:: App Aside Mobile Toggle-->
    <button class=\"kt-app__aside-close\" id=\"kt_user_profile_aside_close\">
        <i class=\"la la-close\"></i>
    </button>
    <!--End:: App Aside Mobile Toggle-->

    <!-- begin:: Aside -->
    ";
        // line 10
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("settingsmenu"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 11
        echo "    <!-- end:: Aside -->
    <!--End::Aside-->

    <!--Begin:: Inbox List-->
    <div class=\"kt-grid__item kt-grid__item--fluid    kt-portlet    kt-inbox__list kt-inbox__list--shown\" id=\"kt_inbox_list\">
        <div class=\"kt-portlet__head\">
    \t\t<div class=\"kt-portlet__head-label\">
    \t\t\t<h3 class=\"kt-portlet__head-title\">
    \t\t\t\t";
        // line 19
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 19), "title", [], "any", false, false, false, 19)]);
        echo "
    \t\t\t</h3>
    \t\t</div>
        </div>
        <div class=\"kt-portlet__body kt-portlet__body--fit-x\">
           \t<div class=\"col-lg-12\">
                ";
        // line 25
        echo call_user_func_array($this->env->getFunction('form_ajax')->getCallable(), ["ajax", "onSave", ["id" => "kt_form", "class" => "kt-form"]]);
        echo "
    \t\t\t\t<div class=\"row\">
    \t\t\t\t\t<div class=\"col-xl-12\">
\t\t\t\t\t\t\t<div class=\"form-group kt-hidden\" id=\"kt-form_msg\">
                                <div class=\"alert alert-danger\" role=\"alert\">
\t\t\t\t\t\t\t\t\t";
        // line 30
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Oh snap! Change a few things up and try submitting again."]);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
                        </div>
                    </div>
                    ";
        // line 35
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 35), "page", [], "any", false, false, false, 35) == "general") || twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 35), "page", [], "any", false, false, false, 35)))) {
            // line 36
            echo "        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
        \t\t\t\t\t\t<div class=\"kt-section kt-section--first\">
                                    <h3 class=\"kt-section__title kt-section__title-lg\">";
            // line 40
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["General"]);
            echo ":</h3>
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
        \t\t\t\t\t\t\t\t<div class=\"form-group row\">
        \t\t\t\t\t\t\t\t\t<label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 43
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Default Language"]);
            echo "</label>
        \t\t\t\t\t\t\t\t\t<div class=\"col-lg-9 col-xl-6\">
        \t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"language\" required>
                                                    <option data-hidden=\"true\"></option>
                                                    ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locales"] ?? null));
            foreach ($context['_seq'] as $context["code"] => $context["name"]) {
                // line 48
                echo "        \t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                echo "\" ";
                if ((($context["language"] ?? null) == $context["code"])) {
                    echo "selected";
                }
                echo " data-live-search=\"true\">";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "</option>
                                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['code'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                                                </select>
        \t\t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t<div class=\"form-group row\">
        \t\t\t\t\t\t\t\t\t<label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 54
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["TimeZone"]);
            echo "</label>
        \t\t\t\t\t\t\t\t\t<div class=\"col-lg-9 col-xl-6\">
        \t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"timezone_offset\" data-live-search=\"true\" required>
                                                    <option data-hidden=\"true\"></option>
                                                \t<option value=\"-12:00\" ";
            // line 58
            if ((($context["timezone_offset"] ?? null) == "-12:00")) {
                echo "selected";
            }
            echo ">(GMT -12:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Eniwetok, Kwajalein"]);
            echo "</option>
                                                \t<option value=\"-11:00\" ";
            // line 59
            if ((($context["timezone_offset"] ?? null) == "-11:00")) {
                echo "selected";
            }
            echo ">(GMT -11:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Midway Island, Samoa"]);
            echo "</option>
                                                \t<option value=\"-10:00\" ";
            // line 60
            if ((($context["timezone_offset"] ?? null) == "-10:00")) {
                echo "selected";
            }
            echo ">(GMT -10:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Hawaii"]);
            echo "</option>
                                                \t<option value=\"-09:50\" ";
            // line 61
            if ((($context["timezone_offset"] ?? null) == "-09:50")) {
                echo "selected";
            }
            echo ">(GMT -9:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Taiohae"]);
            echo "</option>
                                                \t<option value=\"-09:00\" ";
            // line 62
            if ((($context["timezone_offset"] ?? null) == "-09:00")) {
                echo "selected";
            }
            echo ">(GMT -9:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Alaska"]);
            echo "</option>
                                                \t<option value=\"-08:00\" ";
            // line 63
            if ((($context["timezone_offset"] ?? null) == "-08:00")) {
                echo "selected";
            }
            echo ">(GMT -8:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Pacific Time (US &amp; Canada)"]);
            echo "</option>
                                                \t<option value=\"-07:00\" ";
            // line 64
            if ((($context["timezone_offset"] ?? null) == "-07:00")) {
                echo "selected";
            }
            echo ">(GMT -7:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Mountain Time (US &amp; Canada)"]);
            echo "</option>
                                                \t<option value=\"-06:00\" ";
            // line 65
            if ((($context["timezone_offset"] ?? null) == "-06:00")) {
                echo "selected";
            }
            echo ">(GMT -6:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Central Time (US &amp; Canada), Mexico City"]);
            echo "</option>
                                                \t<option value=\"-05:00\" ";
            // line 66
            if ((($context["timezone_offset"] ?? null) == "-05:00")) {
                echo "selected";
            }
            echo ">(GMT -5:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Eastern Time (US &amp; Canada), Bogota, Lima"]);
            echo "</option>
                                                \t<option value=\"-04:50\" ";
            // line 67
            if ((($context["timezone_offset"] ?? null) == "-04:50")) {
                echo "selected";
            }
            echo ">(GMT -4:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Caracas"]);
            echo "</option>
                                                \t<option value=\"-04:00\" ";
            // line 68
            if ((($context["timezone_offset"] ?? null) == "-04:00")) {
                echo "selected";
            }
            echo ">(GMT -4:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Atlantic Time (Canada), Caracas, La Paz"]);
            echo "</option>
                                                \t<option value=\"-03:50\" ";
            // line 69
            if ((($context["timezone_offset"] ?? null) == "-03:50")) {
                echo "selected";
            }
            echo ">(GMT -3:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Newfoundland"]);
            echo "</option>
                                                \t<option value=\"-03:00\" ";
            // line 70
            if ((($context["timezone_offset"] ?? null) == "-03:00")) {
                echo "selected";
            }
            echo ">(GMT -3:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Brazil, Buenos Aires, Georgetown"]);
            echo "</option>
                                                \t<option value=\"-02:00\" ";
            // line 71
            if ((($context["timezone_offset"] ?? null) == "-02:00")) {
                echo "selected";
            }
            echo ">(GMT -2:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Mid-Atlantic"]);
            echo "</option>
                                                \t<option value=\"-01:00\" ";
            // line 72
            if ((($context["timezone_offset"] ?? null) == "-01:00")) {
                echo "selected";
            }
            echo ">(GMT -1:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Azores, Cape Verde Islands"]);
            echo "</option>
                                                \t<option value=\"+00:00\" ";
            // line 73
            if ((($context["timezone_offset"] ?? null) == "+00:00")) {
                echo "selected";
            }
            echo ">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                                                \t<option value=\"+01:00\" ";
            // line 74
            if ((($context["timezone_offset"] ?? null) == "+01:00")) {
                echo "selected";
            }
            echo ">(GMT +1:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Brussels, Copenhagen, Madrid, Paris"]);
            echo "</option>
                                                \t<option value=\"+02:00\" ";
            // line 75
            if ((($context["timezone_offset"] ?? null) == "+02:00")) {
                echo "selected";
            }
            echo ">(GMT +2:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Cairo, Kaliningrad, South Africa"]);
            echo "</option>
                                                \t<option value=\"+03:00\" ";
            // line 76
            if ((($context["timezone_offset"] ?? null) == "+03:00")) {
                echo "selected";
            }
            echo ">(GMT +3:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Baghdad, Riyadh, Moscow, St. Petersburg"]);
            echo "</option>
                                                \t<option value=\"+03:50\" ";
            // line 77
            if ((($context["timezone_offset"] ?? null) == "+03:50")) {
                echo "selected";
            }
            echo ">(GMT +3:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Tehran"]);
            echo "</option>
                                                \t<option value=\"+04:00\" ";
            // line 78
            if ((($context["timezone_offset"] ?? null) == "+04:00")) {
                echo "selected";
            }
            echo ">(GMT +4:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Abu Dhabi, Muscat, Baku, Tbilisi"]);
            echo "</option>
                                                \t<option value=\"+04:50\" ";
            // line 79
            if ((($context["timezone_offset"] ?? null) == "+04:50")) {
                echo "selected";
            }
            echo ">(GMT +4:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Kabul"]);
            echo "</option>
                                                \t<option value=\"+05:00\" ";
            // line 80
            if ((($context["timezone_offset"] ?? null) == "+05:00")) {
                echo "selected";
            }
            echo ">(GMT +5:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Ekaterinburg, Islamabad, Karachi, Tashkent"]);
            echo "</option>
                                                \t<option value=\"+05:50\" ";
            // line 81
            if ((($context["timezone_offset"] ?? null) == "+05:50")) {
                echo "selected";
            }
            echo ">(GMT +5:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Bombay, Calcutta, Madras, New Delhi"]);
            echo "</option>
                                                \t<option value=\"+05:75\" ";
            // line 82
            if ((($context["timezone_offset"] ?? null) == "+05:75")) {
                echo "selected";
            }
            echo ">(GMT +5:45) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Kathmandu, Pokhara"]);
            echo "</option>
                                                \t<option value=\"+06:00\" ";
            // line 83
            if ((($context["timezone_offset"] ?? null) == "+06:00")) {
                echo "selected";
            }
            echo ">(GMT +6:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Almaty, Dhaka, Colombo"]);
            echo "</option>
                                                \t<option value=\"+06:50\" ";
            // line 84
            if ((($context["timezone_offset"] ?? null) == "+06:50")) {
                echo "selected";
            }
            echo ">(GMT +6:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Yangon, Mandalay"]);
            echo "</option>
                                                \t<option value=\"+07:00\" ";
            // line 85
            if ((($context["timezone_offset"] ?? null) == "+07:00")) {
                echo "selected";
            }
            echo ">(GMT +7:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Bangkok, Hanoi, Jakarta"]);
            echo "</option>
                                                \t<option value=\"+08:00\" ";
            // line 86
            if ((($context["timezone_offset"] ?? null) == "+08:00")) {
                echo "selected";
            }
            echo ">(GMT +8:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Beijing, Perth, Singapore, Hong Kong"]);
            echo "</option>
                                                \t<option value=\"+08:75\" ";
            // line 87
            if ((($context["timezone_offset"] ?? null) == "+08:75")) {
                echo "selected";
            }
            echo ">(GMT +8:45) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Eucla"]);
            echo "</option>
                                                \t<option value=\"+09:00\" ";
            // line 88
            if ((($context["timezone_offset"] ?? null) == "+09:00")) {
                echo "selected";
            }
            echo ">(GMT +9:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Tokyo, Seoul, Osaka, Sapporo, Yakutsk"]);
            echo "</option>
                                                \t<option value=\"+09:50\" ";
            // line 89
            if ((($context["timezone_offset"] ?? null) == "+09:50")) {
                echo "selected";
            }
            echo ">(GMT +9:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Adelaide, Darwin"]);
            echo "</option>
                                                \t<option value=\"+10:00\" ";
            // line 90
            if ((($context["timezone_offset"] ?? null) == "+10:00")) {
                echo "selected";
            }
            echo ">(GMT +10:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Eastern Australia, Guam, Vladivostok"]);
            echo "</option>
                                                \t<option value=\"+10:50\" ";
            // line 91
            if ((($context["timezone_offset"] ?? null) == "+10:50")) {
                echo "selected";
            }
            echo ">(GMT +10:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Lord Howe Island"]);
            echo "</option>
                                                \t<option value=\"+11:00\" ";
            // line 92
            if ((($context["timezone_offset"] ?? null) == "+11:00")) {
                echo "selected";
            }
            echo ">(GMT +11:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Magadan, Solomon Islands, New Caledonia"]);
            echo "</option>
                                                \t<option value=\"+11:50\" ";
            // line 93
            if ((($context["timezone_offset"] ?? null) == "+11:50")) {
                echo "selected";
            }
            echo ">(GMT +11:30) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Norfolk Island"]);
            echo "</option>
                                                \t<option value=\"+12:00\" ";
            // line 94
            if ((($context["timezone_offset"] ?? null) == "+12:00")) {
                echo "selected";
            }
            echo ">(GMT +12:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Auckland, Wellington, Fiji, Kamchatka"]);
            echo "</option>
                                                \t<option value=\"+12:75\" ";
            // line 95
            if ((($context["timezone_offset"] ?? null) == "+12:75")) {
                echo "selected";
            }
            echo ">(GMT +12:45) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Chatham Islands"]);
            echo "</option>
                                                \t<option value=\"+13:00\" ";
            // line 96
            if ((($context["timezone_offset"] ?? null) == "+13:00")) {
                echo "selected";
            }
            echo ">(GMT +13:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Apia, Nukualofa"]);
            echo "</option>
                                                \t<option value=\"+14:00\" ";
            // line 97
            if ((($context["timezone_offset"] ?? null) == "+14:00")) {
                echo "selected";
            }
            echo ">(GMT +14:00) ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Line Islands, Tokelau"]);
            echo "</option>
                                                </select>
        \t\t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t<div class=\"form-group row\">
        \t\t\t\t\t\t\t\t\t<label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 102
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Date Format"]);
            echo "</label>
        \t\t\t\t\t\t\t\t\t<div class=\"col-lg-9 col-xl-6\">
        \t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"dateformat\" required>
                                                    <option data-hidden=\"true\"></option>
                                                    <option value=\"d/m/Y\" ";
            // line 106
            if ((($context["dateformat"] ?? null) == "d/m/Y")) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d/m/Y"), "html", null, true);
            echo "</option>
                                                    <option value=\"m/d/Y\" ";
            // line 107
            if ((($context["dateformat"] ?? null) == "m/d/Y")) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m/d/Y"), "html", null, true);
            echo "</option>
                                                    <option value=\"d M, Y\" ";
            // line 108
            if ((($context["dateformat"] ?? null) == "d M, Y")) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "d M, Y"), "html", null, true);
            echo "</option>
                                                    <option value=\"M d, Y\" ";
            // line 109
            if ((($context["dateformat"] ?? null) == "M d, Y")) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "M d, Y"), "html", null, true);
            echo "</option>
                                                </select>
        \t\t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t</div>
        \t\t\t\t\t</div>
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t</div>
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-4\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary\">";
            // line 122
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Save"]);
            echo "</button>
                                </div>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 126
($context["this"] ?? null), "param", [], "any", false, false, false, 126), "page", [], "any", false, false, false, 126) == "company")) {
            // line 127
            echo "        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
        \t\t\t\t\t\t<div class=\"kt-section kt-section--first\">
                                    <h3 class=\"kt-section__title kt-section__title-lg\">";
            // line 131
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Settings"]);
            echo ":</h3>
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 134
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Website Name"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[title]\" value=\"";
            // line 136
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "title", [], "any", false, false, false, 136), "html", null, true);
            echo "\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 140
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Website charset"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[charset]\" value=\"";
            // line 142
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "charset", [], "any", false, false, false, 142), "html", null, true);
            echo "\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 146
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Website Description"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <textarea class=\"form-control\" name=\"company[description]\" required>";
            // line 148
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "description", [], "any", false, false, false, 148), "html", null, true);
            echo "</textarea>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 152
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Website Keywords"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input id=\"kt_tagify_2\" class=\"tagify\" placeholder='";
            // line 154
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["type"]);
            echo "...' value='";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "keywords", [], "any", false, false, false, 154), "html", null, true);
            echo "' name=\"company[keywords]\" />
                                                <span class=\"form-text text-muted\">";
            // line 155
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Seprate with comma"]);
            echo " ,</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 159
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Primary Email"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-at\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[primary_email]\" value=\"";
            // line 163
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "primary_email", [], "any", false, false, false, 163), "html", null, true);
            echo "\" placeholder=\"";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Email"]);
            echo "\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                                <span class=\"form-text text-muted\">";
            // line 165
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["This is the main email notices will be sent to. It is also used as the from email when emailing other automatic emails"]);
            echo ".</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 169
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Tax Identification Number"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[tax_number]\" value=\"";
            // line 171
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "tax_number", [], "any", false, false, false, 171), "html", null, true);
            echo "\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 175
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Phone"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-phone\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[company_phone]\" value=\"";
            // line 179
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "company_phone", [], "any", false, false, false, 179), "html", null, true);
            echo "\" placeholder=\"";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Phone"]);
            echo "\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 184
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Phone 2"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-phone\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[company_phone_2]\" value=\"";
            // line 188
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "company_phone_2", [], "any", false, false, false, 188), "html", null, true);
            echo "\" placeholder=\"";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Phone"]);
            echo "\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 193
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Phone 3"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-phone\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[company_phone_3]\" value=\"";
            // line 197
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "company_phone_3", [], "any", false, false, false, 197), "html", null, true);
            echo "\" placeholder=\"";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Phone"]);
            echo "\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 202
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Facebook"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[facebook]\" value=\"";
            // line 204
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "facebook", [], "any", false, false, false, 204), "html", null, true);
            echo "\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 208
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Twitter"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[twitter]\" value=\"";
            // line 210
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "twitter", [], "any", false, false, false, 210), "html", null, true);
            echo "\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 214
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Instagram"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[instagram]\" value=\"";
            // line 216
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "instagram", [], "any", false, false, false, 216), "html", null, true);
            echo "\" required>
                                            </div>
                                        </div>
                                        <div class=\"location-complete\">
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 221
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Official Address"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input type=\"text\" class=\"form-control\" id=\"address\" name=\"address\" value=\"";
            // line 223
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "address", [], "any", false, false, false, 223)) {
                echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "address", [], "any", false, false, false, 223)]);
            }
            echo "\"/>
                                                    <input type=\"hidden\" class=\"form-control\" name=\"lat\" value=\"";
            // line 224
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "lat", [], "any", false, false, false, 224), "html", null, true);
            echo "\"/>
                                                    <input type=\"hidden\" class=\"form-control\" name=\"lng\" value=\"";
            // line 225
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "lng", [], "any", false, false, false, 225), "html", null, true);
            echo "\"/>
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 229
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Google Map"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <div id=\"map_canvas\" class=\"col-sm-12\"></div>
                                                    <span class=\"form-text text-muted\">";
            // line 232
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Change the pin to select the right location"]);
            echo "</span>
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 236
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["County"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"sublocality\" value=\"";
            // line 238
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "county", [], "any", false, false, false, 238)) {
                echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "county", [], "any", false, false, false, 238)]);
            }
            echo "\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 242
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["City"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"locality\" value=\"";
            // line 244
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "city", [], "any", false, false, false, 244)) {
                echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "city", [], "any", false, false, false, 244)]);
            }
            echo "\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 248
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["State / Region"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"administrative_area_level_1\" value=\"";
            // line 250
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "state", [], "any", false, false, false, 250)) {
                echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "state", [], "any", false, false, false, 250)]);
            }
            echo "\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 254
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Postal Code"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"postal_code\" value=\"";
            // line 256
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "postal_code", [], "any", false, false, false, 256)) {
                echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "postal_code", [], "any", false, false, false, 256)]);
            }
            echo "\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 260
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Country"]);
            echo "</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"country\" value=\"";
            // line 262
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "country", [], "any", false, false, false, 262)) {
                echo call_user_func_array($this->env->getFilter('__')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "country", [], "any", false, false, false, 262)]);
            }
            echo "\">
                                                </div>
                                            </div>
            \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t</div>
        \t\t\t\t\t\t<div class=\"kt-section\">
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 271
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Logo"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                ";
            // line 273
            if (twig_get_attribute($this->env, $this->source, ($context["Logo"] ?? null), "isMulti", [], "any", false, false, false, 273)) {
                // line 274
                echo "                                                    ";
                $context['__cms_partial_params'] = [];
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction((($context["Logo"] ?? null) . "::image-multi")                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 275
                echo "                                                ";
            } else {
                // line 276
                echo "                                                    ";
                $context['__cms_partial_params'] = [];
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction((($context["Logo"] ?? null) . "::image-single")                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 277
                echo "                                                ";
            }
            // line 278
            echo "                                                <span class=\"form-text text-muted\">";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Perfered Size"]);
            echo " 180 x 30.</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 282
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Mobile Logo"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                ";
            // line 284
            if (twig_get_attribute($this->env, $this->source, ($context["MobileLogo"] ?? null), "isMulti", [], "any", false, false, false, 284)) {
                // line 285
                echo "                                                    ";
                $context['__cms_partial_params'] = [];
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction((($context["MobileLogo"] ?? null) . "::image-multi")                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 286
                echo "                                                ";
            } else {
                // line 287
                echo "                                                    ";
                $context['__cms_partial_params'] = [];
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction((($context["MobileLogo"] ?? null) . "::image-single")                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 288
                echo "                                                ";
            }
            // line 289
            echo "                                                <span class=\"form-text text-muted\">";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Max Height"]);
            echo " 40px.</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 293
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Company Favicon"]);
            echo "</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                ";
            // line 295
            if (twig_get_attribute($this->env, $this->source, ($context["Favicon"] ?? null), "isMulti", [], "any", false, false, false, 295)) {
                // line 296
                echo "                                                    ";
                $context['__cms_partial_params'] = [];
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction((($context["Favicon"] ?? null) . "::image-multi")                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 297
                echo "                                                ";
            } else {
                // line 298
                echo "                                                    ";
                $context['__cms_partial_params'] = [];
                echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction((($context["Favicon"] ?? null) . "::image-single")                , $context['__cms_partial_params']                , true                );
                unset($context['__cms_partial_params']);
                // line 299
                echo "                                                ";
            }
            // line 300
            echo "                                                <span class=\"form-text text-muted\">";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Size"]);
            echo " 48 x 48.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        \t\t\t\t\t</div>
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t</div>
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-4\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary\">";
            // line 312
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Save"]);
            echo "</button>
                                </div>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 316
($context["this"] ?? null), "param", [], "any", false, false, false, 316), "page", [], "any", false, false, false, 316) == "google")) {
            // line 317
            echo "        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
        \t\t\t\t\t\t<div class=\"kt-section kt-section--first\">
                                    <h3 class=\"kt-section__title kt-section__title-lg\">";
            // line 321
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Google APIs"]);
            echo ":</h3>
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
                                        <div class=\"kt-section\">
                        \t\t\t\t\t<h5 class=\"kt-section__title kt-margin-b-20\">
                        \t\t\t\t\t\t";
            // line 325
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Google Maps"]);
            echo "&nbsp;<span class=\"kt-badge kt-badge--danger kt-badge--dot\"></span>
                        \t\t\t\t\t</h5>
                        \t\t\t\t\t<div class=\"kt-section__content\">
                                                <div class=\"form-group row\">
                                                    <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 329
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Key"]);
            echo "</label>
                                                    <div class=\"col-lg-9 col-xl-6\">
                                                        <input class=\"form-control\" type=\"text\" name=\"map[key]\" value=\"";
            // line 331
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["google"] ?? null), "map", [], "any", false, false, false, 331), "key", [], "any", false, false, false, 331), "html", null, true);
            echo "\" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit\"></div>
                                        <div class=\"kt-section\">
                        \t\t\t\t\t<h5 class=\"kt-section__title kt-margin-b-20\">
                        \t\t\t\t\t\t";
            // line 339
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Recaptcha"]);
            echo " ( V2 )&nbsp;<span class=\"kt-badge kt-badge--danger kt-badge--dot\"></span>
                        \t\t\t\t\t</h5>
                        \t\t\t\t\t<div class=\"kt-section__content\">
                                                <div class=\"form-group row\">
                                                    <label class=\"col-xl-3 col-lg-3 col-form-label\">";
            // line 343
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Key"]);
            echo "</label>
                                                    <div class=\"col-lg-9 col-xl-6\">
                                                        <input class=\"form-control\" type=\"text\" name=\"recaptcha[key]\" value=\"";
            // line 345
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["google"] ?? null), "recaptcha", [], "any", false, false, false, 345), "key", [], "any", false, false, false, 345), "html", null, true);
            echo "\" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit\"></div>
        \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t</div>
        \t\t\t\t\t</div>
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t</div>
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-4\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary\">";
            // line 360
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Save"]);
            echo "</button>
                                </div>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 364
($context["this"] ?? null), "param", [], "any", false, false, false, 364), "page", [], "any", false, false, false, 364) == "languages")) {
            // line 365
            echo "                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 370
($context["this"] ?? null), "param", [], "any", false, false, false, 370), "page", [], "any", false, false, false, 370) == "departments")) {
            // line 371
            echo "                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 376
($context["this"] ?? null), "param", [], "any", false, false, false, 376), "page", [], "any", false, false, false, 376) == "employees")) {
            // line 377
            echo "                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 382
($context["this"] ?? null), "param", [], "any", false, false, false, 382), "page", [], "any", false, false, false, 382) == "translate")) {
            // line 383
            echo "                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <table class=\"table table-striped- table-bordered table-hover table-checkable\" id=\"kt_table_1\">
                                \t<thead>
                                \t\t<tr>
                                \t\t\t";
            // line 388
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 389
                echo "                                \t\t\t\t<th>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lang"], "name", [], "any", false, false, false, 389), "html", null, true);
                echo "</th>
                                \t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 391
            echo "                                \t\t</tr>
                                \t</thead>
                                </table>
                            </div>
                        </div>
                    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 396
($context["this"] ?? null), "param", [], "any", false, false, false, 396), "page", [], "any", false, false, false, 396) == "backup")) {
            // line 397
            echo "                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    ";
        }
        // line 403
        echo "                ";
        echo call_user_func_array($this->env->getFunction('form_close')->getCallable(), ["close"]);
        echo "
        \t</div>
        </div>
    </div>
</div>


";
        // line 410
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('styles'        );
        // line 411
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 411), "page", [], "any", false, false, false, 411) == "company")) {
            // line 412
            echo "        <style>
            #map_canvas {
              height: 350px;
            }
        </style>
    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 417
($context["this"] ?? null), "param", [], "any", false, false, false, 417), "page", [], "any", false, false, false, 417) == "translate")) {
            // line 418
            echo "        <style>
            label.translate {
                display: block;
                width: 100%;
                line-height: 24px;
                min-height: 24px;
            }
        </style>
    ";
        }
        // line 410
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
        // line 428
        echo $this->env->getExtension('Cms\Twig\Extension')->startBlock('scripts'        );
        // line 429
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 429), "page", [], "any", false, false, false, 429) == "company")) {
            // line 430
            echo "    <script src=\"";
            echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/admin/vendors/custom/geocomplete/jquery.geocomplete.js");
            echo "\" type=\"text/javascript\"></script>
    <script src=\"https://maps.googleapis.com/maps/api/js?libraries=places&key=";
            // line 431
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "google", [], "any", false, false, false, 431), "map", [], "any", false, false, false, 431), "key", [], "any", false, false, false, 431), "html", null, true);
            echo "\"></script>
";
        } elseif (((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 432
($context["this"] ?? null), "param", [], "any", false, false, false, 432), "page", [], "any", false, false, false, 432) == "translate") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 432), "page", [], "any", false, false, false, 432) == "backup")) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 432), "page", [], "any", false, false, false, 432) == "languages")) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 432), "page", [], "any", false, false, false, 432) == "departments"))) {
            // line 433
            echo "    <script src=\"";
            echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/admin/vendors/custom/datatables/datatables.bundle.js");
            echo "\" type=\"text/javascript\"></script>
";
        }
        // line 435
        echo "<script>
\"use strict\";
var KTAppUserListDatatable = function () {
    // variables
    var datatable;

    // init
    var init = function () {
        // init the datatables. Learn more: https://keenthemes.com/metronic/?page=docs&section=datatable
        datatable = \$('.kt-datatable').KTDatatable({
            translate: {
                records: {
                    processing: '";
        // line 447
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Please wait"]);
        echo "...',
                    noRecords: '";
        // line 448
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No records found"]);
        echo "'
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: '";
        // line 454
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["First"]);
        echo "',
                                prev: '";
        // line 455
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Previous"]);
        echo "',
                                next: '";
        // line 456
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Next"]);
        echo "',
                                last: '";
        // line 457
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Last"]);
        echo "',
                                more: '";
        // line 458
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["More pages"]);
        echo "',
                                input: '";
        // line 459
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Page number"]);
        echo "',
                                select: '";
        // line 460
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Select page size"]);
        echo "'
                            },

                            //info: \"";
        // line 463
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Displaying"]);
        echo " ";
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, ($context["start"] ?? null), "js"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, ($context["end"] ?? null), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["of"]);
        echo " ";
        echo twig_escape_filter($this->env, ($context["total"] ?? null), "html", null, true);
        echo " ";
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["records"]);
        echo "\"
                        }
                    }
                }
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: \$('#generalSearch'),
                delay: 400,
            },
            ";
        // line 484
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 484), "page", [], "any", false, false, false, 484) == "languages")) {
            // line 485
            echo "                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '";
            // line 490
            echo url("api/languages");
            echo "',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                    },
                    {
                        field: \"name\",
                        title: \"";
            // line 512
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Name"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"code\",
                        title: \"";
            // line 519
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Code"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"is_enabled\",
                        title: \"";
            // line 526
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Enabled"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
        \t\t\t\t// callback function support for column rendering
        \t\t\t\ttemplate: function(row) {

        \t\t\t\t\tvar status = {
                                1: {
                                    'title': '";
            // line 535
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Yes"]);
            echo "',
                                    'class': 'success'
                                },
        \t\t\t\t\t\t0: {
        \t\t\t\t\t\t\t'title': '";
            // line 539
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No"]);
            echo "',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t\t'null': {
        \t\t\t\t\t\t\t'title': '";
            // line 543
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No"]);
            echo "',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t};
                            return '<span class=\"kt-badge kt-badge--' + status[row.is_enabled].class + ' kt-badge--dot\"></span>&nbsp;<span class=\"kt-font-bold kt-font-' + status[row.is_enabled].class + '\">' + status[row.is_enabled].title + '</span>';
        \t\t\t\t}
                    },{
        \t\t\t\tfield: \"is_default\",
        \t\t\t\ttitle: \"";
            // line 551
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Default"]);
            echo "\",
        \t\t\t\twidth: 'auto',
                        sortable: true,
                        width: 120,
        \t\t\t\t// callback function support for column rendering
        \t\t\t\ttemplate: function(row) {

        \t\t\t\t\tvar status = {
                                1: {
                                    'title': '";
            // line 560
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Yes"]);
            echo "',
                                    'class': 'success'
                                },
        \t\t\t\t\t\t0: {
        \t\t\t\t\t\t\t'title': '";
            // line 564
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No"]);
            echo "',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t\t'null': {
        \t\t\t\t\t\t\t'title': '";
            // line 568
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No"]);
            echo "',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t};
                            return '<span class=\"kt-badge kt-badge--' + status[row.is_default].class + ' kt-badge--dot\"></span>&nbsp;<span class=\"kt-font-bold kt-font-' + status[row.is_default].class + '\">' + status[row.is_default].title + '</span>';
        \t\t\t\t}
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"";
            // line 578
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Actions"]);
            echo "\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                ";
            // line 583
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "languages", 1 => "u"], "method", false, false, false, 583) || twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "languages", 1 => "d"], "method", false, false, false, 583))) {
                // line 584
                echo "                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        ";
                // line 586
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "languages", 1 => "u"], "method", false, false, false, 586)) {
                    // line 587
                    echo "                                        '<a href=\"";
                    echo url("dashboard/settings/languages");
                    echo "/'+data.id+'/edit\" class=\"btn btn-info btn-sm\"><i class=\"flaticon-edit\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Edit"]);
                    echo "</button>'+
                                        ";
                }
                // line 589
                echo "                                        ";
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "languages", 1 => "d"], "method", false, false, false, 589)) {
                    // line 590
                    echo "                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.id+'\" data-type=\"languages\"><i class=\"flaticon2-delete\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Delete"]);
                    echo "</a>'+
                                        ";
                }
                // line 592
                echo "                                    '</div>';
                                ";
            } else {
                // line 594
                echo "                                    return '-';
                                ";
            }
            // line 596
            echo "                        },
                    }
                ]
            ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 599
($context["this"] ?? null), "param", [], "any", false, false, false, 599), "page", [], "any", false, false, false, 599) == "departments")) {
            // line 600
            echo "                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '";
            // line 605
            echo url("api/departments");
            echo "',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                    },
                    {
                        field: \"name\",
                        title: \"";
            // line 627
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Name"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"code\",
                        title: \"";
            // line 634
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Code"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"";
            // line 642
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Actions"]);
            echo "\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                ";
            // line 647
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "departments", 1 => "u"], "method", false, false, false, 647) || twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "departments", 1 => "d"], "method", false, false, false, 647))) {
                // line 648
                echo "                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        ";
                // line 650
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "departments", 1 => "u"], "method", false, false, false, 650)) {
                    // line 651
                    echo "                                        '<a href=\"";
                    echo url("dashboard/settings/departments");
                    echo "/'+data.id+'/edit\" class=\"btn btn-info btn-sm\"><i class=\"flaticon-edit\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Edit"]);
                    echo "</button>'+
                                        ";
                }
                // line 653
                echo "                                        ";
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "departments", 1 => "d"], "method", false, false, false, 653)) {
                    // line 654
                    echo "                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.id+'\" data-type=\"departments\"><i class=\"flaticon2-delete\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Delete"]);
                    echo "</a>'+
                                        ";
                }
                // line 656
                echo "                                    '</div>';
                                ";
            } else {
                // line 658
                echo "                                    return '-';
                                ";
            }
            // line 660
            echo "                        },
                    }
                ]
            ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 663
($context["this"] ?? null), "param", [], "any", false, false, false, 663), "page", [], "any", false, false, false, 663) == "employees")) {
            // line 664
            echo "                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '";
            // line 669
            echo url("api/employees");
            echo "',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                    },
                    {
                        field: \"name\",
                        title: \"";
            // line 691
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Name"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"role\",
                        title: \"";
            // line 698
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Role"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"groups\",
                        title: \"";
            // line 705
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Departments"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                        template: function (data) {
                            if(data.groups){
                                var i;
                                var text = '-';
                                for (i = 0; i < data.groups.length; i++) {
                                    if(text == '-'){
                                        text = data.groups[i];
                                    }else{
                                        if(i < data.groups.length){
                                            text += ', ';
                                        }
                                        text += data.groups[i];
                                    }
                                }
                                return text;
                            }else{
                                return '-';
                            }
                        },
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"";
            // line 732
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Actions"]);
            echo "\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                ";
            // line 737
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "employees", 1 => "u"], "method", false, false, false, 737) || twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "employees", 1 => "d"], "method", false, false, false, 737))) {
                // line 738
                echo "                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        ";
                // line 740
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "employees", 1 => "u"], "method", false, false, false, 740)) {
                    // line 741
                    echo "                                        '<a href=\"";
                    echo url("dashboard/settings/employees");
                    echo "/'+data.id+'/edit\" class=\"btn btn-info btn-sm\"><i class=\"flaticon-edit\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Edit"]);
                    echo "</button>'+
                                        ";
                }
                // line 743
                echo "                                        ";
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "employees", 1 => "d"], "method", false, false, false, 743)) {
                    // line 744
                    echo "                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.id+'\" data-type=\"employees\"><i class=\"flaticon2-delete\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Delete"]);
                    echo "</a>'+
                                        ";
                }
                // line 746
                echo "                                    '</div>';
                                ";
            } else {
                // line 748
                echo "                                    return '-';
                                ";
            }
            // line 750
            echo "                        },
                    }
                ]
            ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 753
($context["this"] ?? null), "param", [], "any", false, false, false, 753), "page", [], "any", false, false, false, 753) == "backup")) {
            // line 754
            echo "                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '";
            // line 759
            echo url("api/backups");
            echo "',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: \"fileInfo\",
                        title: \"";
            // line 771
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Name"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                        template: function (data) {
                            return '<a href=\"";
            // line 776
            echo twig_escape_filter($this->env, twig_replace_filter($this->extensions['System\Twig\Extension']->mediaFilter("app/uploads/panakour-backup"), ["app/media/" => ""]), "html", null, true);
            echo "/' + data.fileInfo.basename + '\" download>' + data.fileInfo.basename + '</a>';
                        },
                    },
                    {
                        field: \"size\",
                        title: \"";
            // line 781
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Size"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                        template: function (data) {
                            return data.size + ' ";
            // line 786
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["KB"]);
            echo "';
                        },
                    },
                    {
                        field: \"lastModified\",
                        title: \"";
            // line 791
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Created Date"]);
            echo "\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"";
            // line 799
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Actions"]);
            echo "\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                ";
            // line 804
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "backups", 1 => "d"], "method", false, false, false, 804)) {
                // line 805
                echo "                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        ";
                // line 807
                if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasUserPermission", [0 => "backups", 1 => "d"], "method", false, false, false, 807)) {
                    // line 808
                    echo "                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.fileInfo.basename+'\" data-type=\"backup\"><i class=\"flaticon2-delete\"></i>&nbsp;";
                    echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Delete"]);
                    echo "</a>'+
                                        ";
                }
                // line 810
                echo "                                    '</div>';
                                ";
            } else {
                // line 812
                echo "                                    return '-';
                                ";
            }
            // line 814
            echo "                        },
                    }
                ]
            ";
        }
        // line 818
        echo "        });
    };

    // search
    var search = function () {
        \$('#filter_form select,#filter_form input').each(function(){
            \$(this).on('change', function () {
                datatable.search(\$(this).val().toLowerCase(), \$(this).attr('name'));
            });
        });
        \$('#reset').on('click', function () {
            datatable.destroy();
            \$('#filter_form select,#filter_form input').each(function(){
                \$(this).val('');
            });
            \$('#filter_form select').each(function(){
                \$(this).selectpicker(\"refresh\");
            });
            init();
        });
    };

    // selection
    var selection = function () {
        // init form controls
        //\$('#kt_form_status, #kt_form_type').selectpicker();

        // event handler on check and uncheck on records
        datatable.on('kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated', function (e) {
            var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes(); // get selected records
            var count = checkedNodes.length; // selected records count

            \$('#kt_subheader_group_selected_rows').html(count);

            if (count > 0) {
                \$('#kt_subheader_search').addClass('kt-hidden');
                \$('#kt_subheader_group_actions').removeClass('kt-hidden');
            } else {
                \$('#kt_subheader_search').removeClass('kt-hidden');
                \$('#kt_subheader_group_actions').addClass('kt-hidden');
            }
        });
    }

    // selected records status update
    var selectedStatusUpdate = function () {
        \$('#kt_subheader_group_actions_status_change').on('click', \"[data-toggle='status-change']\", function () {
            var status = \$(this).find(\".kt-nav__link-text\").html();

            // fetch selected IDs
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type=\"checkbox\"]').map(function (i, chk) {
                return \$(chk).val();
            });

            if (ids.length > 0) {
                // learn more: https://sweetalert2.github.io/
                swal.fire({
                    buttonsStyling: false,

                    html: \"";
        // line 877
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Are you sure to update"]);
        echo " \" + ids.length + \" ";
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["selected records status to"]);
        echo " \" + status + \" ?\",
                    type: \"info\",

                    confirmButtonText: \"";
        // line 880
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Yes, update"]);
        echo "!\",
                    confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",

                    showCancelButton: true,
                    cancelButtonText: \"";
        // line 884
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No, cancel"]);
        echo "\",
                    cancelButtonClass: \"btn btn-sm btn-bold btn-default\"
                }).then(function (result) {
                    if (result.value) {
                        swal.fire({
                            title: '";
        // line 889
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Deleted"]);
        echo "!',
                            text: '";
        // line 890
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Your selected records statuses have been updated"]);
        echo "!',
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonText: \"";
        // line 893
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
        echo "\",
                            confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                        })
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        swal.fire({
                            title: '";
        // line 900
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Cancelled"]);
        echo "',
                            text: '";
        // line 901
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["You selected records statuses have not been updated"]);
        echo "!',
                            type: 'error',
                            buttonsStyling: false,
                            confirmButtonText: \"";
        // line 904
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
        echo "\",
                            confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                        });
                    }
                });
            }
        });
    }

    // selected records delete
    var selectedDelete = function () {
        \$('#kt_subheader_group_actions_delete_all').on('click', function () {
            // fetch selected IDs
            var selected = [];
            var type    = \$('.delete_record').attr('data-type');
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type=\"checkbox\"]').map(function (i, chk) {
                selected[\$(chk).val()] = \$(chk).val();
                return \$(chk).val();
            });

            if (ids.length > 0) {
                // learn more: https://sweetalert2.github.io/
                swal.fire({
                    buttonsStyling: false,

                    text: \"";
        // line 929
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Are you sure to delete"]);
        echo " \" + ids.length + \" ";
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["selected records ?"]);
        echo "\",
                    type: \"danger\",

                    confirmButtonText: \"";
        // line 932
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Yes, delete!"]);
        echo "\",
                    confirmButtonClass: \"btn btn-sm btn-bold btn-danger\",

                    showCancelButton: true,
                    cancelButtonText: '";
        // line 936
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No, cancel"]);
        echo "',
                    cancelButtonClass: \"btn btn-sm btn-bold btn-brand\"
                }).then(function (result) {
                    if (result.value) {
                        \$.request('onDelete', {
                            data: {id: selected,type: type},
                            success: function(data) {
                                swal.fire({
                                    title: '";
        // line 944
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Deleted!"]);
        echo "',
                                    text: '";
        // line 945
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Your selected records have been deleted! :("]);
        echo "',
                                    type: 'success',
                                    buttonsStyling: false,
                                    confirmButtonText: '";
        // line 948
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
        echo "',
                                    confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                                });
                                datatable.reload();
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        swal.fire({
                            title: '";
        // line 958
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Cancelled"]);
        echo "',
                            text: '";
        // line 959
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["You selected records have not been deleted! :)"]);
        echo "',
                            type: 'error',
                            buttonsStyling: false,
                            confirmButtonText: '";
        // line 962
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
        echo "',
                            confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                        });
                    }
                });
            }
        });


        \$('body').on('click','.delete_record',function(){
            var id      = \$(this).attr('rel');
            var type    = \$(this).attr('data-type');
            swal.fire({
                buttonsStyling: false,

                text: \"";
        // line 977
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Are you sure to delete this item ?"]);
        echo "\",
                type: \"danger\",

                confirmButtonText: \"";
        // line 980
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Yes, delete!"]);
        echo "\",
                confirmButtonClass: \"btn btn-sm btn-bold btn-danger\",

                showCancelButton: true,
                cancelButtonText: '";
        // line 984
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No, cancel"]);
        echo "',
                cancelButtonClass: \"btn btn-sm btn-bold btn-brand\"
            }).then(function (result) {
                if (result.value) {
                    \$.request('onDelete', {
                        data: {id: id, type: type},
                        success: function(data) {

                            swal.fire({
                                title: '";
        // line 993
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Deleted!"]);
        echo "',
                                text: '";
        // line 994
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Your selected record has been deleted! :("]);
        echo "',
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonText: '";
        // line 997
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
        echo "',
                                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                            });
                            datatable.reload();
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal.fire({
                        title: '";
        // line 1007
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Cancelled"]);
        echo "',
                        text: '";
        // line 1008
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["You selected record has not been deleted! :)"]);
        echo "',
                        type: 'error',
                        buttonsStyling: false,
                        confirmButtonText: '";
        // line 1011
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
        echo "',
                        confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                    });
                }
            });
        });
    }

    var updateTotal = function () {
        datatable.on('kt-datatable--on-layout-updated', function () {
            \$('#kt_subheader_total').html(datatable.getTotalRows() + ' ";
        // line 1021
        echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Total"]);
        echo "');
        });
    };

    var reload = function () {
        datatable.reload();
    };

    return {
        // public functions
        init: function () {
            init();
            search();
            selection();
            selectedStatusUpdate();
            selectedDelete();
            updateTotal();
        },

        reload: function(){
            reload();
        }
    };
}();
var KTDatatablesExtensions = function() {

\tvar initTable1 = function() {
\t\tvar table = \$('#kt_table_1');

        ";
        // line 1050
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 1050), "page", [], "any", false, false, false, 1050) == "translate")) {
            // line 1051
            echo "    \t\t// begin first table
    \t\ttable.DataTable({
    \t\t\tresponsive: true,
                dom: \"<'row'<'col-md-6' f><'col-md-6 text-right'>>\\n\\t\\t\\t<'row'<'col-md-12'tr>>\\n\\t\\t\\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'>>\",
                language: {
                    lengthMenu:     \"";
            // line 1056
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Display"]);
            echo " _MENU_\",
                    emptyTable:     \"";
            // line 1057
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No data available in table"]);
            echo "\",
                    info:           \"";
            // line 1058
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Showing"]);
            echo " _START_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["to"]);
            echo " _END_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["of"]);
            echo " _TOTAL_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["entries"]);
            echo "\",
                    infoEmpty:      \"";
            // line 1059
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Showing"]);
            echo " 0 ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["to"]);
            echo " 0 ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["of"]);
            echo " 0 ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["entries"]);
            echo "\",
                    loadingRecords: \"";
            // line 1060
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Loading"]);
            echo "...\",
                    processing:     \"";
            // line 1061
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Processing"]);
            echo "...\",
                    search:         \"";
            // line 1062
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Search"]);
            echo "\",
                    infoFiltered:   \"(";
            // line 1063
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["filtered from"]);
            echo " _MAX_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["total entries"]);
            echo ")\",
                },
                ajax: {
                    url: '";
            // line 1066
            echo url("api/translatemessages");
            echo "',
                    type: \"POST\",
                },
    \t\t\tdeferRender: true,
    \t\t\tscrollY: '500px',
    \t\t\tscrollCollapse: true,
    \t\t\tscroller: true,
    \t\t\tcolumns: [
        \t\t\t";
            // line 1074
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["lang"]) {
                // line 1075
                echo "        \t\t\t\t{data: '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lang"], "name", [], "any", false, false, false, 1075), "html", null, true);
                echo "'},
        \t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1077
            echo "    \t\t\t],
    \t\t});
        ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1079
($context["this"] ?? null), "param", [], "any", false, false, false, 1079), "page", [], "any", false, false, false, 1079) == "backup")) {
            // line 1080
            echo "            table.DataTable({
    \t\t\tresponsive: true,
                dom: \"<'row'<'col-md-6'><'col-md-6 text-right'>>\\n\\t\\t\\t<'row'<'col-md-12'tr>>\\n\\t\\t\\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>\",
                buttons: [
                    {extend: 'copy',exportOptions: {columns: [2,3,4,5]}},
                    {extend: 'excel',exportOptions: {columns: [2,3,4,5]}},
                    {extend: 'pdf',exportOptions: {columns: [2,3,4,5]}},
                    {extend: 'print',exportOptions: {columns: [2,3,4,5]}
                }],
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: {
                    lengthMenu: \"";
            // line 1092
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Display"]);
            echo " _MENU_\",
                    emptyTable:     \"";
            // line 1093
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["No data available in table"]);
            echo "\",
                    info:           \"";
            // line 1094
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Showing"]);
            echo " _START_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["to"]);
            echo " _END_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["of"]);
            echo " _TOTAL_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["entries"]);
            echo "\",
                    infoEmpty:      \"";
            // line 1095
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Showing"]);
            echo " 0 ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["to"]);
            echo " 0 ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["of"]);
            echo " 0 ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["entries"]);
            echo "\",
                    loadingRecords: \"";
            // line 1096
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Loading"]);
            echo "...\",
                    processing:     \"";
            // line 1097
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Processing"]);
            echo "...\",
                    search:         \"";
            // line 1098
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Search"]);
            echo "\",
                    infoFiltered:   \"(";
            // line 1099
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["filtered from"]);
            echo " _MAX_ ";
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["total entries"]);
            echo ")\",
                },
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '";
            // line 1105
            echo url("api/backups");
            echo "',
                    type: \"POST\",
                },
                columns: [
                {
                    data: \"fileInfo\",
                    'orderable':false,
                    'render': function (data, type, full, meta){
                        return '<a href=\"";
            // line 1113
            echo twig_escape_filter($this->env, twig_replace_filter($this->extensions['System\Twig\Extension']->mediaFilter("app/uploads/panakour-backup"), ["app/media/" => ""]), "html", null, true);
            echo "/' + full.fileInfo.basename + '\" download>' + full.fileInfo.basename + '</a>';
                    }
                },
                {
                    data: \"size\",
                    'orderable':false,
                    'render': function (data, type, full, meta){
                        return full.size + ' ";
            // line 1120
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["KB"]);
            echo "';
                    }
                },
                {
                    data: \"lastModified\",
                    'orderable':true
                },
                {
                    data: \"actions\",
                    'orderable':false
                }],
                columnDefs: [{
                   'targets': -1,
                   'searchable':false,
                   'orderable':false,
                   'className': 'dt-body-center',
                   'render': function (data, type, full, meta){
                        return '<div class=\"btn-group m-btn-group\" role=\"group\" aria-label=\"...\"><button class=\"btn btn-danger delete_record\" rel=\"' + full.fileInfo.basename + '\" data-type=\"backup\" ><span><i class=\"la la-times\"></i> <span>";
            // line 1137
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Delete"]);
            echo "</span></span></button></div>';
                    }
                }]
            });
        ";
        }
        // line 1142
        echo "




\t};

\treturn {

\t\t//main function to initiate the module
\t\tinit: function() {
\t\t\tinitTable1();
\t\t},

\t};

}();

// Class definition
var KTUserProfile = function () {
\t// Base elements
\tvar avatar;
\tvar offcanvas;

\t// Private functions
\tvar initAside = function () {
\t\t// Mobile offcanvas for mobile mode
\t\toffcanvas = new KTOffcanvas('kt_user_profile_aside', {
            overlay: true,
            baseClass: 'kt-app__aside',
            closeBy: 'kt_user_profile_aside_close',
            toggleBy: 'kt_subheader_mobile_toggle'
        });
        \$('#kt_subheader_mobile_toggle').show();
\t}

\tvar initUserForm = function() {
\t\tavatar = new KTAvatar('kt_user_avatar');
\t}

\treturn {
\t\t// public functions
\t\tinit: function() {
\t\t\tinitAside();
\t\t\tinitUserForm();
\t\t}
\t};
}();

KTUtil.ready(function() {
\tKTUserProfile.init();

    \$( \"#kt_form\" ).validate({
        ignore: \":hidden\",
        invalidHandler: function(event, validator) {
            var alert = \$('#kt-form_msg');
            alert.removeClass('kt-hidden').show();
            KTUtil.scrollTop();
        },
    });

    ";
        // line 1203
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 1203), "page", [], "any", false, false, false, 1203) == "general") || twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 1203), "page", [], "any", false, false, false, 1203)))) {
            // line 1204
            echo "        \$('body').on('changed.bs.select', '#currency', function(e, clickedIndex, newValue, oldValue){
            var selected = \$(e.currentTarget).val();
            if(selected != ''){
                \$.request('onGetCurrency', {
                    data: {id: selected},
                    success: function(data) {
                        if(data.currency.place_symbol_before == true){
                            \$('#place_symbol_before').prop('checked', true);
                        }else {
                            \$('#place_symbol_before').prop('checked', false);
                        }
                        if(data.currency.with_space == true){
                            \$('#with_space').prop('checked', true);
                        }else {
                            \$('#with_space').prop('checked', false);
                        }
                        \$('#decimal_point').val(data.currency.decimal_point);
                        \$('#thousand_separator').val(data.currency.thousand_separator);
                        \$('#initbiz_money_fraction_digits').val(data.currency.initbiz_money_fraction_digits);
                    }
                });
            }
        });
    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1227
($context["this"] ?? null), "param", [], "any", false, false, false, 1227), "page", [], "any", false, false, false, 1227) == "company")) {
            // line 1228
            echo "        \$(\"#address\").geocomplete({
            map: \"#map_canvas\",
            mapOptions: {
                zoom: 18
            },
            markerOptions: {
                draggable: true
            },
            details: \".location-complete\",
            ";
            // line 1237
            if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "lat", [], "any", false, false, false, 1237)) {
                // line 1238
                echo "                location: [";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "lat", [], "any", false, false, false, 1238), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "lng", [], "any", false, false, false, 1238), "html", null, true);
                echo "]
            ";
            }
            // line 1240
            echo "        });
        \$(\"#address\").bind(\"geocode:dragged\", function(event, latLng){
            \$(\"input[name=lat]\").val(latLng.lat());
            \$(\"input[name=lng]\").val(latLng.lng());
            \$(\"#reset\").show();
        });

        var input = document.getElementById('kt_tagify_2');
        new Tagify(input);
    ";
        } elseif ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1249
($context["this"] ?? null), "param", [], "any", false, false, false, 1249), "page", [], "any", false, false, false, 1249) == "languages") || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 1249), "page", [], "any", false, false, false, 1249) == "departments")) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "param", [], "any", false, false, false, 1249), "page", [], "any", false, false, false, 1249) == "employees"))) {
            // line 1250
            echo "        KTAppUserListDatatable.init();
    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1251
($context["this"] ?? null), "param", [], "any", false, false, false, 1251), "page", [], "any", false, false, false, 1251) == "backup")) {
            // line 1252
            echo "        KTAppUserListDatatable.init();
        \$('body').on('click', '#database', function(e){
            swal.fire({
                title: '";
            // line 1255
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Error"]);
            echo "',
                text: '";
            // line 1256
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["This feature is not allowed in demo"]);
            echo "',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: '";
            // line 1259
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
            echo "',
                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
            });
        });
        \$('body').on('click', '#files', function(e){
            swal.fire({
                title: '";
            // line 1265
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Error"]);
            echo "',
                text: '";
            // line 1266
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["This feature is not allowed in demo"]);
            echo "',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: '";
            // line 1269
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
            echo "',
                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
            });
        });
        \$('body').on('click', '#whole', function(e){
            swal.fire({
                title: '";
            // line 1275
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["Error"]);
            echo "',
                text: '";
            // line 1276
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["This feature is not allowed in demo"]);
            echo "',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: '";
            // line 1279
            echo call_user_func_array($this->env->getFilter('__')->getCallable(), ["OK"]);
            echo "',
                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
            });
        });
        window.onbeforeunload = function() {
              return \"Did you save your stuff?\"
        }
    ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 1286
($context["this"] ?? null), "param", [], "any", false, false, false, 1286), "page", [], "any", false, false, false, 1286) == "translate")) {
            // line 1287
            echo "        // Activate an inline edit on click of a table cell
        \$('#kt_table_1').on( 'click', 'tbody td .translate', function (e) {
            if(\$(this).find('.inline_edit').length == 0){
                \$(this).html('<input type=\"text\" class=\"form-control inline_edit\" value=\"'+\$(this).html()+'\" />');
                \$('.inline_edit').focus().select();
            }
        });
        \$('#kt_table_1').on('change', '.inline_edit', function(e){
            var element = \$(this);
            var label = element.parent('.translate');
            label.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--success');
            var id = label.attr('rel');
            var lang = label.attr('data-language');
             \$.request('onTranslate', {
                 data: {translate: \$(this).val(), lang: lang, id: id},
                 success: function(response, status, xhr, \$form) {
                     label.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--success');
                     element.replaceWith(element.val());
                 }
             });
        });
        \$('#kt_table_1').on('blur', '.inline_edit', function(e){
            var element = \$(this);
            element.replaceWith(element.val());
        });
    \tKTDatatablesExtensions.init();
    ";
        }
        // line 1314
        echo "});
</script>
";
        // line 428
        echo $this->env->getExtension('Cms\Twig\Extension')->endBlock(true        );
    }

    public function getTemplateName()
    {
        return "/Applications/MAMP/htdocs/larabuilder/themes/spotlayer/pages/dashboard/settings.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2480 => 428,  2476 => 1314,  2447 => 1287,  2445 => 1286,  2435 => 1279,  2429 => 1276,  2425 => 1275,  2416 => 1269,  2410 => 1266,  2406 => 1265,  2397 => 1259,  2391 => 1256,  2387 => 1255,  2382 => 1252,  2380 => 1251,  2377 => 1250,  2375 => 1249,  2364 => 1240,  2356 => 1238,  2354 => 1237,  2343 => 1228,  2341 => 1227,  2316 => 1204,  2314 => 1203,  2251 => 1142,  2243 => 1137,  2223 => 1120,  2213 => 1113,  2202 => 1105,  2191 => 1099,  2187 => 1098,  2183 => 1097,  2179 => 1096,  2169 => 1095,  2159 => 1094,  2155 => 1093,  2151 => 1092,  2137 => 1080,  2135 => 1079,  2131 => 1077,  2122 => 1075,  2118 => 1074,  2107 => 1066,  2099 => 1063,  2095 => 1062,  2091 => 1061,  2087 => 1060,  2077 => 1059,  2067 => 1058,  2063 => 1057,  2059 => 1056,  2052 => 1051,  2050 => 1050,  2018 => 1021,  2005 => 1011,  1999 => 1008,  1995 => 1007,  1982 => 997,  1976 => 994,  1972 => 993,  1960 => 984,  1953 => 980,  1947 => 977,  1929 => 962,  1923 => 959,  1919 => 958,  1906 => 948,  1900 => 945,  1896 => 944,  1885 => 936,  1878 => 932,  1870 => 929,  1842 => 904,  1836 => 901,  1832 => 900,  1822 => 893,  1816 => 890,  1812 => 889,  1804 => 884,  1797 => 880,  1789 => 877,  1728 => 818,  1722 => 814,  1718 => 812,  1714 => 810,  1708 => 808,  1706 => 807,  1702 => 805,  1700 => 804,  1692 => 799,  1681 => 791,  1673 => 786,  1665 => 781,  1657 => 776,  1649 => 771,  1634 => 759,  1627 => 754,  1625 => 753,  1620 => 750,  1616 => 748,  1612 => 746,  1606 => 744,  1603 => 743,  1595 => 741,  1593 => 740,  1589 => 738,  1587 => 737,  1579 => 732,  1549 => 705,  1539 => 698,  1529 => 691,  1504 => 669,  1497 => 664,  1495 => 663,  1490 => 660,  1486 => 658,  1482 => 656,  1476 => 654,  1473 => 653,  1465 => 651,  1463 => 650,  1459 => 648,  1457 => 647,  1449 => 642,  1438 => 634,  1428 => 627,  1403 => 605,  1396 => 600,  1394 => 599,  1389 => 596,  1385 => 594,  1381 => 592,  1375 => 590,  1372 => 589,  1364 => 587,  1362 => 586,  1358 => 584,  1356 => 583,  1348 => 578,  1335 => 568,  1328 => 564,  1321 => 560,  1309 => 551,  1298 => 543,  1291 => 539,  1284 => 535,  1272 => 526,  1262 => 519,  1252 => 512,  1227 => 490,  1220 => 485,  1218 => 484,  1184 => 463,  1178 => 460,  1174 => 459,  1170 => 458,  1166 => 457,  1162 => 456,  1158 => 455,  1154 => 454,  1145 => 448,  1141 => 447,  1127 => 435,  1121 => 433,  1119 => 432,  1115 => 431,  1110 => 430,  1108 => 429,  1106 => 428,  1104 => 410,  1093 => 418,  1091 => 417,  1084 => 412,  1081 => 411,  1079 => 410,  1068 => 403,  1060 => 397,  1058 => 396,  1051 => 391,  1042 => 389,  1038 => 388,  1031 => 383,  1029 => 382,  1022 => 377,  1020 => 376,  1013 => 371,  1011 => 370,  1004 => 365,  1002 => 364,  995 => 360,  977 => 345,  972 => 343,  965 => 339,  954 => 331,  949 => 329,  942 => 325,  935 => 321,  929 => 317,  927 => 316,  920 => 312,  904 => 300,  901 => 299,  896 => 298,  893 => 297,  888 => 296,  886 => 295,  881 => 293,  873 => 289,  870 => 288,  865 => 287,  862 => 286,  857 => 285,  855 => 284,  850 => 282,  842 => 278,  839 => 277,  834 => 276,  831 => 275,  826 => 274,  824 => 273,  819 => 271,  805 => 262,  800 => 260,  791 => 256,  786 => 254,  777 => 250,  772 => 248,  763 => 244,  758 => 242,  749 => 238,  744 => 236,  737 => 232,  731 => 229,  724 => 225,  720 => 224,  714 => 223,  709 => 221,  701 => 216,  696 => 214,  689 => 210,  684 => 208,  677 => 204,  672 => 202,  662 => 197,  655 => 193,  645 => 188,  638 => 184,  628 => 179,  621 => 175,  614 => 171,  609 => 169,  602 => 165,  595 => 163,  588 => 159,  581 => 155,  575 => 154,  570 => 152,  563 => 148,  558 => 146,  551 => 142,  546 => 140,  539 => 136,  534 => 134,  528 => 131,  522 => 127,  520 => 126,  513 => 122,  493 => 109,  485 => 108,  477 => 107,  469 => 106,  462 => 102,  450 => 97,  442 => 96,  434 => 95,  426 => 94,  418 => 93,  410 => 92,  402 => 91,  394 => 90,  386 => 89,  378 => 88,  370 => 87,  362 => 86,  354 => 85,  346 => 84,  338 => 83,  330 => 82,  322 => 81,  314 => 80,  306 => 79,  298 => 78,  290 => 77,  282 => 76,  274 => 75,  266 => 74,  260 => 73,  252 => 72,  244 => 71,  236 => 70,  228 => 69,  220 => 68,  212 => 67,  204 => 66,  196 => 65,  188 => 64,  180 => 63,  172 => 62,  164 => 61,  156 => 60,  148 => 59,  140 => 58,  133 => 54,  127 => 50,  112 => 48,  108 => 47,  101 => 43,  95 => 40,  89 => 36,  87 => 35,  79 => 30,  71 => 25,  62 => 19,  52 => 11,  48 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app\">

    <!--Begin:: App Aside Mobile Toggle-->
    <button class=\"kt-app__aside-close\" id=\"kt_user_profile_aside_close\">
        <i class=\"la la-close\"></i>
    </button>
    <!--End:: App Aside Mobile Toggle-->

    <!-- begin:: Aside -->
    {% partial 'settingsmenu' %}
    <!-- end:: Aside -->
    <!--End::Aside-->

    <!--Begin:: Inbox List-->
    <div class=\"kt-grid__item kt-grid__item--fluid    kt-portlet    kt-inbox__list kt-inbox__list--shown\" id=\"kt_inbox_list\">
        <div class=\"kt-portlet__head\">
    \t\t<div class=\"kt-portlet__head-label\">
    \t\t\t<h3 class=\"kt-portlet__head-title\">
    \t\t\t\t{{this.page.title|__}}
    \t\t\t</h3>
    \t\t</div>
        </div>
        <div class=\"kt-portlet__body kt-portlet__body--fit-x\">
           \t<div class=\"col-lg-12\">
                {{ form_ajax('onSave', { id: 'kt_form', class:'kt-form' }) }}
    \t\t\t\t<div class=\"row\">
    \t\t\t\t\t<div class=\"col-xl-12\">
\t\t\t\t\t\t\t<div class=\"form-group kt-hidden\" id=\"kt-form_msg\">
                                <div class=\"alert alert-danger\" role=\"alert\">
\t\t\t\t\t\t\t\t\t{{'Oh snap! Change a few things up and try submitting again.'|__}}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
                        </div>
                    </div>
                    {% if this.param.page == 'general' or this.param.page is empty %}
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
        \t\t\t\t\t\t<div class=\"kt-section kt-section--first\">
                                    <h3 class=\"kt-section__title kt-section__title-lg\">{{'General'|__}}:</h3>
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
        \t\t\t\t\t\t\t\t<div class=\"form-group row\">
        \t\t\t\t\t\t\t\t\t<label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Default Language'|__}}</label>
        \t\t\t\t\t\t\t\t\t<div class=\"col-lg-9 col-xl-6\">
        \t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"language\" required>
                                                    <option data-hidden=\"true\"></option>
                                                    {% for code, name in locales %}
        \t\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{code}}\" {% if language == code %}selected{% endif %} data-live-search=\"true\">{{ name }}</option>
                                                    {% endfor %}
                                                </select>
        \t\t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t<div class=\"form-group row\">
        \t\t\t\t\t\t\t\t\t<label class=\"col-xl-3 col-lg-3 col-form-label\">{{'TimeZone'|__}}</label>
        \t\t\t\t\t\t\t\t\t<div class=\"col-lg-9 col-xl-6\">
        \t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"timezone_offset\" data-live-search=\"true\" required>
                                                    <option data-hidden=\"true\"></option>
                                                \t<option value=\"-12:00\" {% if timezone_offset == \"-12:00\" %}selected{% endif %}>(GMT -12:00) {{\"Eniwetok, Kwajalein\"|__}}</option>
                                                \t<option value=\"-11:00\" {% if timezone_offset == \"-11:00\" %}selected{% endif %}>(GMT -11:00) {{\"Midway Island, Samoa\"|__}}</option>
                                                \t<option value=\"-10:00\" {% if timezone_offset == \"-10:00\" %}selected{% endif %}>(GMT -10:00) {{\"Hawaii\"|__}}</option>
                                                \t<option value=\"-09:50\" {% if timezone_offset == \"-09:50\" %}selected{% endif %}>(GMT -9:30) {{\"Taiohae\"|__}}</option>
                                                \t<option value=\"-09:00\" {% if timezone_offset == \"-09:00\" %}selected{% endif %}>(GMT -9:00) {{\"Alaska\"|__}}</option>
                                                \t<option value=\"-08:00\" {% if timezone_offset == \"-08:00\" %}selected{% endif %}>(GMT -8:00) {{\"Pacific Time (US &amp; Canada)\"|__}}</option>
                                                \t<option value=\"-07:00\" {% if timezone_offset == \"-07:00\" %}selected{% endif %}>(GMT -7:00) {{\"Mountain Time (US &amp; Canada)\"|__}}</option>
                                                \t<option value=\"-06:00\" {% if timezone_offset == \"-06:00\" %}selected{% endif %}>(GMT -6:00) {{\"Central Time (US &amp; Canada), Mexico City\"|__}}</option>
                                                \t<option value=\"-05:00\" {% if timezone_offset == \"-05:00\" %}selected{% endif %}>(GMT -5:00) {{\"Eastern Time (US &amp; Canada), Bogota, Lima\"|__}}</option>
                                                \t<option value=\"-04:50\" {% if timezone_offset == \"-04:50\" %}selected{% endif %}>(GMT -4:30) {{\"Caracas\"|__}}</option>
                                                \t<option value=\"-04:00\" {% if timezone_offset == \"-04:00\" %}selected{% endif %}>(GMT -4:00) {{\"Atlantic Time (Canada), Caracas, La Paz\"|__}}</option>
                                                \t<option value=\"-03:50\" {% if timezone_offset == \"-03:50\" %}selected{% endif %}>(GMT -3:30) {{\"Newfoundland\"|__}}</option>
                                                \t<option value=\"-03:00\" {% if timezone_offset == \"-03:00\" %}selected{% endif %}>(GMT -3:00) {{\"Brazil, Buenos Aires, Georgetown\"|__}}</option>
                                                \t<option value=\"-02:00\" {% if timezone_offset == \"-02:00\" %}selected{% endif %}>(GMT -2:00) {{\"Mid-Atlantic\"|__}}</option>
                                                \t<option value=\"-01:00\" {% if timezone_offset == \"-01:00\" %}selected{% endif %}>(GMT -1:00) {{\"Azores, Cape Verde Islands\"|__}}</option>
                                                \t<option value=\"+00:00\" {% if timezone_offset == \"+00:00\" %}selected{% endif %}>(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                                                \t<option value=\"+01:00\" {% if timezone_offset == \"+01:00\" %}selected{% endif %}>(GMT +1:00) {{\"Brussels, Copenhagen, Madrid, Paris\"|__}}</option>
                                                \t<option value=\"+02:00\" {% if timezone_offset == \"+02:00\" %}selected{% endif %}>(GMT +2:00) {{\"Cairo, Kaliningrad, South Africa\"|__}}</option>
                                                \t<option value=\"+03:00\" {% if timezone_offset == \"+03:00\" %}selected{% endif %}>(GMT +3:00) {{\"Baghdad, Riyadh, Moscow, St. Petersburg\"|__}}</option>
                                                \t<option value=\"+03:50\" {% if timezone_offset == \"+03:50\" %}selected{% endif %}>(GMT +3:30) {{\"Tehran\"|__}}</option>
                                                \t<option value=\"+04:00\" {% if timezone_offset == \"+04:00\" %}selected{% endif %}>(GMT +4:00) {{\"Abu Dhabi, Muscat, Baku, Tbilisi\"|__}}</option>
                                                \t<option value=\"+04:50\" {% if timezone_offset == \"+04:50\" %}selected{% endif %}>(GMT +4:30) {{\"Kabul\"|__}}</option>
                                                \t<option value=\"+05:00\" {% if timezone_offset == \"+05:00\" %}selected{% endif %}>(GMT +5:00) {{\"Ekaterinburg, Islamabad, Karachi, Tashkent\"|__}}</option>
                                                \t<option value=\"+05:50\" {% if timezone_offset == \"+05:50\" %}selected{% endif %}>(GMT +5:30) {{\"Bombay, Calcutta, Madras, New Delhi\"|__}}</option>
                                                \t<option value=\"+05:75\" {% if timezone_offset == \"+05:75\" %}selected{% endif %}>(GMT +5:45) {{\"Kathmandu, Pokhara\"|__}}</option>
                                                \t<option value=\"+06:00\" {% if timezone_offset == \"+06:00\" %}selected{% endif %}>(GMT +6:00) {{\"Almaty, Dhaka, Colombo\"|__}}</option>
                                                \t<option value=\"+06:50\" {% if timezone_offset == \"+06:50\" %}selected{% endif %}>(GMT +6:30) {{\"Yangon, Mandalay\"|__}}</option>
                                                \t<option value=\"+07:00\" {% if timezone_offset == \"+07:00\" %}selected{% endif %}>(GMT +7:00) {{\"Bangkok, Hanoi, Jakarta\"|__}}</option>
                                                \t<option value=\"+08:00\" {% if timezone_offset == \"+08:00\" %}selected{% endif %}>(GMT +8:00) {{\"Beijing, Perth, Singapore, Hong Kong\"|__}}</option>
                                                \t<option value=\"+08:75\" {% if timezone_offset == \"+08:75\" %}selected{% endif %}>(GMT +8:45) {{\"Eucla\"|__}}</option>
                                                \t<option value=\"+09:00\" {% if timezone_offset == \"+09:00\" %}selected{% endif %}>(GMT +9:00) {{\"Tokyo, Seoul, Osaka, Sapporo, Yakutsk\"|__}}</option>
                                                \t<option value=\"+09:50\" {% if timezone_offset == \"+09:50\" %}selected{% endif %}>(GMT +9:30) {{\"Adelaide, Darwin\"|__}}</option>
                                                \t<option value=\"+10:00\" {% if timezone_offset == \"+10:00\" %}selected{% endif %}>(GMT +10:00) {{\"Eastern Australia, Guam, Vladivostok\"|__}}</option>
                                                \t<option value=\"+10:50\" {% if timezone_offset == \"+10:50\" %}selected{% endif %}>(GMT +10:30) {{\"Lord Howe Island\"|__}}</option>
                                                \t<option value=\"+11:00\" {% if timezone_offset == \"+11:00\" %}selected{% endif %}>(GMT +11:00) {{\"Magadan, Solomon Islands, New Caledonia\"|__}}</option>
                                                \t<option value=\"+11:50\" {% if timezone_offset == \"+11:50\" %}selected{% endif %}>(GMT +11:30) {{\"Norfolk Island\"|__}}</option>
                                                \t<option value=\"+12:00\" {% if timezone_offset == \"+12:00\" %}selected{% endif %}>(GMT +12:00) {{\"Auckland, Wellington, Fiji, Kamchatka\"|__}}</option>
                                                \t<option value=\"+12:75\" {% if timezone_offset == \"+12:75\" %}selected{% endif %}>(GMT +12:45) {{\"Chatham Islands\"|__}}</option>
                                                \t<option value=\"+13:00\" {% if timezone_offset == \"+13:00\" %}selected{% endif %}>(GMT +13:00) {{\"Apia, Nukualofa\"|__}}</option>
                                                \t<option value=\"+14:00\" {% if timezone_offset == \"+14:00\" %}selected{% endif %}>(GMT +14:00) {{\"Line Islands, Tokelau\"|__}}</option>
                                                </select>
        \t\t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t<div class=\"form-group row\">
        \t\t\t\t\t\t\t\t\t<label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Date Format'|__}}</label>
        \t\t\t\t\t\t\t\t\t<div class=\"col-lg-9 col-xl-6\">
        \t\t\t\t\t\t\t\t\t\t<select class=\"form-control\" name=\"dateformat\" required>
                                                    <option data-hidden=\"true\"></option>
                                                    <option value=\"d/m/Y\" {% if dateformat == \"d/m/Y\" %}selected{% endif %}>{{'now'|date('d/m/Y')}}</option>
                                                    <option value=\"m/d/Y\" {% if dateformat == \"m/d/Y\" %}selected{% endif %}>{{'now'|date('m/d/Y')}}</option>
                                                    <option value=\"d M, Y\" {% if dateformat == \"d M, Y\" %}selected{% endif %}>{{'now'|date('d M, Y')}}</option>
                                                    <option value=\"M d, Y\" {% if dateformat == \"M d, Y\" %}selected{% endif %}>{{'now'|date('M d, Y')}}</option>
                                                </select>
        \t\t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t</div>
        \t\t\t\t\t</div>
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t</div>
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-4\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary\">{{'Save'|__}}</button>
                                </div>
                            </div>
                        </div>
                    {% elseif this.param.page == 'company' %}
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
        \t\t\t\t\t\t<div class=\"kt-section kt-section--first\">
                                    <h3 class=\"kt-section__title kt-section__title-lg\">{{'Company Settings'|__}}:</h3>
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Website Name'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[title]\" value=\"{{company.title}}\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Website charset'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[charset]\" value=\"{{company.charset}}\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Website Description'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <textarea class=\"form-control\" name=\"company[description]\" required>{{company.description}}</textarea>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Website Keywords'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input id=\"kt_tagify_2\" class=\"tagify\" placeholder='{{\"type\"|__}}...' value='{{company.keywords}}' name=\"company[keywords]\" />
                                                <span class=\"form-text text-muted\">{{'Seprate with comma'|__}} ,</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Primary Email'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-at\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[primary_email]\" value=\"{{company.primary_email}}\" placeholder=\"{{'Email'|__}}\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                                <span class=\"form-text text-muted\">{{'This is the main email notices will be sent to. It is also used as the from email when emailing other automatic emails'|__}}.</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Tax Identification Number'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[tax_number]\" value=\"{{company.tax_number}}\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Company Phone'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-phone\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[company_phone]\" value=\"{{company.company_phone}}\" placeholder=\"{{'Phone'|__}}\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Company Phone 2'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-phone\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[company_phone_2]\" value=\"{{company.company_phone_2}}\" placeholder=\"{{'Phone'|__}}\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Company Phone 3'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <div class=\"input-group\">
    \t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\"><span class=\"input-group-text\"><i class=\"la la-phone\"></i></span></div>
    \t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"company[company_phone_3]\" value=\"{{company.company_phone_3}}\" placeholder=\"{{'Phone'|__}}\" aria-describedby=\"basic-addon1\">
    \t\t\t\t\t\t\t\t\t\t\t</div>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Facebook'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[facebook]\" value=\"{{company.facebook}}\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Twitter'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[twitter]\" value=\"{{company.twitter}}\" required>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Instagram'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                <input class=\"form-control\" type=\"text\" name=\"company[instagram]\" value=\"{{company.instagram}}\" required>
                                            </div>
                                        </div>
                                        <div class=\"location-complete\">
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Company Official Address'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input type=\"text\" class=\"form-control\" id=\"address\" name=\"address\" value=\"{% if company.address %}{{company.address|__}}{% endif %}\"/>
                                                    <input type=\"hidden\" class=\"form-control\" name=\"lat\" value=\"{{company.lat}}\"/>
                                                    <input type=\"hidden\" class=\"form-control\" name=\"lng\" value=\"{{company.lng}}\"/>
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Google Map'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <div id=\"map_canvas\" class=\"col-sm-12\"></div>
                                                    <span class=\"form-text text-muted\">{{'Change the pin to select the right location'|__}}</span>
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'County'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"sublocality\" value=\"{% if company.county %}{{company.county|__}}{% endif %}\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'City'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"locality\" value=\"{% if company.city %}{{company.city|__}}{% endif %}\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'State / Region'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"administrative_area_level_1\" value=\"{% if company.state %}{{company.state|__}}{% endif %}\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Postal Code'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"postal_code\" value=\"{% if company.postal_code %}{{company.postal_code|__}}{% endif %}\">
                                                </div>
                                            </div>
                                            <div class=\"form-group row\">
                                                <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Country'|__}}</label>
                                                <div class=\"col-lg-9 col-xl-6\">
                                                    <input class=\"form-control\" type=\"text\" name=\"country\" value=\"{% if company.country %}{{company.country|__}}{% endif %}\">
                                                </div>
                                            </div>
            \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t</div>
        \t\t\t\t\t\t<div class=\"kt-section\">
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Company Logo'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                {% if Logo.isMulti %}
                                                    {% partial Logo ~ '::image-multi' %}
                                                {% else %}
                                                    {% partial Logo ~ '::image-single' %}
                                                {% endif %}
                                                <span class=\"form-text text-muted\">{{'Perfered Size'|__}} 180 x 30.</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Mobile Logo'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                {% if MobileLogo.isMulti %}
                                                    {% partial MobileLogo ~ '::image-multi' %}
                                                {% else %}
                                                    {% partial MobileLogo ~ '::image-single' %}
                                                {% endif %}
                                                <span class=\"form-text text-muted\">{{'Max Height'|__}} 40px.</span>
                                            </div>
                                        </div>
                                        <div class=\"form-group row\">
                                            <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Company Favicon'|__}}</label>
                                            <div class=\"col-lg-9 col-xl-6\">
                                                {% if Favicon.isMulti %}
                                                    {% partial Favicon ~ '::image-multi' %}
                                                {% else %}
                                                    {% partial Favicon ~ '::image-single' %}
                                                {% endif %}
                                                <span class=\"form-text text-muted\">{{'Size'|__}} 48 x 48.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        \t\t\t\t\t</div>
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t</div>
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-4\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary\">{{'Save'|__}}</button>
                                </div>
                            </div>
                        </div>
                    {% elseif this.param.page == 'google' %}
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
        \t\t\t\t\t\t<div class=\"kt-section kt-section--first\">
                                    <h3 class=\"kt-section__title kt-section__title-lg\">{{'Google APIs'|__}}:</h3>
        \t\t\t\t\t\t\t<div class=\"kt-section__body\">
                                        <div class=\"kt-section\">
                        \t\t\t\t\t<h5 class=\"kt-section__title kt-margin-b-20\">
                        \t\t\t\t\t\t{{'Google Maps'|__}}&nbsp;<span class=\"kt-badge kt-badge--danger kt-badge--dot\"></span>
                        \t\t\t\t\t</h5>
                        \t\t\t\t\t<div class=\"kt-section__content\">
                                                <div class=\"form-group row\">
                                                    <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Key'|__}}</label>
                                                    <div class=\"col-lg-9 col-xl-6\">
                                                        <input class=\"form-control\" type=\"text\" name=\"map[key]\" value=\"{{google.map.key}}\" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit\"></div>
                                        <div class=\"kt-section\">
                        \t\t\t\t\t<h5 class=\"kt-section__title kt-margin-b-20\">
                        \t\t\t\t\t\t{{'Recaptcha'|__}} ( V2 )&nbsp;<span class=\"kt-badge kt-badge--danger kt-badge--dot\"></span>
                        \t\t\t\t\t</h5>
                        \t\t\t\t\t<div class=\"kt-section__content\">
                                                <div class=\"form-group row\">
                                                    <label class=\"col-xl-3 col-lg-3 col-form-label\">{{'Key'|__}}</label>
                                                    <div class=\"col-lg-9 col-xl-6\">
                                                        <input class=\"form-control\" type=\"text\" name=\"recaptcha[key]\" value=\"{{google.recaptcha.key}}\" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=\"kt-separator kt-separator--border-dashed kt-separator--space-lg kt-separator--portlet-fit\"></div>
        \t\t\t\t\t\t\t</div>
        \t\t\t\t\t\t</div>
        \t\t\t\t\t</div>
        \t\t\t\t\t<div class=\"col-xl-2\"></div>
        \t\t\t\t</div>
        \t\t\t\t<div class=\"row\">
        \t\t\t\t\t<div class=\"col-xl-4\"></div>
        \t\t\t\t\t<div class=\"col-xl-8\">
                                <div class=\"form-group\">
                                    <button type=\"submit\" class=\"btn btn-primary\">{{'Save'|__}}</button>
                                </div>
                            </div>
                        </div>
                    {% elseif this.param.page == 'languages' %}
                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    {% elseif this.param.page == 'departments' %}
                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    {% elseif this.param.page == 'employees' %}
                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    {% elseif this.param.page == 'translate' %}
                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <table class=\"table table-striped- table-bordered table-hover table-checkable\" id=\"kt_table_1\">
                                \t<thead>
                                \t\t<tr>
                                \t\t\t{% for lang in languages %}
                                \t\t\t\t<th>{{lang.name}}</th>
                                \t\t\t{% endfor %}
                                \t\t</tr>
                                \t</thead>
                                </table>
                            </div>
                        </div>
                    {% elseif this.param.page == 'backup' %}
                        <div class=\"kt-section kt-section--first\">
                            <div class=\"kt-section__body\">
                                <div class=\"kt-datatable\"></div>
                            </div>
                        </div>
                    {% endif %}
                {{ form_close() }}
        \t</div>
        </div>
    </div>
</div>


{% put styles %}
    {% if this.param.page == 'company' %}
        <style>
            #map_canvas {
              height: 350px;
            }
        </style>
    {% elseif this.param.page == 'translate' %}
        <style>
            label.translate {
                display: block;
                width: 100%;
                line-height: 24px;
                min-height: 24px;
            }
        </style>
    {% endif %}
{% endput %}
{% put scripts %}
{% if this.param.page == 'company' %}
    <script src=\"{{ 'assets/admin/vendors/custom/geocomplete/jquery.geocomplete.js'|theme }}\" type=\"text/javascript\"></script>
    <script src=\"https://maps.googleapis.com/maps/api/js?libraries=places&key={{settings.google.map.key}}\"></script>
{% elseif (this.param.page == 'translate' or this.param.page == 'backup' or this.param.page == 'languages' or this.param.page == 'departments') %}
    <script src=\"{{ 'assets/admin/vendors/custom/datatables/datatables.bundle.js'|theme }}\" type=\"text/javascript\"></script>
{% endif %}
<script>
\"use strict\";
var KTAppUserListDatatable = function () {
    // variables
    var datatable;

    // init
    var init = function () {
        // init the datatables. Learn more: https://keenthemes.com/metronic/?page=docs&section=datatable
        datatable = \$('.kt-datatable').KTDatatable({
            translate: {
                records: {
                    processing: '{{\"Please wait\"|__}}...',
                    noRecords: '{{\"No records found\"|__}}'
                },
                toolbar: {
                    pagination: {
                        items: {
                            default: {
                                first: '{{\"First\"|__}}',
                                prev: '{{\"Previous\"|__}}',
                                next: '{{\"Next\"|__}}',
                                last: '{{\"Last\"|__}}',
                                more: '{{\"More pages\"|__}}',
                                input: '{{\"Page number\"|__}}',
                                select: '{{\"Select page size\"|__}}'
                            },

                            //info: \"{{\"Displaying\"|__}} {{start|escape('js')}} - {{end}} {{\"of\"|__}} {{total}} {{\"records\"|__}}\"
                        }
                    }
                }
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: \$('#generalSearch'),
                delay: 400,
            },
            {% if this.param.page == 'languages' %}
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '{{url(\"api/languages\")}}',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                    },
                    {
                        field: \"name\",
                        title: \"{{'Name'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"code\",
                        title: \"{{'Code'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"is_enabled\",
                        title: \"{{'Enabled'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
        \t\t\t\t// callback function support for column rendering
        \t\t\t\ttemplate: function(row) {

        \t\t\t\t\tvar status = {
                                1: {
                                    'title': '{{\"Yes\"|__}}',
                                    'class': 'success'
                                },
        \t\t\t\t\t\t0: {
        \t\t\t\t\t\t\t'title': '{{\"No\"|__}}',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t\t'null': {
        \t\t\t\t\t\t\t'title': '{{\"No\"|__}}',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t};
                            return '<span class=\"kt-badge kt-badge--' + status[row.is_enabled].class + ' kt-badge--dot\"></span>&nbsp;<span class=\"kt-font-bold kt-font-' + status[row.is_enabled].class + '\">' + status[row.is_enabled].title + '</span>';
        \t\t\t\t}
                    },{
        \t\t\t\tfield: \"is_default\",
        \t\t\t\ttitle: \"{{'Default'|__}}\",
        \t\t\t\twidth: 'auto',
                        sortable: true,
                        width: 120,
        \t\t\t\t// callback function support for column rendering
        \t\t\t\ttemplate: function(row) {

        \t\t\t\t\tvar status = {
                                1: {
                                    'title': '{{\"Yes\"|__}}',
                                    'class': 'success'
                                },
        \t\t\t\t\t\t0: {
        \t\t\t\t\t\t\t'title': '{{\"No\"|__}}',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t\t'null': {
        \t\t\t\t\t\t\t'title': '{{\"No\"|__}}',
        \t\t\t\t\t\t\t'class': 'danger'
        \t\t\t\t\t\t},
        \t\t\t\t\t};
                            return '<span class=\"kt-badge kt-badge--' + status[row.is_default].class + ' kt-badge--dot\"></span>&nbsp;<span class=\"kt-font-bold kt-font-' + status[row.is_default].class + '\">' + status[row.is_default].title + '</span>';
        \t\t\t\t}
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"{{'Actions'|__}}\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                {% if (user.hasUserPermission('languages', 'u') or user.hasUserPermission('languages', 'd')) %}
                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        {% if user.hasUserPermission('languages', 'u') %}
                                        '<a href=\"{{url(\"dashboard/settings/languages\")}}/'+data.id+'/edit\" class=\"btn btn-info btn-sm\"><i class=\"flaticon-edit\"></i>&nbsp;{{\"Edit\"|__}}</button>'+
                                        {% endif %}
                                        {% if user.hasUserPermission('languages', 'd') %}
                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.id+'\" data-type=\"languages\"><i class=\"flaticon2-delete\"></i>&nbsp;{{\"Delete\"|__}}</a>'+
                                        {% endif %}
                                    '</div>';
                                {% else %}
                                    return '-';
                                {% endif %}
                        },
                    }
                ]
            {% elseif this.param.page == 'departments' %}
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '{{url(\"api/departments\")}}',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                    },
                    {
                        field: \"name\",
                        title: \"{{'Name'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"code\",
                        title: \"{{'Code'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"{{'Actions'|__}}\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                {% if (user.hasUserPermission('departments', 'u') or user.hasUserPermission('departments', 'd')) %}
                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        {% if user.hasUserPermission('departments', 'u') %}
                                        '<a href=\"{{url(\"dashboard/settings/departments\")}}/'+data.id+'/edit\" class=\"btn btn-info btn-sm\"><i class=\"flaticon-edit\"></i>&nbsp;{{\"Edit\"|__}}</button>'+
                                        {% endif %}
                                        {% if user.hasUserPermission('departments', 'd') %}
                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.id+'\" data-type=\"departments\"><i class=\"flaticon2-delete\"></i>&nbsp;{{\"Delete\"|__}}</a>'+
                                        {% endif %}
                                    '</div>';
                                {% else %}
                                    return '-';
                                {% endif %}
                        },
                    }
                ]
            {% elseif this.param.page == 'employees' %}
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '{{url(\"api/employees\")}}',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        sortable: false,
                        width: 20,
                        selector: {
                            class: 'kt-checkbox--solid'
                        },
                        textAlign: 'center',
                    },
                    {
                        field: \"name\",
                        title: \"{{'Name'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"role\",
                        title: \"{{'Role'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"groups\",
                        title: \"{{'Departments'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                        template: function (data) {
                            if(data.groups){
                                var i;
                                var text = '-';
                                for (i = 0; i < data.groups.length; i++) {
                                    if(text == '-'){
                                        text = data.groups[i];
                                    }else{
                                        if(i < data.groups.length){
                                            text += ', ';
                                        }
                                        text += data.groups[i];
                                    }
                                }
                                return text;
                            }else{
                                return '-';
                            }
                        },
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"{{'Actions'|__}}\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                {% if (user.hasUserPermission('employees', 'u') or user.hasUserPermission('employees', 'd')) %}
                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        {% if user.hasUserPermission('employees', 'u') %}
                                        '<a href=\"{{url(\"dashboard/settings/employees\")}}/'+data.id+'/edit\" class=\"btn btn-info btn-sm\"><i class=\"flaticon-edit\"></i>&nbsp;{{\"Edit\"|__}}</button>'+
                                        {% endif %}
                                        {% if user.hasUserPermission('employees', 'd') %}
                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.id+'\" data-type=\"employees\"><i class=\"flaticon2-delete\"></i>&nbsp;{{\"Delete\"|__}}</a>'+
                                        {% endif %}
                                    '</div>';
                                {% else %}
                                    return '-';
                                {% endif %}
                        },
                    }
                ]
            {% elseif this.param.page == 'backup' %}
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: '{{url(\"api/backups\")}}',
                        },
                    },
                    pageSize: 10, // display 20 records per page
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },
                // columns definition
                columns: [
                    {
                        field: \"fileInfo\",
                        title: \"{{'Name'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                        template: function (data) {
                            return '<a href=\"{{\"app/uploads/panakour-backup\"|media|replace({\"app/media/\": \"\"})}}/' + data.fileInfo.basename + '\" download>' + data.fileInfo.basename + '</a>';
                        },
                    },
                    {
                        field: \"size\",
                        title: \"{{'Size'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                        template: function (data) {
                            return data.size + ' {{\"KB\"|__}}';
                        },
                    },
                    {
                        field: \"lastModified\",
                        title: \"{{'Created Date'|__}}\",
                        autoHide: false,
                        sortable: false,
                        width: 'auto',
                    },
                    {
                        field: \"Actions\",
                        width: 'auto',
                        title: \"{{'Actions'|__}}\",
                        sortable: false,
                        autoHide: false,
                        overflow: 'visible',
                        template: function (data) {
                                {% if (user.hasUserPermission('backups', 'd')) %}
                                    return '' +
                                    '<div class=\"btn-group btn-group\" role=\"group\" aria-label=\"...\">'+
                                        {% if user.hasUserPermission('backups', 'd') %}
                                        '<a href=\"javascript:void(0);\" class=\"btn btn-danger btn-sm delete_record kt-font-light\" rel=\"'+data.fileInfo.basename+'\" data-type=\"backup\"><i class=\"flaticon2-delete\"></i>&nbsp;{{\"Delete\"|__}}</a>'+
                                        {% endif %}
                                    '</div>';
                                {% else %}
                                    return '-';
                                {% endif %}
                        },
                    }
                ]
            {% endif %}
        });
    };

    // search
    var search = function () {
        \$('#filter_form select,#filter_form input').each(function(){
            \$(this).on('change', function () {
                datatable.search(\$(this).val().toLowerCase(), \$(this).attr('name'));
            });
        });
        \$('#reset').on('click', function () {
            datatable.destroy();
            \$('#filter_form select,#filter_form input').each(function(){
                \$(this).val('');
            });
            \$('#filter_form select').each(function(){
                \$(this).selectpicker(\"refresh\");
            });
            init();
        });
    };

    // selection
    var selection = function () {
        // init form controls
        //\$('#kt_form_status, #kt_form_type').selectpicker();

        // event handler on check and uncheck on records
        datatable.on('kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated', function (e) {
            var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes(); // get selected records
            var count = checkedNodes.length; // selected records count

            \$('#kt_subheader_group_selected_rows').html(count);

            if (count > 0) {
                \$('#kt_subheader_search').addClass('kt-hidden');
                \$('#kt_subheader_group_actions').removeClass('kt-hidden');
            } else {
                \$('#kt_subheader_search').removeClass('kt-hidden');
                \$('#kt_subheader_group_actions').addClass('kt-hidden');
            }
        });
    }

    // selected records status update
    var selectedStatusUpdate = function () {
        \$('#kt_subheader_group_actions_status_change').on('click', \"[data-toggle='status-change']\", function () {
            var status = \$(this).find(\".kt-nav__link-text\").html();

            // fetch selected IDs
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type=\"checkbox\"]').map(function (i, chk) {
                return \$(chk).val();
            });

            if (ids.length > 0) {
                // learn more: https://sweetalert2.github.io/
                swal.fire({
                    buttonsStyling: false,

                    html: \"{{\"Are you sure to update\"|__}} \" + ids.length + \" {{\"selected records status to\"|__}} \" + status + \" ?\",
                    type: \"info\",

                    confirmButtonText: \"{{\"Yes, update\"|__}}!\",
                    confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",

                    showCancelButton: true,
                    cancelButtonText: \"{{\"No, cancel\"|__}}\",
                    cancelButtonClass: \"btn btn-sm btn-bold btn-default\"
                }).then(function (result) {
                    if (result.value) {
                        swal.fire({
                            title: '{{\"Deleted\"|__}}!',
                            text: '{{\"Your selected records statuses have been updated\"|__}}!',
                            type: 'success',
                            buttonsStyling: false,
                            confirmButtonText: \"{{\"OK\"|__}}\",
                            confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                        })
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        swal.fire({
                            title: '{{\"Cancelled\"|__}}',
                            text: '{{\"You selected records statuses have not been updated\"|__}}!',
                            type: 'error',
                            buttonsStyling: false,
                            confirmButtonText: \"{{\"OK\"|__}}\",
                            confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                        });
                    }
                });
            }
        });
    }

    // selected records delete
    var selectedDelete = function () {
        \$('#kt_subheader_group_actions_delete_all').on('click', function () {
            // fetch selected IDs
            var selected = [];
            var type    = \$('.delete_record').attr('data-type');
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type=\"checkbox\"]').map(function (i, chk) {
                selected[\$(chk).val()] = \$(chk).val();
                return \$(chk).val();
            });

            if (ids.length > 0) {
                // learn more: https://sweetalert2.github.io/
                swal.fire({
                    buttonsStyling: false,

                    text: \"{{'Are you sure to delete'|__}} \" + ids.length + \" {{'selected records ?'|__}}\",
                    type: \"danger\",

                    confirmButtonText: \"{{'Yes, delete!'|__}}\",
                    confirmButtonClass: \"btn btn-sm btn-bold btn-danger\",

                    showCancelButton: true,
                    cancelButtonText: '{{\"No, cancel\"|__}}',
                    cancelButtonClass: \"btn btn-sm btn-bold btn-brand\"
                }).then(function (result) {
                    if (result.value) {
                        \$.request('onDelete', {
                            data: {id: selected,type: type},
                            success: function(data) {
                                swal.fire({
                                    title: '{{\"Deleted!\"|__}}',
                                    text: '{{\"Your selected records have been deleted! :(\"|__}}',
                                    type: 'success',
                                    buttonsStyling: false,
                                    confirmButtonText: '{{\"OK\"|__}}',
                                    confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                                });
                                datatable.reload();
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        swal.fire({
                            title: '{{\"Cancelled\"|__}}',
                            text: '{{\"You selected records have not been deleted! :)\"|__}}',
                            type: 'error',
                            buttonsStyling: false,
                            confirmButtonText: '{{\"OK\"|__}}',
                            confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                        });
                    }
                });
            }
        });


        \$('body').on('click','.delete_record',function(){
            var id      = \$(this).attr('rel');
            var type    = \$(this).attr('data-type');
            swal.fire({
                buttonsStyling: false,

                text: \"{{'Are you sure to delete this item ?'|__}}\",
                type: \"danger\",

                confirmButtonText: \"{{'Yes, delete!'|__}}\",
                confirmButtonClass: \"btn btn-sm btn-bold btn-danger\",

                showCancelButton: true,
                cancelButtonText: '{{\"No, cancel\"|__}}',
                cancelButtonClass: \"btn btn-sm btn-bold btn-brand\"
            }).then(function (result) {
                if (result.value) {
                    \$.request('onDelete', {
                        data: {id: id, type: type},
                        success: function(data) {

                            swal.fire({
                                title: '{{\"Deleted!\"|__}}',
                                text: '{{\"Your selected record has been deleted! :(\"|__}}',
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonText: '{{\"OK\"|__}}',
                                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                            });
                            datatable.reload();
                        }
                    });
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal.fire({
                        title: '{{\"Cancelled\"|__}}',
                        text: '{{\"You selected record has not been deleted! :)\"|__}}',
                        type: 'error',
                        buttonsStyling: false,
                        confirmButtonText: '{{\"OK\"|__}}',
                        confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
                    });
                }
            });
        });
    }

    var updateTotal = function () {
        datatable.on('kt-datatable--on-layout-updated', function () {
            \$('#kt_subheader_total').html(datatable.getTotalRows() + ' {{\"Total\"|__}}');
        });
    };

    var reload = function () {
        datatable.reload();
    };

    return {
        // public functions
        init: function () {
            init();
            search();
            selection();
            selectedStatusUpdate();
            selectedDelete();
            updateTotal();
        },

        reload: function(){
            reload();
        }
    };
}();
var KTDatatablesExtensions = function() {

\tvar initTable1 = function() {
\t\tvar table = \$('#kt_table_1');

        {% if this.param.page == 'translate' %}
    \t\t// begin first table
    \t\ttable.DataTable({
    \t\t\tresponsive: true,
                dom: \"<'row'<'col-md-6' f><'col-md-6 text-right'>>\\n\\t\\t\\t<'row'<'col-md-12'tr>>\\n\\t\\t\\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'>>\",
                language: {
                    lengthMenu:     \"{{'Display'|__}} _MENU_\",
                    emptyTable:     \"{{'No data available in table'|__}}\",
                    info:           \"{{'Showing'|__}} _START_ {{'to'|__}} _END_ {{'of'|__}} _TOTAL_ {{'entries'|__}}\",
                    infoEmpty:      \"{{'Showing'|__}} 0 {{'to'|__}} 0 {{'of'|__}} 0 {{'entries'|__}}\",
                    loadingRecords: \"{{'Loading'|__}}...\",
                    processing:     \"{{'Processing'|__}}...\",
                    search:         \"{{'Search'|__}}\",
                    infoFiltered:   \"({{'filtered from'|__}} _MAX_ {{'total entries'|__}})\",
                },
                ajax: {
                    url: '{{url(\"api/translatemessages\")}}',
                    type: \"POST\",
                },
    \t\t\tdeferRender: true,
    \t\t\tscrollY: '500px',
    \t\t\tscrollCollapse: true,
    \t\t\tscroller: true,
    \t\t\tcolumns: [
        \t\t\t{% for lang in languages %}
        \t\t\t\t{data: '{{lang.name}}'},
        \t\t\t{% endfor %}
    \t\t\t],
    \t\t});
        {% elseif this.param.page == 'backup' %}
            table.DataTable({
    \t\t\tresponsive: true,
                dom: \"<'row'<'col-md-6'><'col-md-6 text-right'>>\\n\\t\\t\\t<'row'<'col-md-12'tr>>\\n\\t\\t\\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>\",
                buttons: [
                    {extend: 'copy',exportOptions: {columns: [2,3,4,5]}},
                    {extend: 'excel',exportOptions: {columns: [2,3,4,5]}},
                    {extend: 'pdf',exportOptions: {columns: [2,3,4,5]}},
                    {extend: 'print',exportOptions: {columns: [2,3,4,5]}
                }],
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
                language: {
                    lengthMenu: \"{{'Display'|__}} _MENU_\",
                    emptyTable:     \"{{'No data available in table'|__}}\",
                    info:           \"{{'Showing'|__}} _START_ {{'to'|__}} _END_ {{'of'|__}} _TOTAL_ {{'entries'|__}}\",
                    infoEmpty:      \"{{'Showing'|__}} 0 {{'to'|__}} 0 {{'of'|__}} 0 {{'entries'|__}}\",
                    loadingRecords: \"{{'Loading'|__}}...\",
                    processing:     \"{{'Processing'|__}}...\",
                    search:         \"{{'Search'|__}}\",
                    infoFiltered:   \"({{'filtered from'|__}} _MAX_ {{'total entries'|__}})\",
                },
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{url(\"api/backups\")}}',
                    type: \"POST\",
                },
                columns: [
                {
                    data: \"fileInfo\",
                    'orderable':false,
                    'render': function (data, type, full, meta){
                        return '<a href=\"{{\"app/uploads/panakour-backup\"|media|replace({\"app/media/\": \"\"})}}/' + full.fileInfo.basename + '\" download>' + full.fileInfo.basename + '</a>';
                    }
                },
                {
                    data: \"size\",
                    'orderable':false,
                    'render': function (data, type, full, meta){
                        return full.size + ' {{\"KB\"|__}}';
                    }
                },
                {
                    data: \"lastModified\",
                    'orderable':true
                },
                {
                    data: \"actions\",
                    'orderable':false
                }],
                columnDefs: [{
                   'targets': -1,
                   'searchable':false,
                   'orderable':false,
                   'className': 'dt-body-center',
                   'render': function (data, type, full, meta){
                        return '<div class=\"btn-group m-btn-group\" role=\"group\" aria-label=\"...\"><button class=\"btn btn-danger delete_record\" rel=\"' + full.fileInfo.basename + '\" data-type=\"backup\" ><span><i class=\"la la-times\"></i> <span>{{\"Delete\"|__}}</span></span></button></div>';
                    }
                }]
            });
        {% endif %}





\t};

\treturn {

\t\t//main function to initiate the module
\t\tinit: function() {
\t\t\tinitTable1();
\t\t},

\t};

}();

// Class definition
var KTUserProfile = function () {
\t// Base elements
\tvar avatar;
\tvar offcanvas;

\t// Private functions
\tvar initAside = function () {
\t\t// Mobile offcanvas for mobile mode
\t\toffcanvas = new KTOffcanvas('kt_user_profile_aside', {
            overlay: true,
            baseClass: 'kt-app__aside',
            closeBy: 'kt_user_profile_aside_close',
            toggleBy: 'kt_subheader_mobile_toggle'
        });
        \$('#kt_subheader_mobile_toggle').show();
\t}

\tvar initUserForm = function() {
\t\tavatar = new KTAvatar('kt_user_avatar');
\t}

\treturn {
\t\t// public functions
\t\tinit: function() {
\t\t\tinitAside();
\t\t\tinitUserForm();
\t\t}
\t};
}();

KTUtil.ready(function() {
\tKTUserProfile.init();

    \$( \"#kt_form\" ).validate({
        ignore: \":hidden\",
        invalidHandler: function(event, validator) {
            var alert = \$('#kt-form_msg');
            alert.removeClass('kt-hidden').show();
            KTUtil.scrollTop();
        },
    });

    {% if this.param.page == 'general' or this.param.page is empty %}
        \$('body').on('changed.bs.select', '#currency', function(e, clickedIndex, newValue, oldValue){
            var selected = \$(e.currentTarget).val();
            if(selected != ''){
                \$.request('onGetCurrency', {
                    data: {id: selected},
                    success: function(data) {
                        if(data.currency.place_symbol_before == true){
                            \$('#place_symbol_before').prop('checked', true);
                        }else {
                            \$('#place_symbol_before').prop('checked', false);
                        }
                        if(data.currency.with_space == true){
                            \$('#with_space').prop('checked', true);
                        }else {
                            \$('#with_space').prop('checked', false);
                        }
                        \$('#decimal_point').val(data.currency.decimal_point);
                        \$('#thousand_separator').val(data.currency.thousand_separator);
                        \$('#initbiz_money_fraction_digits').val(data.currency.initbiz_money_fraction_digits);
                    }
                });
            }
        });
    {% elseif this.param.page == 'company' %}
        \$(\"#address\").geocomplete({
            map: \"#map_canvas\",
            mapOptions: {
                zoom: 18
            },
            markerOptions: {
                draggable: true
            },
            details: \".location-complete\",
            {% if company.lat %}
                location: [{{company.lat}},{{company.lng}}]
            {% endif %}
        });
        \$(\"#address\").bind(\"geocode:dragged\", function(event, latLng){
            \$(\"input[name=lat]\").val(latLng.lat());
            \$(\"input[name=lng]\").val(latLng.lng());
            \$(\"#reset\").show();
        });

        var input = document.getElementById('kt_tagify_2');
        new Tagify(input);
    {% elseif this.param.page == 'languages' or this.param.page == 'departments' or this.param.page == 'employees' %}
        KTAppUserListDatatable.init();
    {% elseif this.param.page == 'backup' %}
        KTAppUserListDatatable.init();
        \$('body').on('click', '#database', function(e){
            swal.fire({
                title: '{{\"Error\"|__}}',
                text: '{{\"This feature is not allowed in demo\"|__}}',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: '{{\"OK\"|__}}',
                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
            });
        });
        \$('body').on('click', '#files', function(e){
            swal.fire({
                title: '{{\"Error\"|__}}',
                text: '{{\"This feature is not allowed in demo\"|__}}',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: '{{\"OK\"|__}}',
                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
            });
        });
        \$('body').on('click', '#whole', function(e){
            swal.fire({
                title: '{{\"Error\"|__}}',
                text: '{{\"This feature is not allowed in demo\"|__}}',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: '{{\"OK\"|__}}',
                confirmButtonClass: \"btn btn-sm btn-bold btn-brand\",
            });
        });
        window.onbeforeunload = function() {
              return \"Did you save your stuff?\"
        }
    {% elseif this.param.page == 'translate' %}
        // Activate an inline edit on click of a table cell
        \$('#kt_table_1').on( 'click', 'tbody td .translate', function (e) {
            if(\$(this).find('.inline_edit').length == 0){
                \$(this).html('<input type=\"text\" class=\"form-control inline_edit\" value=\"'+\$(this).html()+'\" />');
                \$('.inline_edit').focus().select();
            }
        });
        \$('#kt_table_1').on('change', '.inline_edit', function(e){
            var element = \$(this);
            var label = element.parent('.translate');
            label.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--success');
            var id = label.attr('rel');
            var lang = label.attr('data-language');
             \$.request('onTranslate', {
                 data: {translate: \$(this).val(), lang: lang, id: id},
                 success: function(response, status, xhr, \$form) {
                     label.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--success');
                     element.replaceWith(element.val());
                 }
             });
        });
        \$('#kt_table_1').on('blur', '.inline_edit', function(e){
            var element = \$(this);
            element.replaceWith(element.val());
        });
    \tKTDatatablesExtensions.init();
    {% endif %}
});
</script>
{% endput %}", "/Applications/MAMP/htdocs/larabuilder/themes/spotlayer/pages/dashboard/settings.htm", "");
    }
}
