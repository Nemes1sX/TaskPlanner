<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_time', 'end_time', 'session_start_time', 'status', 'spent_time'];

    protected $dates = ['start_time', 'session_start_time', 'end_time'];

    public function timeSpent()
    {
        return $this->end_time ?
        Carbon::createFromTimestamp(strtotime($this->session_start_time))->diff($this->end_time)->i + $this->spent_time
        : Carbon::createFromTimestamp(strtotime($this->session_start_time))->diff(Carbon::now())->i + $this->spent_time;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
