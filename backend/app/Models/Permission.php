<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    // Caratteristiche della tabella
    protected $fillable = [
        'name',
        'slug'
    ];


    // --------------------------------------
    // INVIO RELAZIONI TRA PERMESSI E TABELLE
    // --------------------------------------

    // Relazione 1:M con il pivot tra permessi e ruoli
    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class, 'permission_id');
    }

    // ----------------------------------------
    // RITORNO RELAZIONI TRA PERMESSI E TABELLE
    // ----------------------------------------

    // Relazione M:M con il pivot tra ruoli e permessi
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'role_permissions',
            'permission_id',
            'role_id'
        );
    }
}
