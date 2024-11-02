@extends('layouts.master')

@section('title', 'Lihat Image')

@section('content')
    <div class="container flex flex-col w-full justify-center items-center h-screen mx-auto p-4">
        <div class="flex justify-between items-center w-full mb-4">
            <h2 class="text-2xl font-semibold">Images List</h2>
            <!-- Create Image Button -->
            <a href="{{ route('admin.image.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Image
            </a>
        </div>

        @if ($images->isEmpty())
            <p class="text-gray-500">No images found.</p>
        @else
            <div class="overflow-x-auto w-full">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Image Path</th>
                            <th class="py-3 px-6 text-left">Keterangan</th>
                            <th class="py-3 px-6 text-left">Hasil Image</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @foreach ($images as $image)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $image->id }}</td>
                                <td class="py-3 px-6">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Image"
                                        class="h-16 w-16 object-cover">
                                </td>
                                <td class="py-3 px-6">{{ $image->keterangan }}</td>
                                <td class="py-3 px-6">{{ $image->nilai_image }}</td>
                                <td class="py-3 px-6 text-center">

                                    <a href="{{ route('admin.image.destroy', $image->id) }}"
                                        class="text-red-500 hover:text-red-700"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $image->id }}').submit();">
                                        Delete
                                    </a>
                                    <form id="delete-form-{{ $image->id }}"
                                        action="{{ route('admin.image.destroy', $image->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
