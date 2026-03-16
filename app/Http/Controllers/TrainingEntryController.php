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
            ->take(10)
            ->get();

        return view('tracker', compact('trainingEntries'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'training_date' => 'required|date',
            'activity' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'color' => 'nullable|string|max:255',
        ]);

        $request->user()->trainingEntries()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Training entry saved successfully.',
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
