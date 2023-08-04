<?php

namespace SAPLibrary;

use Illuminate\Support\Facades\Cache;

class SAPSessionManager
{
    protected $domain;
    protected $sessionCookie;

    public function __construct(string $domain, array $requestContent)
    {
        $this->domain = $domain;
        $this->sessionCookie = $this->retrieveSessionCookie();
    }

    public function getSessionCookie(): ?string
    {
        if (!$this->sessionCookie || $this->isSessionExpired()) {
            $this->login();
        }

        return $this->sessionCookie;
    }

    protected function isSessionExpired(): bool
    {
        // Implement the logic to check if the session cookie is expired
        // You can compare the cookie's expiration time with the current time
        // Return true if the session is expired, false otherwise
        return false;
    }

    protected function login(): void
    {
        try {
            // Implement the logic to perform login and get the B1SESSION cookie
            // You can use SAP API calls for the login process

            // Example code to make a login API call (you need to customize it based on your SAP API)
            $response = Http::post($this->domain . '/login', $this->getRequestContent());

            if ($response->status() === 200) {
                // Store the B1SESSION cookie
                $this->sessionCookie = $response->header('Set-Cookie')[0];
                $this->storeSessionCookie($this->sessionCookie);
            } else {
                throw new \Exception('Login failed');
            }
        } catch (\Exception $e) {
            throw new \Exception('Error during login: ' . $e->getMessage());
        }
    }

    protected function getRequestContent(): array
    {
        return [
            'CompanyDB' => config('sap.sap_request_content.CompanyDB'),
            'UserName' => config('sap.sap_request_content.UserName'),
            'Password' => config('sap.sap_request_content.Password'),
        ];
    }

    protected function retrieveSessionCookie(): ?string
    {
        return Cache::get('sap_session_cookie');
    }

    protected function storeSessionCookie(string $cookie): void
    {
        Cache::put('sap_session_cookie', $cookie, now()->addMinutes(30));
    }
}
