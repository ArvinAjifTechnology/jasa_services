<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\UserMotorcycle;
use App\Http\Controllers\Controller;

class UserMotorcycleController extends Controller
{
    public function index()
    {
        $userMotorcycles = UserMotorcycle::all();
        return view('user.user-motorcycles.index', compact('userMotorcycles'));
    }

    public function create()
    {
        return view('user.user-motorcycles.create');
    }

    public function store(Request $request)
    {
        UserMotorcycle::create($request->all());
        return redirect()->route('user.user-motorcycles.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(UserMotorcycle $userMotorcycle)
    {
        return view('user.user-motorcycles.show', compact('userMotorcycle'));
    }

    public function edit(UserMotorcycle $userMotorcycle)
    {
        return view('user.user-motorcycles.edit', compact('userMotorcycle'));
    }

    public function update(Request $request, UserMotorcycle $userMotorcycle)
    {
        $userMotorcycle->update($request->all());
        return redirect()->route('user.user-motorcycles.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(UserMotorcycle $userMotorcycle)
    {
        $userMotorcycle->delete();
        return redirect()->route('user.user-motorcycles.index')->with('success', 'Data berhasil dihapus!');
    }
}
