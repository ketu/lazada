<?php
/**
 * User: ketu.lai <ketu.lai@gmail.com>
 * Date: 2017/2/27
 */

namespace Veda\Lazada\Request;

trait DateFilterTrait
{
    public function setCreatedTimeLimit(\DateTime $startTime = null, \DateTime $endTime = null)
    {
        if (null !== $startTime) {
            $this->setQueryParam('CreatedAfter', $startTime->format(\DateTime::ISO8601));
        }
        if (null !== $endTime) {
            $this->setQueryParam('CreatedBefore', $startTime->format(\DateTime::ISO8601));
        }
    }

    public function setUpdatedTimeLimit(\DateTime $startTime = null, \DateTime $endTime = null)
    {
        if (null !== $startTime) {
            $this->setQueryParam('UpdatedAfter', $startTime->format(\DateTime::ISO8601));
        }
        if (null !== $endTime) {
            $this->setQueryParam('UpdatedBefore', $startTime->format(\DateTime::ISO8601));
        }
    }

}