<?php 

class Fit {
  // public $kyori;
  private $kyori;
    //足し算のメソッドしかないが、外部から直接値を代入できてしまうので、$kyoriのアクセス権はprivateにする

  protected $zei = 35000;
    // 直接出し入れできないが、継承した子クラスからは可能
  
  public function soko($km) {
    if($km > 0)
    $this->kyori += $km;
  }

  public function getKyori() {
    return $this->kyori;
  }

  public function kyori() {    //値を受け取れない
    echo "<p>Fit Aの走行距離は",$this->kyori;
  }
}

$fitA = new Fit();
    //$fitAはインスタンス(Fitの複製)
$fitA -> soko(50);
    //インスタンスのメソッドを実行
echo "<p>Fit Aの走行距離は",$fitA->getKyori(),"km";
    //インスタンスのプロパティ(変数)を表示

$fitB = new Fit();
$fitB -> soko(100);
echo "<p>Fit Bの走行距離は",$fitB->getKyori(),"km";

$fitA->soko(60);
echo "<p>Fit Aの走行距離は",$fitA->getKyori(),"km";
    //このメソッドは変数に代入できる

$fitA->kyori(); //メソッド内にechoと書いている方
    //こっちは変数に代入できない

echo "<p>AとBの走行距離の差は ",$fitA->getKyori() - $fitB->getKyori(),"km";

//$fitA -> kyori = 0;
    //publicなアクセス権なので直接代入できる
// echo "<p>Fit Aの走行距離は", $fitA->kyori,"km";


class Lexus extends Fit {
  protected $zei = 80000;  //← 親の値を上書き

  function getZei() {
    return $this->zei;  //← 親にないので追加
  }
}

$lexusA = new Lexus();  //← インスタンス化
$lexusA -> soko(50);  //← 親にあるメソッドは使える

echo "<li>Lexusの走行距離は",$lexusA->getKyori(),"km";
echo "<li>Lexusの重量税は",$lexusA->getZei(),"円";