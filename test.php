<html>
<body>
<?php
$n=10;
$c=0;$p=1;$d="Hello worldedniediewjowqdoqwdjdodideindejbdchjbdvsbduwdw654r8751fv841f84ed56s1d65s15sderer843r485487545er348e4378e3748e34874ew44de874478e4e4d8474374347rfe434438ieiuneddn";
while ($p <= 30 && ($c+7)<strlen($d)) {
	echo date('h:i:s') . "<br>";
	sleep(1.5);
	echo substr($d,$c,8)."<br>";
	$c+=8;


	$p++;
}
//while($no--)
//	{
//	$com="sendip -p ipv4 -is ".$sip." -p tcp -ts ".$sp." -td ".$dp." -d ".$data." -v ".$dip;
//	echo $com."<br><br><br>";
//	system($com);	
//	}
//




if($c<strlen($data))
		{
			$a=$len-(strlen($data)-$c);$d=substr($data,$c);
			$com="sendip -p ipv4 -is ".$sip." -p udp -us ".$sp." -ud ".$dp." -d ".$d." -v ".$dip;
			system($com);
			sleep($t);
		}
?>
</body>
</html>
