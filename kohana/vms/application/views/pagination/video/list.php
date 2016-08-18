<?php
/*++++++++++++++++++++++++++++++++++++++++++++++++
 |	这是个特殊的模版，不具有一般参考性
 *++++++++++++++++++++++++++++++++++++++++++++++++*/

$reminder = ceil($pagination->current / $pageUnit);
$start = ($reminder - 1) * $pageUnit + 1;

$last = $start + $pageUnit - 1;
$last = $last > $pagination->max ? $pagination->max : $last;
?>
<ul class="pagination">
	<li><span>共<?php echo $pagination->total;?></span></li>
	
<?php
	if($pagination->current == 1) {
		echo '<li><span><i class="glyphicon glyphicon-step-backward"></i></span></li>';
		echo '<li><span><i class="glyphicon glyphicon-backward"></i>&nbsp;</span></li>';
	} else {
		echo '<li><a href="'.$pagination->URL($pagination->first).'"><i class="glyphicon glyphicon-step-backward"></i>&nbsp;</a></li>';
		echo '<li><a href="'.$pagination->URL($pagination->previous).'"><i class="glyphicon glyphicon-backward"></i>&nbsp;</a></li>';
	}
	$index = 0;
	for($current = $start; $current <= $last; $current++) {
		$index++;
		if($current == $pagination->current) {
			echo '<li class="active"><a>'. $current .'</a></li>';
		} else {
			echo "<li><a href=\"{$pagination->URL($current)}\">{$current}</a></li>";
		}
	}
	
	if($pagination->current == $pagination->max) {
		echo '<li><span><i class="glyphicon glyphicon-forward"></i>&nbsp;</span></li>';
	} else {
		echo "<li><a href=\"{$pagination->URL($pagination->next)}\"><i class=\"glyphicon glyphicon-forward\"></i>&nbsp;</a></li>";
	}
?>
</ul>
