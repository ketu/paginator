<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;

use Doctrine\DBAL\Query\QueryBuilder;
use Veda\Paginator\Adapter\IterableItem as IteratorAdapter;
use Veda\Paginator\Adapter\QueryBuilder as QueryBuilderAdapter;

class AdapterFactory
{
    public static function create($target, $limit, $offset, $options)
    {
        if ( (is_array($target) || $target instanceof \Traversable)) {
            return new IteratorAdapter($target,$limit, $offset, $options);
        } elseif($target instanceof QueryBuilder) {
            return new QueryBuilderAdapter($target);
        }

        throw new \InvalidArgumentException('Target type can not be recognized');
    }
}