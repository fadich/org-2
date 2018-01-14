<?php

namespace App\Http\Controllers\Storage;

use App\Base\Object;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    use Object;

    /**
     * @var \Illuminate\Filesystem\FilesystemAdapter
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $path;

    public function __construct(Request $request)
    {
        $this->adapter = Storage::disk('local');
        $this->path = 'storage' . DIRECTORY_SEPARATOR . Auth::id();

        parent::__construct($request);
    }

    public function writeAction(Request $request)
    {
        if (!Auth::check()) {
            return $this->json([
                'errors' => ['Not authorized'],
            ], 403);
        }

        $data = $request->get('data');
        
        if (!$data) {
            return $this->json([
                'errors' => ['"data" should be specified'],
            ], 400);
        }
        if (json_encode($data) === null) {
            return $this->json([
                'errors' => ['Data is invalid'],
            ], 400);
        }

        $this->adapter->put($this->path, $data);

        return $this->json(['true' => true]);
    }

    public function readAction(Request $request)
    {
        if (!Auth::check()) {
            return $this->json([
                'errors' => ['Not authorized'],
            ], 403);
        }

        if (!$this->adapter->exists($this->path)) {
            return $this->json([
                'data' => [],
            ], 200);
        }

        return $this->json([
            'data' => $this->adapter->get($this->path),
        ]);
    }

}
