<?php
session_start();
//session_regenerate_id();

require_once "db_connection.php";
 $to = "DELETE Lazerwave";

 if(mysqli_query($conn,$to)){
  
  die("Deleted");
 }else{
  die("Failed");
 }
?>
<!DOCTYPE html>
<html lang="eng_US">
  <head>
    <link rel="stylesheet" href="">
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Island+Moments&family=Oswald:wght@200&family=PT+Serif:wght@700&family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">


<script src="https://kit.fontawesome.com/958aace4f6.js" crossorigin="anonymous"></script>
<title>Status</title>
      </head>
      <body>


<?php
//require_once "db_connection.php";


function getBrowser() { 
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $bname = 'Unknown';
  $platform = 'Unknown';
  $version= "";

  //First get the platform?
  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'linux';
  }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'mac';
  }elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'windows';
  }

  // Next get the name of the useragent yes seperately and for good reason
  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }elseif(preg_match('/Firefox/i',$u_agent)){
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
  }elseif(preg_match('/OPR/i',$u_agent)){
    $bname = 'Opera';
    $ub = "Opera";
  }elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Google Chrome';
    $ub = "Chrome";
  }elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Apple Safari';
    $ub = "Safari";
  }elseif(preg_match('/Netscape/i',$u_agent)){
    $bname = 'Netscape';
    $ub = "Netscape";
  }elseif(preg_match('/Edge/i',$u_agent)){
    $bname = 'Edge';
    $ub = "Edge";
  }elseif(preg_match('/Trident/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
  }

  // finally get the correct version number
  $known = array('Version', $ub, 'other');
  $pattern = '#(?<browser>' . join('|', $known) .
')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
  if (!preg_match_all($pattern, $u_agent, $matches)) {
    // we have no matching number just continue
  }
  // see how many we have
  $i = count($matches['browser']);
  if ($i != 1) {
    //we will have two since we are not using 'other' argument yet
    //see if version is before or after the name
    if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        $version= $matches['version'][0];
    }else {
        $version= $matches['version'][1];
    }
  }else {
    $version= $matches['version'][0];
  }

  // check if we have a number
  if ($version==null || $version=="") {$version="?";}

  return array(
    'userAgent' => $u_agent,
    'name'      => $bname,
    'version'   => $version,
    'platform'  => $platform,
    'pattern'    => $pattern
  );
} 

// now try it
$ua=getBrowser();
$yourbrowser=  $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] ;

echo $yourbrowser;



/*

$filepath="images/Bolt.jpeg";


if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
          readfile($filepath);
            die();
        } else {
            http_response_code(404);
	        die();
        }






/*
      
//NOW SEND REQUEST TO GEOLOCATION/IP ADDRESS API//

$ip_addr =$_SERVER["REMOTE_ADDR"];

$apiKey="b969aee71e454a76bee15d80110dd10a";

$url =  "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip_addr;
$ch = curl_init($url); 
 
// Return response instead of outputting 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// Execute API request 
$apiResponse = curl_exec($ch); 
 
// Close cURL resource 
curl_close($ch); 
 
// Retrieve IP data from API response 
$ipData = json_decode($apiResponse, true); 

//var_dump($ipData);




echo "<p>Details</p>";

 $country_name = $ipData['country_name']; 
    $region_code = $ipData['country_code2']; 
    
    $region_name = $ipData['continent_code']; 
    $city = $ipData['city']; 
    $zip_code = $ipData['zipcode']; 
    $latitude = $ipData['latitude']; 
    $longitude = $ipData['longitude']; 
    $time_zone = $ipData['time_zone']['current_time']." ". $ipData['time_zone']['name'];
    ;
$network =$ipData['organization'];

$network_details = $ipData['isp'];





echo $ipData['country_name'];

*/

?>
