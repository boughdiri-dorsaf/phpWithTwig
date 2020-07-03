<?php

require "../vendor/autoload.php";

header('Centent-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Method: POST, GET');
header("Access-Control-Allow-Headers: X-Custom-Header, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");

use App\Database;
$db = new Database();

$entree = $_GET['check_in'];
$sortie = $_GET['check_out'];

$stop_sale = array();
$datejour = date('Y-m-d');
$date_sejour = $entree;
$hotel = 1;
$duree = (strtotime($sortie) - strtotime($entree));
$dureesejour = $duree / 86400;

$nbrNuitees = $dureesejour;
$age_enf_gratuit = 0;

$nuitee = 0;
$nuiteelpd = 0;
$nuiteedp = 0;
$nuiteepc = 0;
$nuiteeallinsoft = 0;
$nuiteeallin = 0;
$nuiteeultraallin = 0;

while (($date_sejour < $sortie)) {
    $test = 0;
    // 1 chambre single : 1 ad  ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[1] = 0;
    $dp[1] = 0;
    $pc[1] = 0;
    $allinsoft[1] = 0;
    $allin[1] = 0;
    $ultraallin[1] = 0;
    // 2 chambre single : 1 enfant ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[2] = 0;
    $dp[2] = 0;
    $pc[2] = 0;
    $allinsoft[2] = 0;
    $allin[2] = 0;
    $ultraallin[2] = 0;
    // 3 Chambre double : 2 ad ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[3] = 0;
    $dp[3] = 0;
    $pc[3] = 0;
    $allinsoft[3] = 0;
    $allin[3] = 0;
    $ultraallin[3] = 0;
    // 4 chmabre double : 1ad + 1enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[4] = 0;
    $dp[4] = 0;
    $pc[4] = 0;
    $allinsoft[4] = 0;
    $allin[4] = 0;
    $ultraallin[4] = 0;
    // 5 chambre double : 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[5] = 0;
    $dp[5] = 0;
    $pc[5] = 0;
    $allinsoft[5] = 0;
    $allin[5] = 0;
    $ultraallin[5] = 0;
    // 6 Chambre triple : 3 adulte ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[6] = 0;
    $dp[6] = 0;
    $pc[6] = 0;
    $allinsoft[6] = 0;
    $allin[6] = 0;
    $ultraallin[6] = 0;
    // 7 chambre triple : 2 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[7] = 0;
    $dp[7] = 0;
    $pc[7] = 0;
    $allinsoft[7] = 0;
    $allin[7] = 0;
    $ultraallin[7] = 0;
    // 8 chambre triple : 1 ad + 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[8] = 0;
    $dp[8] = 0;
    $pc[8] = 0;
    $allinsoft[8] = 0;
    $allin[8] = 0;
    $ultraallin[8] = 0;
    // 9 chambre triple : 3 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[9] = 0;
    $dp[9] = 0;
    $pc[9] = 0;
    $allinsoft[9] = 0;
    $allin[9] = 0;
    $ultraallin[9] = 0;
    // 10 chambre quad : 4 ad ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[10] = 0;
    $dp[10] = 0;
    $pc[10] = 0;
    $allinsoft[10] = 0;
    $allin[10] = 0;
    $ultraallin[10] = 0;
    // 11 chambre quad : 3 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[11] = 0;
    $dp[11] = 0;
    $pc[11] = 0;
    $allinsoft[11] = 0;
    $allin[11] = 0;
    $ultraallin[11] = 0;
    // 12 chambre quad : 2 ad + 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[12] = 0;
    $dp[12] = 0;
    $pc[12] = 0;
    $allinsoft[12] = 0;
    $allin[12] = 0;
    $ultraallin[12] = 0;
    // 13 chambre quad : 1 ad + 3 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[13] = 0;
    $dp[13] = 0;
    $pc[13] = 0;
    $allinsoft[13] = 0;
    $allin[13] = 0;
    $ultraallin[13] = 0;
    // 14 chambre quad : 0 ad + 4 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
    $lpd[14] = 0;
    $dp[14] = 0;
    $pc[14] = 0;
    $allinsoft[14] = 0;
    $allin[14] = 0;
    $ultraallin[14] = 0;

    $donnees = $db->query("SELECT * from saison_hotel WHERE '" . $date_sejour . "' BETWEEN date_debut and date_fin");

    foreach ($donnees as $donnees) {

        ++$nuitee;
        $age_enf_gratuit = $donnees->age_enf_gratuit;
        if ($donnees->lpd_achat != 0) {++$nuiteelpd;}
        if ($donnees->dp_achat != 0) {++$nuiteedp;}
        if ($donnees->pc_achat != 0) {++$nuiteepc;}
        if ($donnees->all_in_soft_achat != 0) {++$nuiteeallinsoft;}
        if ($donnees->all_in_achat != 0) {++$nuiteeallin;}
        if ($donnees->ultra_all_in_achat != 0) {++$nuiteeultraallin;}
        // 1 chambre single : 1 ad  ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        if ($donnees->lpd_vente == 0) {$lpd[1] = 0 + $lpd[1];} else { $lpd[1] = $donnees->lpd_vente + $donnees->supp_sing_vente + $lpd[1];}
        if ($donnees->dp_vente == 0) {$dp[1] = 0 + $dp[1];} else { $dp[1] = $donnees->dp_vente + $donnees->supp_sing_vente + $dp[1];}
        if ($donnees->pc_vente == 0) {$pc[1] = 0 + $pc[1];} else { $pc[1] = $donnees->pc_vente + $donnees->supp_sing_vente + $pc[1];}
        if ($donnees->all_in_soft_vente == 0) {$allinsoft[1] = 0 + $allinsoft[1];} else { $allinsoft[1] = $donnees->all_in_soft_vente + $donnees->supp_sing_vente + $allinsoft[1];}
        if ($donnees->all_in_vente == 0) {$allin[1] = 0 + $allin[1];} else { $allin[1] = $donnees->all_in_vente + $donnees->supp_sing_vente + $allin[1];}
        if ($donnees->ultra_all_in_vente == 0) {$ultraallin[1] = 0 + $ultraallin[1];} else { $ultraallin[1] = $donnees->ultra_all_in_vente + $donnees->supp_sing_vente + $ultraallin[1];}
        // 2 chambre single : 1 enfant ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        if ($donnees->lpd_vente == 0) {$lpd[2] = 0 + $lpd[2];} else { $lpd[2] = ($donnees->lpd_vente * $donnees->red_1enf_0ad) + $lpd[2];}
        if ($donnees->dp_vente == 0) {$dp[2] = 0 + $dp[2];} else { $dp[2] = ($donnees->dp_vente * $donnees->red_1enf_0ad) + $dp[2];}
        if ($donnees->pc_vente == 0) {$pc[2] = 0 + $pc[2];} else { $pc[2] = ($donnees->pc_vente * $donnees->red_1enf_0ad) + $pc[2];}
        if ($donnees->all_in_soft_vente == 0) {$allinsoft[2] = 0 + $allinsoft[2];} else { $allinsoft[2] = ($donnees->all_in_soft_vente * $donnees->red_1enf_0ad) + $allinsoft[2];}
        if ($donnees->all_in_vente == 0) {$allin[2] = 0 + $allin[2];} else { $allin[2] = ($donnees->all_in_vente * $donnees->red_1enf_0ad) + $allin[2];}
        if ($donnees->ultra_all_in_vente == 0) {$ultraallin[2] = 0 + $ultraallin[2];} else { $ultraallin[2] = ($donnees->ultra_all_in_vente * $donnees->red_1enf_0ad)+ $ultraallin[2];}
        // 3 Chambre double : 2 ad ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[3] = ($donnees->lpd_vente * 2) + $lpd[3];
        $dp[3] = ($donnees->dp_vente * 2) + $dp[3];
        $pc[3] = ($donnees->pc_vente * 2) + $pc[3];
        $allinsoft[3] = ($donnees->all_in_soft_vente * 2) + $allinsoft[3];
        $allin[3] = ($donnees->all_in_vente * 2) + $allin[3];
        $ultraallin[3] = ($donnees->ultra_all_in_vente * 2) + $ultraallin[3];
        // 4 chmabre double : 1ad + 1enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[4] = $donnees->lpd_vente * (1 + $donnees->red_1enf_1ad) + $lpd[4];
        $dp[4] = $donnees->dp_vente * (1 + $donnees->red_1enf_1ad) + $dp[4];
        $pc[4] = $donnees->pc_vente * (1 + $donnees->red_1enf_1ad) + $pc[4];
        $allinsoft[4] = $donnees->all_in_soft_vente * (1 + $donnees->red_1enf_1ad) + $allinsoft[4];
        $allin[4] = $donnees->all_in_vente * (1 + $donnees->red_1enf_1ad) + $allin[4];
        $ultraallin[4] = $donnees->ultra_all_in_vente * (1 + $donnees->red_1enf_1ad) + $ultraallin[4];
        // 5 chambre double : 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[5] = ($donnees->lpd_vente * ($donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $lpd[5];
        $dp[5] = ($donnees->dp_vente * ($donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $dp[5];
        $pc[5] = ($donnees->pc_vente * ($donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $pc[5];
        $allinsoft[5] = ($donnees->all_in_soft_vente * ($donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $allinsoft[5];
        $allin[5] = ($donnees->all_in_vente * ($donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $allin[5];
        $ultraallin[5] = ($donnees->ultra_all_in_vente * ($donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $ultraallin[5];
        // 6 Chambre triple : 3 adultes ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[6] = ($donnees->lpd_vente * (2 + $donnees->red_3_ad)) + $lpd[6];
        $dp[6] = ($donnees->dp_vente * (2 + $donnees->red_3_ad)) + $dp[6];
        $pc[6] = ($donnees->pc_vente * (2 + $donnees->red_3_ad)) + $pc[6];
        $allinsoft[6] = ($donnees->all_in_soft_vente * (2 + $donnees->red_3_ad)) + $allinsoft[6];
        $allin[6] = ($donnees->all_in_vente * (2 + $donnees->red_3_ad)) + $allin[6];
        $ultraallin[6] = ($donnees->ultra_all_in_vente * (2 + $donnees->red_3_ad)) + $ultraallin[6];
        // 7 chambre triple : 2 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[7] = ($donnees->lpd_vente * (2 + $donnees->red_1enf_2ad)) + $lpd[7];
        $dp[7] = ($donnees->dp_vente * (2 + $donnees->red_1enf_2ad)) + $dp[7];
        $pc[7] = ($donnees->pc_vente * (2 + $donnees->red_1enf_2ad)) + $pc[7];
        $allinsoft[7] = ($donnees->all_in_soft_vente * (2 + $donnees->red_1enf_2ad)) + $allinsoft[7];
        $allin[7] = ($donnees->all_in_vente * (2 + $donnees->red_1enf_2ad)) + $allin[7];
        $ultraallin[7] = ($donnees->ultra_all_in_vente * (2 + $donnees->red_1enf_2ad)) + $ultraallin[7];
        // 8 chambre triple : 1 ad + 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[8] = ($donnees->lpd_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $lpd[8];
        $dp[8] = ($donnees->dp_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $dp[8];
        $pc[8] = ($donnees->pc_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $pc[8];
        $allinsoft[8] = ($donnees->all_in_soft_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $allinsoft[8];
        $allin[8] = ($donnees->all_in_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $allin[8];
        $ultraallin[8] = ($donnees->ultra_all_in_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad)) + $ultraallin[8];
        // 9 chambre triple : 3 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[9] = ($donnees->lpd_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad)) + $lpd[9];
        $dp[9] = ($donnees->dp_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad)) + $dp[9];
        $pc[9] = ($donnees->pc_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad)) + $pc[9];
        $allinsoft[9] = ($donnees->all_in_soft_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad)) + $allinsoft[9];
        $allin[9] = ($donnees->all_in_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad)) + $allin[9];
        $ultraallin[9] = ($donnees->ultra_all_in_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad)) + $ultraallin[9];
        // 10 chambre quad : 4 ad ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[10] = ($donnees->lpd_vente * (2 + $donnees->red_3_ad + $donnees->red_4_ad)) + $lpd[10];
        $dp[10] = ($donnees->dp_vente * (2 + $donnees->red_3_ad + $donnees->red_4_ad)) + $dp[10];
        $pc[10] = ($donnees->pc_vente * (2 + $donnees->red_3_ad + $donnees->red_4_ad)) + $pc[10];
        $allinsoft[10] = ($donnees->all_in_soft_vente * (2 + $donnees->red_3_ad + $donnees->red_4_ad)) + $allinsoft[10];
        $allin[10] = ($donnees->all_in_vente * (2 + $donnees->red_3_ad + $donnees->red_4_ad)) + $allin[10];
        $ultraallin[10] = ($donnees->ultra_all_in_vente * (2 + $donnees->red_3_ad + $donnees->red_4_ad)) + $ultraallin[10];
        // 11 chambre quad : 3 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[11] = ($donnees->lpd_vente * (2 + $donnees->red_3_ad + $donnees->red_1enf_3ad)) + $lpd[11];
        $dp[11] = ($donnees->dp_vente * (2 + $donnees->red_3_ad + $donnees->red_1enf_3ad)) + $dp[11];
        $pc[11] = ($donnees->pc_vente * (2 + $donnees->red_3_ad + $donnees->red_1enf_3ad)) + $pc[11];
        $allinsoft[11] = ($donnees->all_in_soft_vente * (2 + $donnees->red_3_ad + $donnees->red_1enf_3ad)) + $allinsoft[11];
        $allin[11] = ($donnees->all_in_vente * (2 + $donnees->red_3_ad + $donnees->red_1enf_3ad)) + $allin[11];
        $ultraallin[11] = ($donnees->ultra_all_in_vente * (2 + $donnees->red_3_ad + $donnees->red_1enf_3ad)) + $ultraallin[11];
        // 12 chambre quad : 2 ad + 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[12] = ($donnees->lpd_vente * (2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad)) + $lpd[12];
        $dp[12] = ($donnees->dp_vente * (2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad)) + $dp[12];
        $pc[12] = ($donnees->pc_vente * (2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad)) + $pc[12];
        $allinsoft[12] = ($donnees->all_in_soft_vente * (2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad)) + $allinsoft[12];
        $allin[12] = ($donnees->all_in_vente * (2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad)) + $allin[12];
        $ultraallin[12] = ($donnees->ultra_all_in_vente * (2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad)) + $ultraallin[12];
        // 13 chambre quad : 1 ad + 3 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[13] = ($donnees->lpd_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad)) + $lpd[13];
        $dp[13] = ($donnees->dp_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad)) + $dp[13];
        $pc[13] = ($donnees->pc_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad)) + $pc[13];
        $allinsoft[13] = ($donnees->all_in_soft_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad)) + $allinsoft[13];
        $allin[13] = ($donnees->all_in_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad)) + $allin[13];
        $ultraallin[13] = ($donnees->ultra_all_in_vente * (1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad)) + $ultraallin[13];
        // 14 chambre quad : 0 ad + 4 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
        $lpd[14] = ($donnees->lpd_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad)) + $lpd[14];
        $dp[14] = ($donnees->dp_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad)) + $dp[14];
        $pc[14] = ($donnees->pc_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad)) + $pc[14];
        $allinsoft[14] = ($donnees->all_in_soft_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad)) + $allinsoft[14];
        $allin[14] = ($donnees->all_in_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad)) + $allin[14];
        $ultraallin[14] = ($donnees->ultra_all_in_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad)) + $ultraallin[14];

    }

    $date_sejour = date("Y-m-d", strtotime("+1 day", strtotime($date_sejour)));
}

for ($i = 1; $i <= 14; $i++) {

    $chambre['Type'] = $i;
    //$chambre['Date'] = $date_sejour;
    $chambre['LPD'] = $lpd[$i] * $nbrNuitees;
    $chambre['DP'] = $dp[$i] * $nbrNuitees;
    $chambre['PC'] = $pc[$i] * $nbrNuitees;
    $chambre['All_In_Soft'] = $allinsoft[$i] * $nbrNuitees;
    $chambre['All_In'] = $allin[$i] * $nbrNuitees;
    $chambre['Ultra_All_In'] = $ultraallin[$i] * $nbrNuitees;
    $chambre['Lit_BB'] = 0;
    $chambre['nbrNuits'] = $nbrNuitees;
    $chambre['age_enf_gratuit'] = $age_enf_gratuit;
    $resultat[] = $chambre;

}

$resultats['chambre'] = $resultat;

// Chercher les arrangements Disponible pour la periode choisie
if ($nuitee == $nuiteelpd) {$arrangement[] = "LPD";}
if ($nuitee == $nuiteedp) {$arrangement[] = "DP";}
if ($nuitee == $nuiteepc) {$arrangement[] = "PC";}
if ($nuitee == $nuiteeallinsoft) {$arrangement[] = "All In Soft";}
if ($nuitee == $nuiteeallin) {$arrangement[] = "All In";}
if ($nuitee == $nuiteeultraallin) {$arrangement[] = "Ultra All In";}

$resultats['arrangement'] = $arrangement;

echo json_encode($resultats);
?>