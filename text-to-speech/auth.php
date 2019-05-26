<?php
namespace Google\Cloud\Samples\Auth;

// Imports the Cloud Storage client library.
use Google\Cloud\Storage\StorageClient;

function auth_cloud_explicit($projectId, $serviceAccountPath)
{
    # Explicitly use service account credentials by specifying the private key
    # file.
    $config = [
        'D:\xampp\htdocs\Proyecto-de-titulacion\text-to-speech\My First Project-8a4e53b9cfe2.json' => $serviceAccountPath,
        'astute-ace-241823' => $projectId,
    ];
    $storage = new StorageClient($config);

    # Make an authenticated API request (listing storage buckets)
    foreach ($storage->buckets() as $bucket) {
        printf('Bucket: %s' . PHP_EOL, $bucket->name());
    }
}
?>