<?php
namespace app\index\model;
use think\Model;
class Sc extends Model
{
    

    

	public function Course(){
		return $this->belongsTo('course','cno');


}


}