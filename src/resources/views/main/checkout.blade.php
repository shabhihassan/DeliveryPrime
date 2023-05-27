<x-layout>
    <div class="container"  class="my-5" id="checkoutpg"  style="margin-top: 10%;">
        <main>

            @if ($errors->any())
                <div class="alert alert-danger my-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="py-5 text-center my-5">

                <h2>Checkout </h2>

            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill totalitems">3</span>
                    </h4>
                    <ul class="list-group mb-3" id="itl">



                    </ul>


                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" disabled value="{{auth()->user()->name}}" required>

                            </div>


                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" disabled value="{{auth()->user()->username}}">

                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                                <input type="email" class="form-control"  disabled value="{{auth()->user()->email}}"  >

                            </div>
                            <form class="needs-validation" method="post" novalidate>
                                @csrf
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>




                            <div class="col-md-4">
                                <label for="state" class="form-label">City</label>
                                <select class="form-select" id="state" name="city"  required>
                                    <option value="">Choose...</option>
                                    <option selected>Islamabad</option>
                                    <option>Karachi</option>
                                    <option>Lahore</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>


                        </div>
         <hr class="my-4">


                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" value="COD" type="radio" class="form-check-input" checked required>
                                <label class="form-check-label" for="credit">Cash on Delivery</label>
                            </div>

                        </div>


                        <hr class="my-4">

                    <input type="text"  hidden  name="cart[]"  id="fmcrd">
                    <input type="number"  hidden value="1" id="chbid" name="businessid" >

                        <button class="w-100 btn btn-dark btn-lg my-4" type="submit">Confirm Order</button>
                    </form>
                </div>
            </div>
        </main>


    </div>

</x-layout>
