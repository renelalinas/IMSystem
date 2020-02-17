
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pending Reservations</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
        
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="container">
                                <div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <table class="table table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <!--<th>RESERVATION ID</th>-->
                                    <th>FULLNAME</th>
                                    <th>NOTE</th>
                                    <!--<th>Service Decription</th>-->
                                    <th>SERVICENAME</th>
                                    <th>PRICE (₱)</th>
                                    <th>STARTDATE</th>
                                    <th>ENDDATE</th>     
                                    <th>CUSTOMERTYPE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                        </table>                       
            </div>
            <div class="panel-footer">
                <p> <i class="fa fa-calendar"></i>&nbsp; GUEST:<?php echo $GUEST; ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-male"></i>&nbsp;WALK IN:<?php echo $WALKIN; ?></p>
            </div>
            <!-- /.panel-body -->
        </div>


        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


<?php echo form_open_multipart('admins/update_status_reservation'); ?>
<div class="modal fade" id="ModalApproved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reservation</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to approve reservation?</h4>
                <div class="form-group">
                    <input type="hidden" name="ReservationID" class="form-control" placeholder="Product Code" hidden="hidden">
                </div>
                <div class="form-group">
                    <input type="hidden" value="APPROVED" name="Status" class="form-control" placeholder="Product Code" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Yes</button>
            </div>
        </div>
    </div>
</div>
</form>

<?php echo form_open_multipart('admins/update_status_reservation'); ?>
<div class="modal fade" id="ModalDisapproved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Reservation</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure you want to decline reservation?</h4>

                <div class="form-group">
                    <textarea required="required"  class ="form-control"  name="TextMessage" class="textarea" spellcheck="true" rows="3" placeholder="Please leave a message"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="ReservationID" class="form-control" placeholder="Product Code">
                </div>
                <div class="form-group">
                    <input type="hidden" value="DISAPPROVED" name="Status" class="form-control" placeholder="Product Code">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>
</form>


<!-- /.row -->


<script>
    $(document).ready(function () {
        // Setup datatables
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var table = $("#mytable").dataTable({
            initComplete: function () {
                var api = this.api();
                $('#mytable_filter input')
                        .off('.DT')
                        .on('input.DT', function () {
                            api.search(this.value).draw();
                        });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {"url": "<?php echo base_url(); ?>admins/get_services_json", "type": "POST"},
            columns: [
//                {"data": "ReservationID"},
                {"data": "FullName"},
                {"data": "ReservationDescription"},
            //    {"data": "ServiceDescription"},
                {"data": "ServiceName"},
                //render number format for price
                {"data": "Price", render: $.fn.dataTable.render.number(',', '.', '')},
                {"data": "ReservationStartDate"},
                {"data": "ReservationEndDate"},                
                {"data": "CustomerType"},
                {"data": "view"}
            ],
            order: [[1, 'asc']],
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                $('td:eq(0)', row).html();
            }

        });
        // end setup datatables
        // get Edit Records

        $('#mytable').on('click', '.edit_record', function () {
            var code = $(this).data('reservationid');
            $('#ModalApproved').modal('show');
            $('[name="ReservationID"]').val(code);
        });
        // End Edit Records
        // get delete Records
        $('#mytable').on('click', '.delete_record', function () {
            var code = $(this).data('reservationid');
            $('#ModalDisapproved').modal('show');
            $('[name="ReservationID"]').val(code);
        });

        
    });
</script>


