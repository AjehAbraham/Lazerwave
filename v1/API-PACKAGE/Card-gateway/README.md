# READMEM FILE EXPLAINING HOW THE API FUNCTIONS

## API RESPONSE


### BASIC REPONSES FROM REQUEST TO API(NOTE: API ONLY SUPPORT GET REQUEST,SENDING ANY OTHER TYPE OF RERPONSE MIGHT GIVE SOME ERRORS OR NO MESSSAGE AT ALL).

#### "Status" => "200",

IT A REPONSE MESSSAGE INDICATING IF YOUR REQUEST WAS ACTUALLY RECEIVED AND PROCCESSED.

"Status" => "200",
it simply means your request was ok or successful and was proccessed by our server.

NOTE IT WILL ALWAYS RETURN 200.

#### "Message" => "",

IT A REPONSE MESSAGE WHICH CARRIES LITTLE DETAILS OF YOUR REQUEST LIKE ERROR MESSAGE(e.g No API key)

"Message" => "No API key",
Means your request was successful but no API key was found in the request you just sent,in other words it contains error messge or success message form every reuest you send
### NOTE: You will always get a Message from every request even if the request is not valid like "success".success means your request is valid and a valid reponse was sent to you.

#### "Response" => "",
IT GIVE YOU RESPONSE WHEN YOUR REQUEST IS SUCCESSFUL OR YOU GET A SUCCESS MESSAGE,MEANING IF YOUR REQUEST IS VALID YOU WILL GET A VALID REPONSE ELSE RESPONSE WILL BE BLANK

#### "Response" => "",
You will get a reponse when your request is valid else RESPONSE will be blank/empty or null

#### "StatusText" => "502",
IT CONTAINS ERROR/SUCCESS MESSAGES//

It's a three digit number that gives details of the request//

"502" => "success",
"500" => "Failed",
"506" => "Error occured",
"419" => "Insufficient Funds"
"400" => "NoT found/Invalid"

#### "Date" => "$ApiDate",

DATE AND TIME THE REQUEST WAS PROCCESSED


ALSO NOT THAT EVERY REQUEST IS SAVED ON OUR DATABASE WITH A UNIQUE ID CONTAINING INFO ABOUT REQUEST//
