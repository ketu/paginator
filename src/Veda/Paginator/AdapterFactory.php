<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;

use Doctrine\DBAL\Query\QueryBuilder;
use Veda\Paginator\Adapter\Iterator as IteratorAdapter;
use Veda\Paginator\Adapter\QueryBuilder as QueryBuilderAdapter;

class AdapterFactory
{
    public static function create($target)
    {
        if ( (is_array($target) || $target instanceof \Traversable)) {
            return new IteratorAdapter($target);
        } elseif($target instanceof QueryBuilder) {
            return new QueryBuilderAdapter($target);
        }

        throw new \InvalidArgumentException('Target type can not be recognized');
    }
}