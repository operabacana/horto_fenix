<footer>

</footer>

<?php 

	$jsFiles = $this -> lang -> line('js_file');
	$jsMain = base_url($jsFiles['main']) ;

?>
<script language="javascript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" ></script>
<script language="javascript" type="text/javascript" src="https://raw.github.com/LeaVerou/prefixfree/gh-pages/plugins/prefixfree.dynamic-dom.min.js" ></script>
<script language="javascript" type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js" ></script>
<script language="javascript" type="text/javascript" src="<?php echo $jsMain; ?>" ></script>

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>