<x-dashboard>

    <div class="d-flex w-100 justify-content-between align-items-center my-3">
        <h3>
            Details for Order: {{$details->id}}
        </h3>
        @if(auth()->user()->role->name == 'Customer')

        @else
        <a href="/orders/status/{{$details->id}}" class="btn btn-lg btn-dark">
            Update Status
        </a>

        @endif
    </div>
    <table class="table table-striped my-3 w-75">

        <tbody>

        <tr>
            <th scope="col">Order Id</th>
            <td class="text-center">

                {{$details->id}}
            </td>
        </tr>

        <tr>
            <th scope="col">Business Name</th>
            <td class="text-center">

                {{$business->business_name}}
            </td>
        </tr>


        <tr>
            <th scope="col">Name</th>
            <td class="text-center">

                {{$customer->name}}
            </td>
        </tr>


        <tr>
            <th scope="col">Email</th>
            <td class="text-center">

                {{$customer->email}}
            </td>
        </tr>


        <tr>
            <th scope="col">Contact</th>
            <td class="text-center">

                {{$customer->contactnumber}}
            </td>
        </tr>
        <tr>
            <th scope="col">Business Name</th>
            <td class="text-center">

                {{$business->city}}
            </td>
        </tr>


        <tr>
            <th scope="col">Address</th>
            <td class="text-center">

                {{$details->address}}
            </td>
        </tr>

        <tr>
            <th scope="col">Placed at:</th>
            <td class="text-center">

                {{$details->placed_at}}
            </td>
        </tr>


        </tbody>
    </table>
    <h3>
        Products
    </h3>
    <table class="table table-striped w-75">
        <thead>
        <tr>
            <th scope="col">Dish Id#</th>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>

        </tr>
        </thead>
        <tbody>

        @foreach($details->dishes as $a)

            <tr>
                <th scope="row">{{$a->id}}</th>
                <td>{{$a->name}}</td>
                <td>{{$a->pivot->quantity}}</td>

            </tr>

        @endforeach
        </tbody>
    </table>



<div class="d-flex justify-content-end w-75">
    <table class="table table-striped my-3 w-25 ">

        <tbody>

        <tr>
            <th scope="col">Subtotal</th>
            <td class="text-center">

                Rs {{$details->subtotal}}
            </td>
        </tr>

        <tr>
            <th scope="col">Total</th>
            <td class="text-center">

                Rs {{$details->total}}
            </td>
        </tr>




        </tbody>
    </table>
</div>
</x-dashboard>
