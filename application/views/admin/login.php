<!doctype html>
  <html lang="en">
  <head>
    <?php $this->load->view('admin/template/head'); ?>
    <title>Admin Login</title>
  </head>
  <body>
    <section>
      <div class="container py-5">
        <div class="row ">
          <div class="col-md-8 offset-md-2">
            <div class="card shadow-lg ">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 text-center">
                    <a class="navbar-brand" href="<?=base_url()?>"><img class="header-logo" src="<?=base_url()?>assets/images/logo.png"></a>
                    <h2 class="mt-2">Admin Login</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <form action="" method="POST" id="login_form" name='login_form' enctype="multipart/form-data" >
                  <div class="mb-3">
                    <label for="admin_email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="admin_email" name="admin_email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password">
                  </div>
                  <div class="mb-3 text-end">
                    <button type="submit" id="submitBtn" class="btn btn-danger">Login</button>
                  </div>
                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php $this->load->view('admin/template/footer'); ?>
    <script type="text/javascript">
    $(document).ready(function($) {
      $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
      }, "Value must not equal arg.");
      $("#login_form").validate({
        
        rules: {
          admin_email:{
            required:true,
            email:true,
          },
          admin_password:{
            required :true,
          },                
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