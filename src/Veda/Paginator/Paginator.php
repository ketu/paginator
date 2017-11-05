<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;

class Paginator implements PaginatorInterface
{

    private $defaultOptions = [];

    public function paginate($target, int $offset = 0, int $limit = 10, array $options = array())
    {
        $limit = intval(abs($limit));
        if (!$limit) {
            throw new \InvalidArgumentException("Invalid item per page number, must be a positive number");
        }
        if ($offset < 0) {
            throw new \InvalidArgumentException("Invalid offset, must be a positive number");
        }
        //$offset = abs($page - 1) * $limit;

        $options = array_merge($this->defaultOptions, $options);

        $adapter = AdapterFactory::create($target, $limit, $offset, $options);

        $adapter->paginate();

        return new Page($adapter);

    }
}