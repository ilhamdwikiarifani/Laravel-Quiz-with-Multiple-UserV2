@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white  fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Dashboard</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-4" style="margin-top: -1px; ">
    <div class="row px-3">
        <div class="col-lg-4 mx-0">
            <div class="user-card d-flex justify-content-center align-items-center">
                <div class="mx-auto">
                    <div class="profil-wraper overflow-hidden mx-auto">
                        <img src="https://sman93jkt.sch.id/wp-content/uploads/2018/01/765-default-avatar.png" alt=""
                            style="object-fit: cover" width="100%">
                    </div>

                    <div class="mt-3 text-center fw-bold">{{ Auth::user()->name }}</div>
                    <div class="text-center" style="font-size:11px;">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="user-card-bottom bg-white py-2 d-flex justify-content-center align-items-center"
                style="margin-top: -1px">
                <div class="px-5 py-1 bg-gray d-inline-block rounded  text-11px border-gray fw-semibold">{{
                    Auth::user()->role->name
                    }}</div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="px-3 row pb-4 ">


                @can('admin')

                <p class="mt-2 fw-bold"><i class="fa-regular fa-eye me-1"></i> Status</p>

                <div class="col-lg-6 px-1 ">
                    <div class="user-card"
                        style="background: rgb(106,82,170);
background: linear-gradient(45deg, rgba(106,82,170,1) 9%, rgba(79,59,134,1) 57%, rgba(120,100,175,1) 78%, rgba(130,110,185,1) 86%);">
                        <div class="mb-2 text-white">Total Murid</div>
                        <h3 class="fw-bold text-white">+{{ $userCount }}</h3>
                    </div>
                    <div class="user-card-bottom bg-white">
                        <div style="font-size: 13px"><i class="fa-solid fa-users-rectangle"></i></div>
                        <p class="m-0 text-danger" style="font-size: 12px">Jumlah siswa di aplikasi.</p>
                    </div>
                </div>
                <div class="col-lg-6 px-1 ">
                    <div class="user-card"
                        style="background: rgb(82, 170, 136);
background: linear-gradient(45deg, rgb(82, 170, 129) 9%, rgb(59, 134, 105) 57%, rgb(100, 175, 134) 78%, rgb(110, 185, 129) 86%);">
                        <div class="mb-2 text-white">Total Ujian</div>
                        <h3 class="fw-bold text-white">+{{ $master->count() }}</h3>
                    </div>
                    <div class="user-card-bottom bg-white">
                        <div style="font-size: 13px"><i class="fa-solid fa-check"></i></div>
                        <p class="m-0 text-danger" style="font-size: 12px">Jumlah ujian yang aktif.</p>
                    </div>
                </div>

                <hr class="mt-3"
                    style="border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.50), rgba(0, 0, 0, 0));">

                @endcan


                <p class="mt-3 fw-bold"><i class="fa-solid fa-hashtag me-1"></i> Ujian Aktif</p>
                @foreach ($master as $key => $datas )
                <div class="col-lg-6 px-1 ">
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

                        @if ($checkApply)
                        <p class="m-0 text-danger" style="font-size: 10px">Anda Sudah mengambil Ujian ini
                        </p>
                        @else
                        <div style="font-size: 10px">{{ $datas->created_at->diffForHumans()}}</div>
                        <div class="btn-apply " style="font-size: 10px">
                            <a href={{ url('dashboard', $datas->id) }}
                                ><i class="fa-solid fa-check me-2"></i>Join Ujian</a>
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