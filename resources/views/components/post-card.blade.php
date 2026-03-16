@props(['post'])

<div class="card bg-gray-900 border border-gray-800 shadow-xl rounded-2xl poppins-regular">
    <div class="card-body p-5 space-y-3">

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-300">
                <span class="font-semibold text-white montserrat">{{ $post->user->name ?? 'Anonymous' }}</span>
                <span class="text-gray-500">• {{ $post->created_at->diffForHumans() }}</span>
            </div>

            @auth
            @if(auth()->id() === $post->user_id)
                <div x-data="{ open: false }" class="relative">

                    <button
                        type="button"
                        @click="open = !open"
                        class="p-2 rounded-lg hover:bg-gray-800"
                    >
                        <x-solar-menu-dots-bold class="h-5 w-5 text-gray-400"/>
                    </button>

                    <div
                        x-show="open"
                        x-transition
                        @click.outside="open = false"
                        class="absolute right-0 mt-2 w-35 bg-gray-900 border border-gray-800 rounded-xl shadow-xl overflow-hidden z-50"
                    >
                        {{-- Edit --}}
                        <a href="{{ route('posts.edit', $post) }}"
                        @click="open = false"
                        class="px-4 py-2 hover:bg-gray-800 text-gray-200 flex items-center gap-4">
                            <x-solar-gallery-edit-line-duotone class="h-4 w-4 text-gray-400"/>
                            Edit
                        </a>

                        {{-- Delete --}}
                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                @click="open = false"
                                class="w-full text-left px-4 py-2 hover:bg-gray-800 text-red-400 flex items-center gap-4"
                                onclick="return confirm('Delete this post?')"
                            >
                            <x-solar-trash-bin-minimalistic-2-bold class="h-4 w-4 text-red-700"/>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endif
            @endauth

        </div>

        {{-- Content --}}
        @if($post->content)
            <p class="text-white whitespace-pre-line">
                {{ $post->content }}
            </p>
        @endif

        @php
            $images = collect();
            if ($post->image_path) {
                $images->push($post->image_path);
            }
            if ($post->relationLoaded('images')) {
                $images = $images->merge($post->images->pluck('path'));
            }
        @endphp

        {{-- Images --}}
        @if($images->count() === 1)
            <div class="mt-2">
                <img
                    src="{{ asset('storage/' . $images->first()) }}"
                    alt="Post image"
                    class="rounded-xl w-full object-cover max-h-96 border border-gray-800"
                >
            </div>
        @elseif($images->count() > 1)
            <div class="mt-2 grid grid-cols-2 gap-2">
                @foreach($images as $path)
                    <img
                        src="{{ asset('storage/' . $path) }}"
                        alt="Post image"
                        class="rounded-xl w-full h-40 object-cover border border-gray-800"
                    >
                @endforeach
            </div>
        @endif

        {{-- Actions --}}
        <div class="mt-4 grid grid-cols-3 text-gray-400 text-sm poppins-regular">

            <button class="flex items-center justify-center gap-2 hover:text-white transition text-md">
                <x-solar-like-bold-duotone class="h-7 w-7"/>
                Like
            </button>

            <button class="flex items-center justify-center gap-2 hover:text-white transition text-md">
                <x-solar-chat-line-bold class="h-7 w-7"/>
                Comment
            </button>

            <button class="flex items-center justify-center gap-2 hover:text-white transition text-md">
                <x-solar-share-line-duotone class="h-7 w-7"/>
                Share
            </button>
        </div>
    </div>
</div>
