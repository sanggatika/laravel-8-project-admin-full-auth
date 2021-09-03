<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Session;

// Model Database
use App\Models\MsMenuModel;
use App\Models\MsAuthorizationModel;

class MainmenuComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tmpMenuRole = null;
    public function __construct(Request $request)
    {
        // Menampung Hasil Dari Middelware
        $this->tmpMenuRole = $request->dataMenuID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {      
        $MenuRole = $this->tmpMenuRole;

        $ms_menu = MsMenuModel::where('menu_visible', 1)
        ->whereIn('id', $MenuRole)
        ->orderBy('menu_sort')->get();

        $collection = collect($ms_menu);
        $grup_menu = $collection->groupBy('menu_grup');

        //dd($grup_menu);
        return view('components.mainmenu-component', [
            'Ms_MainMenu' => $ms_menu,
            'Grup_menu' => $grup_menu
        ]);
    }
}
