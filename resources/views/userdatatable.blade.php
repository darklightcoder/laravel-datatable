<!DOCTYPE html>

<html lang="en">
<head>
<title>Laravel 11 DataTables Example - Tutsmake.com</title>

 <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="js/bootstrap.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="js/jquery.js"></script>

<link  href="css/jquery.dataTables.min.css" rel="stylesheet">

<script src="js/jquery.dataTables.min.js"></script>

</head>
      <body>
       

         <div class="container">
               <h2>Laravel 11 DataTables Example - Tutsmake.com</h2>
            <table class="table table-bordered" id="y_dataTables">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Created at</th>
                  </tr>
               </thead>
            </table>
         </div>
   <script>
   $(document).ready( function () {
    $('#y_dataTables').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('list') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' }
                 ]
        });
     });
  </script>
   </body>
</html>
