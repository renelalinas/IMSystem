
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Transaction</h1>
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
                            Add Transaction
                        </button>   
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Date and Time</th>
                                <th>Loads</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Customer</th>
                                <th>Branch Name</th>
                                <!--<th>User Name</th>-->
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


<?php echo form_open_multipart('admins/insert_transaction'); ?>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
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
                        <div class="form-group" data-select2-id="44">
                            <label>Customer</label>
                            <select class="form-control selectb4" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" id="dropDownCustomer" name="customerID">
                                <option>-----</option>
                                <?php foreach ($getCustomer as $customer): ?>
                                    <option value="<?php echo $customer['customerID']; ?>"><?php echo $customer['customerFullName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                 <div class="row" hidden="">
                    <div class="col-6">
                        <input type="text" class="form-control" name="branchID" required="required" readonly="" id="branchID" value="<?php echo $this->session->userdata('branchID') ?>">
                    </div>
                    <div class="col-6">
                        <div class="form-group">                           
                            <input type="text" class="form-control" name="userID" required="required" readonly="" id="userID" value="<?php echo $this->session->userdata('userID') ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" name="datepicker">
                                <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Time:</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="timepicker">
                                <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Number of Sack(s)</label>
                            <input type="number" class="form-control" name="itemCount" required="required" id ="itemCount">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Total Amount</label>
                            <input type="text" class="form-control" name="transactionPrice" required="required" hidden="true" value="<?php echo $getPrice['price']; ?>" id="transactionPrice">
                            <input type="text" class="form-control" name="transactionAmount" required="required" readonly="" value="0" id="transactionAmount">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description/Notes</label>
                    <textarea class="form-control" rows="3" placeholder="" name="transactionDescription" required="required"></textarea>
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
            url: '<?php echo base_url(); ?>admins/getTransactionList',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "transactionID"},
                        {"targets": 1, "data": "transactionDateTime"},
                        {"targets": 2, "data": "itemCount"},
                        {"targets": 3, "data": "transactionAmount"},
                        {"targets": 4, "data": "transactionDescription"},                        
                        {"targets": 5, "data": "customerFullName"},
                        {"targets": 6, "data": "branchName"},
//                        {"targets": 6, "data": "userName"},                        
                        {
                            "data": "transactionID",
                            "render": function (data, type, row, meta) {
                                return '<button type="button" class="btn btn-block btn-primary fas fa-edit table-button"  data-id=' + data + '></button>'
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
                $('#modal-default').modal('show');
                alert("wew");
            }

        });

        $('#example1').delegate('.table-button', 'click', function ()
        {
            alert("$this");
        });
        
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
        $('#dropDownUser').on('change', function ()
        {
            var userRole = $('#dropDownUser option:selected').attr('data-position');
            var userID = $('#dropDownUser option:selected').val();
            $('#userID').val(userID);
            $('#userRole').val(userRole);

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>admins/get_assign_branch",
                data: {id: userID},
                async: true,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].branchID + '>' + data[i].branchName + '</option>';
                    }
                    $('#dropDownBranch').html(html);
                },
                error: function () {
                    alert("iw");
                }

            });
        });
        
        $('#itemCount').on('keyup change',function()
        {
            $('#transactionAmount').val($(this).val()*$('#transactionPrice').val());
        });                
    });


</script>