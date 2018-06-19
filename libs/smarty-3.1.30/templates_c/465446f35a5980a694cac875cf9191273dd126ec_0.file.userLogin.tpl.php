<?php
/* Smarty version 3.1.30, created on 2018-06-18 22:22:56
  from "/var/www/html/templates/user/userLogin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b2806904e3c21_39338366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '465446f35a5980a694cac875cf9191273dd126ec' => 
    array (
      0 => '/var/www/html/templates/user/userLogin.tpl',
      1 => 1529349775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b2806904e3c21_39338366 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
    <div class="row">
        <form role="form" class="col-md-4 col-md-offset-4" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input required type="text" class="form-control" maxlength="250" name="Email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input required type="password" class="form-control" name="Password" placeholder="Пароль">
            </div>
            <button type="submit" name="login" value="true" class="btn btn-primary btn-block">Войти</button>
        </form>
    </div>
</div<?php }
}
