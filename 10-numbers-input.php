<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Lease Payment Calculator</title>
      <link rel="stylesheet" type="text/css" href="css/normalize.css">
      <link rel="stylesheet" type="text/css" href="css/09-numbers-style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
         integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <!-- MOVE THIS FORM CSS TO AN EXTERNAL CSS FILE MODIFY AS NEEDED -->
      <style>
         body {padding:20px;}
         input[type=text], select {  width: 100%;  padding: 12px 20px;  margin: 8px 0;  display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;  box-sizing: border-box; font-size: 14pt;}
         input[type=email], select {  width: 100%;  padding: 12px 20px;  margin: 8px 0;  display: inline-block;  border: 1px solid #ccc;  border-radius: 4px;  box-sizing: border-box; font-size: 14pt;}
         input[type=submit] {  width: 100%;  background-color: #000000;  color: white;  padding: 14px 20px;  margin: 8px 0;  border: none;  border-radius: 4px;  cursor: pointer;}
         input[type=submit]:hover {  background-color: #45a049;}
         input[type=reset] {  width: 100%;  background-color: #FFCCCB;  color: red;  padding: 14px 20px;  margin: 8px 0;  border: none;  border-radius: 4px;  cursor: pointer;}
         input[type=reset]:hover {  background-color: red  ; color: #ffffff;}
         div {border-radius: 5px;  background-color: #ffffff;  margin: 20px; padding: 20px;}
         .danger {color: red;}
         .blue {color: blue;}
         .green {color: green;}
      </style>
   </head>
   <body class="container bg-dark">
      <!-- Title -->
      <?php
         $title = "Lease payment calculator";
         $updated_title = $title;
      ?>

      <header>
         <h1 class="text-white text-center"><?php echo $updated_title; ?></h1>
      </header>
      <main class="d-flex justify-content-center">
         <?php 
             //set default value of variables for initial page load
            if (!isset($price)) { $price = 20655; } 
            if (!isset($trade)) { $years = 0; } 
            ini_set('display_error',1);    // Makes sures error display is on  1=on 0=off

            $interest_rate = 5.07;
            $interest_rate_formatted = $interest_rate . "%";
         ?>
         <!-- This section is for your DATA INPUT FORM -->  
         <div class=" w-75 px-5 pl-5 d-flex justify-content-center">
            <form action="10-numbers-output.php" method="post" class="p-5 rounded">
               <label for="grade">
                  <h2>This form calculates lease payments for a new car</h2>
               </label>
               <h3 style="font-weight: lighter">Fill the form to get a customized rate</h3>
               <p class="danger"><?php echo $message; ?></p>
               <input type="text" name="firstName" placeholder="First name" required>
               <input type="text" name="lastName" placeholder="Last name" required>
               <input type="text" name="income" placeholder="Yearly income" required>
               <input type="text" name="downPayment" placeholder="Down payment" required>
               <input type="text" name="trade" placeholder="Trade in value" required>
               <div class="form-group w-100 mx-0 px-0">
                  <h5>Car Year, Make and Model</h5>
                  <input type="text" name="car" placeholder="Enter car name"/>
                  <h5>Car price</h5>
                  <input type="text" name="price" placeholder="Enter total price with tax"/>
                  <h5>Interest Rate </h5>
                  <input type="text" value="" name="interest" placeholder="Enter interest rate"/>
                  <!-- loan terms -->
                  <h5>Loan terms</h5>
                  <select class="w-100" name="term">
                     <option name="36" value="36 Months" required>36 Months</option>
                     <option name="48" value="38 Months" required> 48 Months</option>
                     <option name="60" value="60 Months" required>60 Months</option>
                     <option name="72" value="72 Months" required>72 Months</option>
                  </select>
               </div>
                  
               <input type="submit" name="calculate" value="Calculate" class="bg-dark">
               <input type="reset"  name="reset"  value="Clear Form">
            </form>
         </div>
        <!-- Dont' delete this line -->
         <!--  Okay to put HTML BELOW THIS LINE --> 
      </main>
   </body>
</html>