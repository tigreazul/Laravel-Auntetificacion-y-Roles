$(document).on('change','#departamentos',function(e){
    e.preventDefault();
    let code = $(this).find(':selected').data('id');
    console.log(code); 
    // return false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url     : app.base+'/provincia/'+code,
        type    : 'GET',
        dataType: 'JSON',
        data    : {},
        success : function(data){
            $("#provincias").removeAttr('disabled');
            $('#provincias').html("");
            let vhtml = "";
            $( data.data ).each(function( index, element ){
                vhtml += '<option value="'+element.provID+'" data-id="'+element.provID+'">'+element.descripcion+'</option>'
            });
            $('#provincias').html(vhtml);
            $('#distritos').html('<option value="">[SELECCIONE]</option>');
        },
        error   : function(jqxhr, textStatus, error){
            console.log(jqxhr.responseText);
        }
    });
});

$(document).on('change','#provincias',function(e){
    e.preventDefault();
    let code = $(this).find(':selected').data('id');
    console.log(code); 
    // return false;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url     : app.base+'/distrito/'+code,
        type    : 'GET',
        dataType: 'JSON',
        data    : {},
        success : function(data){
            $("#distritos").removeAttr('disabled');
            $('#distritos').html("");
            let vhtml = "";
            $( data.data ).each(function( index, element ){
                vhtml += '<option value="'+element.distID+'" data-id="'+element.distID+'">'+element.descripcion+'</option>'
            });
            $('#distritos').html(vhtml);
        },
        error   : function(jqxhr, textStatus, error){
            console.log(jqxhr.responseText);
        }
    });
});


// $(document).on('change','"#imagen_titular"',function() {
//     var file = this.files[0];
//     console.log(file);
//     return false
//     var imagefile = file.type;
//     var match= ["image/jpeg","image/png","image/jpg"];
//     if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
//         alert('Please select a valid image file (JPEG/JPG/PNG).');
//         $("#imagen_titular").val('');
//         return false;
//     }
// });

function mostrar(){
    var file = document.getElementById("aaa").files[0];
    console.log(file);
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
    if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
        alert('Please select a valid image file (JPEG/JPG/PNG).');
        $("#imagen_preview").val('');
        return false;
    }else{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var formData = new FormData();
        formData.append('section', 'general');
        formData.append('foto', $('#aaa')[0].files[0]);

        $.ajax({
            url        : app.base+'/image/',
            type       : 'POST',
            dataType   : 'JSON', 
            contentType: false,
            processData: false,
            data       : formData,
            success    :function(data)
            {
                if(data.status== true){
                    $("#imagen_preview").html('');
                    $("#imagen_preview").attr('src',data.path);
                }else{
                    alert("NO TIENE EL TAMAÑO VALIDO");
                }
            },
            error       :function(data)
            {
                console.log(data);
            }
        })

        // var reader = new FileReader();
        // if (file) {
        //     reader.readAsDataURL(file);
        //     reader.onloadend = function () {
        //         console.log(reader.result);
        //         $("#imagen_preview").html('');
        //         $("#imagen_preview").css('background',reader.result);
        //         // document.getElementById("imagen_preview").src = reader.result;
        //     }
        // }
    }
    // $("#imagen_preview").val('');

    // return false;


}