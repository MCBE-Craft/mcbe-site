<?php
spl_autoload_register(function ($className) {
    $path = __DIR__ . "/../Config/$className.php";
    if (is_file($path)) include_once $path;
    $path = __DIR__ . "/../Config/Lang/$className.php";
    if (is_file($path)) include_once $path;
});
class Controller
{
    public static function getLang() : string {
        $lang = "EN";
        if (isset($_SESSION['lang']) and Conf::isSupportedLang(strtoupper($_SESSION['lang']))) $lang = strtoupper($_SESSION['lang']);
        if (isset($_GET['lang']) and Conf::isSupportedLang(strtoupper($_GET['lang']))) $lang = strtoupper($_GET['lang']);
        $_SESSION['lang'] = $lang;
        return $lang;
    }

    public static function getSupportedLang() : array {
        $langs = [];
        foreach (Conf::getSupportedLang() as $supportedLang) $langs[] = substr($supportedLang, 0, -4);
        return $langs;
    }

    private static array $STYLES;

    public static function getStyles() : array {
        if (!isset(static::$STYLES)) {
            static::$STYLES = ['blue'=>['bg-color'=>'#04080F', 'text-color'=>'#A1C6EA', 'link-color'=>'#507DBC']];
            $myfile = fopen(__DIR__ . "/../Config/style.json", "r");
            $content = fread($myfile,filesize(__DIR__ . "/../Config/style.json"));
            fclose($myfile);
            foreach (json_decode($content, true) as $key => $value) {
                static::$STYLES[$key] = $value;
            }
        }
        return static::$STYLES;
    }

    public static function isSupportedStyle(string $style) : bool {
        return isset(static::getStyles()[$style]);
    }

    public static function getStyleName() : string {
        $style = "blue";
        if (isset($_SESSION['style']) and static::isSupportedStyle($_SESSION['style'])) $style = $_SESSION['style'];
        if (isset($_GET['style'])  and static::isSupportedStyle($_GET['style'])) $style = $_GET['style'];
        $_SESSION['style'] = $style;
        return $style;
    }

    public static function getStyle() : array {
        return static::getStyles()[static::getStyleName()];
    }

    /** @noinspection PhpUnusedParameterInspection */
    public static function loadView(string $path, string $title = '', array $args = []) : void {
        $viewPath = __DIR__ . "/../views/" . $path;
        extract($args);
        require __DIR__ . "/../views/view.php";
    }

    public static function getDiscordUser() : string {
        $curl = curl_init(Conf::getUrl());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ["Authorization: Bot " . Conf::getToken()]);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return '@' . ($response->username ?: "MCBE Craft") . '#' . ($response->discriminator ?: "6545");
    }

    public static function error(string $message = null) : void {
        $lang = static::getLang() ?? "EN";
        static::loadView("error.php", $lang::getItem('error_page'), ["error"=>$message ?: $lang::getItem('error_default')]);
        static::log("error: $message");
    }

    public static function log(string $message) : void {
        $myfile = fopen(__DIR__ . '/../Logs/' . date('Y-m-d') . "-logs.txt", "a");
        $message = date('H:i:s') . ': ' . $message . "\n";
        fwrite($myfile, $message);
        fclose($myfile);
    }

    public static function getUrlParams(array $filter = []) : string {
        $urlparamsstr = '?';
        foreach ($_GET as $key=>$param) {
            if (!in_array($key, $filter)) $urlparamsstr .= urlencode($key) . '=' . urlencode($param) . '&';
        }
        return ($urlparamsstr == '?') ? '?' : substr($urlparamsstr, 0, -1);
    }

}
