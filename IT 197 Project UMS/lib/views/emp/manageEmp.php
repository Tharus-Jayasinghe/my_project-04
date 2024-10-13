<?php
include_once("../../functions/db_conn.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Emp Details</title>
    <link rel="stylesheet" href="../../../css/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>
<body >
    <div class="container">
    <div class="card mt-3">
        <div class="card-header">
            <h3>Manage Emp Details</h3>
        </div>
        <div class="card-body">
            <div class="row">
            
                <div class="col-md-12">
                        <table class="table table-hover table-dark table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>NIC</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $db_conn = Connection();
                                        $query = "SELECT * FROM emp_tbl";
                                        $query_run = mysqli_query($db_conn,$query);
                                        $nor = mysqli_num_rows($query_run);
                                        while($row = mysqli_fetch_array($query_run)){
                                    ?>
                                        <tr>
                                            <td><?php  echo $row ['emp_id']  ?> </td>
                                            <td><?php  echo $row ['emp_name']  ?> </td>
                                            <td><?php  echo $row ['emp_email']  ?> </td>
                                            <td><?php  echo $row ['emp_nic']  ?> </td>
                                            <td><?php  echo $row ['emp_tel']  ?> </td>
                                            <td><?php  echo $row ['emp_dob']  ?> </td>
                                            <td>
                                                <button class="btn btn-danger deleteBtn" id= "<?php  echo ($row['emp_id'])  ?> " >DELETE</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning">EDIT</button>
                                            </td>
                                        </tr>

                                    <?php
                                        }
                                    ?>
                                </tbody>
                        </table>
                </div>
                
            </div>
            
        </div>
    </div>
    </div>
    
</body>
</html>
 <script src="../../../css/bootstrap/js/bootstrap.js"></script>


 <script>
    $(document).ready(function(){
            $(".deleteBtn").click(function(){
                var del = $(this).attr("id");
              $.ajax({
                method:"POST",
                url:"../../route/emp/deleteUser.php",
                data:{id:del},
                dataType:"html",
                success : function(data) {
                    if(data == 1){
                        alert("Success the data has been deleted");
                        location.reload(); 
                    }else{
                        alert("Please try again");
                    }
                }
              })
            })
    })
 </script>