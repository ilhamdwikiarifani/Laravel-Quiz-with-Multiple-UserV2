@extends('backEnd.index')

@section('content')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Create Something</button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('master') }}><i
                class="fa-solid fa-chevron-left me-2"></i>
            <span class="d-none d-lg-inline-block">Kembali</span></a>
    </div>
</div>
<div class="container  bg-white border p-3 py-4 rounded-bottom" style="margin-top: -1px">
    <form action="{{ route('master.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row px-2">

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Name Something</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="title" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Optins</label>
                <select class="form-select" name="kategori_id">
                    @foreach ($kategori as $datas)

                    @if (old('kategori_id') === $datas->id)
                    <option value="{{ $datas->id }}" selected>{{ $datas->name }}</option>
                    @else
                    <option value="{{ $datas->id }}">{{ $datas->name }}</option>
                    @endif

                    @endforeach
                </select>
                @error('kategori_id')
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