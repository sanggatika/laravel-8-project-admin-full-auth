<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsStaffModel extends Model
{
    use HasFactory;

    protected $table = 'm_staff';
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['admin_id', 'admin_role', 'admin_username', 'admin_email', 'admin_password', 'admin_nama', 'admin_foto', 'admin_instansi', 'admin_layanan', 'admin_status', 'admin_visible', 'last_login', 'hard_delete'];
}
