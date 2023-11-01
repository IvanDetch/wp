<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wpbaza' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '0lqYF;gkyUyJdY$TUkqBJ>YK1&as_*@?;sEnd71[5.bLm5(M%k=(Bqo.Lm,4Qe&<' );
define( 'SECURE_AUTH_KEY',  'YGe@vz/rbj3k,mHI~9wbxC|f5C2PK_PvMN]`J~2FJupkM1r/dA*zSR:J>w{>Rmh6' );
define( 'LOGGED_IN_KEY',    'n]ta_~te@.iW.Y`4@Ry[hV2m;(]gwEkyH,-4owv4lw<VmkOZ>0r>R!I02]7[/7F2' );
define( 'NONCE_KEY',        '6RX9LzcQO2a;nrANF6??kFXXFsp0rL2e{X}%B~wIY+y8uG96|0r#w^`:>pMZC/_J' );
define( 'AUTH_SALT',        '1VOpVw1`x!Nh0A<APs-}UOS6(_>nX`e6WH8x[NBF[Y]{tGO>%(!DD4GAmxj-c`M[' );
define( 'SECURE_AUTH_SALT', '8m<uIF3.BSdOp7VU~FN)Mdg.SSYCi|Ne}>]1Bm]r)oVxTF)j:RO^KZc5TnRc>?Q9' );
define( 'LOGGED_IN_SALT',   ',*5N]4FBE2I 5N}HMPE&V;8!w !a/zHB*|6kdI!&3aNlo&0K5FN5=2nv.PAyxZl`' );
define( 'NONCE_SALT',       'JY@Ld$Zn!^ysFP9P9g+.vEnl.mB`P/IK[gM8%mf]V$MUZ5&(V3*Uy U:%T:AxsUB' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
