<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServerRequest;
use App\Http\Requests\UpdateServerRequest;
use App\Http\Resources\ServerResource;
use App\Models\Server;
use App\Services\ServerService;

class ServerController extends Controller
{
    public function __construct(
        private ServerService $serverService
    ) {}

    public function index()
    {
        $servers = Server::query()->paginate(20);

        return ServerResource::collection($servers);
    }

    public function store(StoreServerRequest $request)
    {
        $server = $this->serverService->create(
            $request->user(),
            $request->validated()
        );

        return new ServerResource($server);
    }

    public function show(Server $server)
    {
        $this->authorize('view', $server);

        return new ServerResource($server);
    }

    public function update(UpdateServerRequest $request, Server $server)
    {
        $server = $this->serverService->update(
            $server,
            $request->validated()
        );

        return new ServerResource($server);
    }

    public function destroy(Server $server)
    {
        $this->authorize('delete', $server);

        $this->serverService->delete($server);

        return response()->noContent();
    }
}
