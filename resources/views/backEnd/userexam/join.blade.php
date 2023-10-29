@extends('backEnd.index')
@section('content')


@include('backEnd.components.messageModal')
{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white  fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Ujian</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3">
        <form action="{{ route('proses.exam' ,$master->id) }}" method="POST">
            @csrf

            <input type="hidden" name="idSekarang" value="{{ $master->id }}">
            <input type="hidden" name="titleSekarang" value="{{ $master->title }}">
            <input type="hidden" name="kelasSekarang" value="{{ $master->kategori->name }}">

            @foreach ($addSoal as $key => $datas )
            <p>{{ $key+1 }} {{ $datas->soal }}</p>
            <ul class="list-unstyled">
                <li><input type="radio" name="opsi{{ $key+1 }}" value="{{ $datas->jawaban1 }}"> {{ $datas->jawaban1 }}
                </li>
                <li><input type="radio" name="opsi{{ $key+1 }}" value="{{ $datas->jawaban2 }}"> {{ $datas->jawaban2 }}
                </li>
                <li><input type="radio" name="opsi{{ $key+1 }}" value="{{ $datas->jawaban3 }}"> {{ $datas->jawaban3 }}
                </li>
            </ul>

            @endforeach

            <button type="submit" class="btn btn-primary text-13px">Submit</button>
        </form>
    </div>
</div>
@endsection