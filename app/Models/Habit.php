<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Habit extends Model
{

    use HasFactory;


    protected $fillable = ['user_id', 'name'];


    //Um hábito pertence a um usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Um hábito pode ter muitos registros de hábitos
    public function habitLogs(): HasMany
    {
        return $this->hasMany(HabitLog::class);
    }

    public function wasCompletedToday(): bool
    {
        return $this->habitLogs
            ->where('completed_at', Carbon::today()->toDateString())
            ->isNotEmpty();
    }

    public function wasCompletedOn($date): bool
    {
        return $this->HabitLogs
            ->where('completed_at', $date->toDateString())
            ->isNotEmpty();
    }

    public static function generateYearGrid(int $year): array
    {
        $startDate = \Carbon\Carbon::create($year, month: 1, day: 1);
        $endDate = \Carbon\Carbon::create($year, month: 12, day: 31, hour:23, minute: 59, second: 59);

        $weeks = [];
        $currentWeek = [];

        $firstDayOfWeek = $startDate->dayOfWeek;
        for ($i = 0; $i < $firstDayOfWeek; $i++) {
        $currentWeek[] = null;
        }

        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
        $currentWeek[] = $date->copy();

            if ($date->isSaturday() || $date->eq($endDate)) {
                $weeks[] = $currentWeek;
                $currentWeek = [];
            }
        }

        return $weeks;
    }

}
