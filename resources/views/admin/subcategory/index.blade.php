@extends('admin.layouts.main')

@section('title') @lang('Store') @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Sections Table</h4>
            @if(auth()->user()->user_role=='superadmin')
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('store.index')}}">Stores Table</a></li>
                <li class="breadcrumb-item active" style="text-decoration-line: underline;">Sections Table</li>
            </ol>
            @endif

            @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Section</li>
                <li class="breadcrumb-item active" style="text-decoration-line: underline;">Sections Table</li>
            </ol>
            @endif

        </div>
    </div>
</div>
<!-- Breadcrumb -->

<div class="row">
    <div class="col-12">
        {!! Toastr::message() !!}
        <div class="card">

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">

                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                @if(auth()->user()->user_role=='superadmin')
                                <th>Store</th>
                                @endif
                                <th>Action</th>
                                @if(auth()->user()->user_role=='admin')
                                <th></th>
                                <th></th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Admin & Employee -->
                            @if (count($subcategories)>0)
                            @foreach ($subcategories as $key=>$subcategory)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $subcategory->name }}</td>
                                @if(auth()->user()->user_role=='superadmin')
                                <td>{{ $category->name}}</td>
                                @endif

                                <td>
                                    <a
                                        href=" {{route('product.getProductByCatAndSubId', ['storeSlug'=>$category->slug,'sectionSlug'=>$subcategory->slug])}}">
                                        <button class="btn"
                                            style="background-color: #232838; color:white; padding:5px">products</button>
                                    </a>
                                </td>

                                @if(auth()->user()->user_role=='admin')
                                <!-- Button Edit -->
                                <td>
                                    <a href=" {{route('section.edit', [$subcategory->slug])}} ">
                                        <button class="bg-color-btn" style="color:#198754;"><i
                                                class="fas fa-edit"></i></button>
                                    </a>
                                </td>

                                <!-- Button Delete -->
                                <td>
                                    <!-- Button trigger modal -->
                                    <button class="bg-color-btn" type="button" data-toggle="modal" data-target="#exampleModal{{$subcategory->id}}"
                                        style="color: #dc3545;border:none">
                                        <i class="mdi mdi-trash-can font-size-20"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$subcategory->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('section.destroy', [$subcategory->id]) }} "
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="white-space: pre-wrap;">Are you sure you want to
                                                            delete? all products in this section will be removed from
                                                            the store</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger"
                                                            data-dismiss="submit">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <!-- Button Delete -->
                                @endif
                            </tr>

                            @endforeach
                            @else
                            <td>No Section Created Yet</td>
                            @endif

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end row -->
<script type="text/javascript">
    function confirmDelete(){
        console.log("massarh");
        let a = confirm('Are you sure you want to delete?');
        console.log(a);
        return a;
    }
</script>
@endsection