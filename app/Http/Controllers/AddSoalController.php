<?php

namespace App\Http\Controllers;

use App\Models\Master;
use App\Models\AddSoal;
use Illuminate\Http\Request;

class AddSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, Request $request)
    {

        $master = Master::find($id);

        // dd($master);

        $addSoal = AddSoal::where('master_id', $request->id)->get();
        return view('backEnd.soal.index', compact('master', 'addSoal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $master = Master::find($id);
        return view('backEnd.soal.create', compact('master'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $correctAnswer = request('correctAnswer');

        $opsiJawaban = [
            'jawaban1' => $request->input('jawaban1'),
            'jawaban2' => $request->input('jawaban2'),
            'jawaban3' => $request->input('jawaban3'),
        ];

        $correctAnswerText = $opsiJawaban[$correctAnswer];


        AddSoal::create([
            'master_id' => $request->idSekarang,
            'foto' => 'default.jpg',
            'soal' => $request->soal,
            'jawaban1' => $request->jawaban1,
            'jawaban2' => $request->jawaban2,
            'jawaban3' => $request->jawaban3,
            'correctAnswer' => $correctAnswerText,
            'evaluasi' => $request->evaluasi
        ]);

        return redirect(url('master/addSoal', $id))->with('success', 'berhasil menambah data exam');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddSoal $addSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddSoal $addSoal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddSoal $addSoal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        AddSoal::where('id', $request->idx)->delete();

        return redirect()->back()->with('success', 'berhasil menghapus soal');
    }
}
