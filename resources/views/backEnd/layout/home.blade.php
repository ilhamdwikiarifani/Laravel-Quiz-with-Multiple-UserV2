@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Dashboard</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3">
        <h4 class="mt-3">Hello, <span class="text-primary">{{ Auth::user()->name }}🚀</span></h4>
        <p class="mt-3">Dashoard <code></code> The starting state of the menu will appear
            collapsed on
            smaller screens, and will appear
            non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
    </div>

    <div class="px-3 row">
        @foreach ($master as $key => $datas )
        <div class="col-lg-6">
            <div class="user-card">
                <div class="badge bg-primary mb-2">{{ $datas->kategori->name }}</div>
                <p>{{ $datas->title}}</p>


                @php
                $userCurrent = Auth::user()->id;
                $idCurrent = $datas->id;

                // user cek
                $checkApply = App\Models\UserExam::where('user_id', $userCurrent)->where('master_id',
                $idCurrent)->first();
                @endphp


                @if ($checkApply)
                <button type="button" class="btn btn-secondary" disabled>Anda Sudah mengambil Ujian ini</button>
                @else
                <div class="btn  border-0 bg-dark p-2 fw-normal"> <a href={{ url('dashboard', $datas->id) }}
                        class="text-decoration-none text-white">Apply Exams</a>
                </div>
                @endif


            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection