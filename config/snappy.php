<?php
if( PHP_OS == 'WINNT'){

    return array(
        'pdf' => array(
            'enabled' => true,
            'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"',
            'timeout' => false,
            'options' => array(
                /*'dpi'   =>  125,*/
                'zoom'  =>  1.32,
                //'disable-smart-shrinking' => true,
            ),
            'env'     => array(),
        ),

        'image' => array(
            'enabled' => true,
            'binary' => '"C:\Program Files\wkhtmltoimage\bin\wkhtmltoimage"',
            'timeout' => false,
            'options' => array(),
            'env'     => array(),
        ),
    );

} else {

    return array(
        'pdf' => array(
            'enabled' => true,
            'binary'  => '/usr/local/bin/wkhtmltopdf-amd64',
            'timeout' => false,
            'options' => array(
                //'dpi'   =>  125,
                'zoom'  =>  1.32
                //'disable-smart-shrinking' => true,
            ),
            'env'     => array(),
        ),

        'image' => array(
            'enabled' => true,
            'binary'  => '/usr/local/bin/wkhtmltopdf-amd64',
            'timeout' => false,
            'options' => array(),
            'env'     => array(),
        ),
    );

}