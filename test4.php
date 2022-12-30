<?php






	$n=1;echo "run";
	while($n)
	{
		echo "running";
		sleep(1);
		if ( isset( $_POST['run']=='stop' ) ) 
		{ 
			echo "stop";$n=0;
		}
	}
}



?>
