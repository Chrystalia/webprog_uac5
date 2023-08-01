
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <div class="flex items-center">
          <span class="self-center text-2xl font-bold text-indigo-900 whitespace-nowrap text-indigo-900 dark:text-white">CONNECT FRIEND</span>
      </div>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="/dashboard" class="block py-2 pl-3 pr-4 {{ $page == 'home' ? ' text-indigo-700 ' :' text-gray-900 ' }}" aria-current="page">Home</a>
          </li>
          <li>
            <a href="/match" class="block py-2 pl-3 pr-4 {{ $page == 'match' ? ' text-indigo-700 ' :' text-gray-900 ' }}">Your Match</a>
          </li>
          <li>
            <a href="/liked" class="block py-2 pl-3 pr-4 {{ $page == 'liked' ? ' text-indigo-700 ' :' text-gray-900 ' }}">Likes You</a>
          </li>
          <li>
            <a href="/profile" class="block py-2 pl-3 pr-4 {{ $page == 'profile' ? ' text-indigo-700 ' :' text-gray-900 ' }}">Profile</a>
          </li>
          <li>
            <a href="/logout" class="block py-2 pl-3 pr-4 {{ $page == 'out' ? ' text-indigo-700 ' :' text-gray-900 ' }}">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
