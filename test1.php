<?php

$pid=getmypid();echo $pid;
$n=1;
	while($n)
	{

		$com="sendip -p ipv4 -is 172.27.22.2 -p udp -us 441 -ud 25 -d r8 -v 172.27.30.20";
			echo $com."<br><br><br>";
			system($com);
	sleep(1);
	
	}




?>
