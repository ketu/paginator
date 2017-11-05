<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator\Adapter;

use Veda\Paginator\AbstractAdapter;
use Veda\Paginator\AdapterInterface;

class IterableItem extends AbstractAdapter implements AdapterInterface
{

    protected $items = [];

    private function processArray()
    {
        $this->setTotal(count($this->getTarget()));
        $chunkItems = array_slice($this->getTarget(), $this->getOffset(), $this->getLimit());
        $this->setItems($chunkItems);
    }

    private function processObject()
    {
        $items = [];
        $total = 0;
        foreach ($this->getTarget() as $key=> $item) {
            $total++;
            if ($key >= $this->getOffset() && $key > $this->getOffset() + $this->getLimit()) {

                $items[] = $item;
            }
        }
        $this->setTotal($total);
        $this->setItems($items);
    }

    public function paginate()
    {

        if(is_array($this->getTarget())) {
            $this->processArray();
        } else {
            $this->processObject();
        }

        // TODO: Implement paginate() method.
    }
}