@extends('layout.master')

@section('title', 'Login')
@section('content')
<div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-3">
        <h1 class="text-md">
            Price for registration: {{ number_format($registration_price, 0, '' , '.') }}
        </h1>
    </div>

    <form action="/registration-payment" method="post" class="form mt-5">
            @csrf
            <input type="hidden" name="gender" value="{{ $new_user->gender }}">
            @foreach($new_user->field_of_work_interests as $interest)
                <input type="hidden" name="field_of_work_interests[]" value="{{ $interest }}">
            @endforeach
            <input type="hidden" name="linkedin_username" value="{{ $new_user->linkedin_username }}">
            <input type="hidden" name="mobile_number" value="{{ $new_user->mobile_number }}">
            <input type="hidden" name="age" value="{{ $new_user->age }}">
            <input type="hidden" name="location" value="{{ $new_user->location }}">
            <input type="hidden" name="photo" value="{{ $new_user->photo }}">
            <input type="hidden" name="password" value="{{ $new_user->password }}">


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
                            >
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
                            <input type="hidden" value="{{ $registration_price }}" name="registration_price ">
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
@endsection
