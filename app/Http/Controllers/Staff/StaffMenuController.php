<?php
namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class StaffMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();

        return view('staff.menu.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {

            $image     = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

        }

        $request->validate([
            'name'        => 'required|max:255',
            'description' => 'required',
            'price'       => 'required|numeric|min:0',
            'category'    => 'required',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        Menu::create([

            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category'    => $request->category,
            'image'       => $imageName,

        ]);

        return redirect('staff/menu')
            ->with('success', 'Menu added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);

        return view('staff.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $menu      = Menu::findOrFail($id);
        $imageName = $menu->image;

        if ($request->hasFile('image')) {

            $image     = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

        }

        $menu->update([

            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'category'    => $request->category,
            'image'       => $imageName,

        ]);

        return redirect('staff/menu');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect('staff/menu');
    }
}
