<?php

namespace App\Http\Controllers;

use App\Models\TrainingEntry;
use Illuminate\Http\Request;

class TrainingEntryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $trainingEntries = $request->user()
            ->trainingEntries()
            ->latest()
            ->get()
            ->map(function ($entry) {
                return [
                    'id' => $entry->id,
                    'activity' => $entry->activity,
                    'notes' => $entry->notes,
                    'training_date' => $entry->training_date->format('Y-m-d'),
                    'formatted_date' => $entry->training_date->format('M d, Y'),
                    'is_today' => $entry->training_date->isToday(),
                ];
            });

        return view('tracker', compact('trainingEntries'));
    }

    public function fetch(Request $request)
    {
        $trainingEntries = $request->user()
            ->trainingEntries()
            ->latest()
            ->get()
            ->map(function ($entry) {
                return [
                    'id' => $entry->id,
                    'activity' => $entry->activity,
                    'notes' => $entry->notes,
                    'training_date' => $entry->training_date->format('Y-m-d'),
                    'formatted_date' => $entry->training_date->format('M d, Y'),
                    'is_today' => $entry->training_date->isToday(),
                ];
            });

        return response()->json([
            'entries' => $trainingEntries,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'training_date' => 'required|date',
            'activity' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'color' => 'nullable|string|max:255',
        ]);

        //$validated['training_date'] = now()->toDateString();

        //$request->user()->trainingEntries()->create($validated);

        $entry = $request->user()->trainingEntries()->create($validated);
        
        return response()->json([
            'success' => true,
            'entry' => [
                'id' => $entry->id,
                'activity' => $entry->activity,
                'notes' => $entry->notes,
                'training_date' => $entry->training_date->format('Y-m-d'),
                'formatted_date' => $entry->training_date->format('M d, Y'),
            ]
        ]);
    }

    public function update(Request $request, TrainingEntry $training)
    {
        // Ensure the user owns the entry
        if ($training->user_id !== $request->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'training_date' => 'required|date',
            'activity' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $training->update($validated);

        return redirect()->back()->with('success', 'Training entry updated successfully.');
    }
}
