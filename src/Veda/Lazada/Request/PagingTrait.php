<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/27
 */

namespace Veda\Lazada\Request;

trait PagingTrait
{
    public function setLimit($limit, $offset = 0)
    {
        $this->setQueryParam('Limit', $limit);
        $this->setQueryParam('Offset', $offset);

    }
    public function setOffset($offset)
    {
        /**
         * @link RequestAbstract setQueryParam Method
         */
        $this->setQueryParam("Offset", $offset);
    }

}