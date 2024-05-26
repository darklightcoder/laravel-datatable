@extends('adminlte::page')

@section('title', 'FreeGram - Dashboard')

@section('content_header')
    <h1>Users</h1>
     <div>
        @if(session()->has('success'))
        
      
            <!--div>
                {{session('success')}}
            </div-->
        @endif
    </div>
@stop

@section('content')


        <table class="table table-bordered table-striped" id="y_dataTables">
            <thead class="bg-primary ">
               <tr class="text-dark">
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created at</th> <th>Action</th>
               </tr>
            </thead>
              <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                  
                    <td>
                        <a href="{{ url('/editUser/'.$user->id) }}" title="Edit" class="btn btn-primary">
                            <i class="fas fa-edit" title="Editar"></i></a>
                        <form id="delForm{{$user->id}}" method="POST" action="{{ url('/deleteUser/'.$user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="button" class="btn btn-danger btn-delete" title="Delete"
                                onclick=" confirmDelete({{$user->id}})"><i
                                    class="fas fa-trash" aria-hidden="true"></i></button>
                                
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
            
            
            
         </table>
       


@endsection

@section('css')
  
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
@stop

@section('js')
        <script>
        $(document).ready( function () {
        $('#y_dataTables').DataTable({
        "processing": true,"searching":true,  "lengthMenu": [[5,10, 25, 50,100, -1], [5,10, 25, 50,100, "All"]],
        "paging":true,  "bProcessing": true,
     //   ajax: "{{ url('dashboard') }}",
      /*  columns: [
                 { data: 'id', name: 'id' },
                 { data: 'name', name: 'name' },
                 { data: 'email', name: 'email' },
                 { data: 'created_at', name: 'created_at' },
                 { data: 'id', name: 'id' }
              ]*/
        });
        });
        </script>
    <script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
    <script>
  
  function showMessage(){
  
  Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'User was deleted!',
                        showConfirmButton: false,
                        timer: 2000
                    });
  }     
function confirmDelete(id){ 
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
     $('#delForm'+id).submit();
  
  }
  
})
}

@if(session()->has('success'))
        
         showMessage();
         

        @endif
  </script>
@stop
