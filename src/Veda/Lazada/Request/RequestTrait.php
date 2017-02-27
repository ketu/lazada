<?php
/**
 * Created by PhpStorm.
 * User: laigc
 * Date: 2017/2/27
 * Time: 17:51
 */

namespace Veda\Lazada\Request;


trait RequestTrait
{
    public function setLimit($limit)
    {
        $this->setQueryParam('Limit', $limit);

    }
    public function setOffset($offset)
    {
        /**
         * @link RequestAbstract setQueryParam Method
         */
        $this->setQueryParam("Offset", $offset);
    }

}