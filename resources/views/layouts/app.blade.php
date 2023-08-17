<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>laravel 10 Task List App</title>
    <style type="text/tailwindcss">
        .success-div{
            @apply relative text-green-700 bg-green-100 border-green-500 px-4 py-3 text-lg rounded border
        }
        .error-message{
            @apply text-red-500 text-sm
        }
        button,.btn{
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 mb-2 mt-2
        }
        p{
            @apply mb-2
        }
        .link{
            @apply text-slate-700 font-medium
        }
        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input,textarea{
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none 
        }
    </style>
   @yield('style')
</head>
<body class="container mt-10 mb-10 mx-auto max-w-lg">

    <h1 class="text-3xl mb-4 font-bold">@yield('title')</h1>

    
    
    <div x-data="{flash:true}">
        @if (session()->has('success'))
    <div x-show="flash" class="mb-10 success-div" role="alert"> 
        <strong class="text-bold">Success!</strong>
        
     <p>{{session('success')}}</p>

     <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
          stroke-width="1.5" @click="flash = false"
          stroke="currentColor" class="h-6 w-6 cursor-pointer">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </span>
    </div>
    @endif

        @yield('content')
    </div>

</body>
</html>