@extends('admin.layouts.main')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Subcategory Tables</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Subcategory</li>
            <li class="breadcrumb-item active" aria-current="page">Subcategory Tables</li>
        </ol>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold" style="color:  #344f63">All Subcategory</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($subcategories)>0)
                        @foreach ($subcategories as $key=>$subcategory)
                            <tr>
                                <td><a href="#">{{ $key+1 }}</a></td> {{-- $key+1 to increment the $key --}}
                                <td>{{ $subcategory->name }}</td>
                                <td>{{ $subcategory->category->name}}</td> <!-- category is function name in \AppModels\Subcategory -->
                                <!-- Button Edit -->
                                <td>  
                                    <a href=" {{route('subcategory.edit', [$subcategory->id])}} ">
                                        <button class="btn" style="background-color:#198754; color:white;">Edit</button>
                                    </a>
                                </td>
                                <!-- Button Edit -->
                                
                                <!-- Button Delete -->
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$subcategory->id}}">
                                        Delete 
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('subcategory.destroy', [$subcategory->id]) }} " method="POST">
                                                @csrf
                                                @method('DELETE') 
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
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
                                <!-- Button Delete -->
                            </tr>
                        @endforeach
                    @else 
                        <td>No Subcategory created yet</td>
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