
            <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->
        
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Incident Category</h1>
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
                            Add Category
                        </button>   
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>Incident Name</th>
                                <th>Tag ID</th>
                                <th>Incident Description</th>
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


<?php echo form_open_multipart('admins/insert_incident'); ?>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">       
                <div class="form-group">
                    <label>Incident Name</label>
                    <input type="text" class="form-control" placeholder="Enter ..." name="incidentName" required="required">
                </div>
                <div class="form-group">
                    <label>Incident Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="incidentDescription" required="required"></textarea>
                </div>
                <div class="form-group">
                    <label>ID Tag</label>
                    <input type="text" class="form-control" placeholder="Enter ..." name="idTag" required="required">
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
//        $('#example1').DataTable({
//            ajax: {
//                type: 'POST',
//                url: '<?php echo base_url(); ?>admins/getIncident',
//                
//                success: function(result){
//                    alert(result);
//                console.log(data);
//                }
//            },
//            "columns": [
//                {"data": "recordID"},
//                {"data": "incidentName"},
//                {"data": "incidentDescription"}
//            ]


//            "data": [
//                {
//                    "engine": "Trident",
//                    "browser": "Internet Explorer 4.0",
//                    "platform": "Win 95+"
//                },
//                {
//                    "engine": "Trident",
//                    "browser": "Internet Explorer 5.0",
//                    "platform": "Win 95+"
//                }
//            ],
//            "columns": [
//                {"title": "Engine", "data": "engine"},
//                {"title": "Browser", "data": "browser"},
//                {"title": "Platform", "data": "platform"}
//            ]

//        });
//    });
//    
//    
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>admins/getIncidentCategory',
            dataType: 'json',
            success: function (result)
            {
                $('#example1').DataTable({
                    "dom": '<"dt-buttons"Bf><"clear">lirtp',
                    "paging": false,
                    "autoWidth": true,
                    "data": result,
                    "columns": [
                        {"targets": 0, "data": "incidentCategoryID"},
                        {"targets": 1, "data": "incidentName"},
                        {"targets": 2, "data": "idTag"},
                        {"targets": 3, "data": "incidentDescription"},
                        {
                            "data": "incidentCategoryID",
                            "render": function (data, type, row, meta) {
                                return '<button class="btn btn-warning table-button" id ="wew"  data-id=' + data + ' >Edit</button>'
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
        
        $('#example1').delegate('.table-button','click',function()
        {
//            $('#modal-default').modal('show');
            alert("$this");
        });

//        $(this).on('click', function () {
////            var data = table.row($(this).parents('tr')).data();
////            alert(data[0] + "'s salary is: " + data[ 0 ]);
//            $(this).parent('td').addClass('special');
//            alert("wew");
//        });

    });

//        var table = $("#example1").dataTable({
//      
//            ajax: {"url": "<?php echo base_url(); ?>admins/getIncident", "type": "POST",
//                success: function (result)
//                {
//                    alert('opo');
//                }
//            },
//            Columns: [
//                {"data": "recordID"},
//                {"data": "incidentName"}
//                {"data": "incidentDescription"}
//
//            ]
//        });


</script>

<!--<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>-->