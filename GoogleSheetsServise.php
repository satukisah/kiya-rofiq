<?php
class GoogleSheetsService {
    private $webAppUrl;

    public function __construct() {
        // Ganti dengan URL Web App yang kamu dapatkan dari Apps Script
        $this->webAppUrl = "https://script.google.com/macros/s/AKfycbwq5VrmKsNHcQu7QPezPSArKYWGxDeU-cVWHc5wV8OpJmBr92JZCf2Y6X1khjmw33CKUg/exec";
    }

    public function appendData($data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->webAppUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    public function getData() {
        $response = file_get_contents($this->webAppUrl);
        return json_decode($response, true);
    }
}
