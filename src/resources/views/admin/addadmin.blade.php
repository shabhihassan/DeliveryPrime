<x-dashboard>
    <h2>
        Add New Dish
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




    <form action="/admin/register" method="post" class="w-75" >
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input  type="text" id="name" name="name" class="form-control username" placeholder="Enter Name" />
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Only alphabets allowed)</div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" id="username" name="username" class="form-control username" placeholder="Enter Username" />
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Minimum 3 Characters)</div>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
            <input type="password" id="pass" name="password" class="form-control password" placeholder="Enter Password" />
            <div class="invalid-feedback" >Please fill out this field.  <br/> (Minimum 6 Characters)</div>
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="text" class="form-control email" name="email" placeholder="Enter Email" />
            <div class="invalid-feedback" >Please fill out valid Email</div>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
            <input type="text" class="form-control email" name="contact" placeholder="Enter Contact Number" />
            <div class="invalid-feedback" >Please fill out this field.  <br/> (03xxxxxxxxx)</div>
        </div>


        <div class="mb-3">

            <input type="submit" required class="form-control btn btn-lg btn-dark"    >
        </div>
    </form>



</x-dashboard>
