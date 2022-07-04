<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use SoftDeletes;

    protected $table = 'technologies';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'name' => 'required'
		];
		return $rules;
    }
}
