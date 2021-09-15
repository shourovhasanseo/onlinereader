<?php
	if (isset($_POST['text']))
	{
		$ch = curl_init("http://api.voicerss.org/?key=1234567890QWERTY&hl=en-us&src=Hello, world!");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "src=" . $_POST['text']);

		$audioStream = curl_exec($ch);

		curl_close($ch);

		echo "data:audio/mp3;base64," . base64_encode($audioStream);
	}
?>