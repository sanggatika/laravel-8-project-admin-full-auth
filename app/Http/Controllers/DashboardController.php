<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use Hash;
use Str;
use Session;


class DashboardController extends Controller
{  

    public function DashboardPage()
    {
        $titlePage = "Login";

        return view('main_contents.page_faq', [
            'titlePage' => $titlePage,
        ]);
    }
}
