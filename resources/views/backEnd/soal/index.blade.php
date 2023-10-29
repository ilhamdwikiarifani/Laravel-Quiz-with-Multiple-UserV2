@extends('backEnd.index')

@section('content')



@include('backEnd.components.messageModal')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white  fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Soal {{ $master->title }}</button>
        <div>
            <a class="btn btn-primary me-4 me-lg-3 text-13px" href={{ url('master/addSoal/create',$master->id) }}><i
                    class="fa-solid fa-plus me-lg-2"></i> <span class="d-none d-lg-inline-block">Buat
                    Soal {{ $master->title }}</span></a>
            <a class="btn me-3 me-lg-0 text-13px border-1 border-dark" href={{ url('master') }}><i
                    class="fa-solid fa-chevron-left "></i></a>
        </div>
    </div>
</div>

<input type="hidden" name="idSekarang" value="{{ $master->id }}">


<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="table-responsive py-1 overflow-hidden">
        <table id="example" class="table table-borderless" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>J1</th>
                    <th>J2</th>
                    <th>J3</th>
                    <th>CorrectAnswer</th>
                    <th>Evaluasi</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($addSoal as $key => $datas)

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        {{ Str::limit($datas->soal, 10) }}
                    </td>
                    <td>
                        {{ $datas->jawaban1 }}
                    </td>
                    <td>
                        {{ $datas->jawaban2 }}
                    </td>
                    <td>
                        {{ $datas->jawaban3 }}
                    </td>
                    <td>
                        {{ $datas->correctAnswer }}
                    </td>
                    <td>{{ Str::limit($datas->evaluasi, 10) }}</td>
                    <td>
                        <form method="POST" action={{ route('addSoal.destroy', $datas->id) }}>
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                {{-- <div class="badge border-0 bg-warning p-2 fw-normal"> <a href={{
                                        url('template/edit') }} class="text-decoration-none text-white"><i
                                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                                </div> --}}

                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="idx" value="{{ $datas->id }}">
                                <button type="submit" class="badge border-0 bg-danger p-2 fw-normal"
                                    onclick="return confirm('Yakin Menghapus Data ini?')"> <i
                                        class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </div>

                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection