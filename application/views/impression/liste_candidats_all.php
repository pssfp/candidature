<!DOCTYPE html>
<html lang="en">
	<head>      
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylepdf.css">
		
	<style>
		@page {
			margin-top: 0.3em;
			margin-left: 0.9em;
			margin-right: 0.9em;
			margin-bottom: 0.9em;
		}
	</style>
	</head>
    <body>
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
						<IMG SRC="<?php echo base_url(); ?>resources/images/logo5.png" ALT="Texte remplaçant l'image" TITLE="" style="width: 120px">
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
		<div id="content">
			<h3 style ='font-size:14px'> <font style="color: #dd5600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CANDIDATURE AU PROGRAMME SUPÉRIEUR DE SPÉCIALISATION EN FINANCES PUBLIQUES </font></h3>
			<p style="margin-left:265px;font-size:14px" ><strong><?php echo $titre; ?></strong><p>
			<table border="0" cellpadding="4" cellspacing="0"  style="margin-left:20px; font-size:12px;">
				<tr>
				    <th>N0</th>
				    <th>Ordre</th>
				    <th>Nom Prenom</th>
					<th>Specialite</th>
				    <th>Nationalite</th>
				    <th>Sexe</th>
				    <th>Adresse</th>
				    <th>Telephone</th>
				    <th>Statut professionnel</th>
				</tr>
						<?php $i = 1;  foreach($candidats as $candidat){ 
						echo '<tr>
								<td>'.$i++.'</td>
								<td>'.$candidat->ordre_candidature.'</td>
								<td>'.$candidat->nom_prenom.'</td>
								<td>'.$candidat->specialite.'</td>
								<td>'.$candidat->nom_pays.'</td>
								<td>'.$candidat->sexe.'</td>
								<td>'.$candidat->adresse_candidat.'</td>
								<td>'.$candidat->telephone.'</td>
								<td>'.$candidat->statut_prof.'</td>
							</tr>';
							}?>	
				<tr><td colspan="9" style="font-size:14px">Nombres d'inscrit: <strong><?php echo count($candidats);?></strong></td></tr>
			</table>
		</div>
    </body>
</html>