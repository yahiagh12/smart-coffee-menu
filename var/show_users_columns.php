<?php
try {
    $pdo = new PDO('sqlite:'.__DIR__.DIRECTORY_SEPARATOR.'data.db');
    $stmt = $pdo->query("PRAGMA table_info('users')");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $r) {
        echo $r['cid']."\t".$r['name']."\t".$r['type']."\t".($r['notnull']?1:0)."\t".$r['dflt_value']."\n";
    }
} catch (Exception $e) {
    echo 'ERR: '.$e->getMessage();
}
?>
