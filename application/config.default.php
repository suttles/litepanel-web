<?php
/*
* @LitePanel
* @Version: 1.1 [dev]
* @Developed by QuickDevel
*/
$config = array(
	/* Основые параметры */
	'title'			=>		'LitePanel', // Название компании
	'description'	=>		'Панель управления игровыми серверами LitePanel', // Описание компании (meta description)
	'keywords'		=>		'', // Ключевые слова (meta keywords)
	'url'			=>		'http://yourdomain/', // URL панели управления. Пример: http://example.com/
	'token'			=>		'mytoken123', // Используется для запуска скриптов по cron'у
	
	/* Параметры базы данных */
	'db_type'		=>		'mysql', // Тип базы данных
	'db_hostname'	=>		'localhost', // Хост базы данных
	'db_username'	=>		'username', // Пользователь базы данных
	'db_password'	=>		'password', // Пароль базы данных
	'db_database'	=>		'database', // Имя базы данных

	/* Параметры E-Mail */
	'mail_from'		=>		'noreply@example.com', // E-Mail отправителя
	'mail_sender'	=>		'LitePanel Control Panel', // Имя отправителя

	/* Параметры ROBOKASSA */
	/* Подробнее о данном разделе вы можете узнать по адресу http://litepanel.ru/help/robokassa#litepanel */
	'rk_server'		=>		'https://merchant.roboxchange.com', // URL мерчанта. Для неактивированных аккаунтов используйте "http://test.robokassa.ru/Index.aspx".
	'rk_login'		=>		'login', // Логин пользователя
	'rk_password1'	=>		'pass1', // Пароль 1 пользователя
	'rk_password2'	=>		'pass2' // Пароль 2 пользователя
);
?>