<?php 
system("ps -axn |grep apache2 > stopkill.txt");
system("cut -d ' ' -f 2 stopkill.txt > stopkill1.txt");
$data=fopen("stopkill1.txt","r");

	$a=fgets($data);
	system("kill -9 $a");
	$a=fgets($data);
	system("kill -9 $a");


fclose($data);
echo "Packet sending interrupted by user!!<br>";

system("sudo service apache2 start");
//sleep(2);
header("location:sendip.html");
?>