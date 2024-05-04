<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::get();
        $totalpengeluaran = Pengeluaran::sum('jumlah');
        return view('dashboard.pengeluaran.index', compact('pengeluaran','totalpengeluaran'));
    }

    public function filter(Request $request)
    {
        $mulai = $request->input('mulai_tanggal');
        $sampai = $request->input('sampai_tanggal');

        $pengeluaran = Pengeluaran::whereBetween('tanggal_pengeluaran', [$mulai, $sampai])->get();
        $totalpengeluaran = $pengeluaran->sum('jumlah');
        return view('dashboard.pengeluaran.index', compact('pengeluaran','totalpengeluaran'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date'
        ]);

        Pengeluaran::create($validateData);
        // $request->session()->flash('success', 'Registration Successfull! Please login');
        return redirect('/dashboard/pengeluaran')->with('success', 'Add New Note Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('dashboard.pengeluaran.show',[
            'pengeluaran' => $pengeluaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('dashboard.pengeluaran.edit', [
            'pengeluaran' => $pengeluaran
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validateStore = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable',
            'jumlah' => 'required|numeric',
            'tanggal_pengeluaran' => 'required|date'
        ]);

        Pengeluaran::where('id', $pengeluaran->id)
                ->update($validateStore);
        return redirect('/dashboard/pengeluaran')->with('success', 'Note Updated Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $destroy = Pengeluaran::findOrFail($pengeluaran->id);
        $destroy->delete();
        return redirect('/dashboard/pengeluaran')->with('success', 'Note Deleted Successfull!');
    }
}
