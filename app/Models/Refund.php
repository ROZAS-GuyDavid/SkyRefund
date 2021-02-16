<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'flight_from',
        'flight_to',
        'direct_flight',
        'reason_1',
        'reason_2',
        'has_reason',
        'reason_4',
        'comment',
        'email',
        'flight_date',
        'Airlines',
        'flight_num',
        'booking_num',
        'first_name',
        'last_name',
        'birthdate',
        'comfirm_email',
        'adress',
        'city',
        'country',
        'phone',
        'status',
    ];

    public static function getPossibleEnumValues($name){
        $instance = new static; // create an instance of the model to be able to get the table name
        $type = DB::select( DB::raw('SHOW COLUMNS FROM '.$instance->getTable().' WHERE Field = "'.$name.'"') )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach(explode(',', $matches[1]) as $value){
            $v = trim( $value, "'" );
            $enum[] = $v;
        }
        return $enum;
    }

    public function user(){
        return $this->belongsTo('App\models\User');
    }
}
