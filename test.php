<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>test</title>
</head>
<body>
	<form action="">
		Điền gì đó đi <br>
		<input type="text" name="ten" id="ten"> <br>
	</form>
	<div id="ket_qua"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#ten").keypress(function() {
				let ten = $(this).val()
				document.title = ten;
				$("#ket_qua").text("ban da dien: " + ten);
			})
		});
	</script>
</body>
</html>