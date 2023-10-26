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
        <h4 class="mt-3"><span style="font-size: 17px">Hello,</span> <span class="text-primary">{{ Auth::user()->name
                }}🚀</span></h4>
        <p class="mt-3">Dashboard <code class="mx-1">{{ Auth::user()->role->name }}</code> The starting state of the
            menu
            will appear
            collapsed on
            smaller screens, and will appear
            non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
    </div>



    <div class="px-3 row pb-4">
        @foreach ($master as $key => $datas )
        <div class="col-lg-6">
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

                <div>{{ $datas->created_at}}</div>

                @if ($checkApply)
                <p class="m-0 text-danger">Anda Sudah mengambil Ujian ini</p>
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
@endsection