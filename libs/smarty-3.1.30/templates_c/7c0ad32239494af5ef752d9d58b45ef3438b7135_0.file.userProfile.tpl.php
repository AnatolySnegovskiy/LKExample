<?php
/* Smarty version 3.1.30, created on 2018-06-18 22:23:08
  from "/var/www/html/templates/user/userProfile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b28069c260b12_17428543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c0ad32239494af5ef752d9d58b45ef3438b7135' => 
    array (
      0 => '/var/www/html/templates/user/userProfile.tpl',
      1 => 1529165580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:invest/investList.tpl' => 1,
  ),
),false)) {
function content_5b28069c260b12_17428543 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:invest/investList.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Профиль</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" placeholder="ид" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['id'];?>
"/>
                <input type="text" class="form-control" maxlength="250" name="email" disabled placeholder="E-mail"
                       value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['email'];?>
"
                />
                <input type="text" class="form-control" maxlength="250" name="password" placeholder="Password"
                       value=""/>
                <input type="text" class="form-control" required maxlength="1500" name="name" placeholder="Your name"
                       value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['name'];?>
"
                />
                <input type="text" class="form-control" maxlength="15" name="perfect"
                       placeholder="Perfect Money U12345678" value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['perfect'];?>
"
                />
                <input type="text" class="form-control" maxlength="15" name="payeer" placeholder="Payeer P12345678"
                       value="<?php echo $_smarty_tpl->tpl_vars['userInfo']->value['payeer'];?>
"
                />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="submit" name="save" value="true" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
invoice">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Внести средства</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <label class="input-group-addon" for="amount">$</label>
                    <input id="amount" required class="form-control" type="number" min='1' max='1000' value='100'
                           name="amount" aria-describedby="basic-addon1"/>
                </div>
                <div class="input-group">
                    <b>Через:</b>
                    <fieldset class="radio">
                        <label for="perfectmoney">
                            <input checked type="radio" id="perfectmoney" name="paymentsystem" value="perfect money"/>
                            <span>Perfect Money</span>
                        </label>
                    </fieldset>
                    <fieldset class="radio">
                        <label for="payeer">
                            <input type="radio" id="payeer" name="paymentsystem" value="payeer"/>
                            <span>Payeer</span>
                        </label>
                    </fieldset>
                </div>
            </div>
            <div class="modal-footer">

                <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
cache/images/secure-payment.png"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <input type="submit" class="btn btn-primary" value="К платежной системе"/>
            </div>
        </form>
    </div>
</div><?php }
}
