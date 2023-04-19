<?php

try{
  $apiUrl = 'https://api.le-systeme-solaire.net/rest/bodies?filter[]=isPlanet,eq,true&order=volume';

  $data = file_get_contents($apiUrl);

  $planets = json_decode($data, true);

  if(!$planets){
    throw new Exception('Error fetching API');
  }
} catch (Exception $e){
  echo 'Error fetching API '.$e->getMessage();
  exit;
}

?>

<table>
  <caption>Our solar system</caption>
  <tr>
    <th scope="col">Planet</th>
    <th scope="col">Mass</th>
    <th scope="col">Volume</th>
    <th scope="col">Gravity</th>
    <th scope="col">Discovery date</th>
  </tr>
 
    <?php 

      foreach($planets['bodies'] as $planet){
        ?>
         <tr>
          <th scope="row"><?= $planet['name'] ?></th>
          <td><?= $planet['mass']['massValue'] ?></td>
          <td><?= $planet['vol']['volValue'] ?></td>
          <td><?= $planet['gravity'] ?></td>
          <td><?= $planet['discoveryDate'] ?></td>
         </tr>
        <?php
      }