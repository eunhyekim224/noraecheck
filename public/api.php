<?php


$str = "TWICE";
$str2 = "트와이스";

echo soundex($str);
echo "<br>";
echo soundex($str2);




// //initualize the session
// $entry = isset($_GET['entry']) ? $_GET['entry'] : '';
// $category = isset($_GET['category']) ? $_GET['category'] : '';
// $ch = curl_init();

// //select the url to receive from
// curl_setopt($ch,CURLOPT_URL,"https://api.manana.kr/karaoke/song/hello.json");

// //keep the data around for processing instead of immediately returning it
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

// //don't return the header of this file
// curl_setopt($ch,CURLOPT_HEADER,0);

// //---the json will be executed and saved in variable $output for further use
// $output = curl_exec($ch);

// //return error if shits fucked up
// if($output === FALSE){
//     'echo cURL error' .curl_error($ch);
// }

// curl_close($ch);

// //print_r($output);
// $decodedOutput = json_decode($output,true);

// $tjArray = array();
// $kumyoungArray = array();
// $tjMap = array();
// $kumyoungMap = array();

// for($i = 0,$c = count($decodedOutput); $i < $c; $i++){
//     if ($decodedOutput[$i]['brand'] === 'tj'){
//         array_push($tjArray,$decodedOutput[$i]);
//         $tjMap[$decodedOutput[$i]['singer']] = $decodedOutput[$i]['title'];
//     } elseif ($decodedOutput[$i]['brand'] === 'kumyoung'){
//         array_push($kumyoungArray,$decodedOutput[$i]);
//         $kumyoungMap[$decodedOutput[$i]['singer']] = $decodedOutput[$i]['title'];
//     }
// }

// for($i = 0,$c = count($kumyoungMap); $i < $c; $i++){
//     echo $tjArray[$i]['singer'];
// }
// /*
// TODO: make a for loop that tests to find a match between results in the
// tj map and results in the kumyeong map to see if there are any matches

// find a way to merge the data for two songs into one array with both codes


// */


// print_r($tjMap);
// print_r($kumyoungMap);
// //print_r($decodedOutput);
// //echo $entry .$category;