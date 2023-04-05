<?php
session_start();
include '../env.php';

$name= $_REQUEST['name'];
$address= $_REQUEST['address'];
$phone= $_REQUEST['phone'];
$email= $_REQUEST['email'];
$review= $_REQUEST['review'];

$id= $_REQUEST['id'];


$errors=[];

if(!empty($name)){
    if(strlen($name) <=2){
        $errors['name_error']='type name minimum 3 char';

    }elseif(strlen($name) >=21){
        $errors['name_error']= 'type name maximum 20 char';

    }

}

if(empty($address)){
    //echo "give your adddress";
    $errors['address_error']= 'give your adddress';
}elseif(strlen($address) >=50){
    //echo "address too long";
    $errors['address_error']= 'address too long';
}



if(empty($phone)){
    //echo "we need to call you, give number";
    $errors['phone_error']= 'need to call, give number';
}elseif(strlen($phone) !=11){
    //echo "invalid number,number must be 11 digit";
    $errors['phone_error']= 'invalid number,number must be 11 digit';
}


if(empty($email)){
    //echo "enter email id";
    $errors['email_error']= 'enter email id';
}



if(empty($review)){
    //echo "share your experiences";
    $errors['review_error']= 'share your experiences';
}


if(count($errors) > 0 ){
    $_SESSION['form_error']=$errors;
    header("Location: ../editform.php?id=$id");
}
else{
    $query= "UPDATE addresses SET name='$name',address='$address',
    phone='$phone',email='$email',review='$review' WHERE id='$id'";
    //mysqli_query($dbconnect,$query);
    $response=mysqli_query($dbconnect,$query);


    if($response){
        $_SESSION['msg']='Details has been updated';
        header("Location: ../allmembers.php");
    }

    





}