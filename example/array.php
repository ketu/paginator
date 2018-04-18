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

class MyIterator implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind()
    {

        reset($this->var);
    }

    public function current()
    {
        $var = current($this->var);

        return $var;
    }

    public function key()
    {
        $var = key($this->var);

        return $var;
    }

    public function next()
    {
        $var = next($this->var);

        return $var;
    }

    public function valid()
    {
        $key = key($this->var);
        $var = ($key !== NULL && $key !== FALSE);

        return $var;
    }

}

$values = array(1,2,3,6,58,99,777);
$it = new MyIterator($values);


$pagination = $paginator->paginate($it, 1, 3);
echo  '..................';
echo $pagination->getTotalPage();
echo '............';
echo $pagination->getTotal();

foreach($pagination->getItems() as $item) {

        var_dump($item);

}