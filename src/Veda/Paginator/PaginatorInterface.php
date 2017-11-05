<?php
/**
 * User: ketu <ketu.lai@gmail.com>
 * Date: 17-3-31
 */

namespace Veda\Paginator;


interface PaginatorInterface
{
    public function paginate($target, int $offset = 0, int $limit = 10, array $options = array());
}