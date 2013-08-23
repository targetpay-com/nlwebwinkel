<?php echo $header; ?>
<h1>Upgrade</h1>
<div id="column-right">
  <ul>
    <li><b>Upgrade</b></li>
    <li>Afronden</li>
  </ul>
</div>
<div id="content">
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <fieldset>
    <p><b>Volg deze stappen nauwlettend!</b></p>
    <ol>
      <li>Post all upgrade foutmeldingen op het forum</li>
      <li>Na de upgrade, verwijder cookies om foutmeldingen te voorkomen.</li>
      <li>Laad de admin pagina en druk twee keer op Ctrl-F5 om zeker te weten dat de CSS opnieuw geladen is.</li>
      <li>Ga naar Admin -> Gebruikers -> Gebruikers groepen en bewerk de Top Administrator groep. Selecteer alle checkboxen.</li>
      <li>Ga naar Admin en bewerk Systeem instellingen. Werk alle velden bij en klik op opslaan, ook als niets gewijzigd is.</li>
      <li>Laad de voorpagina van de webwinkel en druk ook weer twee keer op Ctrl-F5 om herladen te forceren.</li>
    </ol>
    </fieldset>
    <div class="buttons">
	  <div class="right">
        <input type="submit" value="Verder" class="button" />
      </div>
	</div>
  </form>
</div>
<?php echo $footer; ?> 