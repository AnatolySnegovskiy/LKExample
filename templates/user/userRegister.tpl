{include file='header.tpl'}
<div class="col-md-4 col-md-offset-4 container loginPanel noFloat">
	<form role="form" class="form-group" method="post">
		<h1 class="text-center">Регистрация</h1>
		{if !$confirmation}
		<div class="form-group">
			<label for="exampleInputPassword1">Ваше имя</label>
			<input class="form-control" type="text" maxlength="250" name="fio" placeholder="Ваше имя" value="" />
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Email</label>
			<input id="email" class="form-control" type="text" maxlength="250" name="Email" placeholder="E-mail" value="" />
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Пароль</label>
			<input id="pass1" class="form-control" type="password" maxlength="250" name="Password" placeholder="Пароль" value="" />
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Повторите Пароль</label>
			<input id="pass2" class="form-control" type="password" maxlength="250" name="PasswordRepeat" placeholder="Пароль" value="" />
		</div>
		<div class="form-group"><label class="control-label" for="inputError"></label></div>
		<div class="form-group">
			<input type="hidden" name="referal_id" value="{$partner}"
			/>
		</div>
		<button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
		{else}
		<label class="control-label" for="inputError" style="font-size: 21px;">{$success}</label>
		{/if}
	</form>
	<div class="text-center"> <a href="{$site_url}login"> У меня есть аккаунт</a> </div>
</div>