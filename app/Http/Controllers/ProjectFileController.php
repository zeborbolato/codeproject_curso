<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;

class ProjectFileController extends Controller
{
    /**
     * @var ProjectService
     */
    private $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request, $id)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data = [
            'project_id' => $id,
            'name' => $request->name,
            'file' => $file,
            'extension' => $extension,
            'description' => $request->description
        ];

        $this->service->createFile($data);

    }

}
