<body>
<div class="title">
    <h2>Europa League</h2>
</div>
<div class="kommentarcontainer">
	<?php foreach ($comments as $kommentar): ?>
		<?php if($kommentar->theme == 3): ?>
		<div class="kommentarbox">
			<table style="width:100%">
				<tr>
					<th><div><b><?= $username; ?></b></div></th>
					<th id="th2"><div><a class="nolink" href="/europaleague/delete?id=<?= $kommentar->id; ?>">Löschen</a></div></th>
					<th id="th3"><div><a class="nolink" href="/europaleague/?id=<?= $kommentar->id; ?>">Bearbeiten</a></div></th>
				</tr>
			</table>
			
			<?php if($edit_id != $kommentar->id): ?>
				<?= $kommentar->text ?>
			<?php else: ?>
				<form action="/europaleague/doEdit?id=<?= $kommentar->id; ?>" method="post">
					<textarea name="text" rows="10" cols="40" ><?php echo $kommentar->text ?></textarea>
					<button class="textareasubmit" type="submit">Ändern</button>
				</form>
			<?php endif; ?>

		</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<div id="neuerKommentar">
    <form action="/europaleague/doCreate" method="post">
        <input type="text" name="kommentar" size="50" max="256" id="kommifeld">
        <input type="image" src="/images/send_icon.png" alt="submit" name="submit" width="45" height="45" id="send_icon">
    </form>
</div>
</body>
</html>