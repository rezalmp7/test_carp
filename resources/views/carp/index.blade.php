@extends('layout.layoutData')

@section('content')
<div class="col-12 m-0 p-5 body">
    <div class="card">
        <div class="card-header">
            Carp
        </div>
        <div class="card-body">
            <div class="col-12 m-0 mb-5 p-0 clearfix">
                <h5 class="d-inline">Data Carp</h5>
                <a href="{{ url('/') }}/carp/create" class="btn btn-sm btn-success float-end">Tambah</a>
            </div>
            <table id="datatable-employee" class="table table-striped mt-5" style="width:100%">
                <thead>
                    <tr>
                        <th>CARP Code.</th>
                        <th>Category</th>
                        <th>Initiator</th>
                        <th>Recipient</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carp as $item)
                    <tr>
                        <td>{{ $item->carp_code }}</td>
                        <td>
                            @foreach ($item->categories as $item2)
                                {{ $item2->name }},
                            @endforeach
                        </td>
                        <td>{{ $item->initiator->name }}</td>
                        <td>{{ $item->recipient->name }}</td>
                        <td>{{ $item->stage }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ url('/') }}/carp/info/{{ $item->id }}" class="btn btn-sm btn-primary">Info</a>
                                <a href="{{ url('/') }}/carp/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ url('/') }}/carp/{{ $item->id }}" onsubmit="return confirm('Are you sure want to delete {{ $item->carp_code }}')">
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