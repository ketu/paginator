<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator\Adapter;

use Veda\Paginator\AdapterInterface;

class Iterator implements AdapterInterface
{
    private $target;

    public function __construct($target)
    {
        $this->target = $target;
    }

    public function total()
    {

    }


    public function paginate()
    {
        // TODO: Implement paginate() method.
    }
}