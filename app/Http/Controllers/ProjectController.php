<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;
use CodeProject\Http\Requests;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->findWhere(['owner_id' => Authorizer::getResourceOwnerId()]);
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function update(Request $request, $id)
    {
        if ($this->checkProjectOwner($id))
        {
            return $this->repository->find($id);
        }
        $this->service->update($request->all(), $id);
    }

    public function show($id)
    {
        if ($this->checkProjectPermissions($id))
        {
            return $this->repository->find($id);
        }
        return ['error' => 'Access forbiden'];
    }

    public function destroy($id)
    {
        if ($this->checkProjectOwner($id))
        {
            return $this->repository->find($id);
        }
        $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($projectId, $userId);
    }

    private function checkProjectMember($projectId)
    {
        $userId = Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($projectId, $userId);
    }

    private function checkProjectPermissions($projectId)
    {
        return $this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId);
    }

}
