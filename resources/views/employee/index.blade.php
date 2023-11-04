@extends('layout.layoutData')

@section('content')
<div class="col-12 m-0 p-5 body">
    <div class="card">
        <div class="card-header">
            Employee
        </div>
        <div class="card-body">
            <div class="col-12 m-0 mb-5 p-0 clearfix">
                <h5 class="d-inline">Data Employee</h5>
                <a href="{{ url('/') }}/employee/create" class="btn btn-sm btn-success float-end">Tambah</a>
            </div>
            <table id="datatable-employee" class="table table-striped mt-5" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Div</th>
                        <th>Branch</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->div }}</td>
                        <td>{{ $item->branch }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ url('/') }}/employee/info/{{ $item->id }}" class="btn btn-sm btn-primary">Info</a>
                                <a href="{{ url('/') }}/employee/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ url('/') }}/employee/{{ $item->id }}" onsubmit="return confirm('Are you sure want to delete {{ $item->name }}')">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    new DataTable('#datatable-employee');
</script>
@endsection