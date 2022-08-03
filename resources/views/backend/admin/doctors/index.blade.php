<x-backend.layouts.master>


            
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Doctors List</h3>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    @if(session('message'))
  <p class="alert alert-success">{{ session('message') }}</p>
  @endif
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table table-striped table-sm table-hover table-light" id="table1">
                    <thead class="text-center">
                        <tr>
                            <th>SL</th>
                            <th>Dr Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Department</th>
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    @foreach($doctors as $doctor)
                        <tr>
                           <td>{{$loop->iteration}} </td>
                           <td>{{$doctor->first_name.' '.$doctor->last_name}}</td>
                           <td>{{$doctor->email}}</td>
                           <td>{{$doctor->profile->phone}}</td>
                           <td>{{$doctor->department->name}}</td>
                           <td>
            <a class="btn btn-info btn-sm" href="{{route('doctors.show',['id'=>$doctor->id])}}">Show</a>
            <a class="btn btn-primary btn-sm" href="">Edit</a>
           <form action="" method="post" style="display:inline">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-warning btn-sm">Delete</button>
  
           </form>

                           </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

          
   

</x-backend.layouts.master>