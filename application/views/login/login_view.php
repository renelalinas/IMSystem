



<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?php echo base_url();?>login/process' method='post' name='process'>
                            <fieldset>
                                <?php if(! is_null($msg)) echo $msg;?> 
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                
                                <button type="Submit" class="btn btn-lg btn-success btn-block">Login</button>
                                <a href="<?php echo base_url(); ?>home/index" class="btn btn-lg btn-danger btn-block">Back</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>