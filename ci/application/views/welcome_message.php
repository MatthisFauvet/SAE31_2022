<?=validation_errors(); ?>
<div>
	<h3>Doodle</h3>
	<p>
		Bienvenue sur notre site Doodle like pour créer des sondages et convenir de dates pour des rendez-vous entre collègues, amis et plus si affinités...
	</p>

	<p>
		Pour créer un sondage vous devez avoir un compte: <a href="./user/create">Page de création</a>
	</p>
	<p>
		Pour répondre à un sondage il vous suffit de copier le lien fourni par votre simple connaissance dans votre navigateur <br>
		ou de remplir la clé ici:
		<?=form_open('/reponses/rep','method="GET"')?>
			<input type="text" name="cle" id="cle" placeholder="Clé">
			<button type="submit">Envoyer</button>
	</p>
</div>