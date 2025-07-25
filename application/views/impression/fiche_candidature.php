<html lang="en">
	
    <body>
    <link rel="stylesheet" href="/home/www/www.candidature.pfinancespubliques.org/candidature.pfinancespubliques.org/resources/css/stylepdf.css">
    <style>
		@page {
			margin-top: 0.3em;
			margin-left: 0.9em;
			margin-right: 0.9em;
			margin-bottom: 0.9em;
		}
	</style>
	
		<div class='header'>
		
			<table>	
				<tr>
					<td>
					<div class='header_left'>
						REPUBLIQUE DU CAMEROUN <br />
						Paix- Travail- Patrie<br />
						--------------<br />
						MINISTERE DES FINANCES<br />
						--------------<br />
						SECRETARIAT GENERAL<br />
						--------------<br />
						PROGRAMME SUPERIEUR DE SPECIALISATION <br />
						EN FINANCES PUBLIQUES<br />
						--------------<br />

					</div>			
					<td>				
					<div class='header_middle'>
						<img src="/home/www/www.candidature.pfinancespubliques.org/candidature.pfinancespubliques.org/resources/images/logo5.png" style="width: 150px;"/>
					</div>
					</td>					
					<td width='50'>					
					</td>
					</td>
					<td>
					<div class='header_right'>
						REPUBLIC OF CAMEROON<br />
						Peace- Work- Fatherland<br />
						--------------<br />
						MINISTRY OF FINANCE<br />
						----------------<br />
						GENERAL SECRETARIAT<br />
						--------------<br />
						ADVANCED PROGRAM OF SPECIALISATION<br />
						IN PUBLIC FINANCE<br />
						--------------<br />

					</div>
					</td>				
				</tr>				
			</table>
		</div>
		<div>			<center><p>
			<h3 style ='margin-top: -8px;font-size:14px; '> <font style="color: #dd5600; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MASTER PROFESSIONNEL EN FINANCES PUBLIQUES </font></h3>
			<span style="text-decoration: underline;font-size:14px; margin-top: -20px;"  >FORMULAIRE D&rsquo;INSCRIPTION N°:</span> <?php echo $candidat->ordre_candidature ;?><p></center>
			
			<div style ="padding-top:-30px">
			<h4 style ="border-bottom: 1px solid; width: 600px; ">I. SPECIALITE</h4>
                        <table >
				<tr>
					<td width='450'>
                                            <div style="margin-top: -30px; ">
						<strong>Specialite :  </strong><span class="info"> <?php echo $candidat->specialite ;?></span><br />
						<strong>Type de formation :  </strong><span class="info"> <?php echo $candidat->type_etude ;?></span>
					    </div>
					</td>
					<td>
                                            <div style="margin-top: -30px; " class='photo'><i>Photo récente 4x4</i></div>
					</td>
				</tr>
			</table>
			</div>
                        
                        <div style ="padding-top:-50px">
			<h4 style ="border-bottom: 1px solid; width: 600px;   " >II. ETAT CIVIL</h4>
			<table >
				<tr>
					<td width="350">
						<strong>Nom et prenom :  </strong><span class="info"><?php echo $candidat->nom. ' ' .$candidat->prenom;?></span><br />
					</td>					
					<td>
					</td>					
					<td>
						<strong>Epouse :  </strong><span class="info"><?php echo $candidat->epouse ;?></span><br />
					</td>
				</tr>	
			</table>
			
			
			<table >		
				<tr>
					<td width="200">
						<strong>Date de naissance:  </strong><span class="info"><?php echo $candidat->date_naissance ;?></span><br />
					</td>					
					<td colspan="2">
						<strong>Lieu de naissance :  </strong><span class="info"><?php echo $candidat->lieu_de_naissce ;?></span> <br />
					</td>					
				</tr>				
				<tr>
					<td>
						<strong>Sexe :  </strong><span class="info"><?php echo $candidat->sexe ;?></span><br />
					</td>					
					<td>
						<strong>Statut matrimonial :  </strong><span class="info"><?php echo $candidat->statu_matrimonial ;?></span> <br />
					</td>					
					<td>
						<strong>Nombre d&rsquo;enfants :  </strong><span class="info"><?php echo $candidat->nombre_enfant ;?></span><br />
					</td>
				</tr>				
				<tr>
					<td>
						<strong>Nationalité :  </strong><span class="info pousser_haut"><?php echo $candidat->nationalite ;?></span><br />
					</td>					
					<td>
						<strong>Région :  </strong><span class="info pousser_haut"><?php echo $candidat->region_dorigine ;?></span> <br />
					</td>					
					<td>
						<strong>Département:  </strong><span class="info pousser_haut"><?php echo $candidat->dept_dorigine ;?></span><br />
					</td>
				</tr>				
				<tr>
					<td height="5"></td><td></td><td></td>
				</tr>
			</table>
			</div>
			
			<h4 style ="border-bottom: 1px solid; width: 780px;" class="pousser_haut">III. CONTACT</h4>
			<table style="margin-top: -20px;" class="pousser_haut">		
				<tr>
					<td>
						<strong>Adresse :  </strong><span class="info"><?php echo substr($candidat->adresse_candidat , 0, 23)."...";?> </span><br />
					</td>					
					<td>
						<strong>Lieu de résidence :  </strong><span class="info"><?php echo substr($candidat->ville_residence  , 0, 35);?></span><br />
					</td>					
				</tr>				
				<tr>
					<td>
						<strong>Téléphone 1: </strong><span class="info"><?php echo $candidat->telephone ;?></span> <br />
					</td>									
					<td>
						<strong>Téléphone 2: </strong><span class="info"><?php echo $candidat->telephone2 ;?></span> <br />
					</td>									
					<td>
						<strong>E-mail:  </strong><span class="info"><?php echo $candidat->email ;?></span> <br />
					</td>									
				</tr>
				
				
			</table>
			<h4 style ="border-bottom: 1px solid; width: 780px;" class="pousser_haut">IV. ETUDES SUPERIEURES</h4>
			<table style="margin-top: -20px;" class="pousser_haut">		
				<tr>
					<td width="250">
						<strong>Nombre d'année d'études supérieures :  </strong><span class="info"><?php echo $candidat->nombre_annee_etude_sup ;?></span><br />
					</td>					
					<td>
						<strong>Dernier Diplôme:  </strong><span class="info"><?php echo !empty($candidat->dernier_diplome) ? (strlen($candidat->dernier_diplome) > 30 ? substr($candidat->dernier_diplome, 0, 30).'...' : $candidat->dernier_diplome) : ''; ?></span> <br />
					</td>
				</tr>				
				<tr>
					<td width="250"> 
						<strong>Lieu d&rsquo;optention :  </strong><span class="info"><?php echo !empty($candidat->diplome_obtenu_a) ? (strlen($candidat->diplome_obtenu_a) > 30 ? substr($candidat->diplome_obtenu_a, 0, 30).'...' : $candidat->diplome_obtenu_a) : ''; ?></span><br />
					</td>
					<td>
						<strong>Année d&rsquo;obtention :  </strong><span class="info"><?php echo $candidat->annee_optention_diplome ?? ''; ?></span> <br />
					</td>
				</tr>				
				<tr>
					<td height="5"></td><td></td><td></td>
				</tr>
			</table>			
			<h4 style ="border-bottom: 1px solid; width: 780px;" class="pousser_haut">V. COORDONNÉES PROFESSIONNEL</h4>
			<table style="margin-top: -20px;" class="pousser_haut">		
				<tr>
					<td width="250">
						<strong>Emploi actuel :  </strong><span class="info"><?php echo $candidat->statut_prof ;?></span> <br />
					</td>					
					<td width="250">
						<strong>Structure :  </strong><span class="info"><?php echo substr( $candidat->structure , 0, 23).'...' ; ?></span><br />
					</td>					
				</tr>				
				<tr>
					<td width="350"> 
						<strong>Contact de cette structure :  </strong><span class="info"><?php echo $candidat->telephone_structure ;?></span><br />
					</td>					
					<td>
					</td>					
				</tr>				
				<tr>
					<td height="5"></td><td></td><td></td>
				</tr>
			</table>
			<h4 style ="border-bottom: 1px solid; width: 780px;" class="pousser_haut">VI. ENGAGEMENT</h4>
			<table style="margin-top: -70px;" >
				<tr>
					<td colspan="3">
						<p style ="text-align: justify;font-size:11px; margin-top: 0px;">Je sousigné(e) : <strong><?php echo $candidat->nom. ' ' .$candidat->prenom ;?></strong>, certifie sous l&rsquo;honneur, l&rsquo;exactidude des renseignements consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat au programme de Master Professionnel en Finances Publiques</p>
					</td>					
				</tr>	
				<tr>
                                    <td style="margin-top: -20px;">A : ________________</td><td>le : ___/___/_______</td><td><p style ='font-size:11px; margin-top: -25px;'><strong>Signature du candidat</strong></p></td>
				</tr>
				<tr>
					<td height="5"></td><td></td><td></td>
				</tr>
			</table>
			<h4 style ="border-bottom: 1px solid; width: 780px; border-style:dotted; margin-bottom: 15px;" class="pousser_haut" ></h4>
			<strong style="margin-left: 275px;" class="pousser_haut">COUPON DE CANDIDATURE</strong><br/>
			<table style ="font-size:11px;  " >
                            <tr>
                                <td >
					<span> Dossier N0 :  <?php echo $candidat->ordre_candidature ;?>&nbsp;&nbsp;&nbsp;<br /> Recu le: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ___/___/_______</span>
                                </td>
                                
                            </tr>
                            <tr>
                                <td width='450'>
                                    <p style="line-height: 22px;  margin-top: 0px;">
                                        <strong class="info_fin">Specialite :  </strong><span class="info_fin"><?php echo substr($candidat->specialite,0, 51).'...' ;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <strong class="info_fin">Type de formation :  </strong><span class="info_fin"><?php echo $candidat->type_etude ;?></span><br />	
                                        <strong class="info_fin">Nom et prénom :  </strong><span class="info_fin"><?php echo substr($candidat->nom, 0, 40 )." ".substr($candidat->prenom, 0, 40 );?></span> <br />
                                        <strong class="info_fin">Epouse  :  </strong><span class="info_fin"><?php echo $candidat->epouse ;?></span><br />
                                        <strong class="info_fin">Date et lieu de naissance:  </strong><span class="info_fin"><?php echo $candidat->date_naissance ;?> à <?php echo $candidat->lieu_de_naissce ;?></span><br/>
                                        <strong class="info_fin">Structure :  </strong><span class="info"><?php echo substr( $candidat->adresse_structure , 0, 40) ; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <strong class="info_fin">Contact structure :  </strong><span class="info"><?php echo $candidat->telephone_structure ;?></span>
                                    </p>
                                </td>
                                <td>
						<div class='photo'><i>Photo récente 4x4</i></div>
                                </td>
                                
                            </tr>
								
			</table>					
				
                        <div style="margin-left: 100px; font-size: 8px; " >
                        <span style="margin-left: 275px; " >cachet et visa du PSSFP</span><br/><br/>
                        B.P: 16 578 Yaoundé – Cameroun Tel.: + (237) 242 22 76 81 / (237) 242 23 37 06 / (237) 697 92 13 32 Web: www.pfinancespubliques.org - E-Mail: info@pfinancespubliques.org
                        </div>
		</div>
    </body>
</html>