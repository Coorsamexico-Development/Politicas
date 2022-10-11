<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Politic extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'politics';

    protected $fillable = ['namepolitica','description','type_politic','id_statu','autor','imagePolitic','pdf'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function statusPolitica()
    {
        return $this->hasOne('App\Models\StatusPolitica', 'id', 'id_statu');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipopolitica()
    {
        return $this->hasOne('App\Models\Tipopolitica', 'id', 'type_politic');
    }
    
}
