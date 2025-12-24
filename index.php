<?php
require_once "entity/club.php";
require_once "entity/equipe.php";



/* function input(string $label): string
{
    echo $label . ": ";
    return trim(fgets(STDIN));
}


while (true) {
    echo "menu\n";
    echo "1. AJouter un club\n";
    echo "2. Afficher un club\n";
    echo "3. Supprimer un club\n";
    echo "4. Modifier un club\n";



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

        case '4':
            $c = new Club();
            $id=input("L'id du club a editer : ");
            $nouveauNom=input("Entrez le nouveau nom : ");
            $c->update($id,$nouveauNom);
        default:
            break;
     
    }
} */
$equipe1=new Equipe();
$equipe1->setNom('equipe');
$equipe1->setJeu('jeu1');
$equipe1->setIdClub(2);
$equipe1->createEquipe();
var_dump($equipe1->__tostring());

?>