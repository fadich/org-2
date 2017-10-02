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

    protected $redirectTo = "/";

    protected $data = [];

    public function __construct(Request $request)
    {
        $this->redirectTo = session('land-to') ?: route('home');
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

    public function redirect($to = null, $code = 302, $headers = [], $secure = null)
    {
        if ($to) {
            return redirect($to, $code, $headers, $secure);
        }

        return redirect($this->redirectTo, $code, $headers, $secure);
    }

    public function json(array $data = [], $status = 200, array $headers = [], $options = 0)
    {
        return response()->json($data, $status, $headers, $options);
    }

}
