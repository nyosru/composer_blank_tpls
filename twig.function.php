<?php

$function = new Twig_SimpleFunction('tplsShowList', function ( string $text ) {

    $dir = dirname(__FILE__) . '/tpls/';
    $e = scandir($dir);

    $re = [];

    foreach ($e as $k => $v) {
        if (isset($v{2}) && is_dir($dir . $v)) {
            $re[] = $v;
        }
    }

    return $re;
});
$twig->addFunction($function);
