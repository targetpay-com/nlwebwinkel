<?php echo $header; ?>
<h1>Stap 2 - Pre-Installatie</h1>
<div id="column-right">
  <ul>
    <li>Licentie</li>
    <li><b>Pre-Installatie</b></li>
    <li>Configuratie</li>
    <li>Afronding</li>
  </ul>
</div>
<div id="content">
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <p>1. Zorg dat de PHP installatie voldoet aan de volgende eisen:</p>
    <fieldset>
      <table>
        <tr>
          <th width="35%" align="left"><b>PHP Instellingen</b></th>
          <th width="25%" align="left"><b>Huidig</b></th>
          <th width="25%" align="left"><b>Benodigd</b></th>
          <th width="15%" align="center"><b>Status</b></th>
        </tr>
        <tr>
          <td>PHP Versie:</td>
          <td><?php echo phpversion(); ?></td>
          <td>5.0+</td>
          <td align="center"><?php echo (phpversion() >= '5.0') ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>Register Globals:</td>
          <td><?php echo (ini_get('register_globals')) ? 'Aan' : 'Uit'; ?></td>
          <td>Uit</td>
          <td align="center"><?php echo (!ini_get('register_globals')) ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>Magic Quotes GPC:</td>
          <td><?php echo (ini_get('magic_quotes_gpc')) ? 'Aan' : 'Uit'; ?></td>
          <td>Uit</td>
          <td align="center"><?php echo (!ini_get('magic_quotes_gpc')) ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>Bestands uploads:</td>
          <td><?php echo (ini_get('file_uploads')) ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo (ini_get('file_uploads')) ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>Session autostart:</td>
          <td><?php echo (ini_get('session_auto_start')) ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo (!ini_get('session_auto_start')) ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
      </table>
    </fieldset>
    <p>2. Zorg dat de volgende PHP extensies geinstalleerd zijn:</p>
    <fieldset>
      <table>
        <tr>
          <th width="35%" align="left"><b>Extensie</b></th>
          <th width="25%" align="left"><b>Huidig</b></th>
          <th width="25%" align="left"><b>Benodigd</b></th>
          <th width="15%" align="center"><b>Status</b></th>
        </tr>
        <tr>
          <td>MySQL:</td>
          <td><?php echo extension_loaded('mysql') ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo extension_loaded('mysql') ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>GD:</td>
          <td><?php echo extension_loaded('gd') ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo extension_loaded('gd') ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>cURL:</td>
          <td><?php echo extension_loaded('curl') ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo extension_loaded('curl') ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>mCrypt:</td>
          <td><?php echo function_exists('mcrypt_encrypt') ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo function_exists('mcrypt_encrypt') ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
        <tr>
          <td>ZIP:</td>
          <td><?php echo extension_loaded('zlib') ? 'Aan' : 'Uit'; ?></td>
          <td>Aan</td>
          <td align="center"><?php echo extension_loaded('zlib') ? '<img src="view/image/good.png" alt="OK" />' : '<img src="view/image/bad.png" alt="Niet goed" />'; ?></td>
        </tr>
      </table>
    </fieldset>
    <p>3. Zorg dat de volgende bestanden beschrijfbaar zijn:</p>
    <fieldset>
      <table>
        <tr>
          <th align="left"><b>Bestand</b></th>
          <th align="left"><b>Status</b></th>
        </tr>
        <tr>
          <td><?php echo $config_catalog; ?></td>
          <td><?php if (!file_exists($config_catalog)) { ?>
            <span class="bad">Ontbreekt</span>
            <?php } elseif (!is_writable($config_catalog)) { ?>
            <span class="bad">Niet beschrijfbaar</span>
          <?php } else { ?>
          <span class="good">Beschrijfbaar</span>
          <?php } ?>
            </td>
        </tr>
        <tr>
          <td><?php echo $config_admin; ?></td>
          <td><?php if (!file_exists($config_admin)) { ?>
            <span class="bad">Ontbreekt</span>
            <?php } elseif (!is_writable($config_admin)) { ?>
            <span class="bad">Niet beschrijfbaar</span>
          <?php } else { ?>
          <span class="good">Beschrijfbaar</span>
          <?php } ?>
             </td>
        </tr>
      </table>
    </fieldset>
    <p>4. Zorg dat de volgende directories beschrijfbaar zijn:</p>
    <fieldset>
      <table>
        <tr>
          <th align="left"><b>Directory</b></th>
          <th align="left"><b>Status</b></th>
        </tr>
        <tr>
          <td><?php echo $cache . '/'; ?></td>
          <td><?php echo is_writable($cache) ? '<span class="good">Beschrijfbaar</span>' : '<span class="bad">Niet beschrijfbaar</span>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $logs . '/'; ?></td>
          <td><?php echo is_writable($logs) ? '<span class="good">Beschrijfbaar</span>' : '<span class="bad">Niet beschrijfbaar</span>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $image . '/'; ?></td>
          <td><?php echo is_writable($image) ? '<span class="good">Beschrijfbaar</span>' : '<span class="bad">Niet beschrijfbaar</span>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $image_cache . '/'; ?></td>
          <td><?php echo is_writable($image_cache) ? '<span class="good">Beschrijfbaar</span>' : '<span class="bad">Niet beschrijfbaar</span>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $image_data . '/'; ?></td>
          <td><?php echo is_writable($image_data) ? '<span class="good">Beschrijfbaar</span>' : '<span class="bad">Niet beschrijfbaar</span>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $download . '/'; ?></td>
          <td><?php echo is_writable($download) ? '<span class="good">Beschrijfbaar</span>' : '<span class="bad">Niet beschrijfbaar</span>'; ?></td>
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
