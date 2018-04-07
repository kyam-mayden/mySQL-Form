
<form method="POST" action="form.php">
    <label for="name">First Name </label>
    <input type="text" name="name"><br>

    <label for="dob">Date of Birth</label>
    <input type ="date" name="dob"><br>

    <label for="pet_name">Pet name</label>
    <input type ="text" name="pet_name"><br>

    <label for="gender">Gender</label>
    <input type ="radio" name="gender" value="m">Male
    <input type ="radio" name="gender" value="f">Female<br>

    <input type="submit">
</form>

<a href="index.php">return to list</a><br>



<?php

$db = new PDO('mysql:host=127.0.0.1; dbname=exercises', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$name=$_POST['name'];
$dob=$_POST['dob'];
$pet=$_POST['pet_name'];
$gender=$_POST['gender'];

$query=$db->prepare("INSERT INTO `adults` (`name`,`DOB`,`pet_name`,`gender`)
VALUES (:name, :dob, :pet,:gender);");
$query->bindParam(':name',$name);
$query->bindParam(':dob',$dob);
$query->bindParam(':pet',$pet);
$query->bindParam(':gender',$gender);

$query->execute();

$query2=$db->prepare("SELECT `name` from `adults`");

$query2->execute();

$result=$query2->fetchall();

foreach($result as $name) {
    echo "<li> $name[name]</li>";
    echo "  <form method=\"POST\" action=\"form.php\">
            <input type='submit' value='Delete'>";

}