<?php
session_start();
//掛け算割り算の関数
function kakezan($shiki , $shiki2)
{
//数式をアルファベット抜きの+?だけの文字列にする
$shiki3 = preg_replace('/[a-zA-Z]/', '', $shiki);

//$shiki3の配列
$arrey3 = str_split($shiki3);

//掛け算と割り算の処理
for($i=0;$i < count($arrey3);$i++)
{
    if($arrey3[$i] == '*')
    {
        $shiki2[0] = $shiki2[0] * $shiki2[1];
            for($j=1;$j < count($shiki2) -1 ;$j++)
            {
                $shiki2[$j] = $shiki2[$j + 1];
            }
    }
    elseif($arrey3[$i] == '/')
    {
        $shiki2[1] = 1/$shiki2[1];
        $shiki2[0] = $shiki2[0] * $shiki2[1];
            for($j=1;$j < count($shiki2) -1 ;$j++)
            {
                $shiki2[$j] = $shiki2[$j + 1];
            }
    }
}
global $ans;
$ans[] = $shiki2[0];
}

//セッションから数式を+ごとに配列にしたものを格納
$shiki0_arrey = $_SESSION["shiki0_arrey"];

//ユーザーが入力し、送られてきた数値を配列に
$shiki2 = $_POST["shiki2"];

//$countを初期化している
$count = 0;

//掛け割り算の答えを入れる配列を用意
$ans = [];

//掛け算と割り算をする関数をループさせる
for($i=0;$i<count($shiki0_arrey);$i++)
{
    //$shikiは$shiki0_arreyの要素です
    $shiki = $shiki0_arrey[$i];

    //$shiki4は関数に入れる前に$shikiから変数を抜いたもの
    $shiki4 = preg_replace('/[a-zA-Z]/', '', $shiki);

    //$shiki5は$shiki2を分割している
    $shiki5 = array_slice($shiki2, $count, strlen($shiki4) + 1);

    //処理の実行
    kakezan ($shiki,$shiki5);

    //カウントを増やしている
    $count = $count + strlen($shiki4) + 1;
}

$shiki6 = $_SESSION["shiki"];
//$shiki6はユーザーが入力した数式から、アルファベットと*/を抜いたもの
$shiki6 = preg_replace('/[a-zA-Z]/', '', $shiki6);

if(strpos($shiki6,'*') !== false)
{
    $shiki6 = str_replace('*', '', $shiki6);
}
if(strpos($shiki6,'/') !== false)
{
    $shiki6 = str_replace('/', '', $shiki6);
}

//$分割して配列に入れる
$shiki6 = str_split($shiki6);

//最後に足し算引き算の処理をする
for($i=0;$i<count($shiki6);$i++)
{
    if($shiki6[$i] == '+')
    {
      $ans[0] = $ans[0] + $ans[1];
      for($j=1;$j < count($ans) -1 ;$j++)
      {
          $ans[$j] = $ans[$j + 1];
      }
    }
    elseif($shiki6[$i] == '-')
    {
      $ans[0] = $ans[0] - $ans[1];
      for($j=1;$j < count($ans) -1 ;$j++)
      {
          $ans[$j] = $ans[$j + 1];
      }
    }
}
//print '答え:'.$ans[0];

$_SESSION["ans"] = $ans[0];

$re = 1;
$_SESSION["re"] = $re;

header('Location:page1.php');

?>