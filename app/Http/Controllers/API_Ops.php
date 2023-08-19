<?php
$API_KEY="b23e9d1a55mshdb137b1775e408fp1cdb97jsnaf6d7e6978d0";

function getActorIDsBornOnDate($Month, $Day, $API_KEY)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/list-born-today?month=$Month&day=$Day",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: $API_KEY"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return json_decode($response, true);

    }
}

// Get the actor's bio
function getActorDetailsByID($nconst, $API_KEY)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=$nconst",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: $API_KEY"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {

        return json_decode($response, true);
    }
}



//Store the month and day

$actor_list = getActorIDsBornOnDate($_GET['month'], $_GET['day'], $API_KEY);

$actor_ids = array_map(function ($actor) {
    return substr($actor, 6, -1); // extract the ID from the string
}, $actor_list);
$counter=0;
// get the actor's bio
$actors_data = array();
foreach ($actor_ids as $id) {
    $counter++;

    $actors_data[] = getActorDetailsByID($id, $API_KEY);
    if($counter==3){
        break;
    }
}
$res = array("actors" => array());

// print the actor's name
foreach ($actors_data as $actor) {
    $res['actors'][] = array('name' => $actor['name'], 'birthDate' => $actor['birthDate'], 'birthPlace' => $actor['birthPlace'] );

}
echo json_encode($res);

