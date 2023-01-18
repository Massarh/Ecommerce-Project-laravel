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

@section('title') All store @endsection

@section('content')
{{-- start search --}}

<div class="container">
    <form action="{{route('all.product')}}" method="GET">
        @csrf
        <div class="search" style="width: 265px">
            <div class="input-group auth-pass-inputgroup">
                <input value="{{ $search ? $search: ''}}" type="text" name="search" class="form-control"
                    placeholder="search">
                <button class="btn" type="submit" style="background-color:#1a1a1a; color: #fff"><i
                        class="mdi mdi-magnify"></i></button>
            </div>
        </div>
    </form>

</div>

{{-- end search --}}

{{-- start filter --}}
<div class="container-fluid filter-container">
    <div class="row">
        <div class="col-md-2 filter-container mb-5">
            <form action="{{route('all.product')}}" method="GET">
                @csrf
                <p class="p-style ms-2">Filter Products</p>

                {{-- filter by stores --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Store</label>
                    <select name="storeId" class="form-control @error('storeId') is-invalid @enderror">
                        <option value="">select</option>

                        @foreach ( $stores as $key=>$store )

                        <option {{ $storeId==$store->id ? 'selected' : ''}}
                            value="{{$store->id}}">{{$store->name}}</option>

                        @endforeach
                    </select>
                </div>

                {{-- filter by sections --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Section</label>
                    <select name="sectionId" class="form-control @error('section') is-invalid @enderror">
                        <option value="">select</option>
                        <option {{ $sectionId==1 ? 'selected' : '' }} value="1">MEN</option>
                        <option {{ $sectionId==2 ? 'selected' : '' }} value="2">WOMEN</option>
                        <option {{ $sectionId==3 ? 'selected' : '' }} value="3">KIDS</option>
                    </select>

                </div>

                {{-- filter by categories --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Category</label>
                    <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                        <option value="">select </option>

                        @foreach ( $categories as $key=>$category)
                        <option {{ $categoryId==$category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>

                {{-- filter by price --}}
                <div class="price-style mb-5 ms-2" style="max-width:220px;">
                    <h5 class="font-size-14 ">Price</h5>
                    <input name="price" type="text" id="pricerange" value="{{ $price ? $price : '2;26'}}">
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

                        <p style="margin-bottom: 0px !important; text-transform: uppercase">{{ $product->name }}</p>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function() {
        /*      this function to choose categories and section Depend on Store      */
        function loadCategoriesAndSectionsDependOnStore() { 
            var status=$("body").data('status');
            console.log(status);
            console.log("hi1");

            var urlParams = new URLSearchParams(window.location.search);
            var storeId = $(this).val();
            $.ajax({
                url:'/ajax-categories-sections?storeId='+storeId,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    // categories
                    $('select[name="categoryId"]').empty();
                    $('select[name="categoryId"]').append('<option value= >select</option>');
                    $('select[name="categoryId"]').data('key',data[0]);
                    // foreach add category depends in store  felid
                    $.each( data[0], function(key, value){ 
                        //key is a category id, value is a  category name. 
                        $('select[name="categoryId"]').append(
                            $('<option>', { 
                            value: key,
                            text : value }
                            )
                        );
                    })
                    if(urlParams.get('categoryId') && status==="load"){

                        $(`select[name="categoryId"] option[value=${urlParams.get('categoryId')}]`).prop("selected", true)
                    }
                    
                    // end categories
                    // sections
                    $('select[name="sectionId"]').empty();
                    $('select[name="sectionId"]').append('<option value= >select</option>');
                    $.each( data[1], function(key, value){ 
                        $('select[name="sectionId"]').append(
                            $('<option>', { 
                            value: key,
                            text : value }
                            )
                        );
                    })
                    if(urlParams.get('sectionId') && status==="load"){
                        $(`select[name="sectionId"] option[value=${urlParams.get('sectionId')}]`).prop("selected", true)

                    }
                    // end sections
                }
            })
        }
        /*       this function to choose categories Depend on store and section       */
        function loadCategoriesDependOnSection() {
            var status=$("body").data('status');
            console.log(status);
            console.log("hi2");

            // urlParams for selected
            var urlParams = new URLSearchParams(window.location.search); 
            var sectionId = $(this).val(); 
            var storeId = $('select[name="storeId"]').val();
            if(!sectionId && storeId){
                var categories = $('select[name="categoryId"]').data('key');
                console.log(categories,'store categories when section null and there is store id');
                $('select[name="categoryId"]').empty();
                $('select[name="categoryId"]').append('<option value= >select</option>');
                $.each( categories, function(key, value){  
                    $('select[name="categoryId"]').append(
                        $('<option>', { 
                        value: key,
                        text : value }
                        )
                    );
                })
                if(urlParams.get('categoryId') && status==="load" ){
                    $(`select[name="categoryId"] option[value=${urlParams.get('categoryId')}]`).prop("selected", true)

                }
                // three cases
            }else{
                $.ajax({
                    url:`/ajax-categories?sectionId=${sectionId}&storeId=${storeId}`,
                    type: "GET",
                    dataType: "json",
                    success:function(categories) {
                        console.log(categories,'sectionCategories');
                        
                        $('select[name="categoryId"]').empty();
                        $('select[name="categoryId"]').append('<option value= >select</option>');
                        $.each( categories, function(key, value){  
                            $('select[name="categoryId"]').append(
                                $('<option>', { 
                                    value: key,
                                    text : value
                                    }
                                )
                            );
                        })
                        if(urlParams.get('categoryId') && status==="load" ){
                            $(`select[name="categoryId"] option[value=${urlParams.get('categoryId')}]`).prop("selected",true)

                        }
                    }
                })
            }
        }

        // change status to "load" before enter the two functions above
        function loadfn(){
            console.log("hi3");
            $("body").data('status',"load");  
        }
        // change status to "change" before enter any function above
        function changefn(){
            console.log("hi4");
            $("body").data('status',"change"); 
        }   

        $.proxy(loadfn)();
        $.proxy(loadCategoriesAndSectionsDependOnStore, $('select[name="storeId"]'))();
        $.proxy(loadCategoriesDependOnSection, $('select[name="sectionId"]'))();

        $('select[name="storeId"]').on('change',changefn);
        $('select[name="sectionId"]').on('change',changefn);
        $('select[name="storeId"]').on('change',loadCategoriesAndSectionsDependOnStore);
        $('select[name="sectionId"]').on('change', loadCategoriesDependOnSection);
    });

</script>