<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model as BaseModel;
class Model extends BaseModel
{
    protected $guarded = ['file'];  //不可以注入的数据字段
}