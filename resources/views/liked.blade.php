@extends('layout.master_content')

@section('title', 'Liked')
@section('content')
    @foreach ($likesMe as $likeMe)
    <div class="flex justify-center my-2 ">
        <div class="flex bg-white w-[50%] p-2 rounded-lg">
            <div class="md:flex-shrink-0">
              <img class="rounded-lg md:w-56" src="{{ '/storage/' . $likeMe->photo }}" alt="Profile image">
            </div>
            <div class="flex flex-col h-[100%] justify-center mt-4 md:mt-0 md:ml-6">
              <div class="uppercase tracking-wide text-sm text-indigo-600 font-bold">{{ $likeMe->linkedin_username . ' ' . ($likeMe->gender == 'Male' ? '♂' : '♀️') }}</div>
              <p class="mt-2 text-gray-600">{{ 'Interest: ' . $likeMe->field_of_work_interests}}</p>
            </div>
        </div>
    </div>
    @endforeach
@endsection
