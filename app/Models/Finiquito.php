<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finiquito extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'finiquitos';

    protected $fillable = ['nombre','apellidop','apellidom','fechaBaja','fecha','ejercido'];
	
}
