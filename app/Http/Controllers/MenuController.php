<?php
namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function home()
    {

        $menus = Menu::query();

        if (request('category')) {

            $menus->where(
                'category',
                request('category')
            );

        }

        if (request('search')) {

            $menus->where(
                'name',
                'like',
                '%' . request('search') . '%'
            );

        }

        $menus = $menus->paginate(8);
        return view('landing.home', compact('menus'));

    }

    public function menu()
    {

        $menus = Menu::query();

        if (request('category')) {

            $menus->where(
                'category',
                request('category')
            );

        }

        if (request('search')) {

            $menus->where(
                'name',
                'like',
                '%' . request('search') . '%'
            );

        }

        $menus = $menus->paginate(8);
        return view('landing.menu', compact('menus'));

    }
}
