<!doctype html>
  <html lang="en">
  <head>
    <?php $this->load->view('admin/template/head'); ?>
    <title>Seller Dashboard</title>
  </head>
  <style type="text/css">
  .upload-img{
    width: 150px;
  }
  #preview{
    height: 150px;
    width: 150px;
    border-radius: 50%;
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
            <div class="row">
              <div class="col-md-12 my-2 text-center">
                <h3>Edit Profile</h3>
              </div>
            </div>
            <div class="card shadow-lg">
            <div class="card-body">
              <form action="" method="POST" id="register-form" name='register-form' enctype="multipart/form-data" novalidate>
                <div class="row">
                  <div class="mb-3">
                    <div class="col-md-12 text-center">
                      <img class="upload-img rounded-circle" id="preview" src="<?=base_url()?><?=$sellerDetails[0]->s_path?>/<?=$sellerDetails[0]->s_profile
                    ?>" onclick="openfileDialog();">
                      <input type="file" id="s_profile" name="s_profile" class="cupload" accept="image/*" data-allowed-file-extensions="png jpg jpeg" style="display: none;">  
                    </div>
                  </div>
                  <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="s_shopname" class="form-label required">Shop Name</label>
                      <input type="text" class="form-control" id="s_shopname" name="s_shopname" value="<?= $sellerDetails[0]->s_shopname ?>" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12 ">
                    <div class="mb-3">
                      <label for="s_gst" class="form-label required">GST</label>
                      <input type="text" class="form-control" id="s_gst" name="s_gst" value="<?= $sellerDetails[0]->s_gst ?>" >
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_fname" class="form-label required">First Name</label>
                      <input type="text" class="form-control" id="s_fname" name="s_fname" value="<?= $sellerDetails[0]->s_fname ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_lname" class="form-label required">Last Name</label>
                      <input type="text" class="form-control" id="s_lname" name="s_lname" value="<?= $sellerDetails[0]->s_lname ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_email" class="form-label required">Email</label>
                      <input type="email" class="form-control" id="s_email" name="s_email" value="<?= $sellerDetails[0]->s_email ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_phone" class="form-label required">Phone</label>
                      <input type="text" class="form-control" id="s_phone" name="s_phone" value="<?= $sellerDetails[0]->s_phone ?>"">
                    </div>
                  </div>
                  <div class="col-md-12 col-12">
                    <div class="mb-3">
                      <label for="s_add" class="form-label required">Address</label>
                      <textarea class="form-control" id="s_add" name="s_add" ><?= $sellerDetails[0]->s_add ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_city" class="form-label required">City</label>
                      <input type="text" class="form-control" id="s_city" name="s_city" value="<?= $sellerDetails[0]->s_city ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_state" class="form-label required">State</label>
                      <input type="text" class="form-control" id="s_state" name="s_state" value="<?= $sellerDetails[0]->s_state ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_country" class="form-label required">Country</label>
                      <input type="text" class="form-control" id="s_country" name="s_country" value="<?= $sellerDetails[0]->s_country ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="mb-3">
                      <label for="s_pincode" class="form-label required">Pincode</label>
                      <input type="text" class="form-control" id="s_pincode" name="s_pincode" value="<?= $sellerDetails[0]->s_pincode ?>">
                    </div>
                  </div>
                </div>
                <div class="mb-3 text-end">
                  <button type="submit" id="submitBtn" class="btn btn-danger">Save</button>
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
    function openfileDialog() {
      $("#s_profile").click();
    }
    $('#s_profile').change(function(){
      const file = this.files[0];
      console.log(file);
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          console.log(event.target.result);
          $('#preview').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
      }
    });
    
  </script>
  <script type="text/javascript">
    $(document).ready(function($) {
      $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
      }, "Value must not equal arg.");
      $("#register-form").validate({
        ignore: "#hidden",
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        successClass: 'is-valid',
        rules: {
          s_shopname:{
            required:true,
          },
          s_gst:{
            required:true,
          },
          s_fname:{
            required :true,
          },                
          s_lname: {
            required: true,
          },
          s_email:{
            required :true,
            email:true,
          },                
          s_phone: {
            required: true,
            minlength:10,
            maxlength:10
          },
          s_password: {
            required: true,
          },
          s_cpassword:{
            required :true,
             equalTo: "#s_password"
          },                
          s_dob: {
            required: true,
          },
          s_gender: {
            valueNotEquals: 'default',
          },
          s_add: {
            required: true,
          },
          s_city: {
            required: true,
          },
          s_state: {
            required: true,
          },
          s_country: {
            required: true,
          },
          s_pincode: {
            required: true,
          },
        },
        messages:{
          s_shopname:{
            required:'Please Enter Shop Name',
          },
          s_gst:{
            required:'Please Enter GST Number',
          },
          s_profile:{
            required:'Please upload image',
          },
          s_fname:{
            required :'Please Enter First Name',
          },                
          s_lname: {
            required: 'Please Enter Last Name',
          },
          s_email:{
            required :'Please Enter Email',
          },                
          s_phone: {
            required: 'Please Enter Phone Number',
          },
          s_password: {
            required: 'Please Enter Password',
          },
          s_cpassword:{
            required :'Please Enter Password Again',
          },                
          s_dob: {
            required: 'Please Enter Date of Birth',
          },
          s_gender: {
            valueNotEquals: 'Please Enter Gender',
          },
          s_add: {
            required: 'Please Enter Address',
          },
          s_city: {
            required: 'Please Enter City',
          },
          s_state: {
            required: 'Please Enter State',
          },
          s_country: {
            required: 'Please Enter Country',
          },
          s_pincode: {
            required: 'Please Enter Pincode',
          },
        },
        errorPlacement: function(error, element) 
        {
          if (element.attr("type") == "file") {
            error.insertAfter(element);
          } else {
            error.insertAfter(element);
          }

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