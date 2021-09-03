<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsMenuModel extends Model
{
    use HasFactory;

    protected $table = 'm_menu';
    protected $primaryKey = 'id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = ['menu_parent', 'menu_kode', 'menu_title', 'menu_url', 'menu_routename', 'menu_grup', 'menu_icon', 'menu_new_tab', 'menu_desc', 'menu_sort', 'menu_sort_header', 'menu_visible', 'menu_status', 'menu_exclude', 'created_by'];
}
