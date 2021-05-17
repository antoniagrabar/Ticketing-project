<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'contact_id', 'type_id', 'name', 'text'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function type(){
        return $this->belongsTo(Ticket::class);
    }
}
