<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tweets') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col justify-center items-center m-5">
        <div class="  md:w-[50%] lg:w-[38rem]">
                <form action="{{ route('tweets.store') }}" method="POST">
                    @csrf
                    <label for="chat" class="sr-only">Your message..</label>
                    <div class="flex items-center py-2 px-3 bg-white rounded-lg ">
                        <i type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </i>
                        <textarea name="content" id="chat" class="block mx-4 p-2.5 w-[100%] text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                        <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-6 h-6 rotate-90" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path></svg>
                        </button>
                    </div>
                </form>
                @if (session('message'))
                <div class="alert alert-danger">{{ session('$message') }}</div>
                @endif
        </div>
        <!-- component -->
        <div class="mx-auto container py-20 px-6 flex justify-center items-center">
            <div class="w-[100%] grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center gap-6">
                @foreach($tweets as $tweet)
                    <div class=" w-full md:w-[90%] h-64 flex flex-col justify-between bg-blue-400 rounded-lg border border-yellow-400 mb-6 py-5 px-4">
                        <div class="flex flex-col gap-12 justify-center">
                            <h4 class="text-gray-800 font-bold mb-3"><a href="{{ route('profile.user', $tweet->user->username) }}">{{ $tweet->user->username }} ({{$tweet->user->name}})</a></h4>
                            <p class="text-gray-800 text-sm">{{ $tweet->content }}</p>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-gray-800">
                                <p class="text-sm">{{ $tweet->created_at->diffForHumans() }}</p>
                                @if($tweet->user_id == auth()->id())
                                    <form action="{{ route('tweets.destroy', $tweet->id) }}" method="POST">
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
                    {{ $tweets->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
