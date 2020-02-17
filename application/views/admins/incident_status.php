<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Incidents</h1>
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
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Control ID</th>
                                <th>Incident Name</th>
                                <th>Incident Description</th>
                                <th>Date and Time</th>
                                <th>Incident Status</th>
<!--                                <th>Employee Name</th>
                                <th>Employee Position</th>-->
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


<?php echo form_open_multipart('admins/update_incident_status'); ?>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Incident Status</label>
                                <select name= "incidentStatus" class="form-control">
                                    <option value=""></option>
                                    <option value="REJECTED">Rejected</option>  
                                    <option value="INPROGRESS" >In Progress</option>
                                    <option value="COMPLETED">Completed</option>                       
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Control Number:</label>
                            <input type="text" class="form-control" name="incidentID" required="required" readonly="" value="<?php echo $getID['ID']; ?>" id="incidentID">
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
                        <div class="form-group">                     
                            <input type="text" class="form-control" name="userID" required="required" readonly="" id="userID" hidden="" value="<?php echo $this->session->userdata('userID') ?>">
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
            url: '<?php echo base_url(); ?>admins/get_latest_incident',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "incidentID"},
                        {"targets": 1, "data": "incidentName"},
                        {"targets": 2, "data": "incidentDescription"},
                        {"targets": 3, "data": "incidentDateTime"},
                        {"targets": 4, "data": "incidentStatus"},
//                        {"targets": 5, "data": "fullName"},
//                        {"targets": 6, "data": "userRole"},
                        {"targets": 7, "data": "branchName"},
                        {
                            "data": "incidentID",
                            "render": function (data, type, row, meta) {
                                return '<button type="button" class="btn btn-block btn-primary fas fa-edit table-button"  data-id=' + data + '></button>'
                            }
                        }
                    ],
                    "buttons": [
                        'colvis',
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
            var id = $(this).attr('data-id');
            $('#incidentID').val(id);
            $('#modal-default').modal('show');
        });
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
      

        var incidentID = $('#incidentID').val();
        $('#dropDownIncident').on('change', function ()
        {
            var idTag = $('#dropDownIncident option:selected').attr('data-tag');

            if (idTag !== '')
            {
                $('#incidentID').val(idTag + "-" + incidentID);
            } else
            {
                $('#incidentID').val(incidentID);
            }
        });

    });

</script>
