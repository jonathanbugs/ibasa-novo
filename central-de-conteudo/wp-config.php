<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'importadorabage3');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'importadorabage3');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'JAvut6ArucramA');

/** nome do host do MySQL */
define('DB_HOST', '186.202.152.51');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3Fq$z9bW!%:hGQ=Jc%y?Uu_fyQ,2wQG_wdHVDve)0jl{;b6x;[t/YG_gTm#9[sWD');
define('SECURE_AUTH_KEY',  '||PhX*h+9=}?_R4F2QA!s]vtr8FQz=@|-a.l^4!s1op[hS4.7W4AS-,zc4s* m=]');
define('LOGGED_IN_KEY',    '.|+|}md}|Ni|g3&3La|g<3!e/B=5kliy1x] tiXAQK:C,fwr7dhj};d</(%=@#@|');
define('NONCE_KEY',        '|#V~ibNLlPV0ch k6vjd&v#U?x.%.4SV:rH<!xgcQkl2(52X?bi@7O6Z?dq7-cKU');
define('AUTH_SALT',        'A% 17hYJ-){Z|9|Rt=>WbNobbvcmz:x<8.Np!/Nr?h)j q8|Z}YIji*<+@B&aG>J');
define('SECURE_AUTH_SALT', 'R6Ch^b|-x>aJ+8EvJjn_D@60a[z/6;hExfzDRYY+T-Dvpr@T5{e!<|Qb#CnAnCWR');
define('LOGGED_IN_SALT',   'N3P4|PvA5vT*/zEhW0t+vJD,R+XF+(m(-1Gr =n(~ElTG/(yokU^;b||:Ho6tl~-');
define('NONCE_SALT',       '|7#sV{|oJ+|?w^p $x|,n-+MvJc#|>;fc`x,/?bJ>WUZC-;4EZ8Ceg3T_oeKIV$c');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
