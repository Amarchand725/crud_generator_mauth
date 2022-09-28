<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'image' => 'required','name' => 'required','price' => 'required','description' => 'required','date' => 'required'
		];
		return $rules;
    }
}
