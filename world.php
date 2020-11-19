<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
if (array_key_exists("country", $_GET)) {
  $country = $_GET["country"];
  $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<?php
echo <<< 'EOT'
<table>
<thead>
<td>Country Name</td><td>Continent</td><td>Independence</td><td>Head of State</td>
</thead>
<tbody>
EOT;
?>
    <?php foreach ($results as $row) : ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['continent']; ?></td>
        <td><?= $row['independence_year']; ?></td>
        <td><?= $row['head_of_state']; ?></td>
      </tr>
    <?php endforeach; ?>
<?php
echo <<<'EOT'
</tbody></table>
EOT;