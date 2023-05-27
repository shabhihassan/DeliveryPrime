<x-dashboard>
    <h2>
        Update Status for Bill {{$bill['id']}}

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



    <form action="/orders/statusupdate/{{$bill['id']}}" method="post" class="w-75" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Update Status </label>
            <input type="text" required class="form-control" name="name"  placeholder="Enter New Status">
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Only alphabets allowed)</div>
        </div>


        <div class="mb-3">

            <input type="submit" required class="form-control btn btn-lg btn-dark"    >
        </div>
    </form>



</x-dashboard>
