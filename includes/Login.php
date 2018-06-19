<?php

$page = new Login();
$page->needAuth = false;

if (!empty($_POST['login'])) {
    $page->update($_POST);
}

$page->show();

$template->assign("email",$_POST['email'] ?? null);
$template->display('user/userLogin.tpl');