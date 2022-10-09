<?php
require_once 'src/SimpleXLSX.php';
use Shuchkin\SimpleXLSX;
function str_replace_first($search, $replace, $subject)
{
    $search = '/'.preg_quote($search, '/').'/';
    return preg_replace($search, $replace, $subject, 1);
}

if ( $xlsx = SimpleXLSX::parse('handicapvip.xlsx') ) {
  foreach( $xlsx->rows() as $k => $r ) {
?>
  <div>
    <span style="font-weight: bold;"><?=$r[0]?></span><br>
    ⚽️ <?=$k?> <?=str_replace_first("\n", " VS", $r[1])?><br>
    Code : <?=$r[2]?><br>
    Score: ❓<br>
  </div>
<?php
	}
} else {
  echo SimpleXLSX::parseError();
}