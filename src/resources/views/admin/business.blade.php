<x-dashboard>
    <div class="d-flex w-100 justify-content-between align-items-center">
        <h2>All Businesses</h2>

    </div>

    <table class="table my-3">
        <thead>
        <tr>
            <th scope="col">Business ID</th>
            <th scope="col">Name</th>
            <th scope="col">City</th>


        </tr>
        </thead>
        <tbody>

        @foreach($businesses as $business)
            <tr>



                <th scope="row">{{$business->id}}</th>

                <td>{{$business->business_name}}</td>
                <td>{{$business->city}}</td>



            </tr>

        @endforeach

        </tbody>
    </table>




</x-dashboard>
