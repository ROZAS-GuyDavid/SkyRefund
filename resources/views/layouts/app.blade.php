<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
        
        <style>
            section{
                padding-top: 100px;
            }
            .form-section{
                display:none;
            }
            .form-section.current{
                display: inherit;
            }
            .btn-info, .btn-success{
                margin-top: 10px;
            }
            .parsley-errors-list{
                margin: 2px 0 3px;
                padding: 0;
                list-style-type: none;
                color: red;
            }

        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <main class="py-4">
                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            $(function(){
                var $sections = $('.form-section');
    
                function navigateTo(index){
                    $sections.removeClass('current').eq(index).addClass('current');
                    $('.form-navigation .previous').toggle(index>0);
                    var atTheEnd = index >= $sections.length - 1;
                    $('.form-navigation .next').toggle(!atTheEnd);
                    $('.form-navigation [type=submit]').toggle(atTheEnd);
                }
    
                function curIndex()
                {
                    return $sections.index($sections.filter('.current'));
                }
    
                $('.form-navigation .previous').click(function(){
                    navigateTo(curIndex()-1);
                });
    
                $('.form-navigation .next').click(function(){
                    $('.refund-form').parsley().whenValidate({
                        group: 'block-' + curIndex()
                    }).done(function(){
                        navigateTo(curIndex()+1);
                    });
                });
    
                $sections.each(function(index, sections){
                    $(sections).find(':input').attr('data-parsley-group', 'block-'+index);
                });
    
                navigateTo(0);
            });
        </script>
    </body>
</html>
