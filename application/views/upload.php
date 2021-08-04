<!DOCTYPE html>
<html>
<body>

<h2>Import Customers Data</h2>

<form action="upload/store" method="post" enctype="multipart/form-data">
			<div class="col-lg-12">
				<div class="form-group">
					<input type="file" name="customers[customer_name]" id="excelfile">
				</div>
			</div>	
			<div class="col-lg-12">
				<input type="submit" value="Upload file" id="upload_btn">
			</div>	
		  </form>

</body>
</html>  