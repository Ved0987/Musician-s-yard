<!doctype html>
<html lang="en">
<head>
  <?php $this->load->view('admin/template/head'); ?>
  <title>Seller Add</title>
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
              <a class="btn btn-danger f-white" href="<?=base_url()?>admin-menu-add">Add Menu</a>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <table id="menuTable" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Menu Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($menu as $key => $value) { ?>
                    <tr>
                      <td><?=$value->m_id?></td>
                      <td><?=$value->m_name?></td>
                      <?php if($value->m_status == 'active'){ ?> 
                        <td><span class="badge text-bg-success">Active</span></td>
                      <?php }elseif($value->m_status == 'inactive'){ ?>
                        <td><span class="badge text-bg-warning">Inactive</span></td>
                      <?php } ?>
                      <td>
                        <div>
                          <a href="<?=base_url()?>admin-menu-edit/<?=$value->m_id?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <a href="javascript:void(0)"><i class="fa fa-trash ms-3" aria-hidden="true"></i></a>
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
        $('#menuTable').DataTable();
      });
    </script>
  
</body>
</html>