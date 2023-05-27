<x-dashboard>
    <h2>
        {{isset($dish) ? 'Edit' : 'Add'}} Dish
    </h2>
    {{--    <img src="{{\Illuminate\Support\Facades\Storage::url('food/U3m2S3b90uCUfuAe4OPe5He50cv6DDjJdODqJUmv.png')}}" alt="">--}}
    @if ($errors->any())
        <div class="alert alert-danger my-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="@if(isset($dish))/business/dishes/{{$dish->id}}@else /business/dishes
@endif" method="post" class="w-75" enctype="multipart/form-data" >
        @csrf
        @if(isset($dish))

            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Dish Name</label>
            <input type="text" value="{{isset($dish) ? $dish->name : ''}}"  required class="form-control" name="name"  placeholder="Enter Dish Name">
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Alphabets Only)</div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Dish Description</label>
            <input type="text" value="{{isset($dish) ? $dish->description : ''}}" required class="form-control" name="description"  placeholder="Enter Dish Description">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Dish Cost</label>
            <input value="{{isset($dish) ? $dish->cost : ''}}" type="number" required class="form-control" name="cost"  placeholder="Enter Dish Cost">
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Numbers Only)</div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Image</label>
            <input type="file"  class="form-control" name="image"  >
        </div>

        <div class="mb-3">

            <input type="submit" required class="form-control btn btn-lg btn-dark" name="image"   >
        </div>
    </form>



</x-dashboard>
