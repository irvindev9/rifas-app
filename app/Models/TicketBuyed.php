<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OtherTicketBuyed;


class TicketBuyed extends Model
{
    use HasFactory;

    public function otherTicketsBuyed()
    {
        return $this->hasMany(OtherTicketBuyed::class);
    }
}
