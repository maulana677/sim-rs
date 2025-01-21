<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('can:manage patients')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('can:view patients')->only(['index', 'show']);
    }

    public function index()
    {
        $pasiens = Pasien::latest()->paginate(10);
        return view('admin.pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'no_identitas' => 'required|string|max:20|unique:pasiens,no_identitas',
        ]);

        $pasien = new Pasien();
        $pasien->nama = $request->nama;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->email = $request->email;
        $pasien->no_identitas = $request->no_identitas;
        $pasien->save();

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil didaftarkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('admin.pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'no_identitas' => "required|string|max:20|unique:pasiens,no_identitas,{$id}",
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->nama = $request->nama;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->email = $request->email;
        $pasien->no_identitas = $request->no_identitas;
        $pasien->save();

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->delete();

            return response(['status' => 'success', 'message' => 'Data pasien berhasil dihapus!']);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => 'Terjadi kesalahan saat menghapus data pasien!']);
        }
    }
}
