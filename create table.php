<?php
/*
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__)==
realpath($_SERVER['SCRIPT_FILENAME'])){

  header("Location: Warning.php");
  exit;

      header('HTTP/1.0 403 Forbiddden',TRUE,403);
      die("<h3> 403 Access denied!The file you request for does not exist.</h3>");
}
*/
include __DIR__.("/db_connection.php");

$p = "ALTER TABLE Register_db ADD Acct_type TEXT(10) NOT NULL";

if(mysqli_query($conn,$p)){

}else{

    die("Failed");
}
/*
$key = uniqid(). rand(8392,19283). uniqid().rand();

echo $key;

$p ="INSERT INTO API_keys(User_id,API_key,Status)
VALUES('1','$key','granted')
";*/

/*
$p ="CREATE TABLE API_keys(   
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
User_id INT(20) NOT NULL,
API_key VARCHAR(255) NOT NULL,
Status TEXT NOT NULL
)";*/
/*
$p ="CREATE TABLE Data_plan(

id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Network_provider TEXT NOT NULL,
Plan VARCHAR(50) NOT NULL,
Amount INT(8) NOT NULL,
Hash VARCHAR(255)

)";*/

/*
$p = "INSERT INTO Data_plan(
Network_provider,Plan,Amount,Hash)

VALUES('MTN','₦50(40Mb)1day','50','KKtar8282673GG1423H')
";
*/
/*
$p ="INSERT INTO Data_plan(
    Network_provider,Plan,Amount,Hash)
    
    VALUES('MTN','₦100(100Mb)1day','100','TJBC$%#%HGbvahgs73GG1423H')
    ";*/

/*
$p ="INSERT INTO Data_plan(
    Network_provider,Plan,Amount,Hash)
    
    VALUES('MTN','₦300(350Mb)1day','300','JNVhags8-2838378383j')
    ";*/

    /*
    $p ="INSERT INTO Data_plan(
Network_provider,Plan,Amount,Hash)

VALUES('MTN','₦350(1Gb)1day','350','737en9wnznwjsa923836sbn')
";*/


/*
$p ="INSERT INTO Data_plan(
    Network_provider,Plan,Amount,Hash)
    
    VALUES('MTN','₦50(40Mb)1day','50','KKtar8282673GG1423H')
    ";
    */


    /*
    $p ="INSERT INTO Data_plan(
Network_provider,Plan,Amount,Hash)

VALUES('MTN','₦500(2.5Gb)2days','500','BBjaGHksie928383mbsu93')
";*/

/*
$p ="INSERT INTO Data_plan(
    Network_provider,Plan,Amount,Hash)
    
    VALUES('MTN','₦500(750Mb)1week','500','KKarebas0928378msamsm83')
    ";*/

    /*
    $p ="INSERT INTO Data_plan(
Network_provider,Plan,Amount,Hash)

VALUES('MTN','₦1,500(6Gb)1week','1500','KKtar828Kaushey302983673GG1423H')
";*/


/*
$p ="INSERT INTO Data_plan(
    Network_provider,Plan,Amount,Hash)
    
    VALUES('MTN','₦1,000(1Gb)1month','1000','PPnzxga72727anjsj82na')
    ";
    */
/*
    
    $p ="INSERT INTO Data_plan(
Network_provider,Plan,Amount,Hash)

VALUES('MTN','₦1,200(1.5Gb)1month','1200','ZZnaj28934848KKahw98')
";*/

/*
$p ="INSERT INTO Data_plan(
    Network_provider,Plan,Amount,Hash)
    
    VALUES('MTN','₦2,000(6Gb)1month','2000','BBgatqk9383m1932764sm')
    ";
*/

/*
$p = "CREATE TABLE Beneficiary(
    id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20) NOT NULL, 
    Full_name TEXT NOT NULL,
    Acct_no INT(12) NOT NULL, 
    Date_id  TIMESTAMP NOT NULL,
    Time_id TIME NOT NULL,
    Ip_addr VARCHAR(30)
    
)";


if( mysqli_query($conn,$p)){

    die("success");
}
/*
$p ="CREATE TABLE Notification(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    User_id INT(132),Amount INT(20) NOT NULL,
    Message TEXT NOT NULL,
    Receiver_id INT(20) NOT NULL,
    Notify_id VARCHAR(25) NOT NULL,
    Type TEXT NOT NULL,
    Status TEXT,
    Remark TEXT ,
    Date TIMESTAMP, 
    Time TIME,
    Ip_addr VARCHAR(30)
    )";
/*
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$p = "CREATE DATABASE Lazer_wave";

*/
/*
$p = "CREATE TABLE General_otp_table (
     id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20) NOT NULL,
    Otp INT(6) NOT NULL,
    Hash VARCHAR(255) NOT NULL,
    Date TIMESTAMP NOT NULL,
    Time TIME NOT NULL,
    Status TEXT,
    User_agent TEXT
    )";*/



/*
$p = "CREATE TABLE Two_factor( 
     id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
User_id INT(20) NOT NULL,
Status TEXT NOT NULL,
  Date TIMESTAMP NOT NULL,
  Ip_add VARCHAR(20) NOT NULL,
  User_agent TEXT NOT NULL
)";
*/

/*
$p = "CREATE TABLE Refer_and_record(
  
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20) NOT NULL,
    Amount INT(5) NOT NULL,
  Link_key VARCHAR(255) NOT NULL,
  Referal_user_id INT(20) NOT NULL,
  Status TEXT NOT NULL,
  Date TIMESTAMP NOT NULL 
  )
  ";*/

/*

$p = "CREATE TABLE Refer_and_Earn(
  
  id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  User_id INT(20) NOT NULL,
  Amount INT(5) NOT NULL,
Link_key VARCHAR(255) NOT NULL,
Date TIMESTAMP NOT NULL 
)
";
*/

/*
$p = "CREATE TABLE Register_tmp(
     id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Email TEXT,
    Password VARCHAR(255),
    Country TEXT,
    Date TIMESTAMP,
    Time TIME,
    User_agent TEXT,
    Ip_addr TEXT,
    Key_id TEXT
    )";

*/
/*
$p = "CREATE TABLE Reset_password(
     id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id  INT(20),
    Email VARCHAR(30),
    Hash_key VARCHAR(255),
    Key_id VARCHAR(255),
    Date TIMESTAMP,
User_agent TEXT,
Ip VARCHAR(30),
Status TEXT
)";*/


/*
$p ="CREATE TABLE Notification(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    User_id INT(132),Amount INT(20) NOT NULL,
    Message TEXT NOT NULL,
    Receiver_id INT(20) NOT NULL,
    Notify_id VARCHAR(25) NOT NULL,
    Type TEXT NOT NULL,
    Status TEXT,
    Remark TEXT ,
    Date TIMESTAMP, 
    Time TIME,
    Ip_addr VARCHAR(30)
    )";*/

    
/*
    $p = "CREATE TABLE Block_account(
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
User_id	INT(20) NOT NULL,
Account_status	TEXT NOT NULL,
Date TIMESTAMP NOT NULL,
Ip_addr VARCHAR(255),
User_agent TEXT
    )";
*/

/*
$p ="CREATE TABLE Payment_link_table(
   
id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
User_id INT(20) NOT NULL,
Amount INT(15) NOT NULL,
Hash_link VARCHAR(255) NOT NULL,
Date_created TIMESTAMP NOT NULL,
Ip_addr TEXT,
Image_path VARCHAR(200),
Link_message TEXT,
Time TIME NOT NULL,
Title TEXT NOT NULL,
Terms TEXT NOT NULL,
Status TEXT NOT NULL,
User_agent TEXT
)";

*/



/*
$p = "CREATE TABLE User_session_id(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20) NOT NULL,
    Session_id VARCHAR(255),
    Hash_key VARCHAR(255),
    Date TIMESTAMP,
    Time TIME,
    Ip_addr VARCHAR(20) 
    )";*/

/*
    $p = "CREATE TABLE Login_history(
        id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        User_id INT(20) NOT NULL,
        Date TIMESTAMP NOT NULL,
        Time TIME,
        Ip_addr VARCHAR(20),
        User_agent TEXT
        )";*/


/*
        $p = "CREATE TABLE Username (
             id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            User_id INT(20) NOT NULL,
            Username TEXT NOT NULL,
            Date TIMESTAMP NOT NULL,
            Time TIME,
            ip_addr VARCHAR(20)
            )";*/




   /*$p ="CREATE TABLE Transaction_history (
        id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        User_id int(20) NOT NULL,
        Transaction_id VARCHAR(128) NOT NULL,
        Amount INT(30) NOT NULL,
        Type_name VARCHAR(128) NOT NULL,
        Remark TEXT NOT NULL,
        Status_remark TEXT NOT NULL NULL,
        Sender_account_no VARCHAR(15) NOT  NULL,
        Receiver_account_no VARCHAR(12) NOT  NULL,
        Date_id timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    Time_id time NOT NULL,
        Ip_addr VARCHAR(20) NOT NULL,
        Type TEXT NOT NULL,
        Bank TEXT NOT  NULL,
        User_agent TEXT)
        ";*/
 /*

$p = "CREATE TABLE  Register_db(
    
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    Surname VARCHAR(255) NOT NULL,
     Last_name VARCHAR(255),
     First_name  VARCHAR(255) NOT NULL,
     Country VARCHAR(255) NOT NULL,
     Email VARCHAR(255) UNIQUE NOT NULL,
     Password VARCHAR(255) ,
     Gender VARCHAR(10) NOT NULL,
     I_agree VARCHAR(8) NOT NULL,
     Account_no TEXT NOT NULL,
     Account_balance INT(128) NOT NULL,
Date_reg timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
Time_reg TIME
Acct_type TEXT(10) NOT NULL
    )";
*/
    


/*

$p = "CREATE TABLE Account_balance(
    
    id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 User_id INT(20) NOT NULL,
  Amount INT(128) NOT NULL,
  Account_no INT(10) NOT NULL,
  Account_status VARCHAR(25) NOT NULL,
  Last_updated INT(25) NOT NULL
  )";
*/





/*
$p = "CREATE TABLE Profile_picture(
    
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    User_id INT(20) NOT NULL,
    Image_path VARCHAR(255) NOT NULL,
    Date_id timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    Time_id TIME
    
    
    )";*/


/*
$p = "CREATE TABLE Top_up(
    
    id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

 User_id INT(20) NOT NULL,

 Payment_type VARCHAR(30) NOT NULL,
  Card_no VARCHAR(255) NOT NULL,

Amount INT(128) NOT NULL,
  Status_id VARCHAR(30) NOT NULL,
  Date_id TIMESTAMP NOT NULL,
  Time_id TIME NOT NULL

    
    
    )";
    
*/

/*
$p ="CREATE TABLE User_pin(
    
  id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

  User_id INT(20)  NOT NULL,

  Pin VARCHAR(255) NOT NULL,

  Date_id TIMESTAMP NOT NULL
    
    )";


*/

/*
$p = "CREATE TABLE User_card(
    
    id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    User_id INT(20) NOT NULL,

    Card_no VARCHAR(255) NOT NULL,
    
    Full_name VARCHAR(255) NOT NULL,

    Ccv VARCHAR(255) NOT NULL,

    Pin VARCHAR(255) NOT NULL,
    
    Exp_date INT(10),

    Status_r VARCHAR(15) NOT NULL,

    Hash_key VARCHAR(255),

Type  TEXT,
    Date_created TIMESTAMP,

    Time_id TIME,

    User_agent TEXT
    )";
 */


/*
$p = "CREATE TABLE Extra_info(
    
    id INT(20)  UNSIGNED AUTO_INCREMENT PRIMARY KEY,

    User_id INT(20) NOT NULL,

    Tel TEXT NOT NULL,

    State VARCHAR(255) NOT NULL,
    Address TEXT NOT NULL,
    Date TIMESTAMP NOT NULL,
    Ip_addr VARCHAR(40) NOT NULL
    
    )";

*/

   


/*
$p = "CREATE TABLE More_information(
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20)  NOT NULL,
    DOB DATE NOT NULL,
    State_origin TEXT NOT NULL,
    LGA TEXT NOT NULL,
    Mother_name TEXT NOT NULL,
    Next_kin TEXT NOT NULL,
    Relationship_kin TEXT NOT NULL,
    Occupation TEXT,
 Date_sub TIMESTAMP NOT NULL,
 Ip_add VARCHAR(30) NOT NULL
)";
*/



/*

$p = "CREATE TABLE Block_account_history(
    id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20) NOT NULL,
    Account_status TEXT NOT NULL,
    Date TIMESTAMP NOT NULL,
    Ip_addr VARCHAR(30)
    )";
*/

    

/*
$p = "CREATE TABLE Authentication_table (
    
    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20) NOT NULL,
    Hash_key VARCHAR(255) NOT NULL,
    Date_created TIMESTAMP
    )
    ";*/
    

    /*
    


    $p = "CREATE TABLE Change_password_history(
        
        id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        User_id INT(20),
        Date_id TIMESTAMP,
        Ip_addr VARCHAR(30),
        Device_name VARCHAR(20),
        Time_id TEXT
        
        )";
        */


        /*

       $p = "CREATE TABLE Change_password_otp(

id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,

User_id INT(20),
Otp INT(6),
Time_id TIME,
Date_id TIMESTAMP
 )";
*/



 /*
 $p = "CREATE TABLE Email_verification(

id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
User_id INT(20),
Status VARCHAR(20),
Date TIMESTAMP,
Time TIME

 )";
 */


/*
 $p = "CREATE TABLE Beneficiary(
id INT(128) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
User_id INT(20),
Full_name TEXT,
Acct_no INT(12),
Date_id  TIMESTAMP,
Time_id TIME,
Ip_addr VARCHAR(30)

 )";
*/

/*

$p = "CREATE TABLE Account_limit(

    id INT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    User_id INT(20),
    Limit_amount INT(123),
    Time_id TIME,
    Date_id TIMESTAMP
)";
*/
/*

if(mysqli_query($conn,$p)){

    echo "Table created";

}else{

die(mysqli_error($conn));

}
*/