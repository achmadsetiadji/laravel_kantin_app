<?php

namespace App\Http\Controllers;

use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'level' => $request->level,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/user')->with('status', 'Data ' . $request->name . ' Berhasil Ditambahkan!');
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
        return view('user/edit', compact('user'));
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
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::where('id_user', $user->id_user)
            ->update([
                'level' => $request->level,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        return redirect('/user')->with('status', 'Data ' . $request->name . ' Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id_user);
        return redirect('/user')->with('statusDelete', 'Data Berhasil Dihapus!');
    }

    public function pdfpreviewuser(Request $request)
    {
        $users = User::all();
        $pdf = 'PDF'::loadView('user/pdfpreview', compact('users'));
        return $pdf->stream();
    }
}
