@extends('app')

@section('content')
    <style>
        .highlight { background-color: yellow }
    </style>
    <div class="row">

        <!-- Blog Entries Column -->
        <div id="main">
            @yield('entries')
        </div>

        <!-- Blog Sidebar Widgets Column -->
        @include('partials.sidebar')
    </div>
@endsection

@section('script')
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{asset('js/highlight-5.js')}}"></script>
    <script>
        $.fn.extend({
            treed: function (o) {

                var openedClass = 'glyphicon-minus-sign';
                var closedClass = 'glyphicon-plus-sign';

                if (typeof o != 'undefined'){
                    if (typeof o.openedClass != 'undefined'){
                        openedClass = o.openedClass;
                    }
                    if (typeof o.closedClass != 'undefined'){
                        closedClass = o.closedClass;
                    }
                };

                //initialize each of the top levels
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this); //li with children ul
                    branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                    branch.addClass('branch');
                    branch.on('click', function (e) {
                        if (this == e.target) {
                            var icon = $(this).children('i:first');
                            icon.toggleClass(openedClass + " " + closedClass);
                            $(this).children().children().toggle();
                        }
                    });
                    branch.children().children().toggle();
                });
                //fire event from the dynamically added icon
                tree.find('.branch .indicator').each(function(){

                    $(this).on('click', function () {
                        $(this).closest('li').click();
                    });
                });
                //fire event to open branch if the li contains a button instead of text
                tree.find('.branch>button').each(function () {
                    $(this).on('click', function (e) {
                        $(this).closest('li').click();
                        e.preventDefault();
                    });
                });
            }
        });

        //Initialization of treeviews
        $(document).ready(function() {
            $('#category_tree').treed();
            $('#category_tree').show();
            @if (!is_null($categoryId))
            $( "#category_tree li" ).each(function(index) {
                if ($(this).val() == {{$categoryId}}) {
                    $(this).click();
                }
            });
            @endif
        });

        @if (isset($text))
            $('#main').highlight('{{$text}}');
        @endif

    </script>
@endsection
