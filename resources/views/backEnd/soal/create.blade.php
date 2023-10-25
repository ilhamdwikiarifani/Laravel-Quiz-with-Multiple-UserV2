@extends('backEnd.index')

@section('content')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Buat Soal {{ $master->title }}</button>
        <a class="btn btn-primary me-3 me-lg-0 text-13px" href={{ url('master/addSoal', $master->id) }}><i
                class="fa-solid fa-chevron-left me-lg-2"></i>
            <span class="d-none d-lg-inline-block">Kembali</span></a>
    </div>
</div>
<div class="container  bg-white border p-3 py-4 rounded-bottom" style="margin-top: -1px">
    <form action={{ route('addSoal.store', $master->id) }} method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="idSekarang" value="{{ $master->id }}">

        <div class="row px-2">

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                <input type="file" class="form-control  @error('foto') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="foto" value="{{ old('foto') }}">
                @error('foto')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Soal</label>
                <input type="text" class="form-control  @error('soal') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="soal" value="{{ old('soal') }}">
                @error('soal')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-4">
                <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                <input type="text" class="form-control @error('jawaban1') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="jawaban1"
                    value="{{ old('jawaban1') }}">
                @error('jawaban1')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-4">
                <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                <input type="text" class="form-control @error('jawaban2') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="jawaban2"
                    value="{{ old('jawaban2') }}">
                @error('jawaban2')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-4">
                <label for="exampleFormControlTextarea1" class="form-label">Opsi Jawaban</label>
                <input type="text" class="form-control @error('jawaban3') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="jawaban3"
                    value="{{ old('jawaban3') }}">
                @error('jawaban3')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Correct Answer</label>
                <select class="form-select" name="correctAnswer">
                    <option value="jawaban1">Opsi 1</option>
                    <option value="jawaban2">Opsi 2</option>
                    <option value="jawaban3">Opsi 3</option>
                </select>
                @error('correct')
                <div class="alert alert-danger mt-2 py-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 col-lg-12">
                <label for="exampleFormControlTextarea1" class="form-label">Evaluasi</label>
                <input type="text" class="form-control  @error('evaluasi') is-invalid @enderror"
                    id="exampleFormControlInput1" placeholder="Something text" name="evaluasi"
                    value="{{ old('evaluasi') }}">
                @error('evaluasi')
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