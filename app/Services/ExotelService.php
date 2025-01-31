<?php

namespace App\Services;

class ExotelService
{
    protected $sid;
    protected $apiKey;
    protected $apiToken;
    protected $virtualNumber;
    protected $callbackUrl;

    public function __construct()
    {
        $this->sid = env('EXOTEL_SID');
        $this->apiKey = env('EXOTEL_API_KEY');
        $this->apiToken = env('EXOTEL_API_TOKEN');
        $this->virtualNumber = env('EXOTEL_VIRTUAL_NUMBER');
        $this->callbackUrl = env('EXOTEL_CALLBACK_URL');
    }

    /**
     * Initiate a call using Exotel API via cURL
     */
    public function makeCall($customerNumber)
    {
        $url = "https://api.exotel.com/v1/Accounts/{$this->sid}/Calls/connect";

        $postData = [
            'From' => $customerNumber,  // Customer's phone number
            'To' => $this->virtualNumber,  // Your Exotel virtual number
            'CallerId' => $this->virtualNumber,  // Masking number
            'Url' => $this->callbackUrl,  // XML call flow URL
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$this->apiKey}:{$this->apiToken}");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            return ['error' => $error];
        }

        curl_close($ch);

        return ['status_code' => $httpCode, 'response' => json_decode($response, true)];
    }
}
