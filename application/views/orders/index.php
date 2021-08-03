<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="row">
    <div class="col-lg-12">           
        <h2>Orders           
            <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('orders/create') ?>"> Create New Order</a>
            </div>
        </h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
        <th>Sr No.</th>
        <th>Order Name</th>
        <th>Customer Name</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $count=0;
      ?>
   <?php foreach ($orders as $value) { 
       $count++;
       ?>      
      <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo $value->order_name; ?></td>
          <td><?php echo $value->customer_name; ?></td>
      <td>
        <form method="DELETE" action="<?php echo base_url('orders/delete_order/'.$value->order_id);?>">
         <a class="btn btn-info btn-xs" href="<?php echo base_url('orders/edit/'.$value->order_id) ?>"><i class="glyphicon glyphicon-pencil"></i></a>
          <button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
          <a class="btn btn-info btn-xs" href="<?php echo base_url('orders/view/'.$value->order_id) ?>"><i class="fa fa-eye" style="font-size:15px"></i></a>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>
   
   </body>
   </html>
