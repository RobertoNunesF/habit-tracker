<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitRequest;
use App\Models\Habit;
use App\Models\HabitLog;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HabitController extends Controller
{

    use AuthorizesRequests;

    public function index(): View
    {

        $habits = Auth::user()->habits()
            ->with('habitLogs')
            ->get();

        return view('dashboard', compact('habits'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('habits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HabitRequest $request)
    {
        $validated = $request->validated();

        

        Auth::user()->habits->create($validated);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito criado com sucesso!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit): View
    {
        $this->authorize('edit', $habit);

        return view('habits.edit', compact('habit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HabitRequest $request, Habit $habit)
    {
        $this->authorize('update', $habit);

        $habit->update($request->all());

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        $this->authorize('delete', $habit);

        $habit->delete();

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito removido com sucesso');
    }

    public function settings() 
    {
        
        $habits = Auth::user()->habits;

        return (view('habits.settings', compact('habits')));
    }

    public function toggle(Habit $habit)
    {
        $this->authorize('toggle', $habit);

        $today = Carbon::today()->toDateString();

        $log = HabitLog::query()
            ->where('habit_id', $habit->id)
            ->where('completed_at', $today)
            ->first();

        if($log) {
            $log->delete();
            $message = 'Hábito desmarcado para hoje';
        } else {
            HabitLog::create([
                'user_id' => Auth::user()->id,
                'habit_id' => $habit->id,
                'completed_at' => $today,
            ]);
            $message = 'Hábito concluido. Parabéns! 👏';
        }

        return redirect()
            ->route('habits.index')
            ->with('success', $message);
    }

    public function history(Request $request)
    {
        $selectedYear = Carbon::now()->year;
        $weeks = Habit::generateYearGrid($selectedYear);

        $startDate = Carbon::create($selectedYear, month: 1, day: 1);
        $endDate = Carbon::create($selectedYear, month: 12, day: 31, hour: 23, minute:59, second: 59);

        $habits = Auth::user()->habits()
            ->with(['habitLogs' => function($query) use ($startDate, $endDate){
                $query->whereBetween('completed_at', [$startDate, $endDate]);
            }])
            ->get();


        return view('habits.history', compact('habits', 'selectedYear', 'weeks'));
    }
}
