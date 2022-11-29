<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @include('layout.partials.head')
    <!-- Bootstrap CSS only -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <style>
        .blink {
            animation: blink 1s step-start infinite;
        }

        @keyframes blink {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

    </style>
</head>


<body>
    <!-- Page Wrapper -->
    {{-- @include('layout.partials.header') --}}
    {{-- <div class="card">
        @include('layout.partials.flash')
        <!-- Page Content -->
        <!-- Page Header -->
        <div class="card-header">
            <div class="col">
                <h3 class="page-title">{{ $title }}</h3>

            </div>
        </div>
        <div class="card-body">
            <span class="text-danger blink">{{ $text }}</span>
        </div>
    </div> --}}
    <main role="main" class="container">

        <div class="starter-template">
          <h1>Bootstrap starter template</h1>
          <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
        </div>
  
      </main>
    @include('layout.partials.footer-scripts')
</body>

</html>
