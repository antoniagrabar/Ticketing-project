<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['id', 'user_id', 'name', 'address', 'email_address', 'phone_number'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
