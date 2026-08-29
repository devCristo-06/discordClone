<?php

namespace App\Services;

use App\Models\Server;
use App\Models\User;

class ServerService
{
    public function create(User $user, array $data): Server
    {
        return Server::create([
            'owner_id' => $user->id,
            ...$data,
        ]);
    }

    public function update(Server $server, array $data): Server
    {
        $server->update($data);

        return $server->refresh();
    }

    public function delete(Server $server): void
    {
        $server->delete();
    }
}
