@extends('layout.master')

@section('title', 'Register')
@section('content')
<section class="dark:bg-gray-900">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-autolg:py-0">
    <div class="flex items-center mb-6 text-3xl font-black text-indigo-900 dark:text-white">
        CONNECT FRIEND
    </div>
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Create an account
              </h1>
              <form class="space-y-4 md:space-y-6" action="/register" method="POST" enctype="multipart/form-data">
                @csrf
                  <div>
                      <label for="linkedin_username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Linked In Username</label>
                      <input type="text" name="linkedin_username" id="linkedin_username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Anderies" required="" value="{{ old('linkedin_username') }}">
                      @error('linkedin_username')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                      @enderror
                  </div>
                  <div>
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender:</label>
                    <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500 mb-0">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>
                  <div>
                    <label>Field of Work Interests:</label><br>
                    <input type="checkbox" id="Programming" name="field_of_work_interests[]" value="Programming">
                    <label for="Programming">Programming</label><br>
                    <input type="checkbox" id="Designing" name="field_of_work_interests[]" value="Designing">
                    <label for="Designing">Designing</label><br>
                    <input type="checkbox" id="Marketing" name="field_of_work_interests[]" value="Marketing">
                    <label for="Marketing">Marketing</label><br>
                    <input type="checkbox" id="Management" name="field_of_work_interests[]" value="Management">
                    <label for="Management">Management</label><br>
                    @error('field_of_work_interests')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                  </div>
                  <div>
                      <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your mobile number</label>
                      <input type="number" name="mobile_number" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="0821xxxxxxxxxxxx" required="" value="{{ old('mobile_number') }}">
                      @error('mobile_number')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                      @enderror
                  </div>
                <div>
                    <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Location</label>
                    <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Jakarta" required="" value="{{ old('location') }}">
                    @error('location')
                      <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                  <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Your photo</label>
                    <input  type="file" name="photo" id="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPEG, PNG, JPG, GIF (MAX. 2MB).</p>
                    @error('photo')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                  @enderror
                </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" required="" value="{{ old('password') }}">
                      @error('password')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                      @enderror
                  </div>
                  <button type="submit" class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Create an account</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <a href="/login" class="font-medium text-indigo-600 hover:underline dark:text-indigo-500">Login here</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
@endsection
