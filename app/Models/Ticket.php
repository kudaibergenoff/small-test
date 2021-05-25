<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function managers()
    {
        return $this->belongsToMany(User::class, 'managers_tickets');
    }

    public function clients()
    {
        return $this->belongsToMany(User::class, 'clients_tickets');
    }
}
