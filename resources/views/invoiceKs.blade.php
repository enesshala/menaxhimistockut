<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rrit numrin e stokut te nje produkti
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            </div>
        </div>
    </div>

    <div class="container text-center">

        <div class="bg-white rounded shadow p-5">

        <h1 class="mb-3">Gjenero Fature KS</h1>

            <input type="text" name="seller" id="seller" placeholder="Ofruesi">
            <input type="text" name="seller_address" id="seller_address" placeholder="Adresa e Ofruesit">
            <input type="text" name="client" id="client" placeholder="Bleresi">
            <select onchange="changeQuantityValues()" id="category" name="category" id="category">
                <option value="0">Produkti</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}} ± {{$category->name}} ± {{$category->cost}}± {{$category->quantity}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select id="quantityContainer" name="quantity">
            <option value="0">Sasia</option>
            </select> 
            <input onclick="setProductToSell()" type="submit" class="btn btn-primary" value="+">

        </div>

    </div>

    <script>
        let productNumber = 0;
        let totalCost = 0;
        let globalSelectedCategory;

        function changeQuantityValues() {
            globalSelectedCategory = document.getElementById('category').value.split('±');

            const quantityContainer = document.getElementById('quantityContainer');
            quantityContainer.innerHTML = null;
            if(globalSelectedCategory[3] < 1) {
                const quantityOption = document.createElement('option');
                quantityOption.value = 0;
                quantityOption.innerHTML = 0;
                quantityContainer.appendChild(quantityOption);
            }

            else {
                for (let i=0; i < globalSelectedCategory[3]; i++ ) {
                    const quantityOption = document.createElement('option');
                    quantityOption.value = i+1;
                    quantityOption.innerHTML = i+1;
                    quantityContainer.appendChild(quantityOption);
                }
            }
        }

        function setProductToSell() {
            const category = document.getElementById('category').value;
            const seller = document.getElementById('seller').value;
            const seller_address = document.getElementById('seller_address').value;
            const client = document.getElementById('client').value;
            const quantity = document.getElementById('quantity').value;

            const categoryName = category.split('±')[1];
            const categoryId = category.split('±')[0];
            const categorySinglePrice = category.split('±')[2];

            const categoryPrice = Number(categorySinglePrice) * Number(quantity);
            
            const mainContainer = document.getElementById('main-container');

            const newOrder = document.createElement('div');
            newOrder.style.display = "flex";

            const prodNumber = document.createElement('p');
            prodNumber.innerHTML = productNumber+1;
            productNumber += 1;

            const prod = document.createElement('p');
            prod.innerHTML = categoryName;

            const quantityContainer = document.createElement('p');
            quantityContainer.innerHTML = quantity;

            const singlePriceContainer = document.createElement('p');
            singlePriceContainer.innerHTML = categorySinglePrice;

            const priceContainer = document.createElement('p');
            priceContainer.innerHTML = categoryPrice;

            newOrder.appendChild(prodNumber);
            newOrder.appendChild(prod);
            newOrder.appendChild(quantityContainer);//
            newOrder.appendChild(singlePriceContainer);
            newOrder.appendChild(priceContainer);

            totalCost += categoryPrice;
            document.getElementById('totalCostP').innerHTML = `${totalCost}`;

            mainContainer.appendChild(newOrder);
        }
    </script>


</x-app-layout>