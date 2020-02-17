<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Element Spa</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">



    </head>

    <body>




        <!------ Include the above in your HEAD tag ---------->

        <section class="testimonial py-5" id="testimonial">
            <div class="container">
                <div class="row ">
                    <div class="col-md-4 py-5 bg-success text-white text-center ">
                        <div class=" ">
                            <div class="card-body">
                                <img class="img-fulid" src="" alt=""></a>
                                <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                                <h2 class="py-3">Registration</h2>
                                <p>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 py-5 border">
                        <h4 class="pb-4">Please fill with your details</h4>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('accounts/register'); ?>

                        <div class="form-row">


                            <div class="form-group col-md-6">

                                <input value="<?php echo $usernomination['Reg-FirstName']; ?>" class="form-control" placeholder="First Name" name="FirstName" type="text" required="required" autofocus>
                            </div>

                            <div class="form-group col-md-6">

                                <input value="<?php echo $usernomination['Reg-MiddleName']; ?>" class="form-control" placeholder="Middle Name" name="MiddleName" type="text"  required="required" value="">
                            </div>
                            <div class="form-group col-md-6">

                                <input value="<?php echo $usernomination['Reg-LastName']; ?>" class="form-control" placeholder="Last Name" name="LastName" type="text"  required="required" value="">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input value="<?php echo $usernomination['Reg-EmailAddress']; ?>" class="form-control" placeholder="Street Address" name="EmailAddress" type="text" required="required" value="">
                            </div>
                            <div class="form-group col-md-7">
                                <input value="<?php echo $usernomination['Reg-City']; ?>" class="form-control" placeholder="City" name="City" type="text" required="required" value="">
                            </div>
                        </div> 
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input value="<?php echo $usernomination['Reg-Province']; ?>" class="form-control" placeholder="Province" name="Province" type="text" required="required" value="">
                            </div>
                            <div class="form-group col-md-4">
                                <input value="<?php echo $usernomination['Reg-Postal']; ?>" class="form-control" placeholder="Postal / Zip Code" name="Postal" type="number" required="required" value="">
                            </div>
                        </div> 

                        <div class="form-row">                                                    
                            <div class="form-group col-md-6">
                                <div class="form-group" id='datetimepicker'>
                                    <label for="p-in" class="col-md-4 label-heading">Birthday</label>
                                    <div class="col-md-8" >
                                        <div class='input-group date' id='datetimepicker1' >
                                            <input name="Birthday" type='text' class="form-control" id="Birthday"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <input value="" class="form-control" placeholder="Age" name="Age" type="number" maxlength="3" required="required"  value="">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group input-group col-md-6">
                                <span class="input-group-addon">+63</span>
                                <input value="<?php echo $usernomination['Reg-ContactNumber']; ?>" class="form-control" placeholder="Contact Number" name="ContactNumber" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  required="required" maxlength="10" >
                            </div>
                            <div class="form-group input-group col-md-1">
                                <h5><b>Sex:</b></h5>
                            </div>
                            <div class="form-group input-group col-md-5">
                                <input type="radio" name="Sex" id="optionsRadios1" value="Male" checked="">Male         
                                <input type="radio" name="Sex" id="optionsRadios2" value="Female">Female
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input value="<?php echo $usernomination['Reg-UserName']; ?>" class="form-control" placeholder="UserName" name="UserName" type="text" required="required" value="">
                            </div>
                            <div class="form-group col-md-6">
                                <input value="<?php echo $usernomination['Reg-Password']; ?>" class="form-control" placeholder="Password" name="Password" type="password" required="required" value="">
                            </div>
                        </div>
                        <div class="form-row">

                            <button type="submit" class="btn btn-lg btn-success btn-block" >
                                Submit
                            </button>
                            <a href="javascript:window.history.go(-1);" class="btn btn-lg btn-danger btn-block">Back</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>



        <script type="text/javascript">
 
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            $(document).ready(function () {
                $('#datetimepicker1').datetimepicker({
                    //             
                    //             maxDate: today
                    format: 'YYYY-MM-DD',
          //          minDate: , // Current day
                    maxDate: today, // 30 days from the current day
                    viewMode: 'days'
                });

            });

        </script>
    </body>

</html>
