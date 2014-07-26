function EditController($scope){

}



//$('radio[name="text_color"]').click(function(){
//    $('#device').attr('src', $(this).val() + '.png');
//});

$("#image").change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImage( F[i] );
    $('#image-btn').addClass('btn-success');
});

$("#image2").change(function () {
    $('#image2-btn').addClass('btn-success');
});

$("#image3").change(function () {
    $('#image3-btn').addClass('btn-success');
});

$("#image4").change(function () {
    $('#image4-btn').addClass('btn-success');
});

$("#background-choose").change(function () {
    $('#background-button').addClass('btn-success');
    $("#radio_1").prop("checked", true)
    $("#radio_1").prop("checked", true)
});



function readImage(file) {
    var reader = new FileReader();
    var image  = new Image();

    reader.readAsDataURL(file);
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var w = this.width,
                h = this.height,
                t = file.type,                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ~~(file.size/1024) +'KB';
            $('#fade').append('<img src="'+ this.src +'"class="screen"><br>');
        };
        image.onerror= function() {
            alert('Invalid file type: '+ file.type);
        };
    };
}

$(document).ready( function() {
    $.minicolors = {
        defaults: {
            animationSpeed: 50,
            animationEasing: 'swing',
            change: null,
            changeDelay: 0,
            control: 'wheel',
            defaultValue: '#ffffff',
            hide: null,
            hideSpeed: 100,
            inline: false,
            letterCase: 'lowercase',
            opacity: false,
            position: 'bottom left',
            show: null,
            showSpeed: 100,
            theme: 'bootstrap'
        }
    };

    $('#color').minicolors({
        change: function(hex, opacity) {
            $('#wrapper').css('background', hex);
        }
    });
});