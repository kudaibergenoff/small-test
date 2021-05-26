@extends('web.main')

@section('title', $ticket->subject)

@section('content')
    <h1 class="py-6 text-2xl">Запрос тема: {{ $ticket->subject ?? '' }} №: {{ $ticket->id }}</h1>
    <div class="mt-3 rounded-md border-2 border-gray-300">
        <div class="ticket mb-8">
            <div class="flex flex-col bg-gray-100 rounded-lg py-4 px-4">
                @foreach ($ticket->clients as $client)
                    <span class="text-gray-700 font-semibold text-xl">{{$client->name ?? ''}}</span>
                @endforeach
                <span class="text-md">Клиент</span>
            </div>
            <div class="flex flex-col rounded-lg py-4 px-4">
                <span class="text-gray-700 font-semibold text-lg tracking-wide mb-2">Сообщение:</span>
                <span class="text-gray-500 text-base">{{ $ticket->mssg ?? '' }}</span>
            </div>
        </div>
    </div>

    
    @forelse ($ticket->answers as $answer)
    <div class="mt-3 rounded-md border-2 border-indigo-300">
        <div class="ticket mb-8">
            <div class="flex flex-col bg-gray-100 rounded-lg py-4 px-4">
                @foreach ($ticket->managers as $manager)
                    <span class="text-gray-700 font-semibold text-xl">{{$manager->name}}</span>
                @endforeach
                <span class="text-md">Менеджер</span>
            </div>
            <div class="flex flex-col rounded-lg py-4 px-4">
                <span class="text-gray-700 font-semibold text-lg tracking-wide mb-2">Ответ:</span>
                <span class="text-gray-500 text-base">{{ $answer->answer ?? '' }}</span>
            </div>
        </div>
    </div>
    @empty
    @role('manager')
    <div class="mt-3">
        <div class="ticket mb-8">
            <form action="{{route('tickets.answered')}}" method="post">
                @csrf
                <div class="grid grid-cols-1 mt-5 mx-2">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ответить:</label>
                    <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                    <textarea class="py-2 px-3 h-36 rounded-lg bg-gray-100 border-2 border-indigo-300 mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent focus:bg-white" type="text" placeholder="Ваше сообщение" name="answer"></textarea>
                </div>
                <div class="py-4 mx-2">
                    <button type="submit" class="block tracking-widest uppercase text-center shadow bg-indigo-600 hover:bg-indigo-700 focus:shadow-outline focus:outline-none text-white text-xs py-3 px-10 rounded">Отправить</button>
                </div>
            </form>
        </div>
    </div>
    @endrole
    @endforelse
@endsection