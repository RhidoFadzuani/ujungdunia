<?php

namespace App\Http\Controllers;



use App\Masyarakat;
use App\Pengaduan;
use App\Kecamatan;
use App\Desa;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
 
    
    public function pengaduan()
    {
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $laporan = pengaduan::all()->count();

        return view('user.pengaduan', ['laporan' => $laporan,'kecamatan' => $kecamatan,'desa' => $desa]);
    }

    public function GetSubCatAgainstMainCatEdit($id){
        return response()->json(desa::where('id_provinsi', $id)->get());
    }
    
    
    public function formLogin()
    {
        return view('auth.login');
    }

    public function formdaftar()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $username = masyarakat::where('username', $request->username)->first();

        if (!$username) {
            return redirect()->back()->with(['pesan' => 'Username tidak terdaftar']);
        }

        $password = Hash::check($request->password, $username->password);

        if (!$password) {
            return redirect()->back()->with(['pesan' => 'Password tidak sesuai!']);
        }

        $auth = Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password]);

        if ($auth) {
            return redirect()->route('home1');
        } else {
            return redirect()->back()->with(['pesan' => 'Akun tidak terdaftar']);
        }
    }

    
    public function logout(Request $request) {
            Auth::guard('user')->logout();
            return redirect()->route('home1');;
          }
   
    public function register(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $validate = Validator::make($data, [
            'nik' => ['required','unique:masyarakat','max:16'],
            'nama' =>['required'], 
            'username' =>['required'],
            'password' =>['required'],
             'telp'=>['required'],
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate->errors());
        }

        Masyarakat::create($data);

        return redirect()->route('home1');
    }
}


