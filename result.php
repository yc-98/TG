<html lang="en">
<head>
  <title>Send Packet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style></style>
<head>
<body>
<?php
//input
$sip=$_POST['sip'];
$dip=$_POST['dip'];
$pro=$_POST['prodrop'];
$sp=$_POST['spdrop'];
$dp=$_POST['dpdrop'];
$cont=$_POST['nopdrop'];
$no=1;
if($cont!='cont')
$no=$_POST['nop'];
$len=$_POST['pldrop'];
$t=$_POST['pltime'];
$data="";
$own=$_POST['payload'];
if($own!='ran')
$data=$_POST['pl'];

//lets start:)


$pid=getmypid();echo $pid;

$com="";
if($pro=='udp')
{
	if($own=='ran')
	{
		$data="r".$len;
		while($no)
		{
		$com="sendip -p ipv4 -is ".$sip." -p udp -us ".$sp." -ud ".$dp." -d ".$data." -v ".$dip;
		echo $com."<br><br><br>";
		system($com);
		if($cont!='cont')
			$no--;
		sleep($t);
		}
	}
	else
	{
		$p=1;$c=0;
		while($p<=$no && $c<strlen($data))
		{
			if($cont=='cont')
			$no++;
			$p++;
			$d=substr($data,$c,$len);
			$c+=$len;
			$com="sendip -p ipv4 -is ".$sip." -p udp -us ".$sp." -ud ".$dp." -d ".$d." -v ".$dip;
			echo $com."<br><br><br>";
			system($com);echo "<br><br>";
			sleep($t);

		}
		
		
		
	}
}
else if($pro=='tcp')
{
	if($own=='ran')
	{
		$data="r".$len;
		while($no)
		{
		$com="sendip -p ipv4 -is ".$sip." -p tcp -ts ".$sp." -td ".$dp." -d ".$data." -v ".$dip;
		echo $com."<br><br><br>";
		system($com);
		if($cont!='cont')
			$no--;
		sleep($t);
		}
	}
	else
	{
		$p=1;$c=0;
		while($p<=$no && $c+$len<=strlen($data))
		{
			$p++;$d=substr($data,$c,$len);
			$c+=$len;
			$com="sendip -p ipv4 -is ".$sip." -p tcp -ts ".$sp." -td ".$dp." -d ".$d." -v ".$dip;
			echo $com."<br><br><br>";
			system($com);echo "<br><br>";
			sleep($t);
            //echo "****".$t."****";
		}
		if($c<strlen($data))
		{
			$a=$len-(strlen($data)-$c);$d=substr($data,$c);
			$com="sendip -p ipv4 -is ".$sip." -p tcp -ts ".$sp." -td ".$dp." -d ".$d." -v ".$dip;
			system($com);
			sleep($t);
		}
		
	}



	
}
else
{
	if($own=='ran')
	{
		$data="r".$len;
		while($no)
		{
		$com="sendip -p ipv4 -is ".$sip." -p icmp -d ".$data." -v ".$dip;
		echo $com."<br><br><br>";
		system($com);
		if($cont!='cont')
			$no--;
		sleep($t);
		}
	}
	else
	{
		$p=1;$c=0;
		while($p<=$no && $c+$len<=strlen($data))
		{
			if($cont=='cont')
			$p++;		
			$d=substr($data,$c,$len);
			$c+=$len;
			$com="sendip -p ipv4 -is ".$sip." -p icmp -d ".$d." -v ".$dip;
			echo $com."<br><br><br>";
			system($com);echo "<br><br>";
			sleep($t);

		}
		if($c<strlen($data))
		{
			$a=$len-(strlen(data)-$c);$d=substr($data,$c);
			$com="sendip -p ipv4 -is ".$sip." -p icmp -d ".$d." -v ".$dip;
			system($com);
			sleep($t);
		}

		
	}
}
?>

</body>
</html>
