<?php
    $api_url = 'https://api.quotable.io/random?language=en';

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Greška prilikom izvršavanja HTTP zahtjeva: ' . curl_error($ch); } 
        
    else {
        $quote = json_decode($response, true);     
        if (isset($quote['content'])) {
            echo '<h2>Quote:</h2>';
            echo '<p style="color: dark blue; font-size: 48px;"><strong></strong> ' . $quote['content'] . '</p>'; } 
        else {echo '<p>No quote available.</p>'; }
    }
    curl_close($ch);
?>
