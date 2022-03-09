<?php
require '../vendor/autoload.php';
require 'employer.php';

use Symfony\Component\Validator\ValidatorBuilder;

function getUserValidator() {
    $builder = new ValidatorBuilder();
    $builder->addMethodMapping('loadValidatorMetadata');
    return $builder->getValidator();
}

if ($_POST != null) {
    $employer = new Employer(intval($_POST['id']), $_POST['name'] . '', floatval($_POST['salary']), date($_POST['offerDate']));
    $_POST = null;
    echo 'Handling ' . $employer;
    $validator = getUserValidator();
    $errors = $validator->validate($employer);

    if (count($errors) == 0) {
        echo '<p style="color: #00ff00;">Employer valid</p>';
    } else {
        echo '<p style="color: #ff0000;">Employer invalid</p>';
        echo '<ul style="color:#ff0000;">';
        foreach ($errors as $error) {
            echo '<li>' . $error->getPropertyPath() . ' - ' . $error->getMessage() . '</li>';
        }
        echo '</ul>';
    }
}
?>

<html lang="en">
<head>
    <title>PHP OOP</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<div class="new-employer">
    <h2>Create a new emplyer</h2>
    <form action="" method="POST" style="display: block;">
        <p>Id</p>
        <input type="text" name="id">
        <p>Name</p>
        <input type="text" name="name">
        <p>Salary</p>
        <input type="text" name="salary">
        <p>Offer Date</p>
        <input type="date" name="offerDate">
        <input type="submit" value="submit" name="submit">
    </form>
</div>

</body>
</html>