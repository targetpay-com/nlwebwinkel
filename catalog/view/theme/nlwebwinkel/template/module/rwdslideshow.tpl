<div class="rwdslideshow">
  <div id="rwdslideshow<?php echo $module; ?>" class="nivoSlider" style="width: <?php echo $width; ?>%; height: <?php echo $height; ?>px; background-size: 100% auto">
    <?php foreach ($banners as $banner) { ?>
    <?php if ($banner['link']) { ?>
    <a href="<?php echo $banner['link']; ?>"><img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" /></a>
    <?php } else { ?>
    <img src="<?php echo $banner['image']; ?>" alt="<?php echo $banner['title']; ?>" />
    <?php } ?>
    <?php } ?>
  </div>
</div>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('#rwdslideshow<?php echo $module; ?>').nivoSlider();
});
--></script>
