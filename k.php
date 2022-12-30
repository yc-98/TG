<?php


system("ps -A|grep apache2 >kill1.txt");
system("cut -d ' ' -f 2 kill1.txt>kill.txt");
$v=0;
$f1=fopen("kill.txt","r");
while(! feof($f1))
  {
  $v=fgets($f1);
  if($v!="")
  {$com="kill ".$v;
	echo $com."<br>";
	system($com);
  }}

fclose($f1);
echo "Packet sending interrupted by user!!<br>";
system("sudo service apache2 start")
?>
