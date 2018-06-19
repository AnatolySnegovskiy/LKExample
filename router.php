<?php

switch ($lk->page) {
    case 'payeersign':
        include "includes/invest/payeer_sign.php";
        break;
    case 'logout':
        $_SESSION['user'] = '';
        unset($_SESSION['user']);
        header('Location: /');
        break;
    case 'partner':
        if ($lk->id > 0) {
            $_SESSION['refer'] = $lk->id;
            header('Location: /');
        }
        break;
    case 'server':
        $includeFilePatch = 'server/' . ucfirst(strtolower($lk->action)) . '.php';
        if (file_exists(Setting::$sitePatch . $includeFilePatch)) {
            require_once $includeFilePatch;
        } else {
            echo $includeFilePatch;
        }
        exit;
    case 'static':
        $includeFilePatch = 'static/static' . ucfirst(strtolower($lk->action)) . '.tpl';

        if (file_exists(Setting::$sitePatch . 'templates/' . $includeFilePatch)) {
            $template->display($includeFilePatch);
        } else {
            header('Location: /static/notfound');
        }
        break;
    default:
        $includeFilePatch = sprintf('includes/%s.php', ucfirst(strtolower($lk->page)));

        if (file_exists(Setting::$sitePatch . $includeFilePatch)) {
            require_once $includeFilePatch;
        } else {
            header('Location: /static/notfound');
        }

        break;
}
