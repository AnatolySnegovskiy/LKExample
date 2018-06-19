{include file='header.tpl'}
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
</div