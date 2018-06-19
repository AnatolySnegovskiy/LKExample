<?php

require_once __DIR__ . '/../' . Setting::$smarty_pack . '/Smarty.class.php';

final class Template
{
    private $smarty;

    public function __construct($lk)
    {
        if (!is_dir(Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/templates_c')) {
            mkdir(Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/templates_c');
            mkdir(Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/configs');
            mkdir(Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/cache');
        }

        $this->smarty = new Smarty();
        $this->smarty->template_dir = Setting::$sitePatch . 'templates/';
        $this->smarty->compile_dir = Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/templates_c/';
        $this->smarty->config_dir = Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/configs/';
        $this->smarty->cache_dir = Setting::$sitePatch . 'libs/' . Setting::$smarty_pack . '/cache/';
        $this->smarty->debugging = Setting::$smartyDebugging;
        $this->smarty->caching = Setting::$smartyCaching;
        $this->smarty->cache_lifetime = Setting::$smartyCacheLifetime;
        $this->smarty->assign("template_directory", $this->smarty->template_dir);

        $this->smarty->assign('site_url', Setting::$siteUrl);
        $this->smarty->assign('site_name', Setting::$siteName);
        $this->smarty->assign('user', $lk->user);
        $this->smarty->assign('page', $lk->page);
        $this->smarty->assign('action', $lk->action);
        $this->smarty->assign('id', $lk->id);
        $this->smarty->assign("check", $lk->filter($_POST));
    }

    public function assign($variable, $variableValue)
    {
        $this->smarty->assign($variable, $variableValue);
    }

    public function display($includeFilePatch)
    {
        $this->smarty->display($includeFilePatch);
    }

    public function message($type, $text)
    {
        switch ($type) {
            case 'error':
                $this->smarty->assign('error', $text);
                break;
            case 'success':
                $this->smarty->assign('success', $text);
                break;
            default:
                $this->smarty->assign('info', $text);
                break;
        }
    }
}