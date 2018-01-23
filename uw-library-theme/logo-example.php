<html>
<head>
	<style>

		/* 	
				Svg auto stretches to fit the container it's in. If not in a container
				you must specify both width *and* height values. It won't scale automatically
				although, these dimensions are only for the bounding box, the actual drawn contents
				will always maintain the proper aspect ratio.
	 	*/

		#logo_uw {
			width: 355px;
			height: 89px;
		}

		/* remove the "university of wisconsin madison" text, and bump libraries text down to properly line up */
		@media screen and (max-width: 600px) {

			/* bump libraries down to line up with shield */
			#logo_name {
				filter: url(#logo_shift);
			}

			/* hide school name */
			#logo_tag {
				display: none;
			}

			/* make it smaller */
			#logo_uw {
				width: 200px;
				height: 50px;
			}
		}
	</style>
</head>
<body>
<?php 
    $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/img/logo-min.svg";
    include($path); 
?>
</body>
</html>