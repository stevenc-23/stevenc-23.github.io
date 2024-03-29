<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Rutgers Time || Subscription Form</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn">Show Modal</label>
  <div class="wrapper">
    <label for="toggle">
    <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="fas fa-laptop"></i></div>
    <div class="content">
      <header>Join our Newsletter Below!</header>
      <p>Subscribe to The Rutgers Times to receive the latest news from around our community straight to your inbox. All free 
        of charge, just input your email below.</p>
    </div>
    <form action="index.php" method="POST">
        <?php 
        $userEmail = ""; //first we leave email field blank
        if(isset($_POST['subscribe'])){ //if subscribe btn clicked
          $userEmail = $_POST['email']; //getting user entered email
          if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user email
            $subject = "Thanks for choosing to join The Rutgers Times newsletter";
            $message = " We are committed to bringing our subscribers the most up to date news around the community. We are dedicated to safely and securly 
            bringing our members updates on a daily basis. Once again thank you for choosing the Rutgers Times, have a great day!";
            $sender = "From: TheRutgersTimes2023@gmail.com";
            //php function to send mail
            if(mail($userEmail, $subject, $message, $sender)){
              ?>
               <!-- show sucess message once email send successfully -->
              <div class="alert success-alert">
                <?php echo "Thank You for Subscribing " ?>
              </div>
              <?php
              $userEmail = "";
            }else{
              ?>
              <!-- show error message if somehow mail can't be sent -->
              <div class="alert error-alert">
              <?php echo "An Error has occured while attempting to reach your email. Please try again" ?>
              </div>
              <?php
            }
          }else{
            ?>
            <!-- show error message if user entered email is not valid -->
            <div class="alert error-alert">
              <?php echo "$userEmail is not a valid email address, Please input a valid address!" ?>
            </div>
            <?php
          }
        }
        ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Email Address" required value="<?php echo $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="subscribe">Subscribe</button>
      </div>
    </form>
    <div class="text">We do not disclose any of your information!</div>
  </div>
</body>
</html>
