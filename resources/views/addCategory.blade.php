<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Shto Produkte
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

           <!-- enes djali, ktu ki me shkru formen  -->
           <!-- qetu ka me shtu kategori ky tipi -->

            
           
            <div class="container">
        <div class="text-center bg-white p-5 rounded shadow">
            <h1 class="mb-3">Shto Produkte</h1>
            <form action="/insertCategory" method="post">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" class=" mr-5 rounded" name="product_name" placeholder="Emri produktit... ">
                <input type="number" step=any class=" w-20 ml-5 rounded" name="cost" id="" placeholder="qmimi...">
                <select name="country_code" >
                    <option value="KS">KS</option>
                    <option value="MK">MK</option>
                </select>
                <input type="submit" class="btn btn-primary rounded" value="Shto">
            </form>
        </div>
    </div>
            
            
           
        

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        </div>
    </div>



</x-app-layout>