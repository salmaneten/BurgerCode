<?php 
    require 'database.php';
    if(!empty($_GET['id']))
    {
        $id =  checkInput($_GET['id']);
    }

    if(!empty($_POST['id']))
    {
        $id =  checkInput($_POST['id']);
        $db =  Database::connect();
        $statement = $db->prepare('DELETE FROM items WHERE id = ?');
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }

    function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!Doctype html>
<html>

<head>
    <title>Burger Code</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/glyphicon.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>Burger Code<span
            class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">


        <h1><strong>Supprimer un item</strong></h1>
        <br>
        <form class="form" role="form" action="delete.php" method="post" >
            <input type="hidden" name="id" value="<?php echo $id;?>"> <!-- C est un passage invisible pour l'utilisateur nous permet d'obtenir l'id voulu et pour le recupéerer en suite par le POST-->
            <p class="alert alert-warning">Etes-vous sur de vouloir supprimer ?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">Oui</button>
                   
                <a href="index.php" class="btn btn-light">Non</a>
                    

            </div>
        </form>

    </div>
</body>

</html>