
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customer</h1>
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
                            Add Customer
                        </button>   
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Full Name</th>
                                <th>Contact#</th>
                                <th>Plate#</th>
                                <th>Address</th>
                                <th>view</th>
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


<?php echo form_open_multipart('admins/insert_customer'); ?>
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
                            <label>Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="customerFullName" required="required">
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Contact #</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="contactNumber" required="required">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Plate #</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="plateNumber" required="required">
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="customerAddress" required="required">
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
            url: '<?php echo base_url(); ?>admins/getCustomerList',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "customerID"},
                        {"targets": 1, "data": "customerFullName"},
                        {"targets": 2, "data": "contactNumber"},
                        {"targets": 3, "data": "plateNumber"},
                        {"targets": 4, "data": "customerAddress"},
                        {
                            "data": "customerID",
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