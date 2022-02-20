<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #cc0000;}
h2{ color: maroon;
font-size: 20px;
font-style: oblique;
font-family: Helvetica}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $subjectErr = $genderErr = $websiteErr = $feedbackErr = "";
$name = $email = $gender = $subject = $feedback = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }

  if (empty($_POST["subject"])) {
    $subjectErr = "Subject is required";
  } else {
    $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["feedback"])) {
    $feedbackErr = "Feedback is required";
  } else {
    $feedback = test_input($_POST["feedback"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Simple Form Validation</h2>
<h3>"Leave Your Feedbacks Here"</h3>
<p><span class="error"> *Field Required*</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Subject: <input type="text" name="subject">
  <span class="error">*<?php echo $subjectErr;?></span>
  <br></br>
  Feedbacks: <textarea name="feedback" rows="4" cols="24"></textarea>
  <span class="error">*<?php echo $feedbackErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other

  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $subject;
echo "<br>";
echo $feedback;
echo "<br>";
echo $gender;
?>

</body>
</html>
