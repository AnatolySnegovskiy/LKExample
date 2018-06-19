<div class="form-line">
  <div class="form-block" style="text-align: center;background: rgba(255, 255, 255, 0.4);
    padding: 40px;
    color: black;">
      <form method="post"  style="max-width: 620px;margin: 0 auto; border:none;">
       <h4>{$error_message}</h4>
      <h1>Восстановление пароля</h1>
      {if $token_restor==''&&$sendemail_restor==''}
        <p>{$lng.restore_edit_email}:</p>
        <input type="text" name="login" value="" placeholder="Email">
        <input class="btn_a" style="animation:none;" type="submit" name="gorestor" value="Отправить">
      {elseif $sendemail_restor!=''}
      <h1>На указанную электронную почту было отправлено сообщение с инструкцией</h1>
      {else}
      <h1>На вашу почту отправлен новый пароль</h1>
      {/if}
      </form>
      <a style="cursor: pointer;font-size: 20px;" 
      href="{$site_url}login">Страница логина  </a>
      <a style="cursor: pointer;font-size: 20px;" href="{$site_url}register">  Регистрация</a>
     
    </div>
</div>

