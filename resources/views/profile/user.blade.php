<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil de ' . $user->username)}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-neutral-600 dark:active:bg-gray-300 leading-tight ">
                        Nombre total de tweets: {{ $tweets->total() }}
                    </h2>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <a class="btn btn-primary" href="{{ route('tweets.index') }}">Retour</a>
                    <ul>
                        @foreach($tweets as $tweet)
                            <li>
                                <h3>{{ $tweet->user->username }} ({{$tweet->user->name}})}</h3>
                                <br>
                                <p>{{ $tweet->content }}</p>
                                <br>
                                {{ $tweet->created_at->diffForHumans() }}
                                @if($tweet->user_id == auth()->id())
                                    <form action="{{ route('tweets.destroy', $tweet) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    {{ $tweets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
