@extends('web.auth.main')

@section('title', 'Авторизация')

@section('content')
<section class="flex flex-col md:flex-row h-screen items-center">

    <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
      <img src="https://source.unsplash.com/random" alt="" class="w-full h-full object-cover opacity-70">
    </div>
  
    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
          flex items-center justify-center">
  
      <div class="w-full h-100">
  
  
        <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12">Войти в аккаунт</h1>
  
        <form class="mt-6" action="{{route('postLogin')}}" method="POST">
          @csrf
          <div>
            <label class="block text-gray-700">Эл.адрес</label>
            <input type="email" name="email" id="" placeholder="Эл.адрес" class="w-full px-3 py-2 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus autocomplete required>
          </div>
  
          <div class="mt-4">
            <label class="block text-gray-700">Пароль</label>
            <input type="password" name="password" id="" placeholder="Пароль" minlength="6" class="w-full px-3 py-2 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500
                  focus:bg-white focus:outline-none" required>
          </div>
  
          <div class="text-right mt-2">
            <a href="#" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Забыли пароль?</a>
          </div>
  
          <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg
                px-3 py-2 mt-6">Войти</button>
        </form>
  
        <hr class="my-6 border-gray-300 w-full">
  
        <p class="mt-8">У вас нет аккаунта? <a href="{{route('register')}}" class="text-blue-500 hover:text-blue-700 font-semibold">Создать аккаунт</a></p>
  
  
      </div>
    </div>
  
</section>
@endsection