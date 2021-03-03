<?php
$low = range('a', 'z');
$up = range('A', 'Z');
$letters = array_merge($low, $up);
$numbers = range(0, 9);
function createString($size, $meth, $letters1, $numbers1)
{
    $str = '';
    switch ($meth) {
        case 'let':
            for ($i = 0; $i < $size; $i++) {
                $str .= $letters1[array_rand($letters1)];
            }

            break;
        case 'num':
            for ($i = 0; $i < $size; $i++) {
                $str .= $numbers1[array_rand($numbers1)];
            }
            break;
        case 'nl':
            $check = [
                $numbers1[array_rand($numbers1)],
                $letters1[array_rand($letters1)],
            ];
            shuffle($check);
            if ($size > 0) {
                $str .= $check[0];
            }
            if ($size > 1) {
                $str .= $check[1];
            }
            for ($i = 0; $i < $size - 2; $i++) {
                $str .= is_int(rand(0, 100) / 2) ? $numbers1[array_rand($numbers1)] : $letters1[array_rand($letters1)];
            }
            break;
        default:
            $str = "Method wasn't checked correctly";
            break;
    }
    return $str;
}
?>
    <form action="index1.php">
        <input type="text" name="size">
        <p>Տողի մեջ ներառել</p> <br>
        <select name='meth' required>
            <option value="num" <?php if (!empty($_GET)) if ($_GET['meth'] == 'num') echo 'selected'; ?> >Թվեր</option>
            <option value="let" <?php if (!empty($_GET)) if ($_GET['meth'] == 'let') echo 'selected'; ?> >Տառեր</option>
            <option value="nl" <?php if (!empty($_GET)) if ($_GET['meth'] == 'nl') echo 'selected'; ?> >Թվեր և տառեր
            </option>
        </select>
        <br><br>
        <button name="send" value="on"> Գեներացնել </button>
    </form>
<?php
if (!empty($_GET) && isset($_GET['size']) && isset($_GET['meth'])) {
    $str = createString($_GET['size'], $_GET['meth'], $letters, $numbers);
    echo $str . '<br>';
    if ($_GET['meth'] == 'nl') {
        $n = "";
        $l = "";
        $nl = str_split($str);
        foreach ($nl as $value) {
            if (is_numeric($value)) {
                $n .= $value;
            } else {
                $l .= $value;
            }
        }
        echo 'Letters in the string are - ' . $l, '<br>';
        echo 'Numbers in the string are - ' . $n;
    } elseif ($_GET['meth'] == 'num') {
        echo 'Numbers in the string are - ' . $str;
    } else {
        echo 'Letters in the string are - ' . $str;
    }
}



