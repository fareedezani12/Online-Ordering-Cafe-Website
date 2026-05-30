<?php
namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function home()
    {

        $menus = Menu::all();
        return view('landing.home', compact('menus'));

    }

    public function menu()
    {

        $menus = Menu::all();
        return view('landing.menu', compact('menus'));

    }
}
