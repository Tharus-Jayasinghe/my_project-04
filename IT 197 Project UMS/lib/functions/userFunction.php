<?php

//include databse connection
include_once("db_conn.php");

//create user user Registration function

function userRegistration($userName,$userEmail,$userpass,$userPhone,$userNic){
    //create databse connection
    $db_conn = Connection();
    //data insert query
    $insertSql = "INSERT INTO user_tbl(user_name,user_email,user_phone,user_nic,user_status)
    VALUES('$userName','$userEmail','$userPhone','$userNic',1);";

    $sqlResult = mysqli_query($db_conn,$insertSql);

    //check databse connection errors
    // if(mysqli_connect_errno($sqlResult)){
    //     echo(mysqli_connect_error($sqlResult));
    // }

    //if the registration result is success we can feed data into the login table also
    if($sqlResult > 0){
        //use MD5 method to our password
        $newPassword = md5($userpass);

        $insertLogin = "INSERT INTO login_tbl(login_email,login_pwd,login_role,login_status)
        VALUES('$userEmail','$newPassword','user',1);";

        $loginResult = mysqli_query($db_conn,$insertLogin);

           //check databse connection errors
        //  if(mysqli_connect_errno($loginResult)){
        // echo(mysqli_connect_error($loginResult));
        // }
        
        return("<br><br><br><center>Your Registration Success!!!<br><br>Now you can join!!!<center>");
    

    }else{
        return("Please Try Again!!!");
    }

}


//login function
function Authentication($userName,$userPass){
    //call databse connection
    $db_conn = Connection();
    $sqlFetchUser = "SELECT * FROM login_tbl WHERE login_email = '$userName';";
    $sqlResult = mysqli_query($db_conn,$sqlFetchUser);

     //check databse connection errors
    //  if(mysqli_connect_error($sqlResult)){
    //     echo(mysqli_connect_error($sqlResult));
    // }

    //convert user password into a hash value
    $newpass = md5($userPass);

    //check the nuber of the rows
    $norows = mysqli_num_rows($sqlResult);

    //validating the number of records > 0 or not
    if($norows > 0){
        //fetch the user records
        $rec  = mysqli_fetch_assoc($sqlResult);

        //validate the password
        if($rec['login_pwd'] == $newpass){
            //validate the user login status
            if($rec['login_status'] == 1){
                if($rec['login_role'] == "admin"){
                    //redirect this uer into the admin dashboard
                    header('location:lib/views/dashboards/admin.php');
                }else{
                    
                    //redirect this uer into the user dashboard
                     header('location:lib/views/dashboards/user.php');

                }
            }else{
                return("Your Account Has Been Diactivated!");
            }
        }else{
            return("Your Password Is Not Correct!Please Try Again!");
        }
    }else{
        return("No Recors Are Found!");
    }



}

function empRegistration($empName,$empEmail,$empNic,$empTel,$empDob){
    $db_conn = Connection();

    $insert = "INSERT INTO emp_tbl(emp_name,emp_email,emp_nic,emp_tel,emp_dob)
    VALUES ('$empName','$empEmail','$empNic','$empTel','$empDob');";

    $result = mysqli_query($db_conn,$insert);
    if($result > 0){
        return 1;
    }else{
        return 0;
    }
}

        function delteUser($id){
            $db_conn = Connection();
            $query = "DELETE FROM emp_tbl WHERE emp_id = '$id' ";
            $queryResult = mysqli_query($db_conn,$query);
            if($queryResult > 0){
                return 1;
            }else{
                return 0;
            }

        }


?>