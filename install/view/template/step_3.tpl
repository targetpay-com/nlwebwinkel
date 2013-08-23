<?php echo $header; ?>
<h1>Stap 3 - Configuratie</h1>
<div id="column-right">
  <ul>
    <li>Licentie</li>
    <li>Pre-Installatie</li>
    <li><b>Configuratie</b></li>
    <li>Afronden</li>
  </ul>
</div>
<div id="content">
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <p>1. Vermeld je database login gegevens.</p>
    <fieldset>
      <table class="form">
        <tr>
          <td>Database Driver:</td>
          <td><select name="db_driver">
              <option value="mysql">MySQL</option>
            </select></td>
        </tr>
        <tr>
          <td><span class="required">*</span> Database Host:</td>
          <td><input type="text" name="db_host" value="<?php echo $db_host; ?>" />
            <br />
            <?php if ($error_db_host) { ?>
            <span class="required"><?php echo $error_db_host; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> Gebruikersnaam:</td>
          <td><input type="text" name="db_user" value="<?php echo $db_user; ?>" />
            <br />
            <?php if ($error_db_user) { ?>
            <span class="required"><?php echo $error_db_user; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td>Wachtwoord:</td>
          <td><input type="text" name="db_password" value="<?php echo $db_password; ?>" /></td>
        </tr>
        <tr>
          <td><span class="required">*</span> Database naam:</td>
          <td><input type="text" name="db_name" value="<?php echo $db_name; ?>" />
            <br />
            <?php if ($error_db_name) { ?>
            <span class="required"><?php echo $error_db_name; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td>Database Prefix:</td>
          <td><input type="text" name="db_prefix" value="<?php echo $db_prefix; ?>" />
            <br />
            <?php if ($error_db_prefix) { ?>
            <span class="required"><?php echo $error_db_prefix; ?></span>
            <?php } ?></td>
        </tr>
      </table>
    </fieldset>
    <p>2. Geef een admin gebruikersnaam en wachtwoord op.</p>
    <fieldset>
      <table class="form">
        <tr>
          <td><span class="required">*</span> Gebruikersnaam:</td>
          <td><input type="text" name="username" value="<?php echo $username; ?>" />
            <br />
            <?php if ($error_username) { ?>
            <span class="required"><?php echo $error_username; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> Wachtwoord:</td>
          <td><input type="text" name="password" value="<?php echo $password; ?>" />
            <br />
            <?php if ($error_password) { ?>
            <span class="required"><?php echo $error_password; ?></span>
            <?php } ?></td>
        </tr>
        <tr>
          <td><span class="required">*</span> E-Mail:</td>
          <td><input type="text" name="email" value="<?php echo $email; ?>" />
            <br />
            <?php if ($error_email) { ?>
            <span class="required"><?php echo $error_email; ?></span>
            <?php } ?></td>
        </tr>
      </table>
    </fieldset>
    
    <p>3. Betaalinstellingen</p>
    <p>Ga naar <a href="https://www.targetpay.com/signup?p_actiecode=YM3R2A">www.targetpay.com</a> (opent in nieuw venster) en leg een account aan 
    voor het afhandelen van de iDEAL betalingen. Vul de layoutcode uit de bevestigingsmail hieronder in:</p> 
    <fieldset>
      <table class="form">
        <tr>
          <td><span class="required">*</span> TargetPay layoutcode:</td>
          <td><input type="text" name="rtlo" value="<?php echo $rtlo; ?>" />
            <br />
            <?php if ($error_rtlo) { ?>
            <span class="required"><?php echo $error_rtlo; ?></span>
            <?php } ?></td>
        </tr>
      </table>
    </fieldset>
        
    <div class="buttons">
      <div class="left"><a href="<?php echo $back; ?>" class="button">Terug</a></div>
      <div class="right">
        <input type="submit" value="Verder" class="button" />
      </div>
    </div>
  </form>
</div>
<?php echo $footer; ?>