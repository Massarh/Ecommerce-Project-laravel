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

    .search-with-name-store {
        display: flex;
        justify-content: start;
        align-items: baseline
    }

    .font-style-hint {
        font-family: garamond sans-serif !important;
        font-style: italic !important;
        font-weight: 500;
        text-align: center
    }

    @media (max-width: 768px) {
        .search-with-name-store {
            display: block;
        }

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

@section('title') {{ $store->name }} store @endsection

@section('content')

{{-- start search --}}

<div class="search-with-name-store mt-4">
    <div>
        <h2 class="font-style-hint ms-2 mt-4" style="font-size: 30px">{{ $store->name }}</h2>
    </div>

    <div class="container">

        <form action="{{route('all.product', [$storeSlug])}}" method="GET">
            @csrf
            <div class="search " style="width: 265px">
                {{-- <div class="" style="display: inline-block">
                    <input value="{{ $search ? $search: ''}}" type="text" name="search" class="form-control"
                        placeholder="search">
                </div>
                <div class="" style="display: inline-block;">
                    <button type="submit" style="background-color:#1a1a1a; color: #fff" class="btn">Search</button>
                </div> --}}
                <div class="input-group auth-pass-inputgroup" >
                    <input value="{{ $search ? $search: ''}}" type="text" name="search" class="form-control" placeholder="search">
                    <button class="btn" type="submit"style="background-color:#1a1a1a; color: #fff"><i
                            class="mdi mdi-magnify"></i></button>
                </div>
            </div>
        </form>

    </div>
</div>

{{-- end search --}}

{{-- start filter --}}

<div class="container-fluid filter-container">
    <div class="row">
        <div class="col-md-2 filter-container mb-5">

            <form action="{{ route('all.product', [$storeSlug]) }}" method="GET">
                @csrf
                <p class="p-style ms-2">Filter Products</p>
                {{-- filter by stores --}}
                <input type="hidden" id="storeId" value="{{$storeId}}">
                {{-- filter by sections --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Section</label>
                    <select name="sectionId" class="form-control @error('section') is-invalid @enderror">
                        <option value="">select</option>
                        @foreach ( $sections as $key=>$section )
                        <option {{ $sectionId==$key ? 'selected' : '' }} value="{{$key}}">{{$section}}</option>
                        @endforeach
                    </select>

                </div>
                {{-- filter by categories --}}
                <div class="form-group mb-4 ms-2">
                    <label for="">Choose Category</label>
                    <select name="categoryId" class="form-control @error('categoryId') is-invalid @enderror">
                        <option value="">select </option>

                        @foreach ( $categories as $key=>$category )
                        <option {{ $categoryId==$category->id ? 'selected' : ''}}
                            value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>

                <label class="ms-2" for="">price</label>

                <div class="price-style mb-5 ms-2" style="max-width:220px;">
                    <input value="{{ $price ? $price : '2;26'}}" name="price" type="text" id="pricerange">
                </div>

                <div class="ms-2 ">
                    <button style="background-color:#1a1a1a; color: #fff" class="btn" type="submit">Filter</button>
                </div>
            </form>

        </div>
        {{-- end filter --}}

        {{-- start products --}}

        <div class="container-fluid col-md-10">
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
{{$products->onEachSide(1)->links()}} {{--to make pagination --}}

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $("document").ready(function() {
        function loadCategoriesAndSectionsDependOnStore() { 
            status=$("body").data('status');
            var urlParams = new URLSearchParams(window.location.search);
            // new
            var storeId = $('#storeId').val();
            // new
            $.ajax({
                url:'/ajax-categories-sections?storeId='+storeId, // categoryId -> can be null
                type: "GET",
                dataType: "json",
                success:function(data) {
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
       
        function loadCategoriesDependOnSection() {
            status=$("body").data('status');
            var urlParams = new URLSearchParams(window.location.search);
            var sectionId = $(this).val(); 
            console.log(sectionId,"hello");
            // new
            var storeId = $('#storeId').val();
            console.log(storeId,"store");

            // new
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
            }else{
                $.ajax({
                    url:`/ajax-categories?sectionId=${sectionId}&storeId=${storeId}`, 
                    type: "GET",
                    dataType: "json",
                    success:function(categories) {
                        console.log(categories,'here');
                        if(sectionId && storeId){
                                // intersection function
                                const isObj = x => typeof x === 'object'
                                const common = (storeCategories, categories) => {
                                let result = {}
                                if (([storeCategories, categories]).every(isObj)) {
                                    Object.keys(storeCategories).forEach((key) => {
                                    const value = storeCategories[key]
                                    const other = categories[key]
                                    if (isObj(value)) { 
                                        result[key] = common(value, other)
                                    }else if (value === other) {
                                        result[key] = value
                                    }
                                    })
                                }
                                return result;
                                }
                                var storeCategories = $('select[name="categoryId"]').data('key')
                                console.log(storeCategories,'storeCategories1');
                                console.log(categories,'sectionCategories1');
                                // common categories
                                var categories=common(storeCategories, categories);
                        }
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
           
        function changefn(){
            $("body").data('status',"change"); 
        }   
         function loadfn(){
            $("body").data('status',"load");  
        }  
        $('select[name="storeId"]').on('change',changefn);
        $('select[name="sectionId"]').on('change',changefn);
        $('select[name="storeId"]').on('change',loadCategoriesAndSectionsDependOnStore);
        $('select[name="sectionId"]').on('change', loadCategoriesDependOnSection); 
        
        $.proxy(loadfn)();
        $.proxy(loadCategoriesAndSectionsDependOnStore)();
        $.proxy(loadCategoriesDependOnSection, $('select[name="sectionId"]'))();
    });
</script>