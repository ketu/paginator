<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-4-1
 */


require '../vendor/autoload.php';


$paginator = new \Veda\Paginator\Paginator();

$data = [
    [
        'id' => 1,
        'name' => 'xx',
    ],
    [
        'id' => 2,
        'name' => 'xx',
    ],
    [
        'id' => 3,
        'name' => 'xx',
    ],
    [
        'id' => 4,
        'name' => 'xx',
    ],
    [
        'id' => 5,
        'name' => 'xx',
    ],
    [
        'id' => 6,
        'name' => 'xx',
    ],
    [
        'id' => 7,
        'name' => 'xx',
    ]
];

$paginator->paginate($data, 1, 3);