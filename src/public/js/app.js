// document.addEventListener("scroll", (e) => {
//
//
//     const searchBar = document.querySelector("#navSearchBar");
//     if (window.window.pageYOffset > 327 && !searchBar.classList.contains("d-md-block")) {
//         searchBar.classList.toggle("d-md-block");
//     } else if (window.window.pageYOffset < 327 && searchBar.classList.contains("d-md-block")) {
//         searchBar.classList.toggle("d-md-block");
//     }
// });

if($('#herosearch').length){
$('#herosearchbutton').on('click', function (){
    var hrvl = $('#herosearch').find(":selected").text()
    if(hrvl == 'Islamabad'){
        window.location.replace("/products/Islamabad");
    }else if(hrvl == 'Karachi'){
        window.location.replace("/products/Karachi");
    }
    else if(hrvl == 'Lahore'){
        window.location.replace("/products/Lahore");
    }
    else{
        swal("Please Select City to Continue");
    }
})
}

const validate = (txt, rgx, field) => {
    var regx = rgx;

    if (regx.test(txt)) {
        field.style.border = "2px solid green";
        return true;
    } else {
        field.style.border = "2px solid red";
        return false;
    }
};


const cartbtnhandle = () => {
    document.getElementById('cart').classList.toggle('dn')
    let cc = document.getElementById('vc')
    if (cc.innerText == 'View Cart') {
        cc.innerText = 'Close Cart'
    } else {
        cc.innerText = 'View Cart'
    }
}
// var x = document.getElementById("locationtop");
//
// document.querySelector(".locicn").addEventListener("click", () => {
//     navigator.geolocation ? navigator.geolocation.getCurrentPosition(writepos) : (x.innerHTML = "Geolocation is not supported by this browser.");
// });


const writepos = (position) => {
    x.value = `${position.coords.latitude}, ${position.coords.longitude}`;
}


const categories = async function() {

    let response = await fetch(`${window.location.origin}/api/business/categories`, {

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    if (response.status === 200) {
        let data = await response.json();
        console.log(data)
        data['categories'].forEach((a) => {
            $('#catsele').append(`<option value="${a['id']}">
                                       ${a['name']}
                                  </option>`)
        })


    } else {
        console.log(response.status)
    }

}

if ($('#catsele').length) {
    categories()
}


const addtocart = (el) => {
    var qty = $(el).parent().children('input').val();
    var title = $(el).parent().children('h6').text()
    var id = parseInt($(el).parent().children('h6').attr("id"))
    var price = parseInt($(el).parent().children('h5').children('.price').text())
    var cart = window.localStorage.getItem('cart');
    var businessid = parseInt($(el).attr("class"))
    console.log(businessid)
    cartItem = {
        'id': id,
        'name': title.trim(),
        'price': price,
        'qty': qty
    }
    busid = window.localStorage.getItem('businessId')
    if (busid) {
        if (parseInt(busid) !== businessid) {
            localStorage.clear();
        }
    } else {
        window.localStorage.setItem('businessId', businessid)
    }
    if (cart === null) {
        window.localStorage.setItem('cart', JSON.stringify([cartItem]));
    } else {
        const getCurrentCart = window.localStorage.getItem('cart');
        const currentCart = JSON.parse(getCurrentCart);

        currentCart.push(cartItem);

        window.localStorage.setItem('cart', JSON.stringify(currentCart));
    }
    displaycart()
}


const displaycart = () => {
    const getCurrentCart = window.localStorage.getItem('cart');
    const currentCart = JSON.parse(getCurrentCart);
    $('#subtotal').text(``)
    $('#total').text(``)
    let price = 0
    $('#clist').html('')
    currentCart.forEach((a) => {
        var itm = `
                  <div class="row my-1 cartItem" >
                <div class=" d-flex align-items-center justify-content-center flex-column">
                    <h5>
                        ${a['name']}
                      <i class="fa-solid fa-x text-danger ps-3" onclick="delitem(${a['id']})"></i>
                    </h5>

                    <h6>
                         Qty: (${a['qty']} X)
                    </h6>
                    <h6>
                        Cost: Rs ${a['price']}
                    </h6>

                </div>

            </div>
            <hr>
        `

        price = price + (parseInt(a['price']) *  parseInt(a['qty']) )
        $('#clist').append($.parseHTML(itm))
    })

    var gst = price * 0.17
    $('#subtotal').text(`Subtotal: Rs ${price}`)
    $('#total').text(`Total: Rs ${parseInt(price + gst)} \n Including GST`)

}


const delitem = (id) => {
    const getCurrentCart = window.localStorage.getItem('cart');
    const currentCart = JSON.parse(getCurrentCart);

    var updated = currentCart.filter(data => data.id != id);
    window.localStorage.setItem('cart', JSON.stringify(updated));
    displaycart()


}


const storageclear = () => {
    localStorage.clear();
    displaycart()
}
if ($('#cart').length) {
    if (localStorage.getItem('cart')) {
        displaycart()
    }
}


const checkoutcart = () => {
    const getCurrentCart = window.localStorage.getItem('cart');
    const currentCart = JSON.parse(getCurrentCart);
    if (getCurrentCart === null) {
        window.location.href = '/';

    }
    $('#fmcrd').val(getCurrentCart)
    $('.totalitems').text(currentCart.length)
    $('#subtotal').text(``)
    $('#total').text(``)
    let price = 0
    $('#itl').html('')
    currentCart.forEach((a) => {
        var itm = `
                  <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0">
                                ${a['name']}
</h6>
                                <small class="text-muted">
                                 Qty: (${a['qty']} X)
</small>
                            </div>
                            <span class="text-muted">Rs ${a['price']}</span>
                        </li>
        `

        price = price + parseInt(a['price'])
        $('#itl').append($.parseHTML(itm))
    })

    var gst = price * 0.17
    $('#itl').append($.parseHTML(`        <li class="list-group-item d-flex justify-content-between">
                            <span>Subtotal (RS)</span>
                            <strong>${price}</strong>


                        </li>`))

    $('#itl').append($.parseHTML(`       <li class="list-group-item d-flex justify-content-between">
                            <span>Total (RS) </span>
                            <strong>${price + gst}</strong>


                        </li>`))
    $('#itl').append($.parseHTML(`       <li class="list-group-item d-flex justify-content-between">
                            <span>(Including Taxes)</span>



                        </li>`))




}


if ($('#checkoutpg').length) {
    checkoutcart()
}


if($('#chbid').length){

    $('#chbid').val(window.localStorage.getItem('businessId'));
}
