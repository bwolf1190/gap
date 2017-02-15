<?php

define('L2P_SERVICE_PATH','http://test.transmodus.net/jcx/soa/test/');
define('L2P_ENDPOINT',L2P_SERVICE_PATH.'services/L2PWidgetWebService');
define('L2P_WSDL',L2P_SERVICE_PATH.'wsdl/L2PWidgetWebService.wsdl');
// SOAP client
$client = new soapclient(L2P_WSDL,
array('location' => L2P_ENDPOINT, 'trace' => 1, 'exceptions' => 0));
// Authentication object
$auth = new StdClass();
$auth->login = "bwolverton";
$auth->AuthenticationMethod = "KEY";
$auth->password = "48168621C3B54ACD";
// These parameters are specific to what function is being called
$params = new StdClass();
$params->auth = $auth;
$result = $client->authenticate($params);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <title>L2P Authentication Request</title> 
</head>
<body>
  <div>
    <p>Response:</p>
    <div>
      <?php print $result->authenticateReturn; ?>
    </div>
  </div>
</body>
</html>