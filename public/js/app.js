$(document).ready(function(){

    $('#dataStats').DataTable();
    $('#example').DataTable();

    $('#content-idea input[name="rating"]').click(function () {
        $('#infos').modal('show')
        console.log('coucou')

    });

    $('.modal').on('shown.bs.modal',function(){
        $('.modal #email').focus()
        var nbstar = $('input[name="rating"]:checked').attr('id').replace('idea','')

        //$(this).find('input[name="rating"][value="'+nbstar+'"]').attr('id')
        $(this).find('label[for="modal-confirmation'+nbstar+'"]').trigger( "click" )
    });

    $('#close').click(function(){
        var test=$('#email').val();
        $('#email').val("");
        $('#content-modal-confirmation input[name="rating"]').attr('checked', false);

    });



    $('#save').click(function(){
        var rate=$('#content-modal-confirmation input[name="rating"]:checked').val()
        var url=$('#rating-form').attr('action')
        console.log(url)
        var email=$('#email').val()
        email = email.toLowerCase()
        var uniqueId= $('#cle-idee').val()
        console.log(uniqueId)
        console.log(rate)
        if (verif(email)){
            $('.modal #email').addClass("black");
            addRate( rate,url,email,uniqueId);
        }
        else {
            //$('.modal #email').style.backgroundColor = "#ff1c17";
            $('.modal #email').addClass("red");
            $('.modal #email').focus();


        }

    });


    /**
     * ajout de la note en base avec id idee et email
     **/
    function addRate(rate, url, email, uniqueId)
    {

        $.ajax({
            url: url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                email: email,
                score : rate,
                uniqueId : uniqueId
            },
            type: 'POST',
            datatype: 'JSON',
            success: function (resp) {
                $('#email').val("");
                $('#content-modal-confirmation input[name="rating"]').attr('checked', false);
                $('#infos').modal('hide');

            },
            error: function (data) {
                console.log(data.responseText);
                var obj = JSON.parse(data.responseText);
                if(obj.email == "The email format is invalid."){
                    alert("L'e-mail saisi n'est pas valide");
                }
                if (obj.uniqueId == "validation.voteunique"){
                    alert("on ne peut voter qu'une fois par idée");
                }
                console.log(obj.uniqueId);
                var rate=$('#content-idea input[name="rating"]:checked').val();
                $('#content-idea input[name="rating"]:checked').val('false');
                $('#content-idea input[name="rating"]').attr('checked', false);
                $('#email').val("");
                $('#infos').modal('hide');
                //console.log(rate);
                //alert("On ne peut voter qu'une fois");
            }
        });
    }

    function verif(champ)
    {   console.log(champ);
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if(!regex.test(champ))
        {
            //surligne(champ, true);

            return false;
        }
        else
        {
            //surligne(champ, false);
            return true;
        }
    }
});