@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
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


        <div class="col-lg-12">
            <div class="result-card">
                <div class="">Nama Siswa : {{ $resultExam->user->name }}</div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="result-card">
                <div class="">Kelas : {{ $resultExam->kelas }}</div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="result-card">
                <div class="">Mata Pelajaran : {{ $resultExam->matpel }}</div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="result-card">
                <div class="">Benar : {{ $resultExam->benar }}</div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="result-card">
                <div class="">Salah : {{ $resultExam->salah }}</div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="result-card">
                <div class="">Overall : {{ $resultExam->overall }}</div>
            </div>
        </div>

        <div class="col-lg-12">
            @foreach (json_decode($resultExam->detail) as $key => $item)
            <div class="result-card">

                <p>{{ $key+1 }}. {{ $item->soal }}</p>

                @if($item->status === $item->correct)
                <p class="text-success">Status: {{ $item->status }}</p>
                <p class="text-success">Correct: {{ $item->correct }}</p>
                @else
                <p class="text-danger">Status: {{ $item->status }}</p>
                <p class="text-success">Correct: {{ $item->correct }}</p>
                @endif

                <p>Evaluasi: {{ $item->evaluasi }}</p>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection