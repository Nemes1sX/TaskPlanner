<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_time', 'end_time', 'status'];

    protected $dates = ['start_time', 'end_time'];

    public function timeSpent()
    {
        return $this->end_time ?
        Carbon::createFromTimestamp(strtotime($this->start_time))->diff($this->end_time)->i
        : Carbon::createFromTimestamp(strtotime($this->start_time))->diff(Carbon::now())->i;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
