<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsRoleModel extends Model
{
    use HasFactory;

    protected $table = 'm_role';
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['role_code', 'role_nama', 'role_status', 'updated_by'];
}
