@props(['user'])
@extends('layouts.plantilla')

@section('title', 'Index')

@section('content')

<h2>Este es el usuario {{$user->name}}</h2><br><br>

<x-table>
    <table class="min-w-full">
        <thead class="bg-white border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    ID
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Nombre
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Email
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                    Rol
                </th>
            </tr>
        </thead>
        <tbody>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div class="text-sm text-gray-900">
                            {{ $user->id }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div class="text-sm text-gray-900">
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div class="text-sm text-gray-900">
                            {{ $user->email }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div class="text-sm text-gray-900">
                            @if ($user->role)
                                Admin
                            @else
                                No tiene rol
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <div>
                            @if ($user->role)
                                <a href="{{route('admin.deallocateRoleUser', $user)}}">Sacar rol de Administrador</a>
                            @else
                                <a href="{{route('admin.assignRoleUser', $user)}}"><button>Hacer Administrador</button></a>
                            @endif
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
</x-table>

@endsection