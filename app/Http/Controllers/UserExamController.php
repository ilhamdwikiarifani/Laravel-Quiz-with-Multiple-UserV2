<?php

namespace App\Http\Controllers;


use App\Models\Master;
use App\Models\AddSoal;
use App\Models\UserExam;
use App\Models\ResultExam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserExamController extends Controller
{

    // Appply Exam 
    public function apply_index(Request $request)
    {
        $master = Master::with('kategori')->latest()->get();

        // User siswa Count

        $userCount = User::with('role')->where('role_id', 1)->count();

        return view("backEnd.layout.home", compact('master', 'userCount'));
    }


    // Buat apply data ngawe nampung data apply

    public function apply_exam(Request $request, $id, Master $master)
    {

        $userCurrent = Auth::user()->id;
        $idCurrent = $id;

        // user cek
        $checkApply = UserExam::where('user_id', $userCurrent)->where('master_id', $idCurrent)->first();

        if ($checkApply) {
            return redirect()->back()->with('error', 'Anda Sudah mengambil Ujian ini');
        }

        UserExam::create([
            'user_id' => $userCurrent,
            'master_id' => $idCurrent,
        ]);

        return redirect('user-exam')->with('success', 'Berhasil Accept ujian');
    }


    // Join User Exam
    public function index(Request $request)
    {
        $userExam = UserExam::with('user', 'master')->where('master_join', 1)->where('user_id', Auth::user()->id)->get();
        return view("backEnd.userexam.index", compact('userExam'));
    }

    public function join_exam($id, Request $request)
    {
        $master = Master::find($id);
        $addSoal = AddSoal::where('master_id', $request->id)->get();
        return view('backEnd.userexam.join', compact('master', 'addSoal'));
    }

    public function proses_exam($id, Request $request, AddSoal $addSoal)
    {

        $hasilTrue = 0;
        $hasilFalse = 0;


        $addSoal = AddSoal::where('master_id', $request->id)->get();

        for ($i = 1; $i <= $addSoal->count(); $i++) {
            $status[] = $request->input("opsi$i");
        }

        foreach ($addSoal as $key => $datas) {
            $correct[] = $datas->correctAnswer;
            $evaluasi[] = $datas->evaluasi;
            $soal[] = $datas->soal;

            if ($status[$key] === $correct[$key]) {
                $hasilTrue++;
            } else {
                $hasilFalse++;
            }

            $ket[] = array(
                'soal' => $soal[$key],
                'status' => $status[$key],
                'correct' => $correct[$key],
                'evaluasi' => $evaluasi[$key]
            );
        }


        $userCurrent = Auth::user()->id;
        $idCurrent = $request->idSekarang;
        $examCurrent = $request->titleSekarang;
        $kelasCurrent = $request->kelasSekarang;
        $overall = $hasilTrue . "/" . $hasilTrue + $hasilFalse;

        $ketJson = json_encode($ket);

        $userExam = UserExam::where('user_id', $userCurrent)->where('master_id', $idCurrent)->first();

        if ($userExam) {
            $userExam->master_join = 2;
            $userExam->save();
        }

        ResultExam::create([
            'user_id' => $userCurrent,
            'kelas' => $kelasCurrent,
            'matpel' => $examCurrent,
            'benar' => $hasilTrue,
            'salah' => $hasilFalse,
            'overall' => $overall,
            'detail' => $ketJson,
            'status' => "1"
        ]);


        return redirect(url('result-exam'))->with('success', 'Berhasil mengsubmit Jawaban');
    }


    public function result_index()
    {
        $resultExam = ResultExam::with('user')->latest()->get();
        return view("backEnd.userexam.result", compact('resultExam'));
    }

    public function result_detail($id)
    {
        $resultExam = ResultExam::with('user')->find($id);
        return view("backEnd.userexam.detail", compact('resultExam'));
    }

    public function result_destroy(Request $request)
    {
        ResultExam::where('id', $request->idx)->delete();

        return redirect()->back()->with('success', 'berhasil menghapus result Exam');
    }
}
