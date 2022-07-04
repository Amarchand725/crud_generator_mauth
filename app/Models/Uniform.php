<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uniform extends Model
{
    use SoftDeletes;

    protected $table = 'uniforms';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'title' => 'required'
		];
		return $rules;
    }
}
