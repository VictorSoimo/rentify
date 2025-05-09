@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">All Properties</h2>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('properties.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">Add New Property</a>

    <table class="w-full table-auto border-collapse mt-4">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Address</th>
                <th class="p-3 border">Caretaker</th>
                <th class="p-3 border">Manager</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr class="border-t hover:bg-gray-50">
                    <td class="p-3">{{ $property->name }}</td>
                    <td class="p-3">{{ $property->address }}</td>
                    <td class="p-3">{{ $property->caretaker?->name ?? '-' }}</td>
                    <td class="p-3">{{ $property->manager?->name ?? '-' }}</td>
                    <td class="p-3 flex space-x-2">
                        <a href="{{ route('properties.edit', $property) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('properties.destroy', $property) }}" method="POST" onsubmit="return confirm('Delete this property?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if($properties->isEmpty())
                <tr><td colspan="5" class="p-3 text-center text-gray-500">No properties found.</td></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
