
<?php

	use frontend\widgets\mailform\MailformAutoload;
	$form = new MailformAutoload;
	$form->mailform = 1;
?>
<?= $form->run() ?>