
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="db-registration-style.css">

<style type="text/css">
  .form-group input[type='text']{
      width: 70%;
      display: block;
      margin-left: auto;
      margin-right: auto;
      border-radius: 25px;
      border-color: #fff;
  }

</style>

</head>
<script type="text/javascript">
  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
<body>
	
  <div class="jumbotron">
    <h1 class="text-center" style="color: #fff ;font-size: 35px; margin-bottom: 29px;">Register</h1>      
    <form class="form-inline" method="post" action="php/registerDeliveryBoy.php" enctype="multipart/form-data">
    
  <div class="text-center">
     <div class="form-group">
     <div class="row">
     	<a class="choose-button" onclick="document.getElementById('myFileInput').click()"><div class="col-md-3 img">
     		<img src="download.png" alt="" class="img-circle" id="blah" style="width: 150px; height: 150px">
        
        <div class="rohan">
          <input type="file" id="myFileInput" name="file" style="display: none;" onchange="readURL(this)">
          <!--<input type="submit" name="upload">
-->

        </div>
     	</div></a>
     </div>
    </div>
    </div>

    <!--<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

     Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">

     <form class="md-form" method="post" action="delivery.php" >
     <div class="file-field">
     <div class="btn btn-mdb-color btn-rounded float-left">
        <span>Add photo</span>
        <input type="file">
      </div>
      
      
    
    </div>
    </form>
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
      </div>
    </div>-->

  


<div class="text-center">
     <div class="form-group" style="margin-top: 30px;">
      <input type="text" class="form-control" id="name" placeholder="Enter Name"  required name="db_name">
    </div>
    <div class="form-group">
    <button type="submit" name="upload" class="btn btn-primary btn-round-lg btn-lg" style="color: #ff7878;background-color: #fff;border-color: #fff;">Register</button>
    </div>


</div>
</form>
    </div>
