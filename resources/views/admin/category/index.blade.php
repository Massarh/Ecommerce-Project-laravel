@extends('admin.layouts.main')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stores Table</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"">Home</a></li>
            <li class="breadcrumb-item">Store</li>
            <li class="breadcrumb-item active" aria-current="page">Stores Table</li>
        </ol>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold " style="color:  #344f63">All Stores </h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        @if(auth()->user()->user_role=='superadmin')
                            <th>Email</th>
                        @endif
                        @if(auth()->user()->user_role=='superadmin'||auth()->user()->user_role=='admin')
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
                                <td>1</td> 
                                <td><img src="{{ Storage::url($category->image) }}" alt=".." width="100"></td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                @if(auth()->user()->user_role=='admin')   
                                    <td> 
                                        <a href=" {{route('store.edit', [$category->id])}} ">
                                            <button class="btn " style="background-color:#198754; color:white;">Edit</button>
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
                                <tr>
                                    <td><a href="#">{{ $key+1 }}</a></td> 
                                    <td><img src="{{ Storage::url($category->image) }}" alt=".." width="100"></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td> {{App\Models\User::where('category_id', $category->id)->where('user_role', 'admin')->first()->email}} </td>
                                    
                                    <!-- section Button-->
                                    <td> 
                                        <a href=" {{route('section.getSubcategoryByCatId',[ $category->id])}} ">
                                            <button class="btn " style="background-color:#198754; color:white;">section</button>
                                        </a>
                                    </td>

                                    <!-- Delete Button-->
                                    <td> 
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                                            Delete 
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form action=" {{ route('store.destroy', [$category->id]) }} " method="POST">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete store? All the sections, products, employees and admins that related to {{$category->name}} store will be removed.</h5>
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
            <div class="card-footer"></div>
            </div>
        </div>
        </div>
        <!--Row-->
    </div>

    <!---Container Fluid-->

    <script type="text/javascript">
        function confirmDelete(){
            console.log("massarh");
            let a = confirm('Are you sure you want to delete?');
            console.log(a);
            return a;
        }
    </script>
@endsection