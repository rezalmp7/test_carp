@extends('layout.layoutData')

@section('content')
<div class="col-12 m-0 p-5 body">
    <div class="card">
        <div class="card-header">
            Employee
        </div>
        <div class="card-body">
            <h5 class="card-title mb-5">Data Employee</h5>
            <form method="POST" action="{{ url('/') }}/employee/{{ $employee->id }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" name="name" value={{ $employee->name }} class="form-control" id="inputName" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="inputDiv" class="form-label">Div</label>
                    <input type="text" name="div" value={{ $employee->div }} class="form-control" id="inputDiv" aria-describedby="divHelp">
                </div>
                <div class="mb-3">
                    <label for="inputBranch" class="form-label">Branch</label>
                    <input type="text" name="branch" value={{ $employee->branch }} class="form-control" id="inputBranch" aria-describedby="branchHelp">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    new DataTable('#datatable-employee');
</script>
@endsection