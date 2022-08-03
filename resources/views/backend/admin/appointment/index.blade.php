<x-backend.layouts.master>

    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Appointment List</h3>

                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                            <li class="breadcrumb-item active" aria-current="page">Appointment List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if(session('message'))
        <p class="alert alert-secondary">{{ session('message') }}</p>
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
                                <th>Patients Name</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Doctor Name</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">

                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{$loop->iteration}} </td>
                                <td>{{$appointment->patients_name}}</td>
                                <td>{{$appointment->phone}}</td>
                                <td>{{$appointment->appointment_date}}</td>
                                <td>{{$appointment->user->first_name.' '.$appointment->user->last_name}}</td>
                                <td>{{$appointment->status}}</td>
                            
                                <td>
                                    @if(!($appointment->approval_status))
                                    <form action="{{route('update.approval.status',['appointment'=>$appointment->id])}}" method="post" style="display:inline">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-info btn-sm">Approve</button>

                                    </form>
                                    @endif
                                    @if(($appointment->approval_status))
                                      <a class="btn btn-secondary btn-sm disabled">Approved</a>
                                    @endif
                                    <a class="btn btn-primary btn-sm" href="">Modify</a>
                                    <form action="" method="post" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning btn-sm">Cancel</button>

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