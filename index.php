<?php

    define('IS_LOCAL', true); // if is true - don't redirect us to mctop.me

    if(!IS_LOCAL && $_SERVER['HTTP_HOST'] != 'mctop.me')
        header('location: http://mctop.me');

    define('IN_DEV', false); //if debug is on, write logs to page;
    define('ROOT_DIR', __DIR__);

	@ini_set("display_errors", IN_DEV); // Вывод ошибок в релизе стоит отключить из соображений безопасности. Они будут писаться в лог.

    require_once('core/init.php');

    $initializator = new Initializator();

    $motd = 'MOTD: Сегодня день матери, поздравьте своих мам<br>'; // может браться из базы
    $version = $initializator::settings()['version'];
    $content = 'It is '.$initializator::settings()['app_name'];

	// if (strpos($_SERVER['HTTP_REFERER'],'vk.com') !== false){ 
	//	require_once('design/themes/default/vk_layout.php');
	 // }
	//	else
	// нужно сделать проверку на то, запуск приложения в вк это, либо просто переход по ссылке из ВК  

	// var_dump(Core::statusIsOkey()); //""Немного"" не так работает, как задумывалось сначала...

	if(Core::statusIsOkey())
		require_once('design/themes/default/oldschool.php');
	
