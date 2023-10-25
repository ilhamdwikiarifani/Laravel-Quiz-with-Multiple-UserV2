@extends('backEnd.index')
@section('content')


@include('backEnd.components.messageModal')
{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            {{ Auth::user()->name }} - Exams </button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3 row">

        @if ($userExam->count() > 0)
        @foreach ($userExam as $key => $datas )
        <div class="col-lg-6">
            <div class="user-card">
                <div class="badge bg-danger mb-2">{{$datas->master->kategori->name }}</div>
                <p>{{ $datas->master->title }}</p>

            </div>
            <div class="user-card-bottom">
                <div>{{ $datas->created_at}}</div>
                <div class="btn-apply ">
                    <a href={{ url('user-exam', $datas->master->id) }}
                        >Masuk Ujian</a>
                </div>

            </div>
        </div>

        @endforeach
        @else
        <div>Tidak Ada ujian Yang dipilih</div>
        @endif
    </div>
</div>
@endsection