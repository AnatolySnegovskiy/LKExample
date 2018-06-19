<?php
/* Smarty version 3.1.30, created on 2018-06-18 22:24:32
  from "/var/www/html/templates/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b2806f0ac7eb9_36950174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '88dbf58bd600aa27802129682ad443d483d9dea4' => 
    array (
      0 => '/var/www/html/templates/header.tpl',
      1 => 1529349870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2806f0ac7eb9_36950174 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=0.55, user-scalable=yes"
	/>
	<title><?php echo $_smarty_tpl->tpl_vars['site_name']->value;?>
</title>
	<meta charset="<?php echo $_smarty_tpl->tpl_vars['site_charset']->value;?>
" />
	<link rel="shortcut icon" href="/cache/images/favicon.png?1" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Infant&amp;subset=cyrillic" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"
	/>
	<link href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
cache/css/style.css?<?php echo time();?>
" rel="stylesheet" type="text/css" media="all" />
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</head>

<body>
	<header>
		<div class="container-fluid">
		<?php if ($_smarty_tpl->tpl_vars['user']->value['id']) {?>
		
            <?php if ($_smarty_tpl->tpl_vars['user']->value['status'] == 100) {?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
panel">Администрирование</a>
			<?php }?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
cabinet">Работа по должникам1</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
cabinet">Работа по должникам2</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
cabinet">Работа по должникам3</a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
logout">Выход</a>
		<?php } else { ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
login">Личный кабинет</a>
		<?php }?>
		</div>
	</header>
	<main>
        <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
			<div class="alert alert-danger text-center"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['success']->value)) {?>
			<div class="alert alert-success text-center"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['info']->value)) {?>
			<div class="alert alert-info text-center"><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</div>
        <?php }?>
		<br /><?php }
}
