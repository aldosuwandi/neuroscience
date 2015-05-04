<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    <link href="{{ asset('js/external/google-code-prettify/prettify.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    @include('admin.partials.nav')
    <div class="container-fluid" >
        <div class="row">
            @include('admin.partials.sidebar')
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-top: -30px">
                @yield('content')
            </div>
        </div>
    </div>
<!-- Scripts -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/external/jquery.hotkeys.js')}}"></script>
<script src="{{asset('js/external/google-code-prettify/prettify.js')}}"></script>
<script src="{{asset('js/bootstrap-wysiwyg.min.js')}}"></script>
<script>
    $(function()
    {
        function initToolbarBootstrapBindings()
        {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                        'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                        'Times New Roman', 'Verdana'],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');

            $.each(fonts, function (idx, fontName)
            {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
            });

            $('a[title]').tooltip({container:'body'});

            $('.dropdown-menu input').click(function() {return false;})
                    .change(function ()
                    {
                        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                    }).keydown('esc', function ()
                    {
                        this.value='';$(this).change();
                    });

            $('[data-role=magic-overlay]').each(function ()
            {
                var overlay = $(this), target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });

            if ("onwebkitspeechchange"  in document.createElement("input"))
            {
                var editorOffset = $('#editor').offset();
                //$('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
            }

            else
            {
                $('#voiceBtn').hide();
            }
        };

        function showErrorAlert (reason, detail)
        {
            var msg='';
            if (reason==='unsupported-file-type')
            {
                msg = "Unsupported format " +detail;
            }
            else
            {
                console.log("error uploading file", reason, detail);
            }

            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
        };

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );

        window.prettyPrint && prettyPrint();
    });
</script>
</body>
</html>
