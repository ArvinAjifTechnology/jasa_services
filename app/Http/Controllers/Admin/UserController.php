<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'username' => ['required', 'string', Rule::unique('users')],
            'email' => ['required', 'email', Rule::unique('users')],
            'role' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/users/create')
                ->withErrors($validator)
                ->withInput();
        }
    // dd($request->all());
       $user = new User($request->all());
       $user->password = bcrypt($request->email);
       $user->email_verified_at = now();
       $user->save();

        return redirect('admin/users/')->withErrors($validator)->with('status', 'Selamat Data Berhasil Di Tambahkan')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'username' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', 'string'],
            'gender' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect('/admin/users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $user->update($request->all());

        return redirect('/admin/users')->withErrors($validator)->withSuccess('Selamat Data Berhasil Di Update')->with('status', 'Selamat Data Berhasil Di Update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();


        $redirectPath = Gate::allows('admin') ? '/admin/users' : (Gate::allows('operator') ? '/oprator/users' : abort(403, 'Unauthorized'));

        return redirect($redirectPath)->with('status', 'Data berhasil Di Hapus');
    }

    public function resetPassword(User $user)
    {
        // Generate a new password
        $newPassword = 'jasa_services@kelompok1';

        // Update the user's password
        $user->password = Hash::make($newPassword);
        $user->save();

        // Send an email or notification to the user with the new password

        return redirect()->back()->with('status', 'Password has been reset successfully.');
    }
}
