<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;

use Veda\Paginator\AdapterFactory;

class Paginator implements PaginatorInterface
{

    private $defaultOptions = [];

    public function paginate($target, $page = 1, $limit = 10, array $options = array())
    {
        $limit = intval(abs($limit));
        if (!$limit) {
            throw new \InvalidArgumentException("Invalid item per page number, must be a positive number");
        }
        $offset = abs($page - 1) * $limit;

        $options = array_merge($this->defaultOptions, $options);

        $adapter = AdapterFactory::create($target);


        return new Page($adapter->total(), );

    }
}