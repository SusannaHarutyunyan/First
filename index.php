<?php
//first
$n = rand(5, 20);
for ($i = 0; $i < $n; $i++) {
    $arr[] = rand(0, 10);
}
echo '<pre>';
print_r($arr);
echo '</pre>';
$arr = array_unique($arr, SORT_REGULAR);
rsort($arr);
$arr = array_values($arr);
?>
<table border=1>
    <? foreach ($arr as $key => $value): ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $value ?></td>
        </tr>
    <? endforeach; ?>
</table>

