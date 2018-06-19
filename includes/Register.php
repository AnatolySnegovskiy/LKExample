<?php

$page = new Register();

if (!empty($_POST)) {
    $page->update($_POST);
}

$page->show();

$template->assign("email",$_POST['email'] ?? null);
$template->display('user/userRegister.tpl');