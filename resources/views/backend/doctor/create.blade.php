<x-backend.layouts.master>

    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h5>Add Doctor</h5>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">General Departments</li>
                            <li class="breadcrumb-item active" aria-current="page">Add Department</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <form action="{{route('admin.doctor.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card shadow mt-3">
                        @if(Session::has('success'))

                            <div class="w-25 alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Success - </strong>  {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Select Rols</label>
                                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror" id="">
                                            <option>~~~Select Rols~~~</option>
                                            @foreach($rols as $key => $value)
                                                <option value="{{$value->id}}">{{$value->role_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Select Depertment</label>
                                        <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" id="type">
                                            <option>~~~Select Depertment~~~</option>
                                            @foreach($departments as $key => $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Save Doctor Info</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</x-backend.layouts.master>