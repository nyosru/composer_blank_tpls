<?php

/**
 * работа с секретами
 */
//creatSecret
$function = new Twig_SimpleFunction('creatSecret', function ( string $text ) {
    return \Nyos\Nyos::creatSecret($text);
});
$twig->addFunction($function);

//checkSecret
$function = new Twig_SimpleFunction('checkSecret', function ( string $secret, string $text) {
    return \Nyos\Nyos::checkSecret($secret, $text);
});
$twig->addFunction($function);

//item_dir_img_uri_download
$function = new Twig_SimpleFunction('item_dir_img_uri_download', function ( ) {
    return \Nyos\mod\items::$dir_img_uri_download;
    // return \Nyos\Nyos::checkSecret($secret, $text);
});
$twig->addFunction($function);

//item_getItems
//$function = new Twig_SimpleFunction('item_getItems', function ( $db, string $folder, $mod, $status = 'show', $lim = null ) {
//    return \Nyos\mod\items::getItems( $db, $folder, $mod, $status, $lim );
//});
//$twig->addFunction($function);
//pa
$function = new Twig_SimpleFunction('pa', function ( array $ar ) {

    $re = '<div style="max-height:400px; overflow: auto;" >'
            . '<table class=\'table\' ><tbody>';
    foreach ($ar as $k => $v) {
        $re .= '<Tr><td>' . $k . '</td><td>';

        if (isset($v) && is_array($v) && sizeof($v) > 0) {
            $re .= '<table class=\'table table-sm \' ><tbody>';
            foreach ($v as $k1 => $v1) {
                $re .= '<Tr><td>' . $k1 . '</td><td>';


                if (isset($v1) && is_array($v1)) {
                    $re .= '<table class=\'table table-sm \' ><tbody>';
                    foreach ($v1 as $k2 => $v2) {
                        if (is_string($v2)) {
                            $re .= '<Tr><td>' . $k2 . '</td><td>' . $v2 . '</td></tr>';
                        } else {
                            $re .= $v1;
                        }
                    }
                    $re .= '</tbody></table>';
                } else {
                    $re .= $v1;
                }



                $re .= '</td></tr>';
            }
            $re .= '</tbody></table>';
        } else {
            $re .= $v;
        }
        $re .= '</td></tr>';
    }
    $re .= '</tbody></table>'
            . '</div>';

    return $re;
});
$twig->addFunction($function);


/**
 * Пример использования
 */
/*
    {% set ss = creatSecret(123456) %}
    <br/>
    {{ ss }}
    <br/>
    {% if checkSecret(ss,123456) == true %}
    111
    {% else %}
    222
    {% endif %}
*/