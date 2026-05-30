<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::latest()->get();

        return view(
            'admin.promotions.index',
            compact('promotions')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'               => 'required',
            'discount_percentage' => 'required|numeric|min:1|max:100',
            'start_date'          => 'required',
            'end_date'            => 'required',
        ]);

        Promotion::create([

            'title'               => $request->title,
            'description'         => $request->description,
            'discount_percentage' => $request->discount_percentage,
            'members_only'        => $request->has('members_only'),
            'start_date'          => $request->start_date,
            'end_date'            => $request->end_date,

        ]);

        return redirect('admin/promotions');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
