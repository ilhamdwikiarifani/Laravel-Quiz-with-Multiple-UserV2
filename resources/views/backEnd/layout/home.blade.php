@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Dashboard</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-4" style="margin-top: -1px; ">


    <div class="row px-3">
        <div class="col-lg-4 mx-0">
            <div class="user-card d-flex justify-content-center align-items-center">
                <div> {{-- Point --}}
                    <div class="position-relative">
                        <div class="profil-wraper">
                            <img src="" alt="">
                        </div>
                        <div class="position-absolute px-2 py-1 bg-warning text-dark rounded"
                            style="right: 5px;  bottom:15px; font-size:9px;">
                            {{ Auth::user()->role->name }}
                        </div>
                    </div>
                    <div class="mt-3 text-center fw-bold">{{ Auth::user()->name }}</div>
                    <div class="text-center" style="font-size:11px;">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="user-card rounded-0 py-2" style="margin-top: -1px">
                <div>Nama</div>
            </div>
            <div class="user-card rounded-0 py-2" style="margin-top: -1px">
                <div>kelas</div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="px-3 row pb-4 ">

                <div class="col-lg-12 px-1">
                    <div class="  mt-4 mt-lg-0 user-card rounded mb-4 text-13px py-3 text-primary"
                        style="background: rgb(237, 243, 255)">
                        <div>Selamat Datang, <span class="fw-bold">{{
                                Auth::user()->name }}</span> !</div>
                        <div style="font-size:10px;">Di <span class="fw-bold">codenekoQuiz</span> -
                            nekoserve™</div>
                    </div>
                </div>

                @foreach ($master as $key => $datas )

                <div class="col-lg-6 px-1">
                    <div class="user-card">
                        <div class="badge bg-danger mb-2">{{ $datas->kategori->name }}</div>
                        <p>{{ $datas->title}}</p>
                    </div>
                    <div class="user-card-bottom">
                        @php
                        $userCurrent = Auth::user()->id;
                        $idCurrent = $datas->id;

                        // user cek
                        $checkApply = App\Models\UserExam::where('user_id', $userCurrent)->where('master_id',
                        $idCurrent)->first();
                        @endphp

                        <div style="font-size: 10px">{{ $datas->created_at->diffForHumans()}}</div>

                        @if ($checkApply)
                        <p class="m-0 text-danger" style="font-size: 10px">Anda Sudah mengambil Ujian ini</p>
                        @else
                        <div class="btn-apply ">
                            <a href={{ url('dashboard', $datas->id) }}
                                >Apply Exams</a>
                        </div>
                        @endif
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>





</div>
@endsection