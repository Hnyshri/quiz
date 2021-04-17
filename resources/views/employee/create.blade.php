@extends('app')

@section('title', __('Employee'))

@section('content')

<form class="form-horizontal" id="employeeForm" method="POST" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Employee Management <small class="text-muted"> Create Employee
                        </small>
                    </h4>
                </div>
            </div>
            <hr>
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name <em class="text-danger">*</em></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="" placeholder="Name" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email <em class="text-danger">*</em></label>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="" placeholder="email" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="age" class="col-md-4 col-form-label text-md-right">Age <em class="text-danger">*</em></label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" name="age" value="" placeholder="Age" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="salary" class="col-md-4 col-form-label text-md-right">Salary <em class="text-danger">*</em></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="salary" value="" placeholder="Salary" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('employe-index') }}" class="btn btn-success ml-1" title="Cancel">Cancel</a>
                    </div>
                    <!--col-->
                </div>
                <!--row-->
            </div>
            <!--card-footer-->
        </div>
        <!--card-->
</form>
@endsection
@section('js')
<script>
    $(document).ready(function() {

        $("form#employeeForm").on('submit', function(e) {
            e.preventDefault();
            var mainData = $(this).serialize();
            $.ajax({
                url: "{{ url('api/employee/create') }}",
                type: 'POST',
                data: mainData,
                beforeSend: function() {
                    // Notiflix.Loading.Circle();
                },
                success: function(data) {
                    console.log(data);
                    window.location.href = "{{ route('employe-index') }}";
                },
                complete: function() {
                    // Notiflix.Loading.Remove();
                },
                error: function(data) {

                }
            });

        });
    });
</script>
@endsection