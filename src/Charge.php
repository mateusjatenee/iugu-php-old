<?php

namespace Iugu;

use Iugu\Util\Request;

class Charge extends Request
{
    public function create($data)
    {
        $req = $this->postRequest('charge', $data);
        return $req;
    }
}
