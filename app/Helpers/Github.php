<?php

        function GithubRequest($url, $type = 'GET')
        {
            $base_url = (string) 'https://api.github.com/';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $base_url.$url);
            curl_setopt($ch, CURLOPT_USERAGENT, env('APP_NAME'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json',]);

            $response = curl_exec($ch);
            curl_close($ch);

            return json_decode(trim($response), true);
        }
