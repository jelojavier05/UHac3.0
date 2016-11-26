<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ViolationHeader extends Model{
	protected $table = 'tblViolationHeader';
	protected $primaryKey = 'intVHId';
	public $timestamps = false;
}