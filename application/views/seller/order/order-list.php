<!doctype html>
<html lang="en">
<head>
 <?php $this->load->view('seller/template/head'); ?>
 <title>Order List</title>
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
          <div class="col-md-4">
            <label>Order Status</label>
            <select class="form-select" aria-label="Default select example" id="filter_status">
              <option selected value="default">Select Menu</option>
              <option value="All" <?php if(@$filteStatus == 'All'){echo 'selected';} ?> >All</option>
              <option value="Pending" <?php if(@$filteStatus == 'Pending'){echo 'selected';} ?>>Pending</option>
              <option value="Accepted" <?php if(@$filteStatus == 'Accepted'){echo 'selected';} ?> >Accepted</option>
              <option value="Shipped" <?php if(@$filteStatus == 'Shipped'){echo 'selected';} ?> >Shipped</option>
              <option value="Delivery" <?php if(@$filteStatus == 'Delivery'){echo 'selected';} ?> >Delivery</option>
              <option value="Cancel" <?php if(@$filteStatus == 'Cancel'){echo 'selected';} ?> >Cancel</option>
            </select>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12">
            <table id="productTable" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>Order Date</th>
                  <th>Order Id</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($order as $key => $value) { ?>
                  <tr>
                    <td><?=getDateFormat($value->o_date)?></td>
                    <td>#order_<?=$value->o_id?></td>
                    <td>₹<?=$value->total?></td>
                    <?php if($value->o_status == 'Pending'){ ?> 
                      <td><span class="badge text-bg-warning">Pending</span></td>
                    <?php }elseif($value->o_status == 'Accepted'){ ?>
                      <td><span class="badge text-bg-success">Accepted</span></td>
                    <?php }elseif($value->o_status == 'Shipped'){ ?>
                      <td><span class="badge text-bg-info ">Shipped</span></td>
                    <?php }elseif($value->o_status == 'Delivery'){ ?>
                      <td><span class="badge text-bg-secondary">Delivery</span></td>
                       <?php }elseif($value->o_status == 'Cancel'){ ?>
                      <td><span class="badge text-bg-danger">Cancel</span></td>
                    <?php }else{?>
                      <td><span class="badge text-bg-danger">Return</span></td>
                    <?php } ?>
                    <td>
                      <div>
                        <a href="<?=base_url()?>seller-order-details/<?=$value->o_id?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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

$( "#filter_status" ).change(function() {
  $value = $(this).val();
  if($value == 'default' || $value == 'All'){
  location.href = base_path+'seller-order';

  }else{
  location.href = "?status="+$value;
  }
});
</script>
</body>
</html>