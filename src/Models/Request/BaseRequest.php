<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/6/18
 * Time: 6:05 PM
 */

namespace Alive2212\LaravelEchargeService\Models\Request;


class BaseRequest extends EchargeBaseRequest
{
    /**
     * @return array
     */
    public function getParams(): array
    {
        return [
            // nothing
        ];
    }
}