<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        $berita = DB::table('berita')->leftJoin('kategori', 'berita.idkategori', '=', 'berita.idkategori')->orderBy('idberita', 'desc')->get();
        $data = [
            'title' => 'Home',
            'berita' => $berita
        ];
        return view('admin/beritadaftar', $data);
    }
    public function dashboard()
    {
        $jumlahberita = DB::table('berita')->Join('kategori', 'berita.idkategori', '=', 'kategori.idkategori')->orderBy('idberita', 'desc')->count();
        $jumlahadmin = DB::table('akuninternal')->where('level', 'Admin')->count();
        $jumlahkategori = DB::table('kategori')->count();
        $data = [
            'title' => 'Selamat Datang ' . session('akuninternal')->nama . ' Di Panel Web Berita',
            'jumlahberita' => $jumlahberita,
            'jumlahadmin' => $jumlahadmin,
            'jumlahkategori' => $jumlahkategori,
        ];
        return view('admin/dashboard', $data);
    }
    public function beritadaftar()
    {
        $berita = Berita::with('kategori')->orderByDesc('idberita')->get();
        $data = [
            'title' => 'Daftar Berita',
            'berita' => $berita,
        ];
        return view('admin.beritadaftar', $data);
    }

    public function beritatambah()
    {
        $kategori = Kategori::all();
        $data = [
            'title' => 'Tambah Berita',
            'kategori' => $kategori,
        ];
        return view('admin.beritatambah', $data);
    }

    public function beritatambahsimpan(Request $request)
    {
        $foto = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('foto'), $foto);

        Berita::create([
            'idkategori' => $request->input('idkategori'),
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'tanggal' => $request->input('tanggal'),
            'foto' => $foto,
        ]);

        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/beritadaftar');
    }

    public function beritaedit($id)
    {
        $kategori = Kategori::all();
        $berita = Berita::findOrFail($id);
        $data = [
            'title' => 'Edit Berita',
            'kategori' => $kategori,
            'row' => $berita,
        ];
        return view('admin.beritaedit', $data);
    }

    public function beritaeditsimpan(Request $request, $id)
    {
        $data = [
            'judul' => $request->input('judul'),
            'idkategori' => $request->input('idkategori'),
            'deskripsi' => $request->input('deskripsi'),
            'tanggal' => $request->input('tanggal'),
        ];

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto'), $foto);
            $data['foto'] = $foto;
        }

        Berita::where('idberita', $id)->update($data);

        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/beritadaftar');
    }

    public function beritahapus($id)
    {
        Berita::where('idberita', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('panel/beritadaftar');
    }

    public function kategoridaftar()
    {
        $kategori = Kategori::all();
        $data = [
            'title' => 'Daftar Kategori',
            'kategori' => $kategori,
        ];
        return view('admin.kategoridaftar', $data);
    }

    public function kategoritambah()
    {
        $data = [
            'title' => 'Tambah kategori',
        ];
        return view('admin.kategoritambah', $data);
    }

    public function kategoritambahsimpan(Request $request)
    {
        $kategori = $request->input('kategori');

        Kategori::create([
            'kategori' => $kategori,
        ]);

        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/kategoridaftar');
    }

    public function kategoriedit($id)
    {
        $row = Kategori::findOrFail($id);
        $data = [
            'title' => 'Edit kategori',
            'row' => $row,
        ];
        return view('admin.kategoriedit', $data);
    }

    public function kategorieditsimpan(Request $request, $id)
    {
        $kategori = $request->input('kategori');

        Kategori::where('idkategori', $id)->update([
            'kategori' => $kategori,
        ]);

        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/kategoridaftar');
    }

    public function kategorihapus($id)
    {
        Kategori::where('idkategori', $id)->delete();
        session()->flash('success', 'Berhasil menghapus data!');
        return redirect('panel/kategoridaftar');
    }
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
