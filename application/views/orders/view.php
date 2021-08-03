<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <form>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
        <th>Sr No.</th>
        <th>Item Name</th>
        <th>Quantity</th>
        
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
          <td><?php echo $value->item_name; ?></td>
          <td><?php echo $value->qty; ?></td>

      </tr>
      <?php } ?>
  </tbody>
</table>
</div>
   </form>
   </body>
</html>
