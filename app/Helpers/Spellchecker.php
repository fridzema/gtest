<?php

    function SpellChecker($content)
    {
        $key = (string) env('SPELLCHECK_KEY');
        $url = (string) 'https://montanaflynn-spellcheck.p.mashape.com/check/?text='.urlencode($content);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, env('APP_NAME'));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Accept: application/json',
          "X-Mashape-Key: $key", ]
        );

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode(trim($response), true);
    }
