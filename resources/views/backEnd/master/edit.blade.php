@extends('backEnd.index')

@section('content')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Edit Something</button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('template') }}><i
                class="fa-solid fa-chevron-left me-2"></i>
            <span class="d-none d-lg-inline-block">Kembali</span></a>
    </div>
</div>
<div class="container  bg-white border p-3 py-4 rounded-bottom" style="margin-top: -1px">
    <form action=" " method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row px-2">

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Name Something</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Optins</label>
                <select class="form-select" name="">
                    <option value="option_1" selected>Opsi 1</option>
                    <option value="option_2" selected>Opsi 2</option>
                    <option value="option_3" selected>Opsi 3</option>
                </select>
                @error('')
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