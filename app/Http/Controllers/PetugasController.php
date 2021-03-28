<?php

namespace App\Http\Controllers;

use App\Petugas;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();

        return view('admin.petugas.index',['petugas' => $petugas]);
    }

    public function tambahpetugas()
    {
        $petugas = Petugas::all();

        return view('admin.petugas.tambah',['petugas' => $petugas]);
    }

   
    public function loginformpetugas()
    {
        return view('petugas.loginpetugas');
    }

    public function loginpetugas(Request $request)
    {
        $username = petugas::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai!']);
        }

        $auth = Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]);

        if ($auth) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar']);
        }
    }

    public function create()
    {
        return view('Admin.Petugas.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'nama_petugas' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:petugas'],
            'password' => ['required', 'string', 'min:6'],
            'telp' => ['required'],
            'level' => ['required', 'in:admin,petugas'],
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $username = Petugas::where('username', $data['username'])->first();

        if ($username) {
            return redirect()->back()->with(['notif' => 'Username sudah digunakan!']);
        }

        Petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        return redirect()->route('petugas.index');
    }

    public function edit($id_petugas)
    {
        $petugas = petugas::where('id_petugas', $id_petugas)->first();

        return view('Admin.Petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Request $request, $id_petugas)
    {
        $data = $request->all();

        $petugas = petugas::find($id_petugas);

        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        return redirect()->route('petugas.index');
    }

    public function destroy($id_petugas)
    {
        $petugas = petugas::findOrFail($id_petugas);

        $tanggapan = tanggapan::where('id_petugas', $id_petugas)->first();

        if (!$tanggapan) {
            $petugas->delete();

            return redirect()->route('petugas.index');
        } else {
            return redirect()->back()->with(['notif' => 'Can\'t delete. Petugas has a relationship!']);
        }
    }
}
