<!DOCTYPE html>
<html lang="en">
	<head>      
		<link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/stylepdf.css">
		
	<style>
		@page {
		margin-top: 0.3em;
		margin-left: 0.6em;
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
		<div>
			<h3> <font style="color: #dd5600;">Candidature au Programme Supérieur de Spécialisation en Finances Publiques  </font></h3>
			<p style="text-decoration: underline;" >FORMULAIRE D'INSCRIPTION N°: <p>
								
			<table>
			<tr>
				<td>
					<strong>Formation/Specialite :</strong>
				</td>
				<td width='300'>
				</td>
				<td>
					<div class='photo'><i>Photo récente 4x4</i></div>
				</td>
			</tr>
			</table>
			<h2 style ='border-bottom: 1px solid; width: 614px;'>ETAT CIVIL<h2/>
		</div>
		
		<?php var_dump($candidat);?>
    </body>
</html>