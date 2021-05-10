<?php
require_once('Connection.php');

$conn = new Connection;

$sql = "SELECT id, name, quantity, price FROM products";
$result = $conn -> connect()->prepare($sql);
$result -> execute();

$sql = "SELECT id, SUM(quantity * price) AS total FROM products";
$somatotal = $conn -> connect() -> prepare($sql);
$somatotal -> execute();

?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <title>Projeto3</title>
</head>

<body>
  <div class="container">
    <h1>Listagem de produtos</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Preço</th>
        </tr>
      </thead>
      <tbody>       
        

        <?php
        if ($result -> rowCount() > 0){
          while ($row = $result -> fetch(PDO::FETCH_ASSOC)){
              echo "<tr>";
                  echo "<td>" . $row["id"];
                  echo "<td>" . $row["name"];
                  echo "<td>" . $row["quantity"];
                  echo "<td>" . $row["price"];
          }
      }
      else {
          echo "0 results found";
      }            
        ?>

        
      </tbody>
      <tfoot class="bg-info">
        <tr class="table-dark">
          <td></td>
          <td></td>
          <td>Total</td>
          <?php
          if ($somatotal -> rowCount() > 0){
            $row = $somatotal -> fetch(PDO::FETCH_ASSOC);
                echo "<td>".$row['total'] ."</td>";           
            }
          ?>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

</html>
   