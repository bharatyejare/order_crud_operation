<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="row">
    <div class="col-lg-12">           
        <h2>Customers           
            <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('customers/upload') ?>"> Upload Customers</a>
            </div>
        </h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
        <th>Sr No.</th>
        <th>Customer Name</th>
        <th>Customer Mobile</th>
        <th>Customer Email</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php $count=0;
      ?>
   <?php foreach ($customers as $value) { 
       $count++;
       ?>      
      <tr>
          <td><?php echo $count; ?></td>
          <td><?php echo $value->customer_name; ?></td>
          <td><?php echo $value->customer_mobile; ?></td>
          <td><?php echo $value->customer_email; ?></td>
      <td>
        <form method="DELETE" action="<?php echo base_url('customers/delete_customer/'.$value->customer_id);?>">
          <button type="submit" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>
</table>
</div>
   
   </body>
   </html>
