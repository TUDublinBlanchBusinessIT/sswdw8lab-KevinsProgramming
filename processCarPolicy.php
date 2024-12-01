<?php

include("CarPolicy2.php");


$policyNumber = $_POST['policyNumber'] ?? '';
$yearlyPremium = $_POST['yearlyPremium'] ?? 0;
$dateOfLastClaim = $_POST['dateOfLastClaim'] ?? '';


if (empty($policyNumber) || empty($yearlyPremium) || empty($dateOfLastClaim)) {
    echo "Please provide all the required information.";
    exit;
}


$carPolicy = new CarPolicy($policyNumber, $yearlyPremium);


$carPolicy->setDateOfLastClaim($dateOfLastClaim);


$initialPremium = $yearlyPremium;
$discountedPremium = $carPolicy->getDiscountedPremium();


echo "<h1>Car Policy Information</h1>";
echo "<p>Policy Number: " . htmlspecialchars($carPolicy) . "</p>";
echo "<p>Initial Premium: $" . number_format($initialPremium, 2) . "</p>";
echo "<p>Discounted Premium: $" . number_format($discountedPremium, 2) . "</p>";
?>
