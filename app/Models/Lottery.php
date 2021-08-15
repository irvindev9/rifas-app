<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prize;
use App\Models\TicketBuyed;

class Lottery extends Model
{
    use HasFactory;

    public function prizes()
    {
        return $this->hasMany(Prize::class);
    }

    public function ticketsBuyed()
    {
        return $this->hasMany(TicketBuyed::class);
    }
}
