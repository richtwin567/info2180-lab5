<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$context = $_GET['context'];
$query = $_GET[$context];

if ($context=="countries") {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$query%';");
}else{
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$query%';");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php if($context=="countries") :?>
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
?>
<?php endif; ?>

<?php if($context=="cities") :?>
<?php
echo <<< 'EOT'
<table>
<thead>
<td>Name</td><td>District</td><td>Population</td>
</thead>
<tbody>
EOT;
?>
    <?php foreach ($results as $row) : ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['district']; ?></td>
        <td><?= $row['population']; ?></td>
      </tr>
    <?php endforeach; ?>
<?php
echo <<<'EOT'
</tbody></table>
EOT;
?>
<?php endif; ?>