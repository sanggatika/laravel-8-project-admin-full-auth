<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Session;

use Illuminate\Support\Facades\DB;

// Model Database
use App\Models\MsMenuModel;
use App\Models\MsAuthorizationModel;
use App\Models\V_menuAuthorizationModel;

class AuthBasicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Menampung User Session
        $UserLogin = session()->get('userLogin');
        
        // Menampung Data Route Name
        $uri_pathname = Route::currentRouteName();

        if($UserLogin != null)
        {
            $roleID = $UserLogin->admin_role;
            $roleAuthorization = V_menuAuthorizationModel::where('id_role', $roleID)->get();
            
            $tmpMenuID = [];
            $tmpMenuRoutename = ['adm.dash', ];

            foreach($roleAuthorization as $item)
            {
                array_push($tmpMenuID, $item['id_menu']);
                array_push($tmpMenuRoutename, $item['menu_routename']);
            }
            
            if(in_array($uri_pathname, $tmpMenuRoutename))
            {
                $request->dataMenuID = $tmpMenuID;
                $request->dataMenuRoutename = $tmpMenuRoutename;
                return $next($request);
            }else{
                abort(403);
            }            
        }else{
            return redirect()->route('auth.logout');
        }        
    }
}
