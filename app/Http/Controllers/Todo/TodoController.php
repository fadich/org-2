<?php

namespace App\Http\Controllers\Todo;

use App\Base\Object;
use App\Models\TodoItem;
use Illuminate\Http\Request;
use App\TodoBundle\TodoRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class TodoController
 * @package App\Http\Controllers\Todo
 *
 * @property array $rules
 */
class TodoController extends Controller
{
    use Object;

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

    public function indexAction(Request $request)
    {
//        $attributes = $request->all();
//        $errors = $this->validator($attributes)->errors();
//        $todo = $this->todo->get(1);
//
//        if (count($errors)) {
//            return $this->json([
//                "errors" => $errors,
//            ], 400);
//        }
//
//        $attributes['user_id'] = Auth::id();
//        $attributes['id'] = 2;
//        $todo = $this->todo->save($attributes);

        return $this->json(['list' => $this->todo->findAll()]);
    }

    public function getRules()
    {
        return [
            'title' => 'required|max:191',
            'content' => 'string',
            'status' => 'required|numeric|min:' . TodoItem::STATUS_DELETED . '|max:' . TodoItem::STATUS_ACTIVE,
        ];
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->rules);
    }

}
