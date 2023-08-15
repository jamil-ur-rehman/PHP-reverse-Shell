<?php
// Initialize cURL session
$ch = curl_init();

// Base URL for the API
$base_url = "https://api.example.com";

// Define request endpoints
$get_endpoint = "/data";
$post_endpoint = "/create";
$put_endpoint = "/update/123";
$delete_endpoint = "/delete/456";

// Set cURL options for GET request
curl_setopt($ch, CURLOPT_URL, $base_url . $get_endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$get_response = curl_exec($ch);

if ($get_response) {
    echo "GET Request Successful!\n";
    echo "Response Content:\n";
    echo $get_response . "\n";
} else {
    echo "GET Request failed with error: " . curl_error($ch) . "\n";
}

// Set cURL options for POST request
$post_data = [
    "name" => "John Doe",
    "email" => "john@example.com"
];
curl_setopt($ch, CURLOPT_URL, $base_url . $post_endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
$post_response = curl_exec($ch);

if ($post_response) {
    echo "POST Request Successful!\n";
    echo "Response Content:\n";
    echo $post_response . "\n";
} else {
    echo "POST Request failed with error: " . curl_error($ch) . "\n";
}

// Set cURL options for PUT request
$put_data = [
    "name" => "Jane Doe",
    "email" => "jane@example.com"
];
curl_setopt($ch, CURLOPT_URL, $base_url . $put_endpoint);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($put_data));
$put_response = curl_exec($ch);

if ($put_response) {
    echo "PUT Request Successful!\n";
    echo "Response Content:\n";
    echo $put_response . "\n";
} else {
    echo "PUT Request failed with error: " . curl_error($ch) . "\n";
}

// Set cURL options for DELETE request
curl_setopt($ch, CURLOPT_URL, $base_url . $delete_endpoint);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
$delete_response = curl_exec($ch);

if ($delete_response) {
    echo "DELETE Request Successful!\n";
} else {
    echo "DELETE Request failed with error: " . curl_error($ch) . "\n";
}

// Close cURL session
curl_close($ch);
?>
