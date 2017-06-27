<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'cofee-base');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5Gc%!8]@wKaL`$4YSO~HWC#Of7B:2AjbWYX[&I{c|r)AAE1)}8kgxe48,^n!%{o?');
define('SECURE_AUTH_KEY',  'Kz}P1dNN8i$y-V9T+uT8C=y<8}Bc]+mgb@P=?1w}8~Iei{exSpk@RVJ7@E%gLW*V');
define('LOGGED_IN_KEY',    'p,0|~<sO_@Ts~]@69jGmO#QEe/+J(:4xA-xQ>Rw:qR 5par$mQ{`B;LjAhD~o;H.');
define('NONCE_KEY',        'V`M{juQ@gfkHfn:yk`uk`{$oFA3M}uV=OP+XN6fvd5O1e6O|AEFVe:X>gtJr`rRj');
define('AUTH_SALT',        'Gzbk%qcePlD(KlIG -:1a{BJ_3*hA7N=&|RdB3cr6hZ9ElTV;^spT/lVD}}T$s `');
define('SECURE_AUTH_SALT', '.B1sg3<:+9G e I!HRn5eu9U)ArN$^BkmkM<r;-(I_7HF`svq/J>r,Na/0^~ODQx');
define('LOGGED_IN_SALT',   '5|/7Dl{K$3rM 7ixD,.^;5%Z^:~=Ds+8drBO4itF~4a90]?A[D8gV__^bHa ?Wk+');
define('NONCE_SALT',       '|*kzMlN(vYPk~1<NrwNL?XY;:}UZh>a+B/GM_d6S!pp_(*}u!mcaV3v=~ATAE&jm');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
