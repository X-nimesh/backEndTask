<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BackEnd Task</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
      $err=1;
      $err_name=$err_mail=$err_phone=$err_gender='';
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        $err=0; 

        $name=$_POST["name"];
        // echo $name;
        $phone=$_POST['phone'];
        $mail=$_POST["mail"];
        $phonelen=strlen($phone);
        $namelen=strlen($name);
        
   
        if(!filter_input(INPUT_POST,'phone',FILTER_VALIDATE_INT)){
            $err_phone='invalid phone';
        }

        if($name==""){
            $err_name="Name shouldn't be empty";
           
        }

        if($mail==""){
            $err_mail="Mail shouldn't be empty";
        }
   
        if($phone==""){
            $err_phone="Number shouldn't be empty";
        }

        if(!isset($_POST['gender'])){
          $err_gender="Please choose your gender";
         }
     
       if($namelen<=5){
           $err_name= " Name is not valid";
          
        }

        if(!filter_input(INPUT_POST,"mail",FILTER_VALIDATE_EMAIL))
        {
            $err_mail="INVALID EMAIL";
        }

        if(!is_numeric($phone) && $phonelen!=10){
            $err_phone="INVALID PHONE NUMBER";
        }
        elseif($err_name=='' && $err_mail=='' && $err_phone=='' && $err_gender=='' )  {
          echo "Submitted | No error Occurred";
        }   
    }
    
    ?>
    <form action="<?php $_SERVER['PHP_SELF']?>"  method="post" >
    <fieldset  >
            <legend style="color:#00008B" >
                <b>Form</b>
            </legend>
      <label for="name">Name:</label>
      <input id="name" name="name" type="text" />
      <span style="color: red"><?php echo $err_name?></span>

      <br /><br />

      <label for="mail">E-mail:</label>
      <input id="mail" name="mail" type="text" />
      <span style="color: red"><?php echo $err_mail?></span>
      <br /><br />

      <label for="phone">Phone</label>
      <input id="phone" name="phone" type="number" />
      <span style="color: red"><?php echo $err_phone?></span>
      <br /><br />

      <label for="gender">Gender:</label>
      <input type="radio" id="male" name="gender" value="male" />
      <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" />
      <label for="female">Female</label>
      <input type="radio" id="others" name="gender" value="others" />
      <label for="others">Others</label>

      <span style="color: red"><?php echo $err_gender?></span><br />
      <br />

      <label for="hobbies">Hobbies</label>

      <input type="checkbox" name="reading" id="reading" />
      <label for="reading">Reading</label>

      <input type="checkbox" name="traveling" id="traveling" />
      <label for="traveling">Traveling</label>

      <input type="checkbox" name="music" id="music" />
      <label for="music">Music</label><br /><br />
      <button class="submit" type="submit">Submit</button>
    </fieldset>
    </form>
  </body>
</html>
