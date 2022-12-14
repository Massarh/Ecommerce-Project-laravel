{{-- use it any where --}}
<x-loading-indicatore />
@section('css')
<!-- ION Slider -->
<link href="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.css') }}" rel="stylesheet"
    type="text/css" />
@endsection

@section('script')
<!-- Ion Range Slider-->
<script src="{{ URL::asset('/assets/libs/ion-rangeslider/ion-rangeslider.min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('/assets/js/pages/product-filter-range.init.js') }}"></script>
@endsection

<style>
    .search-container {
        margin-top: 80px;
        margin-bottom: 80px
    }

    .filter-container {
        margin-bottom: 100px;
    }

    .no-product-style {
        height: 50px;
        width: 100%;
        max-width: 300px;

        color: #1a1a1a;
    }

    @media (max-width: 768px) {
        .filter-container {
            width: 294px !important;
            margin: auto !important;
        }
    }

    @media (min-width: 768px) {
        .no-product-style {
            margin-left: 50px;
        }
    }

    .search {
        margin: auto;
        width: fit-content
    }

    .p-style {
        color: #1a1a1a !important;
        font-weight: bold !important;
        font-size: 18px !important;
    }
</style>


@include('navLayout.navbar')

@extends('layouts.app')

@section('content')
{{-- start search --}}

<div class="container">
    <form action="{{route('more.product')}}" method="GET">
        @csrf
        <div class="search">
            <div class="" style="display: inline-block">
                <input value="{{ $search ? $search: ''}}" type="text" name="search" class="form-control"
                    placeholder="search">
            </div>
            <div class="" style="display: inline-block;">
                <button type="submit" style="background-color:#1a1a1a; color: #fff" class="btn">Search</button>
            </div>
        </div>
    </form>

</div>

{{-- end search --}}

{{-- start filter --}}
<div class="container-fluid filter-container">
    <div class="row">
        <div class="col-md-2 filter-container mb-5">
            <form action="{{route('more.product')}}" method="GET">
                @csrf
                <p class="p-style ms-2">Filter Products</p>

                {{-- filter by categories --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Store</label>
                    <select name="category" class="form-control @error('category') is-invalid @enderror">
                        <option value="">select</option>

                        @foreach ( $categories as $key=>$category )

                        <option {{ $categoryId==$category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </select>
                </div>

                {{-- filter by subcategories --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Section</label>
                    <select name="subcategory" class="form-control @error('subcategory') is-invalid @enderror">
                        <option value="">select </option>

                        @foreach ( $subcategories as $key=>$subcategory )
                        <option {{ $subcategoryId==$subcategory->id ? 'selected' : ''}}
                            value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach

                    </select>
                </div>

                {{-- filter by price --}}
                <div class="price-style mb-5 ms-2" style="max-width:220px;">
                    <h5 class="font-size-14 ">Price</h5>
                    <input name="price" type="text" id="pricerange" value="{{ $price ? $price : '0;1000'}}">
                </div>

                <div class="ms-2 ">
                    <button style="background-color:#1a1a1a; color: #fff" class="btn" type="submit">Filter</button>
                </div>
            </form>
        </div>

        {{-- end filter --}}

        {{-- start products --}}


        <div class="container-fluid col-md-10 ">
            <div class="row">
                @if(count($products)>0)
                @foreach ($products as $product)

                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div style="width: 250px; margin: auto;">
                        <a href="{{route('product.view',[$product->id])}}">
                            <img src="{{ Storage::url($product->image) }}" style="width: 250px;">
                        </a>

                        <p style="margin-bottom: 0px !important;">{{ $product->name }}</p>
                        <p style="margin-bottom: 0px !important;">{{ $product->price }} JOD</p>
                    </div>
                </div>

                @endforeach
                @else
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4">
                    <p class="no-product-style">there is no matching products</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- end products --}}

{{ $products->onEachSide(1)->links() }} {{--to make pagination --}}

@endsection


{{--To associate a category-field and a subcategory --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function() {

        $('select[name="category"]').on('change', function() { // on change (???????? ??????) category 
            //catId : dropdown list ?????? ???????????? ???? ???? category id ????
            var catId = $(this).val(); 
            console.log(catId);
            
            $.ajax({
                url:'/sections?categoryId='+catId, // categoryId -> can be null
                type: "GET",
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    $('select[name="subcategory"]').empty();
                    $('select[name="subcategory"]').append('<option value= >select</option>');
                    // foreach add subcategory depends category in felid
                    $.each( data, function(key, value){ 
                        //key is a subcategory id, value is a  subcategory name. 
                        
                        $('select[name="subcategory"]').append(
                            $('<option>', { 
                            value: key,
                            text : value }
                            )
                        );
                    })
                }
            })
        });
    });
</script>