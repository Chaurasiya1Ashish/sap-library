<?php

namespace SAPLibrary;

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;

class SAPSessionManager
{
    private $domain;
    private $db;
    private $username;
    private $password;

    public function __construct(array $sapConfig)
    {
        $this->domain = $sapConfig['domain'] ?? '';
        $this->db = $sapConfig['db'] ?? '';
        $this->username = $sapConfig['username'] ?? '';
        $this->password = $sapConfig['password'] ?? '';
    }

    public function retrieveSessionCookie()
    {
        // Check if the B1SESSION cookie is stored in the Laravel session
        if (session()->has('B1SESSION')) {
            return session('B1SESSION');
        }

        // Make a request to SAP API to get the B1SESSION cookie
        $url = "https://{$this->domain}/b1s/v1/Login";
        $client = new Client();
        $response = $client->post($url, [
            'json' => [
                'CompanyDB' => $this->db,
                'UserName' => $this->username,
                'Password' => $this->password,
            ],
        ]);

        // Extract the B1SESSION cookie from the response
        $cookieJar = CookieJar::fromResponse($response);
        $b1session = $cookieJar->getCookieByName('B1SESSION')->getValue();

        // Store the B1SESSION cookie in the Laravel session for future use
        session(['B1SESSION' => $b1session]);

        return $b1session;
    }

    public function storeSessionCookie($b1session)
    {
        // Store the B1SESSION cookie in the Laravel session for future use
        session(['B1SESSION' => $b1session]);
    }
}
