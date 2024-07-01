<?php

namespace App\Service;

use GuzzleHttp\Client;

class EmailValidationService {
    private $apiKey;
    private $apiUrl;

    public function __construct() {
        $this->apiKey = 'YOUR_MAILGUN_API_KEY';
        $this->apiUrl = 'https://api.mailgun.net/v4/address/validate';
    }

    public function validateEmail(string $email): bool {
        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl, [
                'auth' => ['api', $this->apiKey],
                'query' => ['address' => $email]
            ]);
            
            $data = json_decode($response->getBody(), true);
            return $data['is_valid'];
        } catch (\Exception $e) {
            
            return false;
        }
    }
}
?>
