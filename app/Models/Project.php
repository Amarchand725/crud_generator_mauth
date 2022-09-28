<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';
    protected $guarded = [];

    static function getValidationRules(){
    	$rules = [
		    'name' => 'required','description' => 'required','date' => 'required','image' => 'required'
		];
		return $rules;
    }
}
