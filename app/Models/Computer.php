<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Computer extends Model
{
    use SoftDeletes;

    protected $table = 'computers';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'image' => 'required','name' => 'required','description' => 'required'
		];
		return $rules;
    }
}
