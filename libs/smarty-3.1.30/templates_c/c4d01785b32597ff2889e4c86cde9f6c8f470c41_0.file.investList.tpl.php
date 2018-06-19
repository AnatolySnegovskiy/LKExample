<?php
/* Smarty version 3.1.30, created on 2018-06-18 22:23:08
  from "/var/www/html/templates/invest/investList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b28069c36ecb2_82959968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4d01785b32597ff2889e4c86cde9f6c8f470c41' => 
    array (
      0 => '/var/www/html/templates/invest/investList.tpl',
      1 => 1529165578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b28069c36ecb2_82959968 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="container-fluid">
	<div class="row">
        <h3>Инвестиции</h3>
		<table class="table table-condensed table-bordered table-hover">
            <tr>
                <th>Дата</th>
                <th>Сумма</th>
                <th>Платежная система</th>
            </tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['investList']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['summ'];?>
$</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
	</div>
</div>
<?php }
}
