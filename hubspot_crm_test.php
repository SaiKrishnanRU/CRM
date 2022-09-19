<?php

require_once('hubspotcrm.php')

/*
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $business = $_POST['business'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];

    $data = array(
      "name" => $name
      "business" => $business
      "email" => $email
      "address" => $address
      "zip" => $zip
      "phone" => $phone
      "website" => $website
    );
*/

print_r(HubSpotCrm::addCompany("companyName", "domain", "address", "city", "zip"));
print_r(HubSpotCrm::addContact("name", "email", "companyId", "address", "city", "zip", "ipAddress", "memberId"));
