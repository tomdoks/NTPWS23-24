<?php
    print '
    <h2>UEFA Champions League 2023/2024 - matches </h2>';

    $api_key = 'e0366391194740b58f6391d66e6ff8e9';
    $url = "https://api.football-data.org/v4/competitions/CL/matches";

    $options = [
        'http' => [
        'header' => "X-Auth-Token: $api_key",
        'method' => 'GET', ],];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    if ($response === false) {
    die('Error fetching data from football-data.org'); }

    $data = json_decode($response, true);

    echo '<table border="1">';
    echo '<tr><th>Home Team</th><th>Away Team</th><th>Score</th></tr>';

    foreach ($data['matches'] as $match) {
            $homeTeam = $match['homeTeam']['name'];
            $awayTeam = $match['awayTeam']['name'];
            $score = isset($match['score']['fullTime']['homeTeam'], $match['score']['fullTime']['awayTeam'])
            ? $match['score']['fullTime']['homeTeam'] . ' - ' . $match['score']['fullTime']['awayTeam']
            :'N/A';
            echo "<tr><td>$homeTeam</td><td>$awayTeam</td><td>$score</td></tr>"; }
    echo '</table>';
?>






