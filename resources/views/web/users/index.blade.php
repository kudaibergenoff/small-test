@extends('web.main')

@section('title', 'Все пользователи')
    
@section('content')
    <h1 class="py-4 text-2xl">Все пользователи</h1>
    @role('admin')
    <div class="py-4">
        <a class="inline-flex items-center h-12 ml-0 px-4 py-3 m-2 text-sm bg-indigo-500 hover:bg-indigo-400 text-white transition-colors duration-150 rounded-lg focus:shadow-outline" href="{{route('users.create')}}">Добавить нового пользователя</a>
    </div>
    @endrole
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Номер</th>
                <th class="py-3 px-6 text-left">Имя</th>
                <th class="py-3 px-6 text-left">Эл.адрес</th>
                <th class="py-3 px-6 text-left">Роль</th>
                <th class="py-3 px-6 text-center">Дата созд</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light relative">
            @forelse ($users as $user)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $user->id ?? '' }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>{{ $user->name ?? '' }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex items-center">
                        <span>{{ $user->email ?? '' }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    @foreach ($user->roles as $role)
                    <div class="flex items-center">
                        <span>{{ $role->name ?? '' }}</span>
                    </div>   
                    @endforeach
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex items-center justify-center">
                        {{ $user->created_at ?? '' }}
                    </div>
                </td>
            </tr>
            @empty          
            <div class="bg-green-200 text-green-600 px-2 py-1 relative">Пока данных нет!</div>             
            @endforelse
        </tbody>
    </table>
@endsection