@extends('backEnd.index')

@section('content')



@include('backEnd.components.messageModal')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white  fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Result Exam</button>
        {{-- <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('master/create') }}><i
                class="fa-solid fa-plus me-lg-2"></i> <span class="d-none d-lg-inline-block">Create
                Something</span></a> --}}
    </div>
</div>

<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="table-responsive py-1 overflow-hidden">
        <table id="example" class="table table-borderless" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Overall</th>
                    <th>Jawaban</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>


                @if (Auth::user() && Auth::user()->role->name === 'admin')
                @foreach ($resultExam as $key => $datas )
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $datas->user->name }}</td>
                    <td>{{ $datas->kelas }}</td>
                    <td>{{ $datas->matpel }}</td>
                    <td>{{ $datas->overall }}</td>
                    <td>
                        @foreach (json_decode($datas->detail) as $item)
                        @if($item->status === $item->correct)
                        <small class="badge bg-success text-result">{{ $item->status }}</small>
                        @else
                        <small class="badge bg-danger text-result">{{ $item->status }}</small>
                        @endif
                        @endforeach
                    </td>

                    <td>
                        <form method="POST" action={{ route('result.destroy', $datas->id) }}>
                            <div class="d-flex justify-content-start align-items-center gap-2">

                                <div class="badge border-0 bg-dark p-2 fw-normal"> <a
                                        href="{{ url('result-exam', $datas->id) }}"
                                        class="text-decoration-none text-white"><i
                                            class="fa-solid fa-pen-to-square"></i> Detail</a>
                                </div>

                                @can('admin')
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="idx" value="{{ $datas->id }}">
                                <button type="submit" class="badge border-0 bg-danger p-2 fw-normal"
                                    onclick="return confirm('Yakin Menghapus Data ini?')"> <i
                                        class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                                @endcan
                            </div>

                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                @foreach ($resultExam as $key => $datas )
                @if ($datas->user->is(auth()->user()))
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $datas->user->name }}</td>
                    <td>{{ $datas->kelas }}</td>
                    <td>{{ $datas->matpel }}</td>
                    <td>{{ $datas->overall }}</td>
                    <td>
                        @foreach (json_decode($datas->detail) as $item)
                        @if($item->status === $item->correct)
                        <small class="badge bg-success text-result">{{ $item->status }}</small>
                        @else
                        <small class="badge bg-danger text-result">{{ $item->status }}</small>
                        @endif
                        @endforeach
                    </td>

                    <td>

                        <div class="d-flex justify-content-start align-items-center gap-2">

                            <div class="badge border-0 bg-dark p-2 fw-normal"> <a
                                    href="{{ url('result-exam', $datas->id) }}"
                                    class="text-decoration-none text-white"><i class="fa-solid fa-pen-to-square"></i>
                                    Detail</a>
                            </div>


                        </div>

                    </td>
                </tr>
                @endif
                @endforeach
                @endif




            </tbody>
        </table>
    </div>
</div>
@endsection