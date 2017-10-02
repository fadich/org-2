<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** @var  \Illuminate\Http\Request */
    protected $request;

    protected $layout = 'layout.base';

    protected $data = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getLayout()
    {
        if ($this->layout) {
            return view($this->layout, $this->data);
        }

        return null;
    }

    public function addData(array $data)
    {
        array_merge($this->data, $data);

        return $this;
    }

    protected function render($name, $data = [])
    {
        $data = array_merge($this->data, $data);

        if ($this->getLayout()) {
            return $this->getLayout()->nest('content', $name, $data);
        }

        return $this->layout = view($name, $data);
    }

}
