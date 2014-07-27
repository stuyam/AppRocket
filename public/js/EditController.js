function EditController($scope){

}

$('#background-choose').change(function (e) {
    if(this.disabled) return alert('File upload not supported!');
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++) readImageBackground( F[i] );
});

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
    $("#back-radio1").prop("checked", true);
    $("#back-radio2").prop("checked", false);
});

$('#color').click(function(){
    $("#back-radio1").prop("checked", false);
    $("#back-radio2").prop("checked", true);
});

$('#text_color1').click(function(){
    $('.container').addClass('black');
    $('.container').removeClass('white');
});

$('#text_color2').click(function(){
    $('.container').addClass('white');
    $('.container').removeClass('black');
});

$('#store_url').change(function(){
   if( $(this).val().length > 0 )
   {
       $('#store').attr('src', '/img/appstore.png');
   }
   else
   {
       $('#store').attr('src', '/img/appstore-soon.png');
   }
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

function readImageBackground(file) {
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
            $('#wrapper').css('background','url('+this.src +') no-repeat center center fixed');
            $('#wrapper').css('background-size','cover');
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

            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            var red = parseInt(result[1], 16);
            var green = parseInt(result[2], 16);
            var blue = parseInt(result[3], 16);

            console.log(red+green+blue);

            if ((red*0.299 + green*0.587 + blue*0.114) > 186)
            {
                $("#text_color1").prop("checked", true);
                $("#text_color2").prop("checked", false);
                $('.container').addClass('black');
                $('.container').removeClass('white');
            }
            else
            {
                $("#text_color1").prop("checked", false);
                $("#text_color2").prop("checked", true);
                $('.container').addClass('white');
                $('.container').removeClass('black');
            }
        }
    });
});