<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\Kategori;
use App\Models\UserExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $master = Master::with('kategori')->get();
        return view('backEnd.master.index', compact('master'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view('backEnd.master.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'title' => 'required',
        ]);

        Master::create([
            'kategori_id' => $request->kategori_id,
            'title' => $request->title,
            'status' => "1",
        ]);



        return redirect('master')->with('success', 'berhasil menambahkan data master');
    }

    /**
     * Display the specified resource.
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master $master)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Master $master)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Master::where('id', $request->idx)->delete();

        return redirect()->back()->with('success', 'berhasil mengghapus data master');
    }
}
