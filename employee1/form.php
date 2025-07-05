<?php
include("connection.php");

?>
<?php

if(isset($_POST['searchdata'])){
    $search= $_POST['search'];
    $query= "SELECT * from form where id= '$search' ";
    $data= mysqli_query($conn,$query);
    $result= mysqli_fetch_assoc($data);
   // $name= $result['stdname'];
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Development</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="center">
        <form action="#" method="POST">
        <h1>Records of Workshop Attendees</h1>
        
        <div class="form">
            <input type="text" name="search" class="textfield" placeholder="SL No" value="<?php if(isset($_POST['searchdata'])){ echo $result['id'];}?>">
            <input type="text" name="name" class="textfield" placeholder="Student Name" value="<?php if(isset($_POST['searchdata'])){ echo $result['stdname'];}?>">
            <select name="gender" id="" class="textfield">
                <option value="Not Selected">Select Gender</option>
                <option value="Male"
                <?php
                if( $result['gender']=='Male'){
                    echo "selected";
                }


                ?>
                >Male</option>
                <option value="Female"
                 <?php
                if( $result['gender']=='Female'){
                    echo "selected";
                }


                ?>
                >Female</option>
                <option value="Other"
                 <?php
                if( $result['gender']=='Other'){
                    echo "selected";
                }


                ?>
                >Other</option>

            </select>
            <input type="text" name="email" class="textfield" placeholder="Email Address" value="<?php if(isset($_POST['searchdata'])){ echo $result['email'];}?>">
            <select name="branch" id="" class="textfield">
                <option value="Not Selected">Select Branch</option>

                <option value="CSE"
                 <?php
                if( $result['branch']=='CSE'){
                    echo "selected";
                }


                ?>
                >CSE</option>

                <option value="ECE"
                 <?php
                if( $result['branch']=='ECE'){
                    echo "selected";
                }


                ?>
                >ECE</option>

                <option value="EIE"
                 <?php
                if( $result['branch']=='EIE'){
                    echo "selected";
                }


                ?>
                
                >EIE</option>
                <option value="EE"
                 <?php
                if( $result['branch']=='EE'){
                    echo "selected";
                }


                ?>
                >EE</option>
                <option value="ME"
                 <?php
                if( $result['branch']=='ME'){
                    echo "selected";
                }


                ?>
                >ME</option>
                <option value="CE"
                 <?php
                if( $result['branch']=='CE'){
                    echo "selected";
                }


                ?>
                >CE</option>

            </select>
            <textarea name="feedback" id="" placeholder="Feedback"></textarea>
            <input type="submit" name="searchdata" value="Search" class="btn" style="background-color: grey">
            <input type="submit" name="save" value="Save" class="btn" style="background-color: green">
            <!-- <input type="submit" value="Modify" class="btn" style="background-color: orange"> -->
            <input type="submit" name="delete" value="Delete" class="btn" style="background-color: red">
            <!-- <input type="submit" value="Clear" class="btn" style="background-color: blue"> -->
            



        </div>
        </form>
    </div>
    
</body>
</html>


<?php

if(isset($_POST['save'])){
    $id= $_POST['id'];
   $name= $_POST['name'];
   $gender= $_POST['gender'];
    $email= $_POST['email'];
   $branch= $_POST['branch'];
    $feedback= $_POST['feedback'];

    $query= "INSERT INTO form(id,stdname,gender,email,branch,feedback) VALUES('$id','$name','$gender','$email','$branch','$feedback')";
    $data= mysqli_query($conn,$query);
    if($data){
        echo "Data saved into Database";
    }
    else{
        echo "Failed to save data";
    }
}

?>


<?php
if(isset($_POST['delete'])){
    $id= $_POST['search'];
    $query= "DELETE FROM form WHERE id= '$id' ";
    $data= mysqli_query($conn,$query);

    if($data){
        echo "Record deleted";
    }
    else{
        echo "Failed to delete";
    }
}

?>


