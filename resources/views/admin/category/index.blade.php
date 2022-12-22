@extends('admin.layouts.main')

@section('title') @lang('Store') @endsection

@section('content')
<!-- Breadcrumb -->
<div class="row">
    <div class="col-12">
        {!! Toastr::message() !!}
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            @if(auth()->user()->user_role=='superadmin')
            <h4 class="mb-sm-0 font-size-18">Stores Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Stores Table</li>
                </ol>
            </div>
            @endif

            @if(auth()->user()->user_role=='admin' || auth()->user()->user_role=='employee')
            <h4 class="mb-sm-0 font-size-18">Store Table</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" style="text-decoration-line: underline;">Store Table</li>
                </ol>
            </div>
            @endif

        </div>
    </div>
</div>
<!-- Breadcrumb -->

<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                @if(auth()->user()->user_role=='superadmin')
                                    <th>#</th>
                                @endif
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                @if(auth()->user()->user_role=='superadmin')
                                    <th>Email</th>
                                @endif
                                @if(auth()->user()->user_role=='superadmin' || auth()->user()->user_role=='admin')
                                    <th>Action</th>
                                @endif
                                @if(auth()->user()->user_role=='superadmin')
                                    <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Admin & Employee -->
                            @if (auth()->user()->user_role=='admin'||auth()->user()->user_role=='employee')
                                @if ($category)
                                    <tr>
                                        <td><img src="{{ Storage::url($category->image) }}" alt=".." width="100"></td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        @if(auth()->user()->user_role=='admin')   
                                            <td> 
                                                <a href=" {{route('store.edit', [$category->id])}} ">
                                                    <button style="color:#198754; "><i class="fas fa-edit"></i></button>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                        
                                @else 
                                    <td>No Store created yet</td>
                                @endif
                            @endif

                            <!-- Superadmin -->
                            @if(auth()->user()->user_role=='superadmin')
                                
                                @if (count($categories)>0)
                                    @foreach ($categories as $key=>$category) 
                                        <tr >
                                            <td>{{ $key+1 }}</td> 
                                            <td><img src="{{ Storage::url($category->image) }}" alt=".." width="100"></td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td> {{App\Models\User::where('category_id', $category->id)->where('user_role', 'admin')->first()->email}} </td>
                                            
                                            <!-- section Button-->
                                            <td> 
                                                <a href=" {{route('section.getSubcategoryByCatId',[ $category->id])}} ">
                                                    <button class="btn" style="background-color: #232838; color:white; padding: 6px">section</button>
                                                </a>
                                            </td>

                                            <!-- Delete Button-->
                                            <td> 
                                                <!-- Button trigger modal -->
                                                <button type="button" data-toggle="modal" data-target="#exampleModal{{$category->id}}" style="color: #dc3545;border:none">
                                                    <i class="mdi mdi-trash-can font-size-20"></i> 
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action=" {{ route('store.destroy', [$category->id]) }} " method="POST">
                                                            @csrf
                                                            @method('DELETE') 
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="white-space: pre-wrap;">Are you sure you want to delete store? All the sections, products, employees and admins that related to {{$category->name}} store will be removed.</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger" data-dismiss="submit">Delete</button>
                                                                </div>
                                                            </div>
                                                        </form> 
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @else 
                                    <td>No Store created yet</td>
                                @endif

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