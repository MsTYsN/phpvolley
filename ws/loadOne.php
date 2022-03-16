<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    chdir("..");
    include_once  __DIR__.'./../service/EtudiantService.php';
    loadOne();
}
function loadOne() {
    extract($_POST);
    $es = new EtudiantService();
    $etd = $es->findById(intval($id));
    header('Content-type: application/json');
    echo json_encode($etd);
}