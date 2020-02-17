
<section style="margin-top:20px;" class=" section_padding1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 section_padding2 ">
                <div class="pp_title text-justify">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="page_title1 text-center">
                                <h2>Create Post</h2>
                                <hr style="margin-bottom:20px;margin-top:10px;">
                            </div>
                        </div>
                    </div>




                    <?php echo validation_errors(); ?>

                    <?php echo form_open_multipart('admins/create'); ?>
                    <div class="row"> 
                        <div class=col-md-8 col-lg-8 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label >PRODUCT NAME </label>
                                <input type="text" class="form-control" name ="name" >
                            </div>
                        </div>
                        <div class=col-md-4 col-lg-4 col-xs-12 col-sm-12>
                                <div class="form-group ">
                                <label> CATEGORY </label>
                                <select name="category_id" class="form-control">
                                    <option value="select">PLEASE SELECT</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['CategoryID']; ?>"><?php echo $category['CategoryName']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>






                    <div class="row"> 
                        <div class=col-md-5 col-lg-5 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label >UNIT PRICE</label>
                                <input type="text" class="form-control" name ="unitprice" >
                            </div>
                        </div>
                        <div class=col-md-5 col-lg-5 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label >SPECIAL PRICE</label>
                                <input type="text" class="form-control" name ="saleprice" >
                            </div>
                        </div>
                        <div class=col-md-2 col-lg-2 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label >SAVE PRICE</label>
                                <input disabled="disabled" type="text" class="form-control" name ="saveprice" >
                            </div>
                        </div>
                    </div>


                    <div class="row"> 
                        <div class=col-md-12 col-lg-12 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label>SPECIFICATION</label>
                                <textarea id="editor1" class="form-control" name="specification" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>





                    <div class="row"> 
                        <div class=col-md-12 col-lg-12 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label>DESCRIPTION</label>
                                <textarea id="editor2" class="form-control" name="description" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row"> 
                        <div class=col-md-2 col-lg-2 col-xs-12 col-sm-12>
                            <div class="form-group">
                                <label >IMAGES</label>
                                <div>
                                    <a class="btn btn-default" data-toggle="modal" data-target="#myModal" href=""><img width="190px"  id="image1" style="border:1px solid #ececec;margin-bottom:5px;height:200px;" class="alignleft" src="" id="img1" alt=""></a>       
                                </div>
                            </div>

                            </form>
                        </div>



                        <div class="row"> 
                            <div style="margin-bottom:5px;"  class=col-md-12 col-lg-12 col-xs-12 col-sm-12>
                                <button type="submit" class="btn btn-default">SUBMIT POST</button>
                            </div>
                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
               
                <div class="modal-body">
                    <p>
                        Enter your Link
                    </p>
                    <div class="form-group">
                        <input name="id" id="linkImage" type="text">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="uploadlink()" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              
            </div>
        </div>
    </div>

</section>



    <script>
        function deleteItem(link_)
        {
            document.getElementById('productID').value = link_;
        }

        function uploadlink()
        {
            var link_ = document.getElementById('linkImage').value;
            document.getElementById('image1').src=link_;
          //  $('#myModal').modal('toggle'); 
            $('body').removeClass('modal-open'); 
//modal-open class is added on body so it has to be removed
            $('.modal-backdrop').remove();
        }

    </script>


