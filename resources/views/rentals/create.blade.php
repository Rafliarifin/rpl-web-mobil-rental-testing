@extends('layout')

@section('content')
<br>
    <h1 class="block text-white font-bold mb-1 text-4xl text-center">Rent a Car</h1><br>
    <form action="{{ route('rentals.calculatePrice') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4 ">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">  
            <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
            <input type="text" name="phone" id="phone" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label for="car_id" class="block text-gray-700 font-bold mb-2">Car</label>
            <select name="car_id" id="car_id" class="w-full px-3 py-2 border rounded-lg" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }} - ${{ number_format($car->price_per_day, 2) }} per day</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="duration" class="block text-gray-700 font-bold mb-2">Duration (days)</label>
            <input type="number" name="duration" id="duration" class="w-full px-3 py-2 border rounded-lg" min="1" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Rent Car</button>
    </form>
@endsection