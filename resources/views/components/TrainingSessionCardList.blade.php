<div class="space-y-4">
    @forelse ($trainingSessions as $session)
        <x-training-session-card :session="$session" />
    @empty
        <div class="text-gray-400 text-sm">
            No training sessions yet.
        </div>
    @endforelse
</div>
