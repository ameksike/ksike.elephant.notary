<!--/ in example ---------------------------------->
<h3> esto es una plantillas almacenadas en fichero de tipo php </h3>
<div>
	<ul class="nav navbar-nav navbar-left">
	<?php
		foreach($cfg as $k=>$i){
			echo '<li '.$active.'> <a href="'.$k.'"> '.$i.' </a></li>';
		}
	?>
	</ul>
</div>