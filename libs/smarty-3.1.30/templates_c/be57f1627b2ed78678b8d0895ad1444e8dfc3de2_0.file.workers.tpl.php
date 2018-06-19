<?php
/* Smarty version 3.1.30, created on 2018-06-19 00:21:15
  from "/var/www/html/templates/user/dashboard/workers.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b28224bbc07e8_87747444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be57f1627b2ed78678b8d0895ad1444e8dfc3de2' => 
    array (
      0 => '/var/www/html/templates/user/dashboard/workers.tpl',
      1 => 1529356873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5b28224bbc07e8_87747444 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid">
	<div class="row">
		<aside class="col-md-2">
			<a class="btn col-md-12" href="/dashboard">Обратно к DashBoard</a>
		</aside>

		<form role="form" class="col-md-10" method="POST">
			<div class="col-md-12 borderForm">
				<h2 class="text-center col-md-10">Основная информация</h2>
				<div class="col-md-12">
					<div class="form-group col-md-2">
						<label class="col-md-12" for="exampleInputEmail1">Имя</label>
						<input type="text" value="" name = "Name" />
					</div>
					<div class="form-group col-md-2">
						<label class="col-md-12" for="exampleInputEmail1">Фамилия</label>
						<input type="text" value="" name = "LastName" />
					</div>
					<div class="form-group col-md-2">
						<label class="col-md-12" for="exampleInputEmail1">Отчество</label>
						<input type="text" value="" name = "Patronymic" />
					</div>
					<div class="form-group col-md-2">
						<label class="col-md-12" for="exampleInputEmail1">Пол</label>
						<input type="text" value="" name = "Gender" />
					</div>
				</div>
			</div>

			<div class="col-md-2 borderForm">
				<h2 class="text-center">Приём на работу</h2>
				<div class="form-group col-md-12">
					<label class="col-md-12" for="exampleInputEmail1">Должность</label>
					<input type="text" value="" name = "Position" />
				</div>
				<div class="form-group col-md-12">
					<label class="col-md-12" for="exampleInputEmail1">Дата приёма на работу</label>
					<input type="text" value="" name = "DateEmployment" />
				</div>
			</div>

			<div class="col-md-6 borderForm">
				<h2 class="text-center col-md-12">Паспортные данные/ИНН</h2>
				<div class="col-md-12">
					<div class="form-group col-md-4">
						<label class="col-md-12" for="exampleInputEmail1">Место рождения</label>
						<input type="text" value="" name = "PlaceBirth" />
					</div>

					<div class="form-group col-md-4">
						<label class="col-md-12" for="exampleInputEmail1">Кем выдан</label>
						<input type="text" value="" name = "Issued" />
					</div>

					<div class="form-group col-md-4">
						<label class="col-md-12" for="exampleInputEmail1">ИНН</label>
						<input type="text" value="" name = "INN" />
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group col-md-4">
						<label class="col-md-12" for="exampleInputEmail1">Паспорт</label>
						<input type="text" value="" name = "Passport" />
					</div>
					<div class="form-group col-md-4">
						<label class="col-md-12" for="exampleInputEmail1">Дата выдачи</label>
						<input type="text" value="" name = "DateIssue" />
					</div>
					<div class="form-group col-md-4">
						<label class="col-md-12" for="exampleInputEmail1">Дата рождения</label>
						<input type="text" value="" name = "DateBirth" />
					</div>
				</div>
			</div>

			<div class="col-md-4 borderForm">
				<h2 class="text-center col-md-12">Контактные данные</h2>
				<div class="col-md-12">
					<div class="form-group col-md-6">
						<label class="col-md-12" for="exampleInputEmail1">Домашний телефон</label>
						<input type="text" value="" name = "HomePhone" />
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-12" for="exampleInputEmail1">Мобильный телефон</label>
						<input type="text" value="" name = "MobilePhone" />
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-12" for="exampleInputEmail1">Рабочий телефон</label>
						<input type="text" value="" name = "OfficePhone" />
					</div>
					<div class="form-group col-md-6">
						<label class="col-md-12" for="exampleInputEmail1">Email</label>
						<input type="text" value="" name = "Email" />
					</div>
				</div>
			</div>

			<div class="col-md-6 borderForm">
				<h2 class="text-center col-md-12">Фактический адрес проживания</h2>
				<div class="col-md-12">
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Индекс</label>
						<input type="text" value="" name = "IndexAddressActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Регион</label>
						<input type="text" value="" name = "RegionActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Тип поселения</label>
						<input type="text" value="" name = "TypeSettlementActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Город/Посёлок</label>
						<input type="text" value="" name = "NameSettlementActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Тип улицы</label>
						<input type="text" value="" name = "StreetTypeActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Улица</label>
						<input type="text" value="" name = "StreetNameActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Номер дома</label>
						<input type="text" value="" name = "NumberHomeActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Строение</label>
						<input type="text" value="" name = "StructureActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Подъезд</label>
						<input type="text" value="" name = "HousingActual" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Квартира</label>
						<input type="text" value="" name = "ApartmentActual" />
					</div>
				</div>
			</div>


			<div class="col-md-6 borderForm">
				<h2 class="text-center col-md-12">Адрес регистрации</h2>
				<div class="col-md-12">
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Индекс</label>
						<input type="text" value="" name = "IndexAddressRegister" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Регион</label>
						<input type="text" value="" name = "Region" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Тип поселения</label>
						<input type="text" value="" name = "TypeSettlement" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Город/Посёлок</label>
						<input type="text" value="" name = "NameSettlement" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Тип улицы</label>
						<input type="text" value="" name = "StreetType" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Улица</label>
						<input type="text" value="" name = "StreetName" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Номер дома</label>
						<input type="text" value="" name = "NumberHome" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Строение</label>
						<input type="text" value="" name = "Structure" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Подъезд</label>
						<input type="text" value="" name = "Housing" />
					</div>
					<div class="form-group col-md-5">
						<label class="col-md-12" for="exampleInputEmail1">Квартира</label>
						<input type="text" value="" name = "Apartment" />
					</div>
				</div>
			</div>
			<input type="hidden" value="1" name = "status" />
		</form>
	</div>
</div><?php }
}
