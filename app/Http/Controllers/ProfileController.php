<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    
    public function index()
    {
        //mengambil data dari table
        $profile = DB::table('profile')->get();

        //mengirim data ke view
        return view('VProfile',['profile' =>$profile]);
    }

    public function tambah(Request $request)
    {
    	DB::table('profile')->insert([
			'kd_profile' => $request->kd_profile,
			'nama_profile' => $request->nama_profile,

		]);
		// alihkan halaman ke halaman berita
		return redirect('/berita');
 
    }

    public function hapus(Request $request)
    {
		$kd_berita=$request->kd_berita;
		DB::table('berita')->where('kd_berita',$kd_berita)->delete();

		// alihkan halaman ke halaman berita
		return redirect('/berita');
 
    }
}
