@extends('app')

@section('title', __('Create Employee'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Employee Management
                </h4>
            </div>
            <!--col-->

            <div class="col-sm-7 pull-right">
                <div class="btn-toolbar float-right" role="toolbar">
                    <a href="{{ route('get-quiz') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Quiz">Quiz</a>
                    <a href="{{ route('employe-create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Add Employee">Add Employee</a>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Age</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="html_app_table"></tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $.ajax({
            url: "{{ url('api/employee') }}",
            type: 'GET',
            beforeSend: function() {},
            success: function(data) {
                if (data.data) {
                    var html = '';
                    $.each(data.data, function(key, value) {
                        html += "<tr>><th>" + value.id + "" +
                            "</th><th>" + value.name + "</th><th>" + value.email + "</th><th>" + value.age + "</th><th> " + value.salary + "</th><th>" +
                            "<a href='{{ route('employe-edit') }}?id=" + value.id + "' class='btn btn-success' title='Edit'><i class='fa fa-edit'></i></a><a href='javascript:void(0);' data-id=" + value.id + " class='destoryEmpliye btn btn-danger' title='Delete'><i class='fa fa-trash'></i></a></th></tr>";
                    });
                    $('.html_app_table').html(html);
                }
            },
            complete: function() {},
            error: function(data) {}
        });

        $(document).on('click', '.destoryEmpliye', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('api/employee/destroy') }}",
                type: 'POST',
                data: {
                    'id': id
                },
                beforeSend: function() {},
                success: function(data) {
                    console.log(data);
                    window.location.href = "{{ route('employe-index') }}";
                },
                complete: function() {},
                error: function(data) {

                }
            });
        });

    });
</script>
@endsection