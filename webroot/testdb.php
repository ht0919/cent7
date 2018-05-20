<?php
$USER="root";
$PW="passwd";
$dsninfo="mysql:dbname=sample01_db;host=db;charset=utf8";
$sql = array(
  "drop database if exists sample01_db",
  "create database sample01_db",
  "use sample01_db",
  "create table testdb01 (pid int auto_increment primary key,uid varchar(30),email varchar(60),reg_date DATE)",
  "insert into testdb01 values(null,'佐藤大吉','daikichi@example.org',NOW())",
  "insert into testdb01 values(null,'渡瀬光一','koichi@example.org',NOW())",
  "insert into testdb01 values(null,'田中涼介','ryousuke@example.org',NOW())",
);
try {
  $pdo = new PDO($dsninfo, $USER, $PW);
  foreach ($sql as $s) {
    $pdo->query($s);
  }
  $sql = "select * from testdb01";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(null);
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['pid']." ".$row['uid']." ".
         $row['email']." ".$row['reg_date']."<br>\n";
  }
  $pdo = null;
} catch(PDOException $e) {
  echo $e->getMessage()."\n";
}
?>
