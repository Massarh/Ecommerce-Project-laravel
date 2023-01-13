<table class="table table-striped" style="border: 1px solid #cdced0;
padding: 10px;">
    <thead>

        <tr>
            <th scope="col">#</th>
            <th style="padding-left: 4px;" scope="col">Name</th>
            <th style="padding-left: 11px;" scope="col">Price</th>
            <th style="padding-left: 11px;" scope="col">Qty</th>
        </tr>

    </thead>
    <tbody>

        @php $i=1; @endphp
        @foreach($cart->items as $product)

        <tr>
            <th scope="row">{{$i++}}</th>
            <td style="padding-left: 4px;">{{$product['name']}}</td>
            <td style="padding-left: 14px;">{{$product['price']}} JOD</td>
            <td style="padding-left: 17px;">{{$product['qty']}}</td>
        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <td>
                Total Price:{{$cart->totalPrice}} JOD
            </td>
        </tr>
    </tfoot>
</table>
<div>Please click the link to view your order.<a href="{{url('/orders')}}"> click here</a></div>