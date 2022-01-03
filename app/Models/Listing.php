<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function list()
    {
        return $this->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
