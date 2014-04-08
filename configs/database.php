<?php
if($_SERVER['HTTP_HOST']=='localhost' or $_SERVER['HTTP_HOST']=='localhost:8888' or preg_match('/^192.168./', $_SERVER['HTTP_HOST']) or preg_match('/^10.0./', $_SERVER['HTTP_HOST']) ){

	define('DB_HOST', '186.202.152.51');
	define('DB_BASE', 'importadorabage3');
	define('DB_USER', 'importadorabage3');
	define('DB_PASS', 'JAvut6ArucramA');

} else {

	define('DB_HOST', '186.202.152.51');
	define('DB_BASE', 'importadorabage3');
	define('DB_USER', 'importadorabage3');
	define('DB_PASS', 'JAvut6ArucramA');

}
define('PREFIX', '_spr_');
?>
