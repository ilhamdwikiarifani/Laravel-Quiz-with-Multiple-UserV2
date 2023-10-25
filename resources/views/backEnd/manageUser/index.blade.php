@extends('backEnd.index')

@section('content')



@include('backEnd.components.messageModal')

{{-- Content --}}
<div class="container mt-3 bg-white border p-3 rounded-top">
    <div class="px-2 d-flex justify-content-between align-items-center">
        <button class="btn btn-white text-13px fw-bold" id="sidebarToggle"><i class="fa-solid fa-bars me-2"></i>
            Manage User</button>
        <a class="btn btn-primary me-4 me-lg-0 text-13px" href={{ url('manage-user/create') }}><i
                class="fa-solid fa-plus me-lg-2"></i> <span class="d-none d-lg-inline-block">Create
                User</span></a>
    </div>
</div>
<div class="container bg-white border rounded-bottom p-3 py-3" style="margin-top: -1px; ">
    <div class="table-responsive py-1 overflow-hidden">
        <table id="example" class="table table-borderless" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($user as $datas)
                <tr>
                    <td>
                        {{ $datas->name }}
                    </td>
                    <td>
                        {{ $datas->role->name }}
                    </td>
                    <td>{{ $datas->email }}</td>
                    <td>
                        <form method="POST" action={{ route('manage-user.destroy', $datas->id) }}>

                            <div class="d-flex justify-content-start align-items-center gap-2">
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