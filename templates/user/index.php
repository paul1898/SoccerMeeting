<img class="hintergrund" src="images/hintergrund.jpg" alt="background_img">
<div class="logincontainer">
<p class="ueberschrift">Melde dich an, um deine Meinung zu teilen!
<br>
<br>
<form action="/user/doLogin" method="post">
<table class="logintable">
<tr class="loginzeile">
		<td class="tablelinks">Benutzername:</td>
		<td><input name="username" class="tableinput" type="text" placeholder="Benutzername"></td>
	</tr>
	<tr class="loginzeile">
		<td class="tablelinks">Passwort:</td>
		<td><input name="password" class="tableinput" type="password" placeholder="Passwort"></td>
	</tr>
	<tr class="loginzeile">
		<td class="tablelinks"></td>
		<td><button class="tablesubmit" type="submit" name="submitlogin">Anmelden</button></td>
	</tr>
</table>
</form>
</div>


<!--<article class="hreview open special">
	<?php if (empty($users)): ?>
		<div class="dhd">
			<h2 class="item title">Hoopla! Keine User gefunden.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($users as $user): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $user->firstName; ?> <?= $user->lastName; ?></div>
				<div class="panel-body">
					<p class="description">In der Datenbank existiert ein User mit dem Namen <?= $user->firstName; ?> <?= $user->lastName; ?>. Dieser hat die EMail-Adresse: <a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a></p>
					<p>
						<a title="Löschen" href="/user/delete?id=<?= $user->id; ?>">Löschen</a>
					</p>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</article>-->
