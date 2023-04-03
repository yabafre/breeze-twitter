<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil de ' . $user->username)}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-blue-600 ">
                        Nombre total de tweets: {{ $tweets->total() }}
                    </h2>
                </div>
                <div class="p-6 bg-">
                    <div class="flex flex-col gap-12 justify-center mb-5">
                        <a class="btn btn-primary" href="{{ route('tweets.index') }}">Retour</a>
                    </div>
                    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($tweets as $tweet)
                            <div class="w-full h-64 flex flex-col justify-between bg-blue-400 rounded-lg border border-yellow-400 mb-6 py-5 px-4">
                                <div class="flex flex-col gap-12 justify-center">
                                    <h4 class="text-gray-800 font-bold mb-3"><a href="{{ route('profile.user', $tweet->user->username) }}">{{ $tweet->user->username }} ({{$tweet->user->name}})</a></h4>
                                    <p class="text-gray-800 text-sm">{{ $tweet->content }}</p>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between text-gray-800">
                                        <p class="text-sm">{{ $tweet->created_at->diffForHumans() }}</p>
                                        @if($tweet->user_id == auth()->id())
                                            <form action="{{ route('tweets.destroyProfile', $tweet->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-8 h-8 rounded-full bg-gray-800 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-yellow-400  focus:ring-black" aria-label="edit note" role="button">
                                                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                        <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $tweets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
