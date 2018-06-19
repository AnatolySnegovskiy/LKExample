<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=0.55, user-scalable=yes"
	/>
	<title>{$site_name}</title>
	<meta charset="{$site_charset}" />
	<link rel="shortcut icon" href="/cache/images/favicon.png?1" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Infant&amp;subset=cyrillic" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"
	/>
	<link href="{$site_url}cache/css/style.css?{$smarty.now}" rel="stylesheet" type="text/css" media="all" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<header>
		<div class="container-fluid">
		{if $user.id}
		
            {if $user.status == 100}
				<a href="{$site_url}panel">Администрирование</a>
			{/if}
			<a href="{$site_url}cabinet">Работа по должникам1</a>
			<a href="{$site_url}cabinet">Работа по должникам2</a>
			<a href="{$site_url}cabinet">Работа по должникам3</a>
			<a href="{$site_url}logout">Выход</a>
		{else}
			<a href="{$site_url}login">Личный кабинет</a>
		{/if}
		</div>
	</header>
	<main>
        {if isset($error)}
			<div class="alert alert-danger text-center">{$error}</div>
        {/if}
        {if isset($success)}
			<div class="alert alert-success text-center">{$success}</div>
        {/if}
        {if isset($info)}
			<div class="alert alert-info text-center">{$info}</div>
        {/if}
		<br />