<x-app-layout>
    <div class="max-w-3xl mx-auto space-y-6">

        {{-- Create Post --}}
        <x-create-post-card />

        {{-- Feed --}}
        <div class="mt-6 space-y-4">
            @foreach($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>

    </div>
</x-app-layout>
