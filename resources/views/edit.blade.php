@extends('adminlte::page')

@section('title', 'FreeGram - Dashboard')

@section('content_header')
    <h1>Edit User</h1>
     <div>
        @if(session()->has('success'))
        
      
            <!--div>
                {{session('success')}}
            </div-->
        @endif
    </div>
@stop

@section('content')

    
        <div class="register-box">

        
        

        
        <div class="card card-outline card-primary">

            
                            <div class="card-header ">
                    <h3 class="card-title float-none text-center">
                        Update User Data              </h3>
                </div>
            
            
            <div class="card-body register-card-body ">
                    <form action="/updateUser/{{$user->id}}" method="post">
                      @csrf
                      @method('PUT')
        
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control "
                   value="{{$user->name}}" placeholder="Full name" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user "></span>
                </div>
            </div>
          
                    </div>
                    @error('name')
                  
                    <p class="d-block text-danger">{{$message}}</p>
                    @enderror
        
        <div class="input-group mb-3">
            <input readonly type="email" name="email" class="form-control "
                   value="{{$user->email}}" placeholder="Email">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope "></span>
                </div>
            </div>
           
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
        
       
        
       
        
        <button type="submit" class="btn btn-block btn-flat btn-primary">
            <span class="fas fa-user-plus"></span>
            Update
        </button>

    </form>
            </div>

            
                            
            
        </div>

    </div>

    @endsection
    @section('js')
  
   <script type="text/javascript" charset="utf8" src="../vendor/sweetalert2/sweetalert2.all.js"></script>
   <script>
        function showMessage(){
        
        Swal.fire({
                              icon: 'success',
                              title: 'Success',
                              text: 'User was updated!',
                              showConfirmButton: false,
                              timer: 2000
                          });
        }     
    @if(session()->has('message'))
        
    showMessage();
    

   @endif
</script>
@stop

   

   
