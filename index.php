
<a href="form.php">Add a new person</a>
<br>
<br>
<?php








$db = new PDO('mysql:host=127.0.0.1; dbname=exercises', 'root');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$query=$db->prepare("SELECT  `adults`.`name` AS `parent`, `children`.`name`,`pet_name`
FROM `children`
INNER JOIN `adults`
ON `children`.`id`
=`adults`.`child1`
WHERE `pet_name` IS NOT NULL;");

$query->execute();

$result=$query->fetchall();


foreach($result as $family) {
    print nl2br("$family[parent] is $family[name]'s parent, and they have a pet called $family[pet_name].\n");
}