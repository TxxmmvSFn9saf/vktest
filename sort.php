<?php
$menu = array (
    'news' => array (
        'url' => '/news' ,
        'urls' => [
            '/news/' ,
            '/news/item/'
        ] ,
        'icon' => 'icon-list' ,
        'name' => 'Новости' ,
        'order' => 900
    ) ,
    'messages' => array (
        'icon' => 'icon-envelope' ,
        'name' => 'Сообщения' ,
        'order' => 800 ,
        'submenu' => array (
            'inbox' => array (
                'url' => '/messages/inbox' ,
                'urls' => [
                    '/messages/inbox'
                ] ,
                'icon' => 'fa-reply' ,
                'name' => 'Входящие' ,
                'order' => 700 ,
            ) ,
            'new' => array (
                'url' => '/messages/new' ,
                'urls' => [
                    '/messages/new'
                ] ,
                'icon' => 'fa-envelope' ,
                'name' => 'Написать сообщение' ,
                'order' => 800 ,
            ) ,
            'outbox' => array (
                'url' => '/messages/outbox' ,
                'urls' => [
                    '/messages/outbox' ,
                    '/messages/show' ,
                    '/messages/file'
                ] ,
                'icon' => 'fa-share' ,
                'name' => 'Отправленные' ,
                'order' => 700
            ) ,

        )
    ) ,
    'home' => array (
        'url' => '/' ,
        'urls' => [
            '/'
        ] ,
        'icon' => 'icon-speedometer' ,
        'name' => 'Главная' ,
        'order' => 100
    ) ,

    'docs' => array (
        'icon' => 'icon-docs' ,
        'name' => 'Документы по ЖК' ,
        'extlink' => true ,
        'url' => 'http://vkcomfort.ru/%D0%BE%D0%B1%D1%8A%D0%B5%D0%BA%D1%82%D1%8B/' ,
        'urls' => [
            null
        ] ,
        'pull-right' => '<div class="pull-right label label-info"><em class="icon-share-alt"></em></div>' ,
        'order' => 800
    )
);

//Функции

function sorting ( $array , $key )
{
    $sorter = array ();
    $return = array ();

    foreach ( $array as $item => $val ) {
        $sorter[ $item ] = $val[ $key ];
    }
    asort ( $sorter );
    foreach ( $sorter as $item => $val ) {
        $return[ $item ] = $array[ $item ];
    }
    $array = $return;
    return $array;
}

$menu[ 'messages' ][ 'submenu' ] = sorting ( $menu[ 'messages' ][ 'submenu' ] , "order" );
$menu = sorting ( $menu , "order" );

echo '<pre>';
print_r ( $menu );
echo '<pre/>';
