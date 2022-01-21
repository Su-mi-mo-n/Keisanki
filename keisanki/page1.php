<?php
session_start();
//入力された数式をセッションに入れる
if($_SESSION["re"] == 0)
{
    $_SESSION["shiki"] = $_POST["shiki"];
}
else
{
    print '答え'.$_SESSION["ans"].'<br>';
}

//入力された数式を表示する
print 'あなたが構築した数式は:'.$_SESSION["shiki"];

//入力された数式を分割して配列にしやすいように-を+にする処理
$shiki0 = str_replace("-", "+", $_SESSION["shiki"]);

//もし+があると、+で分割して配列に入れ、ないと分割せずに配列に入れる
if(strpos($shiki0,'+') !== false)
{
    $shiki0_arrey = explode('+', $shiki0);
}
else
{
    $shiki0_arrey = [];
    $shiki0_arrey[] = $_SESSION["shiki"];
}

//セッションに上記の配列を格納
$_SESSION["shiki0_arrey"] = $shiki0_arrey;

//セッションから入力された数式を取り出す
$shiki = $_SESSION["shiki"];

//$shikiから*/+-を削除
if(strpos($shiki,'*') !== false)
{
    $shiki = str_replace('*', '', $shiki);
}
if(strpos($shiki,'/') !== false)
{
    $shiki = str_replace('/', '', $shiki);
}
if(strpos($shiki,'+') !== false)
{
    $shiki = str_replace('+', '', $shiki);
}
if(strpos($shiki,'-') !== false)
{
    $shiki = str_replace('-', '', $shiki);
}

//上記で変数だけになったものを配列に入れる
$shiki = str_split($shiki);
?>
<form action="page2.php" method="post"> 
<?php
//配列に入っている変数を出力
foreach($shiki as $Shiki)
{
    print $Shiki;
    ?>
     = <input type="text" name='shiki2[]'><br>
    <?php
}
?>
<input type="submit" value="計算"><br>

<input type="button" onclick="location.href='page0.php'" value="数式の再構築">