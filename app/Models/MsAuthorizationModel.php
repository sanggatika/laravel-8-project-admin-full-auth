<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsAuthorizationModel extends Model
{
    use HasFactory;

    protected $table = 'm_authorization';
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_role', 'id_menu', 'authorization_code', 'authorization_view', 'authorization_create', 'authorization_update', 'authorization_delete', 'created_by'];
}
