@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                {{-- <div class="pull-left"> --}}
                <div class="text-center">
                    <h2>Category </h2>
                </div>
                <div class="pull-right mb-2 text-left">
                    <a class="btn btn-sm btn-success" onClick="add()" href="javascript:void(0)"><i
                            class="fa fa-plus-circle"></i> Add Category</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card mt-2">
            <div class="card-body">
                <table class="table table-bordered" id="ajax-crud-datatable">
                    <thead>
                        <tr>
                            <th width="5%">Id</th>
                            <th>Category</th>
                            <th>Created Date</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- boostrap category model -->
    <div class="modal fade" id="employee-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="javascript:void(0)" id="EmployeeForm" name="EmployeeForm" class="form-horizontal" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group row">
                            <label for="nama_kategori" class="col-lg-2 col-lg-offset-1 control-label">Category</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" id="name" class="form-control" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-flat btn-success" id="btn-save"><i class="fa fa-save"></i>
                            Save</button>
                        <button type="button" class="btn btn-sm btn-flat btn-danger" data-dismiss="modal"><i
                                class="fa fa-arrow-circle-left"></i> Cancel</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <!-- end bootstrap model -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#ajax-crud-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('ajax-crud-datatable') }}",
                columns: [
                    // {
                    //         data: 'DT_RowIndex',
                    //         name: 'DT_RowIndex',
                    //         orderable: false,
                    //         searchable: false,
                    //     },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data) {
                            // Format the date using JavaScript Date object
                            var date = new Date(data);
                            // Extract date components
                            var day = date.getDate();
                            var month = date.getMonth() + 1; // Months are zero-based
                            var year = date.getFullYear();
                            // Return formatted date
                            return year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ?
                                '0' : '') + day;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'desc']
                    // [0, 'asc']
                ]
            });
        });

        function add() {
            $('#EmployeeForm').trigger("reset");
            $('#EmployeeModal').html("Add Employee");
            $('#employee-modal').modal('show');
            $('#id').val('');
        }

        // function editFunc(id) {
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ url('/ajax-crud-datatable/edit') }}",
        //         data: {
        //             id: id
        //         },
        //         dataType: 'json',
        //         success: function(res) {
        //             $('#EmployeeModal').html("Edit Employee");
        //             $('#employee-modal').modal('show');
        //             $('#id').val(res.id);
        //             $('#name').val(res.name);
        //         }
        //     });
        // }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('/ajax-crud-datatable') }}/" + id + "/edit",
                dataType: 'json',
                success: function(res) {
                    $('#EmployeeModal').html("Edit Employee");
                    $('#employee-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }


        function deleteFunc(id) {
            if (confirm("Delete Record?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('/ajax-crud-datatable/delete') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#ajax-crud-datatable').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        }

        $('#EmployeeForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('/store') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#employee-modal").modal('hide');
                    var oTable = $('#ajax-crud-datatable').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush
