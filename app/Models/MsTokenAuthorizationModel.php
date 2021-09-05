<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsTokenAuthorizationModel extends Model
{
    use HasFactory;

    protected $table = 'm_tokenauthorization';
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['id_user', 'token_authorization', 'token_status'];
}