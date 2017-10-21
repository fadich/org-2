<?php

namespace App\Http\Controllers\Todo;


use Illuminate\Http\Request;
use App\TodoBundle\TodoRepository;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    /**
     * @var \App\TodoBundle\TodoRepository
     */
    protected $todo;

    public function __construct(
        Request $request,
        TodoRepository $todo
    ) {
        parent::__construct($request);

        $this->todo = $todo;
    }

    public function indexAction()
    {
        return $this->json(['list' => []]);
    }
}
