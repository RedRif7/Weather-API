<?php
//TODO API-KEY - b975fa90e59d24e82c8f3de04a185784
//TODO Call - https://api.openweathermap.org/data/2.5/weather?q={city name},{country code}&appid=b975fa90e59d24e82c8f3de04a185784
$idCheck = readline("Do u need to check country ID? type 'no' or country name: ");
if($idCheck != "no"){
    $countryList = json_decode(file_get_contents('id.json'), true);
    $found = false;
    foreach($countryList["countries"] as $countryID) {
        if ($countryID["country"] === $idCheck) {
            echo "{$countryID["country"]} ID is - {$countryID["country_id"]}\n";
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo "Invalid country name! \n";
    }
}

$country = strtolower(readline("Enter country ID: "));
$city = strtolower(readline("Enter city name: "));

$url = "https://api.openweathermap.org/data/2.5/weather?q=$city,$country&appid=b975fa90e59d24e82c8f3de04a185784&units=metric";
$json    = file_get_contents( $url );
$data    = json_decode( $json, true );

echo "Temperature right now in {$data['sys']['country']}, {$data['name']} is {$data['main']['temp_min']} C\n";
echo "Wing speed is {$data["wind"]["speed"]} m/s\n";


