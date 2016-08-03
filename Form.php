<html>
<head runat="server">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
 

<?php

/*$name = $_POST['name'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];


$servername = "localhost";	
$username = "fakeDB";
$password = "drowssap";
$dbname = "fakeDBforPL";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare( "
	INSERT INTO fakeDBTable
			(
				name,
				email,
				birthday
			) VALUES (
				:name,
				:email,
				:birthday
			)
	");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':birthday', $birthday);


    $stmt->execute();

}
catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}
$conn = null; */
?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="JS/jquery.validate.min.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );


  $(document).ready(function() {

 $('#splashform').validate({
   ignore: ".ignore",
   rules: {
     name: "required",
     email: {
        required: true,
        email: true
     },
     birthday: "required",
     hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            },

},
   messages: {
      name: {
         required: " Please supply a name.",
         name: "This is not a valid name."
       },
      email: {
        required: ' Please supply an email',
        email: 'This is not a valid email.'
      },
      birthday: {
        required: ' Please supply your birthday',
        birthday: 'This is not a valid date.'
      }
   },
   errorPlacement: function(error, element) { 
       if ( element.is(":radio") || element.is(":checkbox")) {
          error.appendTo( element.parent()); 
        } else {
          error.insertAfter(element);
        } 
    }
	
	
  });



});
</script>

</head>
<body>
	<div id="container">
		<form  action="submit.php" method="post" name="splashform" id="splashform">
			<label for="name" class="label">Name: <input type="text" name="name" value="" class="field" /></label>
			<label for="email" class="label">Email: <input type="text" name="email" value="" class="field" /></label>
			<label for="birthday" class="label">Birthday: <input type="text" name="birthday" id="datepicker" / ></label>
			<div class="g-recaptcha" name:"recaptcha" data-sitekey="6LeBWSYTAAAAAGV2vmjKZ5v3GrNAD0WkePm8jjxr" data-callback="correctCaptcha"></div>
			<input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
      <input type="submit" name="submit" id="submit" value="Submit" onclick="captcha()" />
		</form>
	</div>
  
</body>
</html>