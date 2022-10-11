<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopolitica extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'tipopoliticas';

    protected $fillable = ['name','status'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function politics()
    {
        return $this->hasMany('App\Models\Politic', 'type_politic', 'id');
    }
    
}
