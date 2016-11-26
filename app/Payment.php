<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model{
	protected $table = 'tblPayment';
	protected $primaryKey = 'strTransactionId';
	public $timestamps = false;
}