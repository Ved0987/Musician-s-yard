<!doctype html>
  <html lang="en">
  <head>
    <?php $this->load->view('admin/template/head'); ?>
    <title>Admin Dashboard</title>
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
            <div class="row mt-3">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h1><?=count($users)?></h1>
                    <h2>Total Users</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h1><?=count($seller)?></h1>
                    <h2>Total Sellers</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h1><?=count($product)?></h1>
                    <h2>Total Product</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('admin/template/footer'); ?>
  </body>
  </html>