
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Order Summary Report</h1>
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
                    <br>
                    <br>


                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Printed Report</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <?php echo form_open_multipart('reports/summary_pdfdetails'); ?>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="datepicker_start" class="col-sm-2 col-form-label">Start Date</label>
                                        <div class="col-sm-10">
                                            <div class="input-group date" id="datepicker_start" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#datepicker_start" name="datepicker_start">
                                                <div class="input-group-append" data-target="#datepicker_start" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="datepicker_end" class="col-sm-2 col-form-label">End Date</label>
                                        <div class="col-sm-10">
                                            <div class="input-group date" id="datepicker_end" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#datepicker_end" name="datepicker_end">
                                                <div class="input-group-append" data-target="#datepicker_end" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="branchID" class="col-sm-2 col-form-label">Branch</label>
                                        <div class="col-sm-10">
                                            <select class="form-control selectb4" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" id="branchID" name="branchID">
                                                <?php foreach ($getBranchList as $branch): ?>
                                                    <option value="<?php echo $branch['branchID']; ?>"><?php echo $branch['branchName']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-default float-right">Generate</button>
                                </div>
                                <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>


<script>
    $('document').ready(function ()
    {
        $('.selectb4').select2();
        $('.selectb4').select2({
            theme: 'bootstrap4'
        });

        $('#datepicker_start').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datepicker_end').datetimepicker({
            format: 'YYYY-MM-DD'
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

        $('#itemCount').on('keyup change', function ()
        {
            $('#transactionAmount').val($(this).val() * $('#transactionPrice').val());
        });
    });


</script>