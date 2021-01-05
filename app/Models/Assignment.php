<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function make_incomplete()
    {
        $this->completed = false;
        $this->save();
    }

    public function complete()
    {
        $this->completed = true;
        $this->save();
    }
}
