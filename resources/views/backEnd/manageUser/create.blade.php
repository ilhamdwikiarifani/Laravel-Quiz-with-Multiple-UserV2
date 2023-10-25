@extends('backEnd.index')

@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Create Manage User</button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('manage-user') }}><i
                class="fa-solid fa-chevron-left me-2"></i>
            <span class="d-none d-lg-inline-block">Kembali</span></a>
    </div>
</div>
<div class="container  bg-white border p-3 py-4 rounded-bottom" style="margin-top: -1px">
    <form action={{ route('manage-user.store') }} method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row px-2">
            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Role</label>
                <select class="form-select" name="role_id">
                    @foreach ($role as $datas)

                    @if (old('role_id') == $datas->id)
                    <option value="{{ $datas->id }}" selected>{{ $datas->name }}</option>
                    @else
                    <option value="{{ $datas->id }}">{{ $datas->name }}</option>
                    @endif

                    @endforeach
                </select>
                @error('role_id')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Masukan Nama" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Masukan Email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Masukan Password" name="password"
                    value="{{ old('password') }}">
                @error('password')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
@endsection