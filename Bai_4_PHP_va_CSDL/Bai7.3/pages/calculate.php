<?php
$result = 1;
$areaCircle = 10 * pi();
$volumeSphere = (4 * pi() * (10 ** 3)) / 3;
for ($i = 1; $i <= 10; $i++) {
    $result = $result * $i;
}
?>

<p>Giai thừa của 10 = <?php echo $result ?>
</p>
<p>Diện tích hình tròn bán kính 10 = <?php echo $areaCircle ?>
</p>
<p>Thể tích hình khối cầu bán kính 10 = <?php echo $volumeSphere ?>
</p>
<p class="text-hello">Hello</p>