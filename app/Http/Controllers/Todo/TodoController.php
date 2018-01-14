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
 * @property array $rulesCreate
 * @property array $rulesUpdate
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
        if (!Auth::check()) {
            return $this->json([
                "errors" => ["Not authorized"],
            ], 403);
        }

        $page = $request->get('page');
        $limit = $request->get('per-page');

        if (!$page || $page < 0) {
            $page = 1;
        }

        if (!$limit || $limit < 0 || $limit > 50) {
            $limit = 50;
        }

        $offset = $limit * ($page - 1);
        $conditions = [
            [
                'status',
                '>',
                TodoItem::STATUS_DONE,
            ],
            [
                'user_id',
                '=',
                Auth::id(),
            ],
        ];

        $list = $this->todo->find($conditions, $limit, $offset);

        return $this->json(['list' => $list]);
    }

    public function itemAction(Request $request, $id)
    {
        if (!Auth::check()) {
            return $this->json([
                "errors" => ["Not authorized"],
            ], 403);
        }

        $attributes = $request->all();
        $attributes['id'] = $id;
        $rules = $id ? $this->rulesUpdate : $this->rulesCreate;

        $errors = $this->validator($attributes, $rules)->errors();

        if (count($errors)) {
            return $this->json([
                "errors" => $errors,
            ], 400);
        }

        $attributes['user_id'] = Auth::id();
        $item = $this->todo->save($attributes);

        if (!$item) {
            return $this->json([
                "errors" => ["Item not found"],
            ], 404);
        }

        return $this->json(['item' => $item->toArray()]);
    }

    public function deleteAction(Request $request, $id)
    {
        if (!Auth::check()) {
            return $this->json([
                "errors" => ["Not authorized"],
            ], 403);
        }

        $item = $this->todo->get($id);
        $res = $this->todo->delete($item);


        if (!$res) {
            return $this->json([
                "errors" => ["Cannot delete item"],
            ], 503);
        }

        return $this->json(['success' => true]);
    }

    public function getRulesCreate()
    {
        return [
            'title' => 'string|required|min:3|max:191',
            'content' => 'string',
            'status' => 'numeric' .
                '|min:' . TodoItem::STATUS_NOT_ACTIVE .
                '|max:' . TodoItem::STATUS_ACTIVE .
                '|default:' . TodoItem::STATUS_ACTIVE,
        ];
    }

    public function getRulesUpdate()
    {
        return [
            'id' => 'numeric|min:0',
            'title' => 'string|min:3|max:191',
            'content' => 'string',
            'status' => 'numeric' .
                '|min:' . TodoItem::STATUS_NOT_ACTIVE .
                '|max:' . TodoItem::STATUS_ACTIVE,
        ];
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @param  array  $rules
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, array $rules)
    {
        return Validator::make($data, $rules);
    }

}
