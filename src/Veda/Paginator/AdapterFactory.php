<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;


use Veda\Paginator\Adapter\Database as DatabaseAdapter;
use Veda\Paginator\Adapter\IterableItem as IteratorAdapter;
use Veda\Paginator\Adapter\Doctrine\ORM\QueryBuilder as QueryBuilderAdapter;

class AdapterFactory
{
    public static function create($target, $limit, $offset, $options)
    {


        if ((is_array($target) || $target instanceof \Traversable)) {
            return new IteratorAdapter($target, $limit, $offset, $options);
        }

        if (class_exists("\Doctrine\ORM\QueryBuilder") && $target instanceof \Doctrine\ORM\QueryBuilder) {
            return new QueryBuilderAdapter($target, $limit, $offset, $options);
        }

        throw new \InvalidArgumentException('Target type can not be recognized');
    }
}