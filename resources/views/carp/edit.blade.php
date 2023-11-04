@extends('layout.layoutData')

@section('content')
<div class="col-12 m-0 p-5 body">
    <div class="card">
        <div class="card-header">
            Carp
        </div>
        <div class="card-body">
            <div class="col-12 m-0 mb-5 p-0 clearfix">
                <h5 class="d-inline">Tambah Carp</h5>
            </div>
            <form method="POST" action="{{ url('/') }}/carp/{{ $carp->id }}">
                @method("PUT")
                @csrf
                <div class="mb-4">
                    <label for="inputCarpCode" class="form-label">Code Carp</label>
                    <input type="text" value={{ $carp->carp_code }} name="carpCode" class="form-control" id="inputCarpCode" aria-describedby="carpCodeHelp" required>
                </div>
                <div class="mb-4">
                    <label for="inputDiv" class="form-label">Category</label>
                    @foreach ($categories as $item)
                    <div class="mb-3 form-check">
                        <input type="checkbox" @if (in_array($item->id, $categoriCarp)) checked @endif name="categories[]" value={{ $item->id }} class="form-check-input" id="categoryCheck{{ $item->id }}">
                        <label class="form-check-label" for="categoryCheck{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="mb-4">
                    <label for="inputInitiator" class="form-label d-block col-12">Initiator</label>
                    <select class="js-example-basic-single col-12" name="initiator" required>
                        <option>-- Pilih Initiator --</option>
                        @foreach ($employees as $item)
                        <option @if ($item->id == $carp->initiator_id) selected @endif value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="inputRecipient" class="form-label d-block col-12">Recipient</label>
                    <select class="js-example-basic-single col-12" name="recipient" required>
                        <option>-- Pilih Recipient --</option>
                        @foreach ($employees as $item)
                        <option @if ($item->id == $carp->recipient_id) selected @endif value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="inputVerifiedBy" class="form-label d-block col-12">Verified By</label>
                    <select class="js-example-basic-single col-12" name="verifiedBy" required>
                        <option>-- Pilih Verified --</option>
                        @foreach ($employees as $item)
                        <option @if ($item->id == $carp->verified_by) selected @endif value={{ $item->id }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="inputDueDate" class="form-label">Due Date</label>
                    <input type="date" value={{ $carp->due_date }} name="dueDate" class="form-control" id="inputDueDate" aria-describedby="dueDateHelp" required>
                </div>
                <div class="mb-4">
                    <label for="inputEffectiveness" class="form-label d-block col-12">Effectiveness</label>
                    <select class="form-select" name="effectiveness" aria-label="Default select example">
                        <option value="" selected>-- Pilih Effectiveness --</option>
                        <option @if ($carp->effectiveness == "Effective") selected @endif value="Effective">Effective</option>
                        <option @if ($carp->effectiveness == "Not Effective") selected @endif value="Not Effective">Not Effective</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="inputStatusDate" class="form-label">Status Date</label>
                    <input type="date" value={{ $carp->status_date }} name="statusDate" class="form-control" id="inputStatusDate" aria-describedby="statusDateHelp" required>
                </div>
                <div class="mb-4">
                    <label for="inputStage" class="form-label d-block col-12">Stage</label>
                    <select class="form-select" name="stage" aria-label="Default select example" required>
                        <option value="" selected>-- Pilih Stage --</option>
                        <option @if ($carp->stage == "Open") selected @endif value="Open">Open</option>
                        <option @if ($carp->stage == "Closed") selected @endif value="Closed">Closed</option>
                        <option @if ($carp->stage == "Voided") selected @endif value="Voided">Voided</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="inputStatus" class="form-label d-block col-12">Status</label>
                    <select class="form-select" name="status" aria-label="Default select example" required>
                        <option selected>-- Pilih Stage --</option>
                        <option @if ($carp->status == "Open") selected @endif value="Open">Open</option>
                        <option @if ($carp->status == "Closed") selected @endif value="Closed">Closed</option>
                        <option @if ($carp->status == "Canceled") selected @endif value="Canceled">Canceled</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    new DataTable('#datatable-employee');
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection