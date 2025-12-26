<?php
require_once "entity/club.php";
require_once "entity/equipe.php";
require_once "entity/joueur.php";
require_once "entity/tournoi.php";
require_once "entity/match.php";



function input(string $label): string
{
    echo $label . ": ";
    return trim(fgets(STDIN));
}


while (true) {
    echo "menu\n";
    echo "1. AJouter un club\n";
    echo "2. Ajouter un equipe\n";
    echo "3. Ajouter un joueur\n";
    echo "4. ajouter un tournoi\n";
    echo "5. generez les matchs\n";
    echo "6. Ajoutez les resultas\n";
    echo "7. Annuler un match\n";
    echo "8. Statistiques\n";



    $choix = input("Entre votre choix");
    switch ($choix) {
        case '1':
            $c = new Club();
            $c->nom = input("Le nom du club");
            $c->create();
            break;

        case '2':
            $nom = input("Entrez le nom : ");
            $jeu = input("Entrez le jeu : ");
            $idClub = input("Entrez l'id club : ");
            $e = new Equipe($nom, $jeu, $idClub);
            $e->createEquipe();
            break;

        case '3':
            $joueur = new Joueur(input("Entrez le pseudo "), input("Entrez le role "), input("saisez le salire "), input("entrez l'id de son equipe "));
            $joueur->createJoueur();
            break;

        case '4':
            $tournoi = new Tournoi(input("Le titre du tournoi "), input("cashPrize "), input("Level "));
            $tournoi->createTournoi();
            break;

        case 5:
            $equipe = (new Equipe())->getEquipes();
            shuffle($equipe);
            for ($i = 0; $i < count($equipe); $i += 2) {
                if (isset($equipe[$i + 1])) {
                    $match = new Mmatch(
                        $equipe[$i]['idEquipe'],
                        $equipe[$i + 1]['idEquipe'],
                        1
                    );
                    $match->createMatch();
                }
            }
            echo "matches gnerés avec success";
            break;

        case 6:
            $match = new Mmatch();
            $match->addScore(input("Entrez l'id du match "), input("score_A"), input("score_B"));
            break;

        case '7':
            $match = new Mmatch();
            $match->deleteMatch(input("L'id de match a annuler "));
            break;
        case '8':
            echo "menu\n";
            echo "1. Nombre total des matches\n";
            echo "2. Nombres des joueurs pour chaque equipe\n";
            echo "3. Nombre des matches par tournoi\n";
            $choix = input('Quelle statistique tu veut ');
            switch ($choix) {
                case '1':
                    $m = new Mmatch();
                    echo "Le nombre total des matches est :" . $m->getNbr() . "\n";
                    break;

                case '2':
                    $e = new Equipe();
                    $rows = $e->nbrJoueurs();
                    foreach ($rows as $row) {
                        echo "L'equipe " . $row['nom'] . " contient " . $row['nbr_joueurs'] . " joueurs\n";
                    }
                    break;

                case '3':
                    $m = new Mmatch();
                    $rows = $m->getTournoiMatches();
                    foreach ($rows as $row) {
                        echo "Le tournoi " . $row['titre'] . " contient " . $row['total_matches'] . " matches\n";
                    }
                    break;
                default:
                    break;
            }

            break;
        default:
            break;

    }
}
/* $equipe1=new Equipe();
$equipe1->setNom('equipe');
$equipe1->setJeu('jeu1');
$equipe1->setIdClub(2);
$equipe1->createEquipe();
var_dump($equipe1->__tostring()); */
/* $joueur1=new Joueur("med","capitaine",30000,2);
$joueur1->createJoueur(); */
/* $equipe2=new Equipe("equipe 2","jeu 2", 3);
$equipe2->createEquipe(); */
/* $tournoi=new tournoi("ucl",1000000,"Aller Retour");
$match=new Mmatch(2,1,6,7,3);
$match2=new Mmatch(2,4,6,7,3);
$match2->createMatch(); */
/* $equipe=new Equipe("rca","e",2);
$rows=$equipe->getEquipes();
foreach($rows as $key=>$value){
    echo $value['nom']."<br>";
} */
?>