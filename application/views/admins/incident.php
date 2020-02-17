<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Submit Incidents</h1>
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
                            Add Incidents
                        </button>   
                    </div>
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
                                <!--<th>Incident Status</th>-->             
                                <th>Branch</th>
                                <th>Action</th>
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


<?php echo form_open_multipart('admins/add_incident'); ?>
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
                <div class="row" hidden="">
                    <div class="col-6">
                        <div class="form-group" data-select2-id="44">
                            <input type="text" class="form-control" name="branchID" required="required" readonly="" id="branchID" value="<?php echo $this->session->userdata('branchID') ?>">
                        </div>
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
                            <div class="form-group" data-select2-id="44">
                                <label>Incident Type</label>
                                <select class="form-control selectb4" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" name="incidentCategoryID" id="dropDownIncident" required="">
                                    <option >-----</option>
                                    <?php foreach ($getIncidents as $incidents): ?>
                                        <option data-tag="<?php echo $incidents['idTag']; ?>" value="<?php echo $incidents['incidentCategoryID']; ?>"><?php echo $incidents['incidentName']; ?></option>
                                    <?php endforeach; ?>
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
                <div class="form-group">
                    <label>Incident Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="incidentDescription" required="required"></textarea>
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

<?php echo form_open_multipart('admins/edit_incident'); ?>
<div class="modal fade" id="modal-edit">
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
                            <label>Date:</label>

                            <div class="input-group date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#datepicker-edit" name="datepicker-edit" id ='datepicker-edit'>
                                <div class="input-group-append" data-target="#datepicker-edit" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Time:</label>
                            <div class="input-group date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#timepicker-edit" name="timepicker-edit" id ='timepicker-edit'>
                                <div class="input-group-append" data-target="#timepicker-edit" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-group" data-select2-id="44">
                                <label>Incident Type</label>
                                <input type="text" class="form-control" name="incidentCategoryID-edit" required="required" readonly="" id="incidentCategoryID-edit">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Control Number:</label>
                            <input type="text" class="form-control" name="incidentID-edit" required="required" readonly="" id="incidentID-edit">
                            <input type="text" class="form-control" name="status-edit" required="required" readonly="" id="status-edit" hidden="">                            
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Incident Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="incidentDescription-edit" id="incidentDescription-edit" required="required"></textarea>
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
            url: '<?php echo base_url(); ?>admins/get_incident',
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
//                        {"targets": 4, "data": "incidentStatus"},
//                        {"targets": 5, "data": "fullName"},
//                        {"targets": 6, "data": "userRole"},
                        {"targets": 7, "data": "branchName"},
                        {
                            "data": "incidentID",
                            "render": function (data, type, row, meta) {
                                return  '<button type="button" class="btn btn-block btn-primary fas fa-edit table-button"  data-id=' + data + '></button>'

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



//        $('body').on('.table-button','click', function (event)
//        {
////             var sample = $(this).parent('tr').find('td:eq(0)').text();
////             var sample =$('[data-id'+id+']').find('td:eq(0)').text();
//            var sample = $('tr.data-id').find('td:eq(0)').text();
//            alert(sample);
//            console.log(sample);
//            $('#modal-edit').modal('show');
//        });


        $('#example1').delegate('.table-button', 'click', function ()
        {

            var parent = $(this).closest('tr');                  

            $("#datepicker-edit").val(moment(parent.find('td:eq(3)').text()).format('YYYY-MM-DD'));
            $("#timepicker-edit").val(moment(parent.find('td:eq(3)').text()).format('LT'));
            $("#incidentCategoryID-edit").val(parent.find('td:eq(1)').text());
            $("#incidentID-edit").val(parent.find('td:eq(0)').text());
            $("#incidentDescription-edit").val(parent.find('td:eq(2)').text());
            $("#status-edit").val(parent.find('td:eq(4)').text());
            $('#modal-edit').modal('show');
        });
//        
        $('#datepicker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#timepicker').datetimepicker({
            format: 'LT'
        });
        $('#datepicker-edit').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#timepicker-edit').datetimepicker({
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
