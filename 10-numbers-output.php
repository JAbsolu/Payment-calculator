<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/09-numbers-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
       integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
       integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <title><?php echo $updated_title; ?></title>
    <style>
        p {font-size: 1.2rem; font-weight: 300; line-height: 2;}
        .bold { font-weight: 500; }
    </style>
</head>

<?php
    $title = "Your-customized-rate.php";
    $replace_dashes = str_replace("-", " ", $title); // replaced the dashes in the string to dashes.
    $replace_dots = str_replace(".", " ", $replace_dashes); // replaced the dashes in the string to dashes.
    $updated_title = substr($replace_dots, 0, 20); // remove the php substring



    $firstName = $_POST['firstName']; //get first name
    $lastName = $_POST['lastName']; //get last name
    $income = $_POST['income']; //get income
    $downPayment = $_POST['downPayment']; //get down payment
    $car = $_POST['car']; //get car
    $price = $_POST['price']; //get price
    $term = $_POST['term']; //get the term
    $trade = $_POST['trade']; //get the trade value
    $interest = $_POST['interest']; // get interest

    //format full me
    $fullName = trim($firstName) . " " . trim($lastName);

    //format interest
    $interest_formatted = $interest . "%";

    //format 5 figure income 10,000
    if (strlen($income) == 5) $formatted_income = "$" . substr($income, 0,2) . "," . substr($income, 2);
    //format 6 figure income 100,000
    if (strlen($income) == 6) $formatted_income = "$" . substr($income, 0,3) . "," . substr($income, 3);


    //format downpayment
    $formatted_DPayment = "$" . $downPayment;
    //format down payment for numbers over 999
    if (strlen($downPayment) == 4) $formatted_DPayment = "$" . substr($downPayment, 0,1) . "," . substr($downPayment, 1);
    //format down payment for numbers over 9999
    if (strlen($downPayment) == 5) $formatted_DPayment = "$" . substr($downPayment, 0,2) . "," . substr($downPayment, 2);

    //format trade value
    $formatted_trade = "$" .$trade;
    //four figure formatting
    if (strlen($trade) == 4) $formatted_trade = "$" . substr($trade, 0,1) . "," . substr($trade, 1);
    //five figure formating
    if (strlen($trade) == 5) $formatted_trade = "$" . substr($trade, 0,2) . "," . substr($trade, 2);

    //format price
    $formatted_price = "$" . $price;
    //format 5 figure prices
    if (strlen($price) == 5) $formatted_price = "$" . substr($price, 0,2) . "," . substr($price, 2);
    //format 6 figure prices
    if (strlen($price) == 6) $formatted_price = "$" . substr($price, 0,3) . "," . substr($price, 3);


    //calculate monthly payment 
    $formatInterest = $interest / 100; // format the intetrest
    $totalDeduction = $downPayment + $trade; // get the total amount to be deducted
    $totalPreInterest = ($price - $totalDeduction); //total before adding interest
    $totalInterest = $totalPreInterest * $formatInterest; //the total interest in dollars

    $totalPrice = $totalPreInterest + $totalInterest; // the total including interest
    $totalPriceRounded = round($totalPrice, 2); // round total price to 2 decimals
    $formatTotalPrice = "$" . substr($totalPriceRounded, 0,2) . "," . substr($totalPriceRounded, 2); //formatted total price with interest
    $monthlyPayment = $totalPrice / $term; //total Monthly payment


    //get customer monthly income
    $monthly_income = $income / 12;
    $monthly_income = round($monthly_income);

    $monthly_leftOver = $monthly_income - $monthlyPayment;
    $monthly_leftOver = round($monthly_leftOver);

    //format monthly payment
    $monthly_income_formatted = "$" . $monthly_income;
    //4 figure format
    if (strlen($monthly_income) == 4) $monthly_income_formatted = "$" . substr($monthly_income, 0,1) . "," . substr($monthly_income, 1);
    //5 figure format
    if (strlen($monthly_income) == 5) $monthly_income_formatted = "$" . substr($monthly_income, 0,2) . "," . substr($monthly_income, 2);

    //format monthly income left over
    $monthly_leftOver_formatted = "$" . $monthly_leftOver;
    //4 figure format
    if (strlen($monthly_leftOver) == 4) $monthly_leftOver_formatted = "$" . substr($monthly_leftOver, 0,1) . "," . substr($monthly_leftOver, 1);
    //5 figure format
    if (strlen($monthly_leftOver) == 5) $monthly_leftOver_formatted = "$" . substr($monthly_leftOver, 0,2) . "," . substr($monthly_leftOver, 2);


?>


<body class="p-5 bg-dark">
    <h1 class="text-light mb-5 text-center"><?php echo $updated_title; ?></h1>
    <div class="container-fluid p-4 bg-light rounded w-75">
        <div class="row">
            <div class="col">
            <h3 class="output-h2 mb-5"><?php echo "Hi $fullName, here's your submision"; ?></h3>
                <p>
                    <span class="bold">Your selected car:</span> <?php echo $car; ?>
                    <br>
                    <span class="bold">Your selected car price:</span>  <?php echo $formatted_price; ?>
                    <br>
                    <span class="bold">Your income is:</span> <?php echo "$formatted_income / Year"; ?>
                    <br>
                    <span class="bold">Your Down Payment:</span> <?php echo $formatted_DPayment; ?>
                    <br>
                    <span class="bold">Trade in value:</span> <?php echo $formatted_trade; ?>
                    <br>
                    <span class="bold">Term:</span> <?php echo $term; ?>
                    <br>
                    <span class="bold">Interest rate:</span> <?php echo $interest_formatted; ?>
                </p>
            </div>
            <div class="col">
                <h3 class="output-h2 mb-5">Your customized rate and budget</h3>
                <p>
                    <span class="bold">Your monthly payment is:</span> <?php echo "$" . round($monthlyPayment, 2) . " / Month."; ?>
                    <br>
                    <?php echo "You will pay a total of $formatTotalPrice during your $term term."; ?>
                    <br>
                    <br>
                    <?php echo "<b>Your budget:</b> You currently earn $monthly_income_formatted per month, after paying your car note, you will be left will $monthly_leftOver_formatted" ?>
                </p>
            </div>
            
        </div>
    </div>
<footer class="d-flex justify-content-end mt-5">
    <a href="09-numbers-input.php" class="text-light">Back to form</a>
</footer>
</body>
</html>