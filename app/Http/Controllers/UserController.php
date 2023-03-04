<?php

namespace App\Http\Controllers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'title' => 'User',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'title' => 'Tambah User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required',
            'password' => 'required|min:6|max:20|confirmed',
        ]);
        
        $user = new User();
        $user->id = Uuid::uuid4()->getHex();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        $user->password = Hash::make($request->password);
        $user->save();
        // $validatedData['password'] = Hash::make($validatedData['password']);
        // User::create($validatedData);
        return redirect()->route('users.index')->with('success','User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'title' => 'Edit User',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required',
        ];

        $validatedData = $request->validate($rules);
        User::find('id', $user->id)->update($validatedData);
        return redirect()->route('users.index')->withToastSuccess('User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd($user->kajian_pasiens()->count());
        User::destroy($user->id);
        return redirect()->route('users.index')->with('success','User Berhasil Dihapus');;
    }
}
