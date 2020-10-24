<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function term1(){
        return Term::find($this -> term_1_id);
    }

    public function term2(){
        return Term::find($this -> term_2_id);
    }
}
