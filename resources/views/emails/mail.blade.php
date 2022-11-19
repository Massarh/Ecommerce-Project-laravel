<table class="table table-striped">
    <thead>

        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Qty</th>
        </tr>
    </thead>
    <tbody>
        @php $i=1 ; @endphp
            @foreach($cart->items as $product)

        <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$product['name']}}</td>
        <td>{{$product['price']}}</td>
        <td>{{$product['qty']}}</td>
        </tr>
            @endforeach
            <br>
            Total Price:{{$cart->totalPrice}}
            Plese click the link to view your order.<a href="{{url('/orders')}}"> click here</a>

        
    </tbody>
</table>