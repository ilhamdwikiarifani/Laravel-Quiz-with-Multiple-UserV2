@extends('backEnd.index')
@section('content')



{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-start align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Ujian</button>
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="px-3">
        <form action="/proses" method="POST">
            @csrf

            <p>1. Sebutkan Contoh Hewan Melata !</p>
            <ul class="list-unstyled">
                <li><input type="radio" name="opsi1" value="Jawaban 1"> True</li>
                <li><input type="radio" name="opsi1" value="Jawaban 2"> False</li>
                <li><input type="radio" name="opsi1" value="Jawaban 3"> False</li>
            </ul>

            <p>2. Sebutkan Contoh Hewan Berjalan !</p>
            <ul class="list-unstyled">
                <li><input type="radio" name="opsi2" value="Jawaban 1"> False</li>
                <li><input type="radio" name="opsi2" value="Jawaban 2"> True</li>
                <li><input type="radio" name="opsi2" value="Jawaban 3"> False</li>
            </ul>

            <p>3. Sebutkan Contoh Hewan Terbang !</p>
            <ul class="list-unstyled">
                <li><input type="radio" name="opsi3" value="Jawaban 1"> False</li>
                <li><input type="radio" name="opsi3" value="Jawaban 2"> True</li>
                <li><input type="radio" name="opsi3" value="Jawaban 3"> False</li>
            </ul>

            <button type="submit" class="btn btn-primary text-13px">Submit</button>
        </form>
    </div>
</div>
@endsection