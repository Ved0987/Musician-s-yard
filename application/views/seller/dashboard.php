<!doctype html>
  <html lang="en">
  <head>
    <?php $this->load->view('admin/template/head'); ?>
    <title>Seller Dashboard</title>
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
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h1><?=$totalProduct?></h1>
                    <h3>Total Product</h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h1><?=$activeProduct?></h1>
                    <h3>Total Active Product</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('seller/template/footer'); ?>
  </body>
  </html>