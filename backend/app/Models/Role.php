<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    // Caratteristiche della tabella
    protected $fillable = [
        'name',
        'priority',
        'color'
    ];

    // -----------------------------------
    // INVIO RELAZIONI TRA RUOLI E TABELLE
    // -----------------------------------

    // Relazione 1:M con il pivot tra ruoli e permessi
    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }

    // Relazione 1:M con i membri del server
    public function server_members()
    {
        return $this->hasMany(ServerMember::class, 'role_id');
    }

    // -------------------------------------
    // RITORNO RELAZIONI TRA RUOLI E TABELLE
    // -------------------------------------

    // Relazione M:M con il pivot tra ruoli e permessi
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'role_permissions',
            'role_id',
            'permission_id'
        );
    }
}
