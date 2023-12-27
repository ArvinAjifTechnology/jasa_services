<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeOfService;
use Illuminate\Http\Request;

class TypeOfServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typeOfServices = TypeOfService::all();
        return view('admin.type-of-services.index', compact('typeOfServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type-of-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_of_service' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        TypeOfService::create([
            'type_of_service' => $request->type_of_service,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.type-of-services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeOfService $typeOfService)
    {
        return view('admin.type-of-services.show', compact('typeOfService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeOfService $typeOfService)
    {
        return view('admin.type-of-services.edit', compact('typeOfService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeOfService $typeOfService)
    {
        $request->validate([
            'type_of_service' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $typeOfService->update([
            'type_of_service' => $request->type_of_service,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.type-of-services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeOfService $typeOfService)
    {
        $typeOfService->delete();
        return redirect()->route('admin.type-of-services.index')->with('success', 'Service deleted successfully.');
    }
}
