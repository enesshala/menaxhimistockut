<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('PRODUKTET') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            </div>
        </div>
    </div>


    <div class="container">
        
       
                <div class="row">
            @foreach ($data as $product)
            <div class="col">
            <div class="card mb-3 shadow" style="width: 18rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <div class="d-flex">
                        <h4 id="productName_{{$product->name}}" class="card-title fw-bold text-center">{{$product->name}}</h4> 
                        <input id="newNameInput_{{$product->name}}" type="text" placeholder="Emri i ri" style="display:none;"> 

                        <!-- butoni me poshte e ndrron perfundimisht emrin -->
                        <button id="changeName_{{$product->name}}" onclick="changeProductName('{{$product->name}}')" classw="w-10 h-25" style="display:none;" >Ndrysho</button>
                    </div>
                    
                    <hr class="my-2">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-text justify-content-around">Sasia:</h5>
                        
                        <h5 class="fw-bold">{{$product->quantity}}</h5>
                        
                    </div>
                    <hr class="my-2">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-text mb-3 justify-content-around">Qmimi:</h5>
                        <h5 class="text-success fw-bold">{{$product->cost}} €</h5>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary text-white">Ndrysho Qmimin</a>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach

            <script>
                function initChangeProductName(name) {
                    const productNameHtmlElement = document.getElementById(`productName_${name}`);
                    const newProductNameHtmlElement = document.getElementById(`newNameInput_${name}`);
                    const changeNameInitBtn = document.getElementById(`changeNameInit_${name}`);
                    const changeNameBtn = document.getElementById(`changeName_${name}`);

                    productNameHtmlElement.style.display = "none";
                    newProductNameHtmlElement.style.display = "block";
                    changeNameInitBtn.style.display = "none";
                    changeNameBtn.style.display = "block";
                }

                function changeProductName(name) {
                    const newNameContent = document.getElementById(`newNameInput_${name}`).value;
                    console.log(newNameContent);
                }
            </script>
        </div>
    </div>



</x-app-layout>