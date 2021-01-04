<?php
 include 'config.php';

//IF THE SHORT IS RECEIVED

if(isset($_GET['q'])){

        $shortcut = htmlspecialchars($_GET['q']);
    //IS a shortcut
    $req =$pdo->prepare('SELECT
        COUNT(*) AS all
        FROM links
        WHERE shortcut = ?
        ');
    $req->execute([$shortcut]);
    
    while($result = $req->fetch()){
        if($result['all'] != 1){
            header('location:script.php?error=true&message=Unknown Url ');
            exit(); 
}
}
///redirection
$req =$pdo->prepare('SELECT 
*
FROM links
WHERE shortcut = ?');
$req->execute([$shortcut]);
while($result = $req->fetch()){

header('location:'.$result['url']);
exit();
}
}

if(isset($_POST['url'])){
        /// Definition de la variable
    $url =$_POST['url'];
        /// Verification URL
    if( !filter_var($url, FILTER_VALIDATE_URL)){

        // Pas un lien
        header('location:script.php?error=true&message=Unvalid Url ');
        exit(); 
    }
        /// Création du raccourcie 
    $shortcut = crypt($url, rand());

    //Has been alreadu send? 

    $req =$pdo->prepare('SELECT
        COUNT(*) AS x
        FROM links
        WHERE url = ?
        ');
    $req->execute([$url]);
    
    while($result = $req->fetch()){
        if($result['x'] != 0){
            header('location:script.php?error=true&message= Adress already shortened');
            exit();
        }
    }
        /// Envoie
        $req =$pdo->prepare('INSERT INTO
        links(url,shortcut)
        VALUES(?,?)
        ');
        $req->execute([$url,$shortcut]);
        header('location:script.php?short='.$shortcut);
        exit();
}

include 'index.php'
?>

