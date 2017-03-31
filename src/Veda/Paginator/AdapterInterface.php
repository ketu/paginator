<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;


interface AdapterInterface
{
    public function total();

    public function paginate();
}