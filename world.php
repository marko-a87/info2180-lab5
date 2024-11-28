<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept");

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET['country'] ?? '';
$lookup = $_GET['lookup'] ?? '';

$country = htmlspecialchars(filter_var($country, FILTER_SANITIZE_STRING));
$lookup = htmlspecialchars(filter_var($lookup, FILTER_SANITIZE_STRING));


if ($lookup == 'cities') {
    $stmt = $conn->query("SELECT * FROM countries JOIN cities ON code=cities.country_code WHERE countries.name LIKE '$country'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
        <tr>
          <th>Name</th>
          <th>District</th>
          <th>Population</th>
        </tr>
      <tbody>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?=$row['name']; ?></td>
            <td><?=$row['district']; ?></td>
            <td><?=$row['population']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php
} 
else {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE'%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  ?>
  <table>
      <tr>
        <th>Name</th>
        <th>Continet</th>
        <th>Independence </th>
        <th>Head of State</th>
      </tr>
    <tbody>
      <?php foreach ($results as $row): ?>
        <tr>
          <td><?=$row['name']; ?></td>
          <td><?=$row['continent']; ?></td>
          <td><?=$row['independence_year']; ?></td>
          <td><?=$row['head_of_state']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
}
?>


