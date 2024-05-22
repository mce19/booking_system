<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IntervalExclusion  extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getIntervalHoursForDate(Carbon $date)
    {
        $hours = array_filter([
            $this->{strtolower($date->format('l')) . '_starts_at'},
            $this->{strtolower($date->format('l')) . '_ends_at'},
        ]);

        return empty($hours) ? null : $hours;
    }

}
