<?php

namespace App\Http\Controllers;

use App\Models\Akuninternal;
use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Beranda',
        ];
        return view('beranda', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }
    public function logincek(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $akun = Akuninternal::where('email', $email)
            ->where('password', $password)
            ->first();

        if ($akun) {
            session(['akuninternal' => $akun]);
            return redirect('panel/dashboard')->with('success', 'Login berhasil');
        } else {
            return redirect()->back()->with('success', 'Anda gagal login, Email atau password salah');
        }
    }
    public function beritadaftar()
    {
        $berita = Berita::join('kategori', 'berita.idkategori', '=', 'kategori.idkategori')
            ->orderByDesc('idberita')
            ->paginate(3);
        $data = [
            'title' => 'Daftar Berita',
            'berita' => $berita
        ];
        return view('beritadaftar', $data);
    }

    public function beritadetail($id)
    {
        $row = Berita::select('berita.*', 'kategori.kategori as nama_kategori')
            ->join('kategori', 'berita.idkategori', '=', 'kategori.idkategori')
            ->where('idberita', $id)
            ->first();
        $data = [
            'title' => 'Detail Berita',
            'row' => $row,
        ];
        return view('beritadetail', $data);
    }
}
