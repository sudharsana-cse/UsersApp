<?php

require __DIR__ . '/vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;

$dynamodb = new DynamoDbClient([
    'version' => 'latest',
    'region' => 'eu-north-1',
    'endpoint' => 'http://localhost:4566',
    'credentials' => [
        'key' => 'test',
        'secret' => 'test',
    ],
]);

$result = $dynamodb->scan([
    'TableName' => 'Users',
]);

echo "<h1>Users Application</h1>";

echo "<table border='1' cellpadding='8'>";
echo "<tr>";
echo "<th>User ID</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>City</th>";
echo "</tr>";

foreach ($result['Items'] as $item) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($item['userId']['S']) . "</td>";
    echo "<td>" . htmlspecialchars($item['name']['S']) . "</td>";
    echo "<td>" . htmlspecialchars($item['email']['S']) . "</td>";
    echo "<td>" . htmlspecialchars($item['city']['S']) . "</td>";
    echo "</tr>";
}

echo "</table>";

?>