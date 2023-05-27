<x-dashboard>
    <h2>
        {{isset($category) ? 'Edit' : 'Add'}} Category
    </h2>


    @if ($errors->any())
        <div class="alert alert-danger my-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="@if(isset($category))/admin/categories/{{$category->id}}@else /admin/categories
@endif"  class="w-75" >
        @csrf

@if(isset($category))

    @method('PUT')
        @else
    @method('POST')
        @endif
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <input type="text" value="{{isset($category) ? $category->name : ''}}" required class="form-control" name="name"  placeholder="Enter Dish Name">
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Only alphabets allowed)</div>
        </div>




        <div class="mb-3">

            <input type="submit" required class="form-control btn btn-lg btn-dark" name="image"   >
        </div>
    </form>



</x-dashboard>
