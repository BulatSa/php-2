<?
	$result = 0;
	if (isset($_SESSION['test'])) {
		// read ini-file with answers to array
		$answers = parse_ini_file('answers.ini');
		// parse and check right answers
		foreach ($_SESSION['test'] as $value) {
			if (array_key_exists($value, $answers)) 
				$result +=(int)$answers[$value];
		}
		session_destroy();
	}
?>
<table width="100%">
	<tr>
		<td align="left">
			<p>Ваш результат: <?= $result?> из 30</p>
		</td>
	</tr>
</table>