
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Assign Branch</h1>
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
                            Assign Branch
                        </button>   
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Assign Branch ID</th>
                                <th>User Name</th>
                                <th>Branch Name</th>
                                <th>User Role</th>
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


<?php echo form_open_multipart('admins/insert_assign_branch'); ?>
<div class="modal fade" id="modal-default">
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
                    <div class="col-6">
                        <div class="form-group" data-select2-id="44">
                            <label>User Full Name</label>
                            <select class="form-control selectb4" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" id="dropDownUser">
                                <option>-----</option>
                                <?php foreach ($getUsers as $users): ?>
                                    <option data-position="<?php echo $users['userRole']; ?>" value="<?php echo $users['userID']; ?>"><?php echo $users['firstName']; ?> <?php echo $users['lastName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>User ID</label>
                            <input type="text" class="form-control" name="userID" required="required" readonly="" id="userID">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" class="form-control" name="userRole" required="required" readonly="" id="userRole">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group" data-select2-id="44">
                            <label>Branch</label>
                            <select class="form-control selectb4" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" id="dropDownBranch" name="branchID">
                                <?php foreach ($getBranchList as $branch): ?>
                                    <option value="<?php echo $branch['branchID']; ?>"><?php echo $branch['branchName']; ?> </option>
                                <?php endforeach; ?>
                            </select>
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
        $('.selectb4').select2();
        $('.selectb4').select2({
            theme: 'bootstrap4'
        });
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admins/getBranchAssignList',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "branchAssignID"},
                        {"targets": 1, "data": "userName"},
                        {"targets": 2, "data": "branchName"},
                        {"targets": 3, "data": "userRole"},                    
                        {
                            "data": "branchAssignID",
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
   
        $('#dropDownUser').on('change', function ()
        {
            var userRole = $('#dropDownUser option:selected').attr('data-position');
            var userID = $('#dropDownUser option:selected').val();
            $('#userID').val(userID);
            $('#userRole').val(userRole);           
        });
                     
    });


</script>