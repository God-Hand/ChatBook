<?php
  require '../config/config.php';
  require 'classes/User.php';
  require '../functions/text_filter.php';

  $user = new User($conn, $_SESSION['username']);
  if(isset($_POST['phoneno']) and !empty($_POST['phoneno'])){
    $user->setPhoneNumber($_POST['phoneno']);
  } if(isset($_POST['gender']) and !empty($_POST['gender'])){
    $user->setGender($_POST['gender']);
  } if(isset($_POST['city']) and !empty($_POST['city'])){
    $city = removeSpaces($_POST['city']);
    $city = secureText($conn, $city);
    $user->setCity($city);
  } if(isset($_POST['state']) and !empty($_POST['state'])){
    $state = removeSpaces($_POST['state']);
    $state = secureText($conn, $state);
    $user->setState($state);
  } if(isset($_POST['country']) and !empty($_POST['country'])){
    $country = removeSpaces($_POST['country']);
    $country = secureText($conn, $country);
    $user->setCountry($country);
  } if(isset($_POST['school']) and !empty($_POST['school'])){
    $school = removeSpaces($_POST['school']);
    $school = secureText($conn, $school);
    $user->setSchool($school);
  } if(isset($_POST['college']) and !empty($_POST['college'])){
    $college = removeSpaces($_POST['college']);
    $college = secureText($conn, $college);
    $user->setCollege($college);
  } if( isset($_POST['birthday']) and !empty($_POST['birthday'])) {
    if (date("m/d/y",strtotime($_POST['birthday']) == $_POST['birthday'])) {
      $user->setBirthDay(date("m/d/y",strtotime($_POST['birthday'])));
      echo date("m/d/y",strtotime($_POST['birthday']));
    } else {
      echo 'invalid';
    }
  }
?>