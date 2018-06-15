<?php
namespace app\index\model;
use think\Model;
class Course extends Model
{
    

    public function teacher(){
		return $this->belongsTo('teacher','tno','tno');

	}






}
