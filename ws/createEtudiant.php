<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../racine.php';
    include_once RACINE . '/service/EtudiantService.php';
    create();
}
function create()
{
    extract($_POST);
    $es = new EtudiantService();

    if($img == "no") {
        $image = null;
    }else {
        $image = $img;
    }
    
    $es->create(new Etudiant(1, $nom, $prenom, $ville, $sexe, $image));
    header('Content-type: application/json');
    echo json_encode($es->findAllApi());
}


function base64_to_jpeg($base64_string, $output_file)
{
    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return $output_file;
}

