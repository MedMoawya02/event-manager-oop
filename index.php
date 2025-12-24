<?php
require_once "entity/club.php";



function input(string $label): string
{
    echo $label . ": ";
    return trim(fgets(STDIN));
}


while (true) {
    echo "menu\n";
    echo "1. AJouter un club\n";
    echo "2. Afficher un club\n";
    echo "3. Modifier un club\n";
    echo "4. Supprimer un club\n";



    $choix = input("Entre votre choix");
    switch ($choix) {
        case '1':
            $c = new Club();
            $c->nom = input("Le nom du club");
            $c->create();
            break;
        
        case '2':
            $c = new Club();
            $rows = $c->getAll();
            foreach ($rows as $key => $value) {
                echo $value['nom'];
            }
            break;

        case '3':
            $c = new Club();
            $id=input("L'id du club a supprimer : ");
            $c->delete($id);
        default:
            break;
        /*  switch ($choix) {
        case '3':
            $c = new Club();
            $c->id = $cpnsole->input("ID de club");
            $c->delete();
            break;
        case '4':
            $c = new Club();
            $rows = $c->getAll();
            foreach ($rows as $key => $value) {
                echo $value['name'];
            }
            break;

        default:
            # code...
            break;
    } */
    }
}
?>