<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rrit numrin e stokut te nje produkti
        </h2>
    </x-slot>



    <div class="container text-center my-5">

        <div class="bg-white p-5 rounded shadow">

            <h1 class="mb-3">Shto ne stok te Kosoves</h1>
            <form action="/addToStock" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <select name="category" class="rounded" id="cars">
                    @foreach($categoriesKs as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <input type="number" class="rounded" name="quantity" id="" placeholder="Sasia">
                <input type="submit" class="btn btn-primary" value="Shto">
            </form>
        </div>

    </div>


        <div class="container text-center">

            <div class="w-fluid bg-white p-5 rounded shadow">
            <h1 class="mb-3">Shto ne stok te Maqedonise</h1>
            <form action="/addToStock" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <select name="category" class="rounded" id="cars">
                    @foreach($categoriesMk as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <input type="number" class="rounded" name="quantity" id="" placeholder="Sasia">
                <input type="submit" class="btn btn-primary" value="Shto">
            </form>
            </div>
            
        </div>
    

</x-app-layout>