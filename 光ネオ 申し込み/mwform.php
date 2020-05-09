<?php

/*基底クラス*/ 
class InputType {
  protected $type ='';
  protected $name ='';
  protected $value = ''; //値が無い場合に備える 
  protected $class = '';
  protected $id = '';
  protected $required = '';
  protected $disabled = '';
  protected $label = '';

  //値をセットするだけのメソッド
 function set_attr($attr) {
    foreach ($attr as $key => $value) {
    //keyには"type"が、$valueには"radio"が入っている
      $this->$key = $value; //クラス変数に代入
    }
  }

  /*
    ラベルが後ろにつくタイプ
    クラス変数に代入した値をタグの属性値に入れて返す
  */
  function out_attr(){
    return "<label><input 
          type='$this->type' 
          name='$this->name' 
          value='$this->value' 
          required='$this->required'>
          $this->label</label>";
  }

} //class InputType end

//ラジオボタン専用の子クラス
class InputTypeRadio extends InputType {
  protected $value = []; //一応初期化
  protected $label = [];

  function out_attr() {
    $html = ''; //タグを連結して溜め込む変数も初期化
    foreach ($this->value as $key => $val) {
      $html .= "<label><input
      type='$this->type'
      name='$this->name'
      value='$val'
      required='$this->required'>
      {$this->label[$key]}</label>";
      //{}は中の記号[]を文字列として扱わせないため
    }
    return $html;
  }
}

/*
  ラベルが前につくタイプ の子クラス
*/
class InputTypeText extends InputType {
  function out_attr() {
    return "<label>$this->label
            <input
            type='$this->type' 
            name='$this->name' 
            required='$this->required'>
            </label>";
  }
}

