<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-4-1
 */

namespace Veda\Paginator;


abstract class AbstractAdapter
{
    protected $target;
    protected $total;
    protected $items;
    protected $limit;
    protected $offset;
    protected $options;


    public function __construct($target, $limit, $offset, $options = null)
    {
        $this->target = $target;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->options = $options;
    }


    /**
     * @return mixed
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param mixed $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return round($this->getOffset() / $this->getLimit()) + 1;
    }

    /**
     * @return mixed
     */
    public function getTotalPage()
    {
        return ceil($this->getTotal() / $this->getLimit());
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    }


}