<!doctype html>
  <html lang="en">
  <head>
    <?php $this->load->view('seller/template/head'); ?>
    <title>Product Edit</title>
  </head>
  <style type="text/css">
    .float-btn{
      position: absolute;
      top: -10px;
      right: -5px;
    }
  </style>
  <body>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-md-2 border-end">
          <?php $this->load->view('seller/template/sidebar'); ?>
        </div>
        <div class="col-md-10">
          <div class="container mt-2">
            <div class="row">
              <div class="col-md-12 text-end">
                <a href="<?=base_url()?>seller-logout">Logout</a>
              </div>
            </div>
            <hr>
            <div class="row mt-3">
              <div class="col-md-12">
                <form action="" method="POST" id="register-form" name='register-form' enctype="multipart/form-data" novalidate>
                  <div class="row">
                    <div class="col-md-6 col-12 ">
                      <div class="mb-3">
                        <label for="p_name" class="form-label required">Product Name</label>
                        <input type="text" class="form-control" id="p_name" name="p_name" value="<?=$product[0]->p_name?>" >
                      </div>
                    </div>
                    <div class="col-md-6 col-12 ">
                      <div class="mb-3">
                        <label for="p_menu" class="form-label required">Select Menu</label>
                        <select class="form-select" name="p_menu" aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <?php foreach ($menu as $key => $value) { ?>
                           <option <?php if($value->m_id == $product[0]->p_menu){echo "selected";} ?> value="<?=$value->m_id?>"><?=$value->m_name?></option>
                         <?php } ?>
                       </select>
                     </div>
                   </div>
                   <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="p_price" class="form-label required">Product Price</label>
                      <input type="text" class="form-control" id="p_price" name="p_price" value="<?=$product[0]->p_price?>" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="images" class="form-label required">Product Images</label>
                      <input type='file' name='images[]' class="form-control" multiple="multiple">
                    </div>
                  </div>
                  <div class="col-md-12 col-12 ">
                    <div class="mb-3">
                      <label for="p_dis" class="form-label required">Product Description</label>
                      <textarea class="form-control" id="p_dis" name="p_dis" ><?=$product[0]->p_dis?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <?php 
                    foreach ($images as $key => $value) { ?>
                      <div class="col-md-4">
                        <div class="card">
                          <img src="<?=base_url()?>uploads/product_images/<?=$value->p_photo?>">
                          <div class="float-btn">
                            <a href="javascript:void(0)" id="delete_<?=$value->ph_id?>" data-id="<?=$value->ph_id?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                          </div>
                        </div>
                      </div>
                    <?php   }
                    ?>
                  </div>
                  <div class="row mt-3">
                    <div class="offset-md-4 col-md-4 text-center">
                      <button type="submit" id="save-place" class="btn btn-danger">Edit Product</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('seller/template/footer'); ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#p_dis').summernote({
        height: 150,
      });
    })

    $('a[id^="delete_"]').click(function () {
     $id = $(this).attr('data-id');
     $.ajax({
      url:base_path+'sellers/product/deleteimage',
      type:"POST",
      data: {id:$id},
      success: function(result){
        if(result == 'success'){
         location.reload();
       }
     }
   });
   })
 </script>
</body>
</html>