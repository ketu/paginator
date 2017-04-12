<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;


class Page implements \Countable, \Iterator
{

    private $items;
    private $currentPage;
    private $totalPage;
    private $total;
    private $limit;
    private $offset;

    public function __construct(AbstractAdapter $adapter)
    {
       
        $this->items = $adapter->getItems();

        $this->currentPage = $adapter->getCurrentPage();

        $this->total = $adapter->getTotal();

        $this->limit = $adapter->getLimit();

        $this->offset = $adapter->getOffset();

        $this->totalPage = $adapter->getTotalPage();
    }

    /**
     * {@inheritDoc}
     */
    public function rewind()
    {
        reset($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function next()
    {
        next($this->items);
    }

    /**
     * {@inheritDoc}
     */
    public function valid()
    {
        return key($this->items) !== null;
    }


    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->items);
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
        return $this->currentPage;
    }

    /**
     * @param mixed $currentPage
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return mixed
     */
    public function getTotalPage()
    {
        return $this->totalPage;
    }

    /**
     * @param mixed $totalPage
     */
    public function setTotalPage($totalPage)
    {
        $this->totalPage = $totalPage;
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