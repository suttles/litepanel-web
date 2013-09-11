<?php
/*
* @LitePanel
* @Developed by QuickDevel
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $description ?>">
	<meta name="keywords" content="<?php echo $keywords ?>">
	<meta name="generator" content="LitePanel">
	<title><?php echo $title ?> | <?php echo $description ?></title>
	<link href="/application/public/css/style.css" rel="stylesheet">
	<script src="/application/public/js/jquery.js"></script>
	<script src="/application/public/js/jquery.form.js"></script>
	<script src="/application/public/js/jquery.flot.js"></script>
	<script src="/application/public/js/bootstrap.js"></script>
	<script src="/application/public/js/main.js"></script>
</head>
<body>
	<!-- Powered by LitePanel -->
	
	<!-- Меню -->
	<div class="navbar navbar-inverse" id="mainmenu">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="/">LitePanel</a>
				<?php if($logged): ?> 
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li<?php if($activesection == "main"): ?> class="active"<?php endif; ?>><a href="/"><i class="icon-home icon-white"></i> Главная</a></li>
						<li class="divider-vertical"></li>
						<li<?php if($activesection == "servers"): ?> class="active"<?php endif; ?>><a href="/servers/index"><i class="icon-hdd icon-white"></i> Сервера</a></li>
						<li class="divider-vertical"></li>
						<li<?php if($activesection == "tickets"): ?> class="active"<?php endif; ?>><a href="/tickets/index"><i class="icon-headphones icon-white"></i> Поддержка</a></li>
						<li class="divider-vertical"></li>
					</ul>
					<div class="btn-group pull-right">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i> <?php echo $user_firstname ?> <?php echo $user_lastname ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/account/pay"><i class="icon-plus"></i> Баланс: <?php echo $user_balance ?> руб.</a></li>
							<li><a href="/account/edit"><i class="icon-wrench"></i> Настройки</a></li>
							<li class="divider"></li>
							<li><a href="/account/logout"><i class="icon-share"></i> Выход</a></li>
						</ul>
					</div>
				</div>
				<?php else: ?> 
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li<?php if($activesection == "account" && $activeitem == "login"): ?> class="active"<?php endif; ?>><a href="/account/login"><i class="icon-home icon-white"></i> Вход</a></li>
						<li class="divider-vertical"></li>
						<li<?php if($activesection == "account" && $activeitem == "register"): ?> class="active"<?php endif; ?>><a href="/account/register"><i class="icon-home icon-white"></i> Регистрация</a></li>
						<li class="divider-vertical"></li>
					</ul>
				</div>
				<?php endif; ?> 
			</div>
		</div>
	</div>
	<!-- /Меню -->
	
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3" id="sidebar">
				<div class="sidebar-nav">
					<div class="well" style="padding: 8px 0;">
						<ul class="nav nav-list">
							<?php if($logged): ?> 
							<li class="nav-header">Сервера</li>
							<li<?php if($activesection == "servers" && $activeitem == "index"): ?> class="active"<?php endif; ?>><a href="/servers/index"><i class="icon-hdd"></i> Мои сервера</a></li>
							<li<?php if($activesection == "servers" && $activeitem == "order"): ?> class="active"<?php endif; ?>><a href="/servers/order"><i class="icon-plus"></i> Заказать сервер</a></li>
							<li class="divider"></li>
							<li class="nav-header">Поддержка</li>
							<li<?php if($activesection == "tickets" && $activeitem == "index"): ?> class="active"<?php endif; ?>><a href="/tickets/index"><i class="icon-headphones"></i> Мои запросы</a></li>
							<li<?php if($activesection == "tickets" && $activeitem == "create"): ?> class="active"<?php endif; ?>><a href="/tickets/create"><i class="icon-plus"></i> Создать запрос</a></li>
							<?php if($user_access_level >= 2): ?> 
							<li class="divider"></li>
							<li class="nav-header">Усправление системой</li>
							<li<?php if($activesection == "admin" && $activeitem == "servers"): ?> class="active"<?php endif; ?>><a href="/admin/servers/index"><i class="icon-hdd"></i> Сервера</a></li>
							<li<?php if($activesection == "admin" && $activeitem == "tickets"): ?> class="active"<?php endif; ?>><a href="/admin/tickets/index"><i class="icon-headphones"></i> Поддержка</a></li>
							<li<?php if($activesection == "admin" && $activeitem == "users"): ?> class="active"<?php endif; ?>><a href="/admin/users/index"><i class="icon-user"></i> Пользователи</a></li>
							<li<?php if($activesection == "admin" && $activeitem == "invoices"): ?> class="active"<?php endif; ?>><a href="/admin/invoices/index"><i class="icon-list-alt"></i> Счета</a></li>
							<?php endif; ?> 
							<?php if($user_access_level >= 3): ?> 
							<li<?php if($activesection == "admin" && $activeitem == "games"): ?> class="active"<?php endif; ?>><a href="/admin/games/index"><i class="icon-screenshot"></i> Игры</a></li>
							<li<?php if($activesection == "admin" && $activeitem == "locations"): ?> class="active"<?php endif; ?>><a href="/admin/locations/index"><i class="icon-tasks"></i> Локации</a></li>
							<?php endif; ?> 
							<li class="divider"></li>
							<li class="nav-header">Аккаунт</li>
							<li<?php if($activesection == "account" && $activeitem == "pay"): ?> class="active"<?php endif; ?>><a href="/account/pay"><i class="icon-plus"></i> Пополнение баланса</a></li>
							<li<?php if($activesection == "account" && $activeitem == "invoices"): ?> class="active"<?php endif; ?>><a href="/account/invoices"><i class="icon-list-alt"></i> Счета</a></li>
							<li<?php if($activesection == "account" && $activeitem == "edit"): ?> class="active"<?php endif; ?>><a href="/account/edit"><i class="icon-wrench"></i> Настройки</a></li>
							<li><a href="/account/logout"><i class="icon-share"></i> Выход</a></li>
							<?php else: ?>
							<li <?php if($activesection == "account" && $activeitem == "login"): ?> class="active"<?php endif; ?>><a href="/account/login"><i class="icon-check"></i> Вход</a></li>
							<li<?php if($activesection == "account" && $activeitem == "register"): ?> class="active"<?php endif; ?>><a href="/account/register"><i class="icon-star"></i> Регистрация</a></li>
							<?php endif; ?> 
						</ul>
					</div>
				</div>
				<div class="copyright">Powered by <a href="http://litepanel.ru">LitePanel</a>.</div>
			</div>
			<div class="span9" id="content">
			<?php if(isset($error)): ?><div class="alert alert-error"><strong>Ошибка!</strong> <?php echo $error ?></div><?php endif; ?> 
			<?php if(isset($warning)): ?><div class="alert"><strong>Внимание!</strong> <?php echo $warning ?></div><?php endif; ?> 
			<?php if(isset($success)): ?><div class="alert alert-success"><strong>Выполнено!</strong> <?php echo $success ?></div><?php endif; ?> 