<?php
// Get the phone number from the POST data
$phone_number = $_POST['telephone'];
//MPESA AUTHORIZATION
$consumerKey = "naP4p43KMfj2u1JcMuWIao5Jo6rlC0ak"; //Fill with your app Consumer Key
$consumerSecret = "TOwCRj7Hw0kWxxVy"; //Fill with your app Consumer Secret
//ACCESS TOKEN URL
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey . ':' . $consumerSecret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);


//STKPUSH
date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/callback.php';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
// ENCRIPT  DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
$phone = $phone_number;//phone number to receive the stk push
$money = '1';
$PartyA = $phone;
$PartyB = '254708374149';
$AccountReference = 'REALMARK JOBS';
$TransactionDesc = 'stkpush test';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
//INITIATE CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); //setting custom header
$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $BusinessShortCode,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $callbackurl,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
//ECHO  RESPONSE
$data = json_decode($curl_response);
$CheckoutRequestID = $data->CheckoutRequestID;
$ResponseCode = $data->ResponseCode;
sleep(40);
if ($ResponseCode == "0") {

//QUERY STATUS OF initiated Transaction
date_default_timezone_set('Africa/Nairobi');
$query_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
// ENCRIPT  DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
//THIS IS THE UNIQUE ID THAT WAS GENERATED WHEN STK REQUEST INITIATED SUCCESSFULLY
$CheckoutRequestID =$CheckoutRequestID;
$queryheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
# initiating the transaction
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $query_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $queryheader); //setting custom header
$curl_post_data = array(
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'CheckoutRequestID' => $CheckoutRequestID
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
$data_to = json_decode($curl_response);
if (isset($data_to->ResultCode)) {
  $ResultCode = $data_to->ResultCode;
  if ($ResultCode == '1037') {
    $massage = "Timeout in completing transaction";
    $paymentStatus = false;
  } elseif ($ResultCode == '1032') {
    $massage = "Transaction  has cancelled by user";
    $paymentStatus = false;
  } elseif ($ResultCode == '1') {
    $massage = "1 The balance is insufficient for the transaction";
    $paymentStatus = false;
  } elseif ($ResultCode == '0') {
    $massage = "The transaction is successfully";
    $paymentStatus = true;
  }
}
echo json_encode(['paymentStatus' => $paymentStatus]);
}

else {
    echo "Please check your Number and Try Again";
}

?>