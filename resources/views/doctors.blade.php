<x-frontend.layouts.master>
    <div class="container mt-5 mb-5">

        <div class="row">
            @foreach($doctorslist as $doctor)
            <div class="card mx-1 " style="width: 18rem;">
                <img src="{{asset('storage/products/'.$doctor->profile->image)}}" class="card-img-top" alt="..." height="200px">
                <div class="card-body">
                    <h5 class="card-title text-info text-center">{{$doctor->first_name.' '.$doctor->last_name}}</h5>
                    <h5 class="card-title text-primary "> Specialities: {{$doctor->department->name}}</h5>
                    <h5 class="card-title "> Branch: {{$doctor->profile->state}}</h5>
                    <h5 class="card-title "> Practice Days: </h5>
                    <p class="card-text text-success ">Saturday, Sunday, Monday, Tuestday, Wednesday, Thursday, Friday</p>
                   
                </div>
                <div class="text-center mb-2">
                <a href="#appointment" class="btn btn-primary btn-sm ">Get Appointment</a>
                </div>
            </div>
            @endforeach
        </div>

        
           
        

    </div>
    <div class="row justify-content-end">
    <div class=" col-2">
    {{$doctorslist->links()}}
    </div>
    </div>
   
   
</x-frontend.layouts.master>