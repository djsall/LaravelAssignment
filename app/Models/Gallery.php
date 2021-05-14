<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
	use HasFactory;

	protected $table = 'gallery';
	protected $fillable = [
		'title',
		'image',
		'userid',
	];

	public function owner() {
		return $this->hasOne('App\Models\User', 'id', 'userid');
	}
}
