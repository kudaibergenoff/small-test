<nav x-data="{ open: true }" class="bg-indigo-400">
    <div class="max-w-7xl mx-auto pl-2">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 text-white py-1">
            <a href="{{env('APP_URL')}}" class="text-white">
                <h1>Лого</h1>
            </a>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex">
              <a href="{{route('tickets')}}" class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white @if(Route::is('tickets')) bg-indigo-300 @endif hover:text-white hover:bg-indigo-300 focus:outline-none focus:text-white focus:bg-indigo-700 transition duration-150 ease-in-out">Заявки</a>
              @role('admin')
              <a href="{{route('users')}}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-white @if(Route::is('users')) bg-indigo-300 @endif hover:text-white hover:bg-indigo-300 focus:outline-none focus:text-white focus:bg-indigo-200 transition duration-150 ease-in-out">Пользователи</a>
              <a href="{{route('roles')}}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-white @if(Route::is('roles')) bg-indigo-300 @endif hover:text-white hover:bg-indigo-300 focus:outline-none focus:text-white focus:bg-indigo-200 transition duration-150 ease-in-out">Роли</a>
              @endrole
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
            <div>
              <button @click="open = !open" class="flex text-sm text-white border-1 border-transparent focus:outline-none focus:border-white px-3 py-2 focus:bg-indigo-300 rounded-md transition duration-150 ease-in-out">
                {{ auth()->user()->name ?? '' }}
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
              <div class="py-1 rounded-md bg-white shadow-xs">
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: block;">
                  @csrf --}}
                  <a href="{{route('logout')}}"  role="button" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Выйти</a>
                {{-- </form> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
      <div class="px-2 pt-2 pb-3">
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Dashboard</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Team</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Projects</a>
        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Calendar</a>
      </div>
    </div>
</nav>