@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white  fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Detail - Exams </button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('result-exam') }}><i
                class="fa-solid fa-chevron-left me-2"></i>
            <span class="d-none d-lg-inline-block">Kembali</span></a>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3 row">
        {{--
        {{ dd($resultExam); }} --}}


        <div class="mb-2 ms-2">
            <h6>Profil</h6>
        </div>

        <div class="col-lg-12">
            <div class="result-card">
                <div class=""><span class="fw-bolder">Nama Siswa :</span> {{ $resultExam->user->name }}</div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="result-card">
                <div class=""><span class="fw-bolder">Kelas :</span> {{ $resultExam->kelas }}</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="result-card">
                <div class=""><span class="fw-bolder">Mata Pelajaran :</span>{{ $resultExam->matpel }}</div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="result-card">
                <div class=""><span class="fw-bolder">Benar :</span> {{ $resultExam->benar }}</div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="result-card">
                <div class=""><span class="fw-bolder">Salah :</span> {{ $resultExam->salah }}</div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="result-card">
                <div class=""><span class="fw-bolder">Overall :</span> {{ $resultExam->overall }}</div>
            </div>
        </div>

        <div class="mt-4 mb-2 me-2">
            <h6>Ulasan</h6>
        </div>

        <div class="col-lg-12">
            @foreach (json_decode($resultExam->detail) as $key => $item)
            <div class="user-card">

                <p>{{ $key+1 }}. {{ $item->soal }}</p>

                @if($item->status === $item->correct)
                <li class="text-success"><span class="fw-bold">Jawaban Kamu :</span> {{ $item->status }}</li>
                <li class="text-success"><span class="fw-bolder">Correct :</span> {{ $item->correct }}</li>
                @else
                <li class="text-danger"><span class="fw-bold">Jawaban Kamu :</span> {{ $item->status }}</li>
                <li class=" text-success"><span class="fw-bolder">Correct :</span> {{ $item->correct }}</li>
                @endif
            </div>

            @if($item->status === $item->correct)
            <div class="user-card-bottom bg-success text-white">
                <div><span class="fw-bolder">Evaluasi :</span> {{ $item->evaluasi }}</div>
            </div>
            @else
            <div class="user-card-bottom bg-danger text-white">
                <div><span class="fw-bolder">Evaluasi :</span> {{ $item->evaluasi }}</div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</div>
@endsection