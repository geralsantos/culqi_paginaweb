<?php
//SEPARADOR
function siteURL()
    {
        /*$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol.$domainName;*/
        return "https://pulpomasters.com";
       //return "http://localhost";
    }
define('DS', DIRECTORY_SEPARATOR);
//UBICACIONES PRIVADAS
define( "ROOT", dirname(dirname(__FILE__)));
define( "APP", ROOT . DS . 'culqi_paginaweb' );
define( "JS_ROOT", ROOT . DS . 'js' );
define( "PUBLICO", ROOT );
 
//UBICACIONES PUBLICAS
define( "BASE", "/" );  
//define( "BASE", "/portal-liga/" );
define( "IMG", BASE . 'img' );
define( "JS", BASE . 'js' );
define( "CSS", BASE . 'css' );
define( "ASSETS", BASE . 'assets' );
define( "IMAGES", BASE . 'images' );
define( 'SITE_URL', siteURL() );
define ('SECRET_KEY_CULQI_PRODUCTION','sk_test_SaV9dp9ucC23HArp');
define ('SECRET_KEY_CULQI_TEST','sk_test_qYtT3McrEaPlYTpP');

