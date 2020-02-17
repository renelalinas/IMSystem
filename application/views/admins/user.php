
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Accounts</h1>
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
                            Add Account
                        </button>   
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>Password</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Birthdate</th>                               
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>User Role</th>
                                <th>Branch</th>
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


<?php echo form_open_multipart('admins/insert_user'); ?>
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
                            <input type="text" class="form-control" placeholder="Enter ..." name="userID" required="required" value="<?php echo $getUserID['ID'] ?> " hidden="true">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="firstName" required="required">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="middleName" required="required">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="lastName" required="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="userAddress" required="required">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" name="birthDate">
                                <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" placeholder="Enter ..." name="contactNumber" required="required">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>User Role</label>
                            <select name= "userRole" class="form-control">
                                <option value=""></option>
                                <option value="Dispatcher" >Dispatcher</option>
                                <option value="Branch Secretary">Branch Secretary</option>
                                <option value="Main Branch Secretary">Main Branch Secretary</option>                          
                            </select>
                        </div>
                    </div>                                       
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="" name="userName" required="required">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="" name="userPassword" required="required">
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

<?php echo form_open_multipart('admins/assign_branch'); ?>
<div class="modal fade" id="modal-assign">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Transaction</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">              
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" class="form-control" name="userID" required="required" readonly="" id="userID">
                        </div>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-12">
                        <div class="form-group" data-select2-id="44">
                            <label>Branch</label>
                            <select class="form-control selectb4" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" id="dropDownBranch" name="branchID">
                                <option value="">---------</option>
                                <?php foreach ($getBranchList as $branch): ?>
                                    <option value="<?php echo $branch['branchID']; ?>"><?php echo $branch['branchName']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>        
                <div class="modal-footer" align="right">
                <button type="submit" class="btn btn-primary">Assign Branch</button>
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
        $('.selectb4').select2();
        $('.selectb4').select2({
            theme: 'bootstrap4'
        });
        
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admins/getUser',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
//                    scrollX: true,
//                    scrollCollapse: true,
                    "paging": true,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "userID"},
                        {"targets": 1, "data": "userName"},
                        {"targets": 2, "data": "userPassword"},
                        {"targets": 3, "data": "firstName"},
                        {"targets": 4, "data": "middleName"},
                        {"targets": 5, "data": "lastName"},
                        {"targets": 6, "data": "birthDate"},
                        {"targets": 7, "data": "userAddress"},
                        {"targets": 8, "data": "contactNumber"},
                        {"targets": 9, "data": "userRole"},
                        {"targets": 10, "data": "branchName"},
                        {
                            "data": "userID",
                            "render": function (data, type, row, meta) {
//                                return '<a class="btn btn-app table-button-assign"  data-id=' + data + '><i class="fas fa-edit"></i> Assign</a><a class="btn btn-app table-button-assign"  data-id=' + data + '><i class="fas fa-edit"></i> Assign</a>';                              
                              return  '<button type="button" class="btn btn-block btn-primary fas fa-edit table-button-assign"  data-id=' + data + '></button>'
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

        $('#example1').delegate('.table-button-assign', 'click', function ()
        {
            
            var id = $(this).attr('data-id');    

            $('#userID').val(id);
            $('#modal-assign').modal('show');
        });

        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        })
    });
</script>