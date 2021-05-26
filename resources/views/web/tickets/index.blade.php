@extends('web.main')

@section('title', 'Все запросы')

@section('content')
    <h1 class="py-4 text-2xl">Все запросы</h1>
    @role('client')
    <div class="py-4">
        <a class="inline-flex items-center h-12 ml-0 px-4 py-3 m-2 text-sm @if(count($check_ticket_time) > 0) cursor-not-allowed bg-gray-500 hover:bg-gray-400 @else bg-indigo-500 hover:bg-indigo-400 @endif text-white transition-colors duration-150 rounded-lg focus:shadow-outline"  @if(count($check_ticket_time) > 0) href="#" @else href="{{route('tickets.create')}} @endif">Создать новый запрос</a>
    </div>
    @endrole
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Номер</th>
                <th class="py-3 px-6 text-left">Имя клиента</th>
                <th class="py-3 px-6 text-center">Эл.адрес клиента</th>
                <th class="py-3 px-6 text-center">Тема</th>
                <th class="py-3 px-6 text-center">Сообщение</th>
                <th class="py-3 px-6 text-center">Дата созд</th>
                <th class="py-3 px-6 text-center">Статус</th>
                {{-- <th class="py-3 px-6 text-left">Имя менеджера</th>
                <th class="py-3 px-6 text-center">Действие</th> --}}
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light relative">
            @forelse ($tickets as $ticket)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $ticket->id ?? '' }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    @foreach ($ticket->clients as $client)
                    <div class="flex items-center">
                        <span>{{ $client->name ?? '' }}</span>
                    </div>   
                    @endforeach
                </td>
                <td class="py-3 px-6 text-center">
                    @foreach ($ticket->clients as $client)
                    <div class="flex items-center">
                        <span>{{ $client->email ?? '' }}</span>
                    </div>   
                    @endforeach
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                        <a class="text-blue-400 text-underline" href="{{route('tickets.show', $ticket->id)}}">{{ $ticket->subject ?? '' }}</a>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                        {{ $ticket->mssg ?? '' }}
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                        {{ $ticket->created_at ?? '' }}
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    @if ($ticket->status === 'pending')
                    <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">В ожидании</span>
                    @elseif($ticket->status == 'answered')
                    <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Отвечен</span>
                    @elseif($ticket->status === 'closed')
                    <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Закрыт</span>  
                    @endif
                </td>
            </tr>
            @empty          
            <div class="bg-green-200 text-green-600 px-2 py-1 relative">Пока данных нет!</div>             
            @endforelse
        </tbody>
    </table>
@endsection