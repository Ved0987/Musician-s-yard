<!doctype html>
  <html lang="en">
  <head>
     <?php $this->load->view('seller/template/head'); ?>
    <title>Product List</title>
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
            <div class="row">
              <div class="col-md-12 text-end">
                <a class="btn btn-danger f-white" href="<?=base_url()?>seller-product-add">Add Product</a>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <table id="productTable" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($products as $key => $value) { ?>
                      <tr>
                        <td><?=$value->p_id?></td>
                        <td><?=$value->p_name?></td>
                        <td><?=$value->p_price?></td>
                        <?php if($value->p_status == 'active'){ ?> 
                          <td><span class="badge text-bg-success">Active</span></td>
                        <?php }elseif($value->p_status == 'inactive'){ ?>
                          <td><span class="badge text-bg-warning">Inactive</span></td>
                        <?php } ?>
                        <td>
                          <div>
                            <a href="<?=base_url()?>product-details/<?=$value->p_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="<?=base_url()?>product-delete/<?=$value->p_id?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <?php $this->load->view('seller/template/footer'); ?>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#productTable').DataTable();
      });
    </script>
  </body>
  </html>