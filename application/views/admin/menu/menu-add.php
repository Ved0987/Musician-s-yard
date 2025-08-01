<!doctype html>
<html lang="en">
<head>
  <?php $this->load->view('admin/template/head'); ?>
  <title>Menu Add</title>
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
        <?php $this->load->view('admin/template/sidebar'); ?>
      </div>
      <div class="col-md-10">
        <div class="container mt-2">
          <div class="row">
            <div class="col-md-12 text-end">
              <a href="<?=base_url()?>admin-logout">Logout</a>
            </div>
          </div>
          <hr>
          <div class="row mt-3">
            <form action="" method="POST" id="menu-form" name='register-form' enctype="multipart/form-data" novalidate>
              <div class="row">
                <div class="col-12 ">
                  <div class="mb-3">
                    <label for="  m_name" class="form-label required">Menu Name</label>
                    <input type="text" class="form-control" id="m_name" name="  m_name" >
                  </div>
                </div>
                <div class="mb-3 text-end">
                  <button type="submit" id="submitBtn" class="btn btn-danger">Add</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('admin/template/footer'); ?>

  <script type="text/javascript">
    $(document).ready(function($) {
      $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg !== value;
      }, "Value must not equal arg.");
      $("#menu-form").validate({
        ignore: "#hidden",
        errorElement: 'div',
        errorClass: 'invalid-feedback',
        successClass: 'is-valid',
        rules: {
          m_name:{
            required:true,
          },
        },
        m_name:{
          s_shopname:{
            required:'Please Enter Menu Name',
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