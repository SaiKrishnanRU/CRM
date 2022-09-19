<?php

static $hapikey = ""

$hubspotCrm = new HubSpotCrm();
$hubspotCrm->addCompany($data);

class HubSpotCrm {  

  private static function addCompany($companyName, $domain, $address, $city, $zip) {
    $arr = array(
      'properties' => array(
         array(
            'property' => 'business',
            'value' => $companyName
          ),
         array(
            'property' => 'domain',
            'value' => $domain
          ),
         array(
           'property' => 'address',
           'value' => '$address"'
          ),
          array(
            'property' => 'city',
            'value' => $city
          ),
          array(
             'property' => 'zip',
             'value' => $zip
          )
        )
      ); 

      $post_json = json_encode($arr);
      $endpoint = 'https://api.hubapi.com/companies/v2/companies?hapikey=' . $this->hapikey;
      $this->http($endpoint, $post_json);
    }
  }

  private static function addContact(name, email, companyId, address, city, zip, ipAddress, memberId) {
    $arr = array(
      'properties' => array(
         array(
            'property' => 'name',
            'value' => $name
          ),
         array(
            'property' => 'email',
            'value' => $email
          ),
         array(
            'property' => 'companyId',
            'value' => $companyId
          ),
         array(
           'property' => 'address',
           'value' => $address
          ),
          array(
            'property' => 'city',
            'value' => $city
          ),
          array(
             'property' => 'zip',
             'value' => $zip
          ),
          array(
            'property' => 'ipAddress',
            'value' => $ipAddress
          ),
          array(
            'property' => 'memberId',
            'value' => $memberId
          )
        )
      );
      $post_json = json_encode($arr);
      $endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $this->hapikey;
      $this->http($endpoint, $post_json);
  }


  function http($endpoint, $post_json) {
    $ch = @curl_init();
    @curl_setopt($ch, CURLOPT_POST, true);
    @curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
    @curl_setopt($ch, CURLOPT_URL, $endpoint);
    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = @curl_exec($ch);
    $status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_errors = curl_error($ch);
    @curl_close($ch);
    echo "curl Errors: " . $curl_errors;
    echo "\nStatus code: " . $status_code;
    echo "\nResponse: " . $response;
  }