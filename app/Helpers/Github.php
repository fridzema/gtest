<?php

        function GithubRequest($url, $type = 'GET')
        {
            $base_url = (string) 'https://api.github.com/';
            //       $data = json_decode(array(
            //       "access_token" => "fridzema:f24c9100966521f88bd55d5dda9c9598542ef26b"
            // ));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $base_url.$url);
            curl_setopt($ch, CURLOPT_USERAGENT, env('APP_NAME'));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ['access_token' => 'fridzema:f24c9100966521f88bd55d5dda9c9598542ef26b']);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'access_token' => 'fridzema:f24c9100966521f88bd55d5dda9c9598542ef26b']);

            $response = curl_exec($ch);
            curl_close($ch);

            return json_decode(trim($response), true);
        }
