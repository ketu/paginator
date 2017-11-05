<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-4-1
 */

namespace Veda\Paginator\Adapter\Doctrine\ORM;

use Veda\Paginator\AbstractAdapter;
use Veda\Paginator\AdapterInterface;

class QueryBuilder extends AbstractAdapter implements AdapterInterface
{
    public function paginate()
    {
        $queryBuilder = $this->getTarget();

        $totalQueryBuilder = clone $queryBuilder;
        $alias = $totalQueryBuilder->getRootAliases();

        if(!isset($alias[0])) {
            throw new \RuntimeException('No alias was set before invoking getRootAlias().');
        }

        $totalQueryBuilder->select("COUNT({$alias[0]})");

        $totalItem = $totalQueryBuilder->getQuery()->getSingleScalarResult();
        $this->setTotal($totalItem);

        $queryBuilder->setFirstResult($this->getOffset())
            ->setMaxResults($this->getLimit());
       # echo get_class($totalQueryBuilder->getQuery());
        #echo $totalQueryBuilder->getQuery()->getSql();

        $this->setItems($queryBuilder->getQuery()->getResult());


    }
}