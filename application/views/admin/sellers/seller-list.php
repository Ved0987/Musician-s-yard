<!doctype html>
  <html lang="en">
  <head>
    <?php $this->load->view('admin/template/head'); ?>
    <title>Seller List</title>
  </head>
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
            <div class="row">
              <div class="col-md-12 text-end">
                <a class="btn btn-danger f-white" href="<?=base_url()?>admin-seller-add">Add Seller</a>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <table id="userTable" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Shop Name</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($sellers as $key => $value) { ?>
                      <tr>
                        <td><?=$value->s_id?></td>
                        <td><?=$value->s_shopname?></td>
                        <td><?=ucfirst($value->s_fname)?> <?=$value->s_lname?></td>
                        <td><?=$value->s_email?></td>
                        <?php if($value->s_status == 'active'){ ?> 
                          <td><span class="badge text-bg-success">Active</span></td>
                        <?php }elseif($value->s_status == 'inactive'){ ?>
                          <td><span class="badge text-bg-warning">Inactive</span></td>
                        <?php }elseif($value->s_status == 'pending'){ ?>
                          <td><span class="badge text-bg-danger">Pending</span></td>
                        <?php } ?>
                        <td>
                          <div>
                            <a href="<?=base_url()?>seller-details/<?=$value->s_id?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
    <?php $this->load->view('admin/template/footer'); ?>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#userTable').DataTable();
      });
    </script>
  </body>
  </html>