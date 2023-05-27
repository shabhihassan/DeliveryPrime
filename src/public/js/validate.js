const lenchk = function  (el, length){

    if($(el).val().length < length){

        $(el).next().show()
        return false

    }else{
        $(el).next().hide()
        return true
    }
}

const conchk = function  (el){

    if($(el).val().length !== 11){

        $(el).next().show()
        return false
    }else if ($(el).val().length == 11){
        $(el).next().hide()
        return true
    }
}

const regxcheck = function  (el, re){
    var letters = re;
    if(letters.test($(el).val())){
        $(el).next().hide()
        return true
    }else{
        $(el).next().show()
        return false



    }
}

if ($("input[name='username']").length){
    $("input[name='username']").on('keyup change', function (){
        lenchk($(this), 3)
    } )
}

if ($("input[name='password']").length){
    $("input[name='password']").on('keyup change', function (){
        lenchk($(this), 6)
    } )
}

if ($("input[name='name']").length){
    $("input[name='name']").on('keyup change', function (){
        lenchk($(this), 1)
        regxcheck($(this), /^[a-zA-Z\s]+$/)
    } )
}

if ($("input[name='email']").length){
    $("input[name='email']").on('keyup change', function (){
        lenchk($(this), 1)
        regxcheck($(this), /^\S+@\S+\.\S+$/)
    } )
}

if ($("input[name='business']").length){
    $("input[name='business']").on('keyup change', function (){
        lenchk($(this), 1)
        regxcheck($(this), /^[a-zA-Z\s]+$/)
    } )
}

if ($("input[name='address']").length){
    $("input[name='address']").on('keyup change', function (){
        lenchk($(this), 2)

    } )
}

if ($("input[name='contact']").length){
    $("input[name='contact']").on('keyup change', function (){
        conchk($(this))

    } )
}

const businessregister = function (e){
    console.log(e)
    e.preventDefault();
}

if($('#refrm')){

    $('#refrm').on('submit', function(evt) {

        evt.preventDefault();

        if(lenchk($("input[name='username']"), 3)
            &&
            lenchk($("input[name='password']"), 6)
            &&
            lenchk($("input[name='name']"), 1)
            &&
            regxcheck($("input[name='name']"), /^[a-zA-Z\s]+$/)
            &&
            regxcheck($("input[name='email']"), /^\S+@\S+\.\S+$/)
            &&
            lenchk($("input[name='business']"), 1)
            &&
            regxcheck($("input[name='business']"), /^[a-zA-Z\s]+$/)
            &&

            lenchk($("input[name='address']"), 2)
            &&
            conchk( $("input[name='contact']"))

        ){
            document.querySelector('#refrm').submit()
        }else{
            lenchk($("input[name='username']"), 3)

            lenchk($("input[name='password']"), 6)

            lenchk($("input[name='name']"), 1)

            regxcheck($("input[name='name']"), /^[a-zA-Z\s]+$/)

            regxcheck($("input[name='email']"), /^\S+@\S+\.\S+$/)

            lenchk($("input[name='business']"), 1)

            regxcheck($("input[name='business']"), /^[a-zA-Z\s]+$/)


            lenchk($("input[name='address']"), 2)

            conchk( $("input[name='contact']"))

        }

    })

}





if($('#logfrm')){

    $('#logfrm').on('submit', function(evt) {

        evt.preventDefault();

        if(lenchk($("input[name='username']"), 3)
            &&
            lenchk($("input[name='password']"), 6)


        ){
            document.querySelector('#logfrm').submit()
        }else{
            lenchk($("input[name='username']"), 3)

            lenchk($("input[name='password']"), 6)



        }

    })

}




if($('#cusreg').length){


    document.getElementById('cusreg').addEventListener('submit', function(evt) {

        evt.preventDefault();

        if(lenchk($("input[name='username']"), 3)
            &&
            lenchk($("input[name='password']"), 6)
            &&
            lenchk($("input[name='name']"), 1)
            &&
            regxcheck($("input[name='name']"), /^[a-zA-Z\s]+$/)
            &&
            conchk( $("input[name='contact']"))

        ){
            document.querySelector('#cusreg').submit()
        }else{
            lenchk($("input[name='username']"), 3)

            lenchk($("input[name='password']"), 6)

            lenchk($("input[name='name']"), 1)

            regxcheck($("input[name='name']"), /^[a-zA-Z\s]+$/)

            regxcheck($("input[name='email']"), /^\S+@\S+\.\S+$/)



            conchk( $("input[name='contact']"))

        }

    })

}



