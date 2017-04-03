<?php 
		error_Reporting(E_ALL);
		include_once './db_functions.php';
		include_once './GCM.php';
		$db = new DB_Functions();
		$name="test4321";
		$gcm_regid="APA91bEmY6SypRvktbJnAgyW92KI2ys4W5EhTq3nxjR0NLb4HBE2GWTsvAIxOw9yVKC_zL15wAg8Wr0T3fRtPRYz1q4PcYhB26IoO4gYO-skEnZxHXrlFeZwUubz-9MjQK_V7eljcsmLwWeCe1ipRtwiLtgC1M3_gnM-X-NZfTxX0_wvJjQT-J8";
		$res = $db->storeUser($name, $gcm_regid);
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            });
        </script>
    </head>
    <body>
        <form name="" method="post" action="register.php">
			<input type="text" name="name"/>
			<input type="text" name="regId"/>
			<input type="submit"/>
		</form>
    </body>
</html>
