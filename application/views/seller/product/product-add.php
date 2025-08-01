<!doctype html>
<html lang="en">
<head>
  <?php $this->load->view('seller/template/head'); ?>
  <title>Product Add</title>
</head>
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
                      <input type="text" class="form-control" id="p_name" name="p_name" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="p_menu" class="form-label required">Select Menu</label>
                      <select class="form-select" name="p_menu" aria-label="Default select example">
                        <option value="default" selected>Open this select menu</option>
                        <?php foreach ($menu as $key => $value) { ?>
                           <option value="<?=$value->m_id?>"><?=$value->m_name?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="p_price" class="form-label required">Product Price</label>
                      <input type="text" class="form-control" id="p_price" name="p_price" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="images" class="form-label required">Product Images</label>
                     <input type='file' id="proImage" name='images[]' class="form-control" multiple="multiple" accept="image/png, image/gif, image/jpeg">
                    </div>
                  </div>
                  <div class="col-md-12 col-12 ">
                    <div class="mb-3">
                      <label for="p_dis" class="form-label required">Product Description</label>
                      <textarea class="form-control" id="p_dis" name="p_dis" ></textarea>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="offset-md-4 col-md-4 text-center">
                      <button type="submit" id="save-place" class="btn btn-danger">Add Product</button>
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
  </script>
  <script type="text/javascript">
    $(document).ready(function($) {
      $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
      }, "Value must not equal arg.");
$('#proImage').change(
                function () {
                    var fileExtension = ['jpeg', 'jpg'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        alert("Only '.jpeg','.jpg', formats are allowed.");
                        $('#proImage').val('');
                        return false; }
});
      $("#register-form").validate({
        
        rules: {
          p_name:{
            required:true,
          },
          p_price:{
            required :true,
          },
          'images[]':{
            required : true,

          },
          p_dis:{
            required:true,
          },
          p_menu:{
            valueNotEquals : 'default',
          }
        },
        errorPlacement: function(error, element) 
        {
          if (element.attr("type") == "file") {
            error.insertAfter(element);
          } else {}
        },
        highlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-valid').addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function(form) {
          $('#submitBtn').prop('disabled',true);
          form.submit();
        }     
      });
    });
  </script>
</body>
</html>