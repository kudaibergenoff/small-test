@extends('web.main')

@section('title', 'Новый запрос')

@section('content')
    <h1 class="py-6 text-2xl">Новый запрос</h1>
    <form action="{{route('tickets.add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid bg-white rounded-lg shadow-xl w-full">
            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"></label>
                <input class="py-2 px-3 rounded-lg bg-gray-300 border-2 border-indigo-300 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" type="text" value="{{auth()->user()->name}}" disabled />
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold"></label>
                <input class="py-2 px-3 rounded-lg bg-gray-300 border-2 border-indigo-300 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" type="text" value="{{auth()->user()->email}}" disabled />
            </div>
            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Тема</label>
                <input class="py-2 px-3 rounded-lg border-2 border-indigo-300 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" type="text" placeholder="Тема" name="subject" />
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Сообщение</label>
                <textarea class="py-2 px-3 rounded-lg border-2 border-indigo-300 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent" type="text" placeholder="Ваше сообщение" name="mssg"></textarea>
            </div>
            <input type="hidden" name="status" value="pending">

            <div class="grid grid-cols-1 mt-5 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Файл</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-indigo-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-indigo-600 pt-1 tracking-wider'>Прикрепить файл</p>
                        </div>
                        <input type='file' class="hidden" />
                    </label>
                </div>
            </div>
    
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Назад</button>
                <button class='w-auto bg-indigo-500 hover:bg-indigo-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Отправить</button>
            </div>
  
        </div>
    </form>
@endsection