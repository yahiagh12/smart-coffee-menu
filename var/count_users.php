<?php
try{
  $pdo=new PDO('sqlite:'.__DIR__.DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'data.db');
  $row=$pdo->query('SELECT COUNT(*) AS c FROM users')->fetch(PDO::FETCH_ASSOC);
  echo 'users_count:'.($row['c']??'0')."\n";
}catch(Exception $e){ echo 'ERR: '.$e->getMessage()."\n"; }
?>
