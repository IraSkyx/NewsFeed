<html>
	<head>
		<title>Errors</title>
	</head>

	<body>

		<h1>Raised exceptions</h1>

		<?php
		if (isset($errors))
			foreach ($errors as $value)
		    	echo $value;
		?>

	</body>
</html>
