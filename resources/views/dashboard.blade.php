@extends('layout.master_content')

@section('title', 'Dashboard')

@section('content')
<div class=" flex w-screen p-5 justify-center">
    <div class="flex flex-col bg-white px-10 py-5 rounded-lg">
        <h1 class="text-md">
            Your Wallet (IDR): {{  number_format(auth()->user()->money, 0, '' , '.') }}
        </h1>
        <button data-modal-target="staticModal" data-modal-toggle="staticModal"
            class="button bg-indigo-700 rounded-lg py-2 text-white mt-2">
            Top Up
        </button>
    </div>

    <!-- Main modal -->
    <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <form action="/top-up" method="post">
            @csrf
            @method('put')
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-3">
                    <!-- Modal header -->
                    <div
                        class="flex items-start justify-between p-2 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Input money quantity
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="staticModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-2 mt-3 space-y-6">
                        <div class="flex border-2 h-10 w-full relative bg-transparent">
                            <input type="number" id="Qty" value="0"
                                class="Qty w-full text-md " name="money">
                            <div id="addButton" onclick="addAmount()"
                                class="flex bg-indigo-700 text-white h-full w-20 cursor-pointer">
                                <span class="m-auto font-thin">+</span>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex p-2 border-gray-200">
                        <button type="submit" class="rounded-lg py-2 px-8 text-white bg-indigo-700">
                            Top Up
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@foreach ($users as $user)
    <div class="flex justify-center my-2 ">
        <div class="flex bg-white w-[50%] p-2 rounded-lg">
            <div class="md:flex-shrink-0">
              <img class="rounded-lg md:w-56" src="{{ '/storage/' . $user->photo }}" alt="Profile image">
            </div>
            <div class="flex flex-col h-[100%] justify-center mt-4 md:mt-0 md:ml-6">
              <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">{{ $user->linkedin_username . ' ' . ($user->gender == 'Male' ? '♂' : '♀️')}}</div>
              <a href="#" class="block mt-1 text-lg leading-tight font-semibold text-gray-900 hover:underline">{{ $user->location }}</a>
              <p class="mt-2 text-gray-600">{{ 'Interest: ' . $user->field_of_work_interests}}</p>
            </div>

            <div class="flex items-center mt-5 space-x-4">
                <div class="col-4 offset-4">
                    <form action="{{ '/dislike/'. $user->id }}" method="post">
                        @csrf
                        <button class="btn text-3xl mx-2" type="submit">👎</button>
                    </form>
                </div>
                <div class="col-4">
                    <form action="{{ '/like/'. $user->id }}" method="post">
                        @csrf
                        <button class="btn text-3xl mx-2" type="submit">👍</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
