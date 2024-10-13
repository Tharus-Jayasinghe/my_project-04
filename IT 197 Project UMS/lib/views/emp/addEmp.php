<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Emp Details</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>
<body>
    
    <div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h3>Add Emp Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                <form id="empRegistrationForm">
                <div class="form-group">
                    <input type="text" name="empName" class="form-control" placeholder="Enter EMP Name...">
                </div>
                <div class="form-group mt-2">
                    <input type="temail" name="empEmail" class="form-control" placeholder="Enter EMP Email...">
                </div>
                <div class="form-group mt-2">
                    <input type="text" name="empNic" class="form-control" placeholder="Enter EMP Nic...">
                </div>
                <div class="form-group mt-2">
                    <input type="text" name="empTel" class="form-control" placeholder="Enter EMP Phone...">
                </div>
                <div class="form-group mt-2">
                    <input type="date" name="empDob" class="form-control" placeholder="Enter EMP DOB...">
                </div>
                <div class="form-group mt-2">
                    <input type="submit" name="btnSave"  id ="btnSave" class="btn btn-success" >
                    <input type="reset" value="Clear" class="btn btn-danger">
                </div>

            </form>
                </div>
                <div class="col-md-2"></div>
            </div>
            
        </div>
    </div>
    </div>
    
</body>
</html>
 <script src="../../../css/bootstrap/js/bootstrap.js"></script>
 <script>
    //pass the data rote file.....
    $('#btnSave').click(function(e){
        $.ajax({
            url:"../../route/emp/register.php",
            type:"post",
            data:$('#empRegistrationForm').serialize(),
            success:function(data){
                if(data == '1' ){
                    alert("Success");
                }else{
                    alert("Error");
                }
            }
        })

    });
 </script>
 <script>
    
 </script>