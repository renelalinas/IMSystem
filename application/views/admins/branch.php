
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Branch</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">


    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">

                    <div align="right"> 
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                            Add Branch
                        </button>   
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Branch ID</th>
                                <th>Branch Name</th>
                                <th>House Number</th>
                                <th>Street</th>
                                <th>City</th>
                                <th>Province</th>
                                <th>Country</th>                               
                                <th>View</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


<?php echo form_open_multipart('admins/insert_branch'); ?>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">       
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="branchName" required="required">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label>House Number</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="houseNumber" required="required">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Street" required="required">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="City" required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Province</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Province" required="required">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="Country" required="required">
                        </div>
                    </div>

                </div>
                <div class="modal-footer" align="right">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
</form>


<script>
    $('document').ready(function ()
    {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admins/getBranchList',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "branchID"},
                        {"targets": 1, "data": "branchName"},
                        {"targets": 2, "data": "houseNumber"},
                        {"targets": 3, "data": "Street"},
                        {"targets": 4, "data": "City"},
                        {"targets": 5, "data": "Province"},
                        {"targets": 6, "data": "Country"},
                        {
                            "data": "branchID",
                            "render": function (data, type, row, meta) {
                                return '<button class="btn btn-warning table-button" id ="wew"  data-id=' + data + ' >Edit</button>'
                            }
                        }
                    ],
                    "buttons": [
//                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                });
            },
            error: function () {
                alert("wew");
            }

        });

        $('#example1').delegate('.table-button', 'click', function ()
        {
            alert("$this");
        });

    });


</script>