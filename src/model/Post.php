<?php
namespace App\Model;
class Post extends \Illuminate\Database\Eloquent\Model
{
	protected $guarded = ['id','created_at','updated_at'];
}