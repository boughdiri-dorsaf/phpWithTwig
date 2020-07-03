<?php

require "../vendor/autoload.php";

header('Centent-Type: application/json');
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Method: POST, GET');
header("Access-Control-Allow-Headers: X-Custom-Header, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");



    use App\Database;
    $db = new Database();

        $client = $_POST['client'];
        //$client = ['mail'=> "daminihel@gmail.com","nom"=> "نهال الدامي","tel"=> "54212211"];
        $vente_hotel = $_POST['vente_hotel'];
        $vente_hotel = ["entree"=> "2019-12-20","hotel" => "5", "sortie" => "2019-12-21"];
        $chmbr_rsrv = $_POST['chambre_reservation'];
        //$chmbr_rsrv = ["ad1"=> ["nihel"],"ad2" => [null], "ad3" => [null], "ad4" => [null], "ad5" => [null], "arrangement" => ["LPD"], "bebe1" => [], "bebe2" => [], "enf1" => [null], "enf1_age" => [null], "enf2" => [null], "enf2_age" => [null], "enf3" => [null], "enf3_age" => [null], "enf4" => [null], "enf4_age" => [null], "enf5" => [null], "enf5_age" => [null], "entree" => "2019-12-20", "nbr_bb" => ["0"], "nbr_chambre" => 1, "sortie" => "2019-12-21", "type_chambre" => [1]];
        $nombre_chambre=$chmbr_rsrv['nbr_chambre'];  
        $arrangement=$chmbr_rsrv['arrangement'];
    
        $type=$chmbr_rsrv['type_chambre'];
    
        $unique = uniqid (rand(), true);
    
        $datejour= date('Y-m-d');
    
        $date_sejour = $vente_hotel['entree'];
        $sortie = $vente_hotel['sortie'];
        $hotel = $vente_hotel['hotel'];   
        $nomClient = null;
        $telClient = null;
        $mailClient = null;
    
        for ($i=1 ; $i<15; $i++){
            $lpd[$i] = $dp[$i] = $pc[$i] = $allinsoft[$i] = $allin[$i] = $ultraallin[$i]= null;
            $lpdachat[$i] = $dpachat[$i] = $pcachat[$i] = $allinsoftachat[$i] = $allinachat[$i] = $ultraallinachat[$i] = null;
        }
        while ($date_sejour < $sortie)
        {
            
                $requete = $db->query("SELECT * from saison_hotel WHERE id_hotel = '".$hotel."' and'".$date_sejour."' BETWEEN date_debut and date_fin  ");
                foreach ($requete as $donnees)
                { 
                   
                    ++$nuitee;
                    if ( $donnees->lpd_achat != 0 ) {++$nuiteelpd;}
                    if ($donnees->dp_achat !=0 ) {  ++$nuiteedp ;}
                    if ($donnees->pc_achat !=0 ) {   ++$nuiteepc ;}
                    if ($donnees->all_in_soft_achat !=0 ) { ++$nuiteeallinsoft ; }
                    if ($donnees->all_in_achat !=0 ) {  ++$nuiteeallin ; }
                    if ($donnees->ultra_all_in_achat !=0 ) {  ++$nuiteeultraallin ;}
                    // 1 chambre single : 1 ad  ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                
                    if ( $donnees->lpd_vente == 0 ) { $lpd[1] = 0 + $lpd[1]  ; } else { $lpd[1] += $donnees->lpd_vente + $donnees->supp_sing_vente   ; }
                    if ( $donnees->dp_vente == 0 ) { $dp[1] = 0 + $dp[1]  ; } else { $dp[1] += $donnees->dp_vente + $donnees->supp_sing_vente   ; }
                    if ( $donnees->pc_vente == 0 ) { $pc[1] = 0 + $pc[1]  ; } else { $pc[1] += $donnees->pc_vente + $donnees->supp_sing_vente   ; }
                    if ( $donnees->all_in_soft_vente == 0 ) { $allinsoft[1] = 0 + $allinsoft[1]  ; } else { $allinsoft[1] += $donnees->all_in_soft_vente + $donnees->supp_sing_vente   ; }
                    if ( $donnees->all_in_vente == 0 ) { $allin[1] = 0 + $allin[1]  ; } else { $allin[1] += $donnees->all_in_vente + $donnees->supp_sing_vente   ; }
                    if ( $donnees->ultra_all_in_vente == 0 ) { $ultraallin[1] = 0 + $ultraallin[1]  ; } else { $ultraallin[1] += $donnees->ultra_all_in_vente + $donnees->supp_sing_vente  ; }
                            
                    if ( $donnees->lpd_achat == 0 ) { $lpdachat[1] = 0 + $lpdachat[1]  ; } else { $lpdachat[1] += $donnees->lpd_achat + $donnees->supp_sing_achat   ; }
                    if ( $donnees->dp_achat == 0 ) { $dpachat[1] = 0 + $dpachat[1]  ; } else { $dpachat[1] += $donnees->dp_achat + $donnees->supp_sing_achat  ; }
                    if ( $donnees->pc_achat == 0 ) { $pcachat[1] = 0 + $pcachat[1]  ; } else { $pcachat[1] += $donnees->pc_achat + $donnees->supp_sing_achat   ; }
                    if ( $donnees->all_in_soft_achat == 0 ) { $allinsoftachat[1] = 0 + $allinsoftachat[1]  ; } else { $allinsoftachat[1] += $donnees->all_in_soft_achat + $donnees->supp_sing_achat  ; }
                    if ( $donnees->all_in_achat == 0 ) { $allinachat[1] = 0 + $allinachat[1]  ; } else { $allinachat[1] += $donnees->all_in_achat + $donnees->supp_sing_achat  ; }
                    if ( $donnees->ultra_all_in_achat == 0 ) { $ultraallinachat[1] = 0 + $ultraallinachat[1]  ; } else { $ultraallinachat[1] += $donnees->ultra_all_in_achat + $donnees->supp_sing_achat   ; }
                    
                    // 2 chambre single : 1 enfant ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                            
                    if ( $donnees->lpd_vente == 0 ) { $lpd[2] = 0 + $lpd[2]  ; } else { $lpd[2] += ($donnees->lpd_vente *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->dp_vente == 0 ) { $dp[2] = 0 + $dp[2]  ; } else { $dp[2] += ($donnees->dp_vente *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->pc_vente == 0 ) { $pc[2] = 0 + $pc[2]  ; } else { $pc[2] += ($donnees->pc_vente *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->all_in_soft_vente == 0 ) { $allinsoft[2] = 0 + $allinsoft[2]  ; } else { $allinsoft[2] += ($donnees->all_in_soft_vente *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->all_in_vente == 0 ) { $allin[2] = 0 + $allin[2]  ; } else { $allin[2] += ($donnees->all_in_vente *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->ultra_all_in_vente == 0 ) { $ultraallin[2] = 0 + $ultraallin[2]  ; } else { $ultraallin[2] += ($donnees->ultra_all_in_vente *  $donnees->red_1enf_0ad) ; }
                            
                    if ( $donnees->lpd_achat == 0 ) { $lpdachat[2] = 0 + $lpdachat[2]  ; } else { $lpdachat[2] += ($donnees->lpd_achat *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->dp_achat == 0 ) { $dpachat[2] = 0 + $dpachat[2]  ; } else { $dpachat[2] += ($donnees->dp_achat *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->pc_achat == 0 ) { $pcachat[2] = 0 + $pcachat[2]  ; } else { $pcachat[2] += ($donnees->pc_achat *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->all_in_soft_achat == 0 ) { $allinsoftachat[2] = 0 + $allinsoftachat[2]  ; } else { $allinsoftachat[2] += ($donnees->all_in_soft_achat *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->all_in_achat == 0 ) { $allinachat[2] = 0 + $allinachat[2]  ; } else { $allinachat[2] += ($donnees->all_in_achat *  $donnees->red_1enf_0ad) ; }
                    if ( $donnees->ultra_all_in_achat == 0 ) { $ultraallinachat[2] = 0 + $ultraallinachat[2]  ; } else { $ultraallinachat[2] += ($donnees->ultra_all_in_achat *  $donnees->red_1enf_0ad) ; } 
                    
                    // 3 Chambre double : 2 ad ( lpd / DP / PC / Allinsoft / allin / ultraallin )									
                    
                    $lpd[3] += ($donnees->lpd_vente * 2) ;
                    $dp[3] += ($donnees->dp_vente * 2) ;
                    $pc[3] += ($donnees->pc_vente * 2);
                    $allinsoft[3] += ($donnees->all_in_soft_vente * 2) ;    
                    $allin[3] += ($donnees->all_in_vente * 2) ;
                    $ultraallin[3] += ($donnees->ultra_all_in_vente * 2) ;
                            
                    $lpdachat[3] += ($donnees->lpd_achat * 2)  ;
                    $dpachat[3] += ($donnees->dp_achat * 2) ;
                    $pcachat[3] += ($donnees->pc_achat * 2);
                    $allinsoftachat[3] += ($donnees->all_in_soft_achat * 2) ;    
                    $allinachat[3] += ($donnees->all_in_achat * 2);
                    $ultraallinachat[3] += ($donnees->ultra_all_in_achat * 2);
                    
                    // 4 chmabre double : 1ad + 1enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )

                    $lpd[4] += ($donnees->lpd_vente * ( 1+ $donnees->red_1enf_1ad )) ;
                    $dp[4] += ($donnees->dp_vente * ( 1 + $donnees->red_1enf_1ad ));
                    $pc[4] += ($donnees->pc_vente * ( 1 + $donnees->red_1enf_1ad ));
                    $allinsoft[4] += ($donnees->all_in_soft_vente * ( 1 + $donnees->red_1enf_1ad ));
                    $allin[4] += ($donnees->all_in_vente * ( 1 + $donnees->red_1enf_1ad ));
                    $ultraallin[4] += ($donnees->ultra_all_in_vente * ( 1 + $donnees->red_1enf_1ad ));
                    
                    $lpdachat[4] += ($donnees->lpd_achat * ( 1 + $donnees->red_1enf_1ad ));
                    $dpachat[4] += ($donnees->dp_achat * ( 1 + $donnees->red_1enf_1ad ));
                    $pcachat[4] += ($donnees->pc_achat * ( 1 + $donnees->red_1enf_1ad ));
                    $allinsoftachat[4] += ($donnees->all_in_soft_achat * ( 1 + $donnees->red_1enf_1ad ));
                    $allinachat[4] += ($donnees->all_in_achat * ( 1 + $donnees->red_1enf_1ad ));
                    $ultraallinachat[4] += ($donnees->ultra_all_in_achat * ( 1 + $donnees->red_1enf_1ad ));
                    
                    // 5 chambre double : 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                                
                    $lpd[5] += ($donnees->lpd_vente * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $dp[5] += ($donnees->dp_vente * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $pc[5] += ($donnees->pc_vente * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $allinsoft[5] += ($donnees->all_in_soft_vente * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $allin[5] += ($donnees->all_in_vente * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $ultraallin[5] += ($donnees->ultra_all_in_vente * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                        
                    $lpdachat[5] += ($donnees->lpd_achat * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $dpachat[5] += ($donnees->dp_achat * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $pcachat[5] += ($donnees->pc_achat * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $allinsoftachat[5] += ($donnees->all_in_soft_achat * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $allinachat[5] += ($donnees->all_in_achat * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                    $ultraallinachat[5] += ($donnees->ultra_all_in_achat * ( $donnees->red_1enf_0ad + $donnees->red_2enf_0ad ));
                        
                    // 6 Chambre triple : 3 adultes ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                    $lpd[6] += ( $donnees->lpd_vente * ( 2 + $donnees->red_3_ad ) ) ;
                    $dp[6] +=  ( $donnees->dp_vente * ( 2 + $donnees->red_3_ad ) )  ;
                    $pc[6] +=  ( $donnees->pc_vente  * ( 2 + $donnees->red_3_ad ) )  ;
                    $allinsoft[6] += ( $donnees->all_in_soft_vente * ( 2 + $donnees->red_3_ad ) )  ;
                    $allin[6] += ( $donnees->all_in_vente * ( 2 + $donnees->red_3_ad ) ) ;
                    $ultraallin[6] += ( $donnees->ultra_all_in_vente * ( 2 + $donnees->red_3_ad ) ) ;

                    // 6 Chambre triple Achat : 3 adultes ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                    $lpdachat[6] += ( $donnees->lpd_achat * ( 2 + $donnees->red_3_ad ) )   ;
                    $dpachat[6] +=  ( $donnees->dp_achat * ( 2 + $donnees->red_3_ad ) )  ;
                    $pcachat[6] +=  ( $donnees->pc_achat  * ( 2 + $donnees->red_3_ad ) )  ;
                    $allinsoftachat[6] += ( $donnees->all_in_soft_achat * ( 2 + $donnees->red_3_ad ) )  ;
                    $allinachat[6] += ( $donnees->all_in_achat * ( 2 + $donnees->red_3_ad ) ) ;
                    $ultraallinachat[6] += ( $donnees->ultra_all_in_achat * ( 2 + $donnees->red_3_ad ) ) ;
                                        
                    // 7 chambre triple : 2 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                    $lpd[7] += ( $donnees->lpd_vente * ( 2 + $donnees->red_1enf_2ad )) ;
                    $dp[7] += ( $donnees->dp_vente * ( 2 + $donnees->red_1enf_2ad ))  ;
                    $pc[7] += ( $donnees->pc_vente  * ( 2 + $donnees->red_1enf_2ad ))  ;
                    $allinsoft[7] +=( $donnees->all_in_soft_vente * ( 2 + $donnees->red_1enf_2ad ))  ;
                    $allin[7] += ( $donnees->all_in_vente * ( 2 + $donnees->red_1enf_2ad )) ;
                    $ultraallin[7] += ( $donnees->ultra_all_in_vente * ( 2 + $donnees->red_1enf_2ad )) ;

                    // 7 chambre triple achat : 2 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )

                    $lpdachat[7] += ( $donnees->lpd_achat * ( 2 + $donnees->red_1enf_2ad )) ;
                    $dpachat[7] += ( $donnees->dp_achat * ( 2 + $donnees->red_1enf_2ad )) ;
                    $pcachat[7] += ( $donnees->pc_achat  * ( 2 + $donnees->red_1enf_2ad ))  ;
                    $allinsoftachat[7] +=( $donnees->all_in_soft_achat * ( 2 + $donnees->red_1enf_2ad ))   ;
                    $allinachat[7] += ( $donnees->all_in_achat * ( 2 + $donnees->red_1enf_2ad )) ;
                    $ultraallinachat[7] += ( $donnees->ultra_all_in_achat * ( 2 + $donnees->red_1enf_2ad )) ;
                                        
                    // 8 chambre triple : 1 ad + 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )

                    $lpd[8] += ($donnees->lpd_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $dp[8] += ($donnees->dp_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $pc[8] += ($donnees->pc_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $allinsoft[8] +=($donnees->all_in_soft_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $allin[8] += ($donnees->all_in_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $ultraallin[8] += ($donnees->ultra_all_in_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                            
                    $lpdachat[8] += ($donnees->lpd_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $dpachat[8] += ($donnees->dp_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $pcachat[8] += ($donnees->pc_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $allinsoftachat[8] +=($donnees->all_in_soft_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $allinachat[8] += ($donnees->all_in_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    $ultraallinachat[8] += ($donnees->ultra_all_in_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad) );
                    
                    // 9 chambre triple : 3 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                    
                    $lpd[9] += ($donnees->lpd_vente * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $dp[9] += ($donnees->dp_vente * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $pc[9] += ($donnees->pc_vente * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $allinsoft[9] += ($donnees->all_in_soft_vente * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $allin[9] += ($donnees->all_in_vente * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $ultraallin[9] += ($donnees->ultra_all_in_vente * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                        
                    $lpdachat[9] += ($donnees->lpd_achat * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $dpachat[9] += ($donnees->dp_achat * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $pcachat[9] += ($donnees->pc_achat * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $allinsoftachat[9] += ($donnees->all_in_soft_achat * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $allinachat[9] += ($donnees->all_in_achat * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                    $ultraallinachat[9] += ($donnees->ultra_all_in_achat * ( $donnees->red_1enf_0ad +  $donnees->red_2enf_0ad + $donnees->red_3enf_0ad ) ); 
                                    
                    //10 chambre quad : 4 ad ( lpd / DP / PC / Allinsoft / allin / ultraallin )    
                    
                    $lpd[10] +=  ($donnees->lpd_vente * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $dp[10] += ( $donnees->dp_vente * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $pc[10] +=  ( $donnees->pc_vente  * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $allinsoft[10] += ( $donnees->all_in_soft_vente * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $allin[10] += ( $donnees->all_in_vente * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $ultraallin[10] += ( $donnees->ultra_all_in_vente * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                        
                    $lpdachat[10] += ( $donnees->lpd_achat * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $dpachat[10] += ( $donnees->dp_achat * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $pcachat[10] +=  ( $donnees->pc_achat  * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $allinsoftachat[10] += ( $donnees->all_in_soft_achat * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $allinachat[10] += ( $donnees->all_in_achat * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    $ultraallinachat[10] += ( $donnees->ultra_all_in_achat * ( 2 + $donnees->red_3_ad + $donnees->red_4_ad )) ; 
                    
                    // 11 chambre quad : 3 ad + 1 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                            
                    $lpd[11] += ( $donnees->lpd_vente * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $dp[11] += ( $donnees->dp_vente * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $pc[11] +=  ( $donnees->pc_vente  * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $allinsoft[11] += ( $donnees->all_in_soft_vente * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $allin[11] += ( $donnees->all_in_vente * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $ultraallin[11] += ( $donnees->ultra_all_in_vente * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                            
                    $lpdachat[11] += ( $donnees->lpd_achat * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $dpachat[11] += ( $donnees->dp_achat * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $pcachat[11] +=  ( $donnees->pc_achat  * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $allinsoftachat[11] += ( $donnees->all_in_soft_achat * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $allinachat[11] += ( $donnees->all_in_achat * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                    $ultraallinachat[11] += ( $donnees->ultra_all_in_achat * ( 2 + $donnees->red_3_ad + $donnees->red_1enf_3ad) );
                        
                    // 12 chambre quad : 2 ad + 2 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                            
                    $lpd[12] += ( $donnees->lpd_vente *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $dp[12] += ( $donnees->dp_vente *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $pc[12] +=  ( $donnees->pc_vente  *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $allinsoft[12] += ( $donnees->all_in_soft_vente *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $allin[12] += ( $donnees->all_in_vente *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $ultraallin[12] += ( $donnees->ultra_all_in_vente *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                            
                    $lpdachat[12] += ( $donnees->lpd_achat *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $dpachat[12] += ( $donnees->dp_achat *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $pcachat[12] +=  ( $donnees->pc_achat  *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $allinsoftachat[12] += ( $donnees->all_in_soft_achat *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $allinachat[12] += ( $donnees->all_in_achat *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                    $ultraallinachat[12] += ( $donnees->ultra_all_in_achat *  ( 2 + $donnees->red_1enf_2ad + $donnees->red_2enf_2ad) );
                        
                    // 13 chambre quad : 1 ad + 3 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )
                            
                    $lpd[13] +=  ($donnees->lpd_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $dp[13] +=  ($donnees->dp_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $pc[13] +=   ($donnees->pc_vente  * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $allinsoft[13] +=  ($donnees->all_in_soft_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $allin[13] +=  ($donnees->all_in_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $ultraallin[13] +=  ($donnees->ultra_all_in_vente * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                            
                    $lpdachat[13] +=  ($donnees->lpd_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $dpachat[13] +=  ($donnees->dp_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $pcachat[13] +=   ($donnees->pc_achat  * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $allinsoftachat[13] +=  ($donnees->all_in_soft_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $allinachat[13] +=  ($donnees->all_in_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                    $ultraallinachat[13] +=  ($donnees->ultra_all_in_achat * ( 1 + $donnees->red_1enf_1ad + $donnees->red_2enf_1ad + $donnees->red_3enf_1ad )) ;
                                    
                    // 14 chambre quad : 0 ad + 4 enf ( lpd / DP / PC / Allinsoft / allin / ultraallin )    
                    
                    $lpd[14] += ($donnees->lpd_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $dp[14] += ($donnees->dp_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $pc[14] +=  ($donnees->pc_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $allinsoft[14] += ($donnees->all_in_soft_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $allin[14] += ($donnees->all_in_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $ultraallin[14] += ($donnees->ultra_all_in_vente * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                            
                    $lpdachat[14] += ($donnees->lpd_achat * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $dpachat[14] += ($donnees->dp_achat * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $pcachat[14] +=  ($donnees->pc_achat * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $allinsoftachat[14] += ($donnees->all_in_soft_achat * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $allinachat[14] += ($donnees->all_in_achat * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                    $ultraallinachat[14] += ($donnees->ultra_all_in_achat * ($donnees->red_1enf_0ad + $donnees->red_2enf_0ad + $donnees->red_3enf_0ad + $donnees->red_4enf_0ad) );
                }
            
            $date_sejour = date("Y-m-d", strtotime("+1 day", strtotime($date_sejour)));
        }
    
        $nomClient = $client['nom'];
        $telClient = $client['tel'];
        $mailClient = $client['mail'];
        
        $idClient = null;
        
        $req = $db->prepare('INSERT INTO `client_indiv`(`nom`, `tel`, `mail`) VALUES (:nom,:tel,:mail)');
        $req->execute(array(
            'nom' => $nomClient,
            'tel' => $telClient,
            'mail' => $mailClient ));
    
        $x = $db->lastInsertId();
        
        $randomId = uniqid();
        $requete = $db->prepare('INSERT INTO vente_hotel VALUES ( :id,:idBrave, :id_user,:date,:id_client,:passager , :phone,:hotelId ,:fournisseurId ,:entree,
        :sortie,:arrangement,:achat,:vente, :etat_client, :etat_fournisseur, :etat_dossier, :remarque, :id_client_indiv , :uniqueId )');
        $requete ->execute(array('id'=>null,'idBrave'=>0,'id_user'=>'1','date'=>$datejour,'id_client'=>'135','passager'=>$nomClient , 'phone'=>$telClient,
        'hotelId'=>$vente_hotel['hotel'],'fournisseurId'=>null, 'entree'=>$vente_hotel['entree'],'sortie'=>$vente_hotel['sortie'],'arrangement'=>0, 'achat'=>0,'vente'=>0, 'etat_client'=>0, 
        'etat_fournisseur'=>0, 'etat_dossier'=>0, 'remarque'=>'0', 'id_client_indiv'=> $x,'uniqueId' => $randomId ));
        
        $v = $db->lastInsertId();
        
        for ($n = 0; $n < $nombre_chambre; $n++)
        {
            if( $type[$n] == 1  )
                {  
                    if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[1]; $achatchambre = $lpdachat[1]; } 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[1]; $achatchambre = $dpachat[1]; } 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[1]; $achatchambre = $pcachat[1]; } 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[1]; $achatchambre = $allinsoftachat[1]; } 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[1]; $achatchambre = $allinachat[1];   } 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[1]; $achatchambre = $ultraallinachat[1]; }
                    
                    $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                    $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>1,'nbre_ad'=>1,'nbre_enf'=>0,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> null,':age_enf1'=> null,':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                    
                } elseif ( $type[$n] == 2  )
                {	
                    if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[2]; $achatchambre = $lpdachat[2];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[2]; $achatchambre = $dpachat[2]; }
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[2]; $achatchambre = $pcachat[1];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[2]; $achatchambre = $allinsoftachat[2];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[2]; $achatchambre = $allinachat[2];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[2]; $achatchambre = $ultraallinachat[2];}

                    $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                    $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>2,'nbre_ad'=>0,'nbre_enf'=>1,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>null,'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=>$chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                
                } elseif ( $type[$n] == 3  )
                    {
                        if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[3]; $achatchambre = $lpdachat[3]; } 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[3]; $achatchambre = $dpachat[3];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[3]; $achatchambre = $pcachat[3];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[3]; $achatchambre = $allinsoftachat[3];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[3]; $achatchambre = $allinachat[3];} 
                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[3]; $achatchambre = $ultraallinachat[3];}

                    $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                    $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>3,'nbre_ad'=>2,'nbre_enf'=>0,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> $chmbr_rsrv['ad2'][$n],'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> null,':age_enf1'=> null,':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                
                    } elseif ( $type[$n] == 4  )
                            {	
                                if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[4]; $achatchambre = $lpdachat[4];} 
                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[4]; $achatchambre = $dpachat[4];} 
                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[4]; $achatchambre = $pcachat[4];} 
                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[4]; $achatchambre = $allinsoftachat[4];} 
                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[4]; $achatchambre = $allinachat[4];} 
                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[4]; $achatchambre = $ultraallinachat[4];}

                                $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                            $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>4,'nbre_ad'=>1,'nbre_enf'=>1,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                            } elseif ( $type[$n] == 5  )
                                {	
                                    if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[5]; $achatchambre = $lpdachat[5];} 
                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[5]; $achatchambre = $dpachat[5];} 
                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[5]; $achatchambre = $pcachat[5];} 
                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[5]; $achatchambre = $allinsoftachat[5];}
                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[5]; $achatchambre = $allinachat[5];} 
                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[5]; $achatchambre = $ultraallinachat[5];}

                                $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>5,'nbre_ad'=>0,'nbre_enf'=>2,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>null,'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> $chmbr_rsrv['enf2'][$n],':age_enf1'=> $chmbr_rsrv['enf2_age'][$n],':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                } elseif ( $type[$n] == 6 )
                                    {	
                                        if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[6]; $achatchambre = $lpdachat[6];} 
                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[6]; $achatchambre = $dpachat[6];} 
                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[6]; $achatchambre = $pcachat[6];} 
                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[6]; $achatchambre = $allinsoftachat[6];} 
                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[6]; $achatchambre = $allinachat[6];} 
                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[6]; $achatchambre = $ultraallinachat[6];}

                                        $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                    $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>6,'nbre_ad'=>3,'nbre_enf'=>0,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> $chmbr_rsrv['ad2'][$n],'nom_ad3'=> $chmbr_rsrv['ad3'][$n],'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> null,':age_enf1'=> null,':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                    } elseif ( $type[$n] == 7  )
                                        {
                                            if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[7]; $achatchambre = $lpdachat[7];} 
                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[7]; $achatchambre = $dpachat[7];} 
                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[7]; $achatchambre = $pcachat[7];} 
                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[7]; $achatchambre = $allinsoftachat[7];} 
                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[7]; $achatchambre = $allinachat[7];} 
                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[7]; $achatchambre = $ultraallinachat[7];}

                                        $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                        $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>7,'nbre_ad'=>2,'nbre_enf'=>1,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> $chmbr_rsrv['ad2'][$n],'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                        } elseif ( $type[$n] == 8  )
                                            {
                                                if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[8]; $achatchambre = $lpdachat[8];} 
                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[8]; $achatchambre = $dpachat[8];} 
                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[8]; $achatchambre = $pcachat[8];} 
                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[8]; $achatchambre = $allinsoftachat[8];} 
                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[8]; $achatchambre = $allinachat[8];} 
                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[8]; $achatchambre = $ultraallinachat[8];}

                                            $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                            $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>8,'nbre_ad'=>1,'nbre_enf'=>2,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> $chmbr_rsrv['enf2'][$n],':age_enf2'=> $chmbr_rsrv['enf2_age'][$n],':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'nom_ad1'=>null,'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> null,':age_enf1'=> null,':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                            } elseif ( $type[$n] == 9  )
                                                {
                                                    if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[9]; $achatchambre = $lpdachat[9];} 
                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[9]; $achatchambre = $dpachat[9];} 
                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[9]; $achatchambre = $pcachat[9];} 
                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[9]; $achatchambre = $allinsoftachat[9];} 
                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[9]; $achatchambre = $allinachat[9];} 
                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[9]; $achatchambre = $ultraallinachat[9];}

                                                $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                                $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>9,'nbre_ad'=>0,'nbre_enf'=>3,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>null,'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> $chmbr_rsrv['enf2'][$n],':age_enf2'=> $chmbr_rsrv['enf2_age'][$n],':nom_enf3'=> $chmbr_rsrv['enf3'][$n],':age_enf3'=> $chmbr_rsrv['enf3_age'][$n],':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                                } elseif ( $type[$n] == 10  )
                                                    {	
                                                        if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[10];$achatchambre = $lpdachat[10];} 
                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[10]; $achatchambre = $dpachat[10];} 
                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[10]; $achatchambre = $pcachat[10];} 
                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[10]; $achatchambre = $allinsoftachat[10];} elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[10]; $achatchambre = $allinachat[10];} 
                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[10]; $achatchambre = $ultraallinachat[10];}

                                                    $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                                    $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>10,'nbre_ad'=>4,'nbre_enf'=>0,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> $chmbr_rsrv['ad2'][$n],'nom_ad3'=> $chmbr_rsrv['ad3'][$n],'nom_ad4'=> $chmbr_rsrv['ad4'][$n],'nom_ad5'=> null,':nom_enf1'=> null,':age_enf1'=> null,':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                                    } elseif ( $type[$n] == 11  )
                                                        {
                                                            if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[11]; $achatchambre = $lpdachat[11];}
                                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[11]; $achatchambre = $dpachat[11];} 
                                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[11]; $achatchambre = $pcachat[11];} 
                                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[11]; $achatchambre = $allinsoftachat[11];}
                                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[11]; $achatchambre = $allinachat[11];} 
                                                        elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[11]; $achatchambre = $ultraallinachat[11];}
                                                        
                                                        $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                                        $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>11,'nbre_ad'=>3,'nbre_enf'=>1,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> $chmbr_rsrv['ad2'][$n],'nom_ad3'=> $chmbr_rsrv['ad3'][$n],'nom_ad4'=>null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> null,':age_enf2'=> null,':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                                        } elseif ( $type[$n] == 12  )
                                                            {	
                                                                if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[12]; $achatchambre = $lpdachat[12];} 
                                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[12]; $achatchambre = $dpachat[12];} 
                                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[12]; $achatchambre = $pcachat[12];} 
                                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[12]; $achatchambre = $allinsoftachat[12];} 
                                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[12]; $achatchambre = $allinachat[12];} 
                                                            elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[12]; $achatchambre = $ultraallinachat[12];}
                                                            
                                                            $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                                            $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>12,'nbre_ad'=>2,'nbre_enf'=>2,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=> $chmbr_rsrv['ad1'][$n],'nom_ad2'=> $chmbr_rsrv['ad2'][$n],'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> $chmbr_rsrv['enf2'][$n],':age_enf2'=> $chmbr_rsrv['enf2_age'][$n],':nom_enf3'=> null,':age_enf3'=> null,':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=> $chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                                            } elseif ( $type[$n] == 13  )
                                                                {	
                                                                    if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[13]; $achatchambre = $lpdachat[13];} 
                                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[13]; $achatchambre = $dpachat[13];} 
                                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[13]; $achatchambre = $pcachat[13];} 
                                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[13]; $achatchambre = $allinsoftachat[13];} 
                                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[13]; $achatchambre = $allinachat[13];} 
                                                                elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[13]; $achatchambre = $ultraallinachat[13];}
                                                                
                                                                $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                                                $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>13,'nbre_ad'=>1,'nbre_enf'=>3,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>$chmbr_rsrv['ad1'][$n],'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> $chmbr_rsrv['enf2'][$n],':age_enf2'=> $chmbr_rsrv['enf2_age'][$n],':nom_enf3'=> $chmbr_rsrv['enf3'][$n],':age_enf3'=> $chmbr_rsrv['enf3_age'][$n],':nom_enf4'=> null,':age_enf4'=> null,':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=>$chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                                                } elseif ( $type[$n] == 14  )
                                                                    {	
                                                                        if ( $chmbr_rsrv['arrangement'][$n] == 'LPD' ) { $ventechambre = $lpd[14]; $achatchambre = $lpdachat[14];} 
                                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'DP' ) {$ventechambre = $dp[14]; $achatchambre = $dpachat[14];} 
                                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'PC' ){$ventechambre = $pc[14]; $achatchambre = $pcachat[14];} 
                                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In Soft' ){$ventechambre = $allinsoft[14]; $achatchambre = $allinsoftachat[14];} 
                                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'All In' ) {$ventechambre = $allin[14]; $achatchambre = $allinachat[14];} 
                                                                    elseif  ( $chmbr_rsrv['arrangement'][$n] == 'Ultra All In' ) {$ventechambre = $ultraallin[14]; $achatchambre = $ultraallinachat[14];}
                                                                    
                                                                    $requete = $db->prepare('INSERT INTO chambre_hotel VALUES ( :id,:id_hotel,:id_reservation,:entree,:sortie,:type_chambre,:nbre_ad,:nbre_enf,:nbre_bb,:nom_ad1, :nom_ad2, :nom_ad3, :nom_ad4, :nom_ad5, :nom_enf1, :age_enf1, :nom_enf2, :age_enf2, :nom_enf3, :age_enf3, :nom_enf4, :age_enf4, :nom_enf5, :age_enf5,:arrangement,:achat,:vente,:remarque)');
                                                                    $requete ->execute(array('id'=>null,'id_hotel'=>$vente_hotel['hotel'],'id_reservation'=>$v,'entree'=>$chmbr_rsrv['entree'],'sortie'=>$chmbr_rsrv['sortie'],'type_chambre'=>14,'nbre_ad'=>0,'nbre_enf'=>4,'nbre_bb'=>$chmbr_rsrv['nbr_bb'][$n],'nom_ad1'=>null,'nom_ad2'=> null,'nom_ad3'=> null,'nom_ad4'=> null,'nom_ad5'=> null,':nom_enf1'=> $chmbr_rsrv['enf1'][$n],':age_enf1'=> $chmbr_rsrv['enf1_age'][$n],':nom_enf2'=> $chmbr_rsrv['enf2'][$n],':age_enf2'=> $chmbr_rsrv['enf2_age'][$n],':nom_enf3'=> $chmbr_rsrv['enf3'][$n],':age_enf3'=> $chmbr_rsrv['enf3_age'][$n],':nom_enf4'=> $chmbr_rsrv['enf4'][$n],':age_enf4'=> $chmbr_rsrv['enf4_age'][$n],':nom_enf5'=> null,':age_enf5'=> null,'arrangement'=> $chmbr_rsrv['arrangement'][$n],'achat'=>$achatchambre,'vente'=>$ventechambre,'remarque'=>0 ));
                                                                    } 
    } 
     
     
    $uni = null;    
    $d = $db->lastInsertId();
    
    $donnees = $db->query("SELECT * FROM chambre_hotel WHERE id = ".$d);

    foreach ($donnees as $donnees)
    {
        $idResrv = $donnees->id_reservation;   
    }
		
		$rsrv['id_reservation'] = $idResrv;
		$result[] = $rsrv;
     
        echo json_encode($result);
        ?>