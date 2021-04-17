@extends('app')

@section('title', __('Edit Employee'))

@section('content')
<form class="form-horizontal" id="employeeFormEdit" method="POST" enctype="multipart/form-data">

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Employee Management <small class="text-muted"> Edit Employee
                        </small>
                    </h4>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name <em class="text-danger">*</em></label>
                        <div class="col-md-6">
                            <input type="hidden" id="employee_id" name="employee_id" value="{{ $request->id }}">
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

        var employee_id = $('#employee_id').val();
        if (employee_id) {
            $.ajax({
                url: "{{ url('api/employee/edit') }}",
                type: 'POST',
                data: {
                    'employee_id': employee_id
                },
                beforeSend: function() {},
                success: function(data) {
                    if (data.data) {
                        $("input[name='name']").val(data.data.name);
                        $("input[name='email']").val(data.data.email);
                        $("input[name='age']").val(data.data.age);
                        $("input[name='salary']").val(data.data.salary);
                    }
                },
                complete: function() {},
                error: function(data) {}
            });
        }

        $("form#employeeFormEdit").on('submit', function(e) {
            e.preventDefault();
            var mainData = $(this).serialize();
            $.ajax({
                url: "{{ url('api/employee/create') }}",
                type: 'POST',
                data: mainData,
                beforeSend: function() {
                },
                success: function(data) {
                    console.log(data);
                    window.location.href = "{{ route('employe-index') }}";
                },
                complete: function() {
                },
                error: function(data) {

                }
            });

        });
    });
</script>
@endsection