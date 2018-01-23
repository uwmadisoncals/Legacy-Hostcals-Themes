<?php if(defined("INSPECTLET_KEY") && defined("INSPECTLET_DOMAIN")) { ?>
<script id="inspectletjs">window.__insp = window.__insp || []; __insp.push(['wid', <?php echo INSPECTLET_KEY ?>]); __insp.push(['cookieLocation', '<?php echo INSPECTLET_DOMAIN ?>']);
	(function() { function __ldinsp(){var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); } if (window.attachEvent){ window.attachEvent('onload', __ldinsp);}else{window.addEventListener('load', __ldinsp, false);}})();
</script>
<?php  } ?>