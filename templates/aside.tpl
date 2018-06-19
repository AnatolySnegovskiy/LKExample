{if 1==0}
	{if $user.id=='3'||$user.id=='1'}
	<a href="{$site_url}panel/panel" {if $smarty.get.page == 'home'}class="actual"{/if}>
		<i class="fa fa-university" aria-hidden="true"></i>
		<span>Панель</span>
	</a>
	{/if}
	<a href="{$site_url}static/home" {if $smarty.get.page == 'home'}class="actual"{/if}>
		<i class="fa fa-university" aria-hidden="true"></i>
		<span>Главная</span>
	</a>
	{if $user.id!=''}
	<a href="{$site_url}user/profile" {if $smarty.get.page == 'profile'}class="actual"{/if}>
		<i class="fa fa-user" aria-hidden="true"></i>
		<span>Профиль</span>
	</a>
	{/if}
	<a href="{$site_url}static/about" {if $smarty.get.page == 'about'}class="actual"{/if}>
		<i class="fa fa-bar-chart" aria-hidden="true"></i>
		<span>О нас</span>
	</a>
	<a href="{$site_url}invest/category" {if $smarty.get.page == 'category'}class="actual"{/if}>
		<i class="fa fa-dollar" aria-hidden="true"></i>
		<span>Финансы</span>
	</a>
	<a href="{$site_url}invest/partners" {if $smarty.get.page == 'partners'}class="actual"{/if}>
		<i class="fa fa-briefcase" aria-hidden="true"></i>
		<span>Партнеры</span>
	</a>
	<a href="{$site_url}static/tariff" {if $smarty.get.page == 'tariff'}class="actual"{/if}>
		<i class="fa fa-bullhorn" aria-hidden="true"></i>
		<span>Тарифная сетка</span>
	</a>
	<a href="{$site_url}static/rules" {if $smarty.get.page == 'rules'}class="actual"{/if}>
		<i class="fa fa-newspaper-o" aria-hidden="true"></i>
		<span>Правила</span>
	</a>
	<a href="{$site_url}static/contacts" {if $smarty.get.page == 'contacts'}class="actual"{/if}>
		<i class="fa fa-commenting-o" aria-hidden="true"></i>
		<span>Контакты</span>
	</a>
{/if}