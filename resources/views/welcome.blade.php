<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    @vite('resources/css/app.css')
  </head>
    <title>Document</title>
</head>
<body>
    
    @auth
    {{-- if user is loged in then this will show here --}}
    <h1 class="text-3xl mb-20 text-center mt-5 font-bold">Congratulation you are loged in</h1>
    <form action="/logout" method="POST">
        @csrf
        <button id="facebook" class="bg-white  sticky duration-500 border-2 border-blue-600 fixed   transform hover:-translate-y-3 ml-2 p-1 text-2xl rounded-full hover:bg-blue-600 hover:text-white text-blue-600 ">Log out</button>
    </form>

    <div class="grid">
        <h2 class="text-3xl mb-20 text-center mt-5 font-bold">Create n New Post</h2>
        <form action="/create-post" method="post">
         @csrf 
         <input type="text" name="title" placeholder="post title">
         <textarea name="body" id="" cols="30" rows="10" placeholder="body content..."></textarea>
         <button class="bg-white  sticky duration-500 border-2 border-blue-600 fixed   transform hover:-translate-y-3 ml-2 p-1 text-2xl rounded-full hover:bg-blue-600 hover:text-white text-blue-600 ">Save Post</button>
        </form>
    </div>

    
    <div class="">
<h2 class="text-3xl mb-20 text-center mt-5 font-bold">All Posts</h2>
@foreach($posts as $post)
<div class="grid grid-cols-4 gap-4 py-3">
<h3>{{$post['title']}} by {{$post->myuser->name}}</h3>
{{$post['body']}}
<p><a href="/edit-post/{{$post->id}}"><button class="bg-white  sticky duration-500 border-2 border-blue-600 fixed   transform hover:-translate-y-3 ml-2 p-1 text-2xl rounded-full hover:bg-blue-600 hover:text-white text-blue-600 ">Edit</button></a></p>
<form action="/delete-post/{{$post->id}}" method="POST">
@csrf
@method('DELETE')
<button class="bg-white  sticky duration-500 border-2 border-blue-600 fixed   transform hover:-translate-y-3 ml-2 p-1 text-2xl rounded-full hover:bg-blue-600 hover:text-white text-blue-600 ">Delete</button>
</form>
</div>

    @endforeach
</div>

    @else
      {{-- if user is not loged in then this will show here --}}
      <div
      class="justify-center p-6 mx-10 my-10  bg-gray-100 border-2 border-gray-300 rounded-xl  bg-white rounded-lg items-center"
    >
        <h2 class="text-6xl mb-20">Registration</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password"> 
            <button type="submit" class="bg-white  sticky duration-500 border-2 border-blue-600 fixed   transform hover:-translate-y-3 ml-2 p-1 text-2xl rounded-full hover:bg-blue-600 hover:text-white text-blue-600 ">Register</button>
        </form>
            </div>



            {{-- for loged in  --}}

            <div
            class="justify-center p-6 mx-10 my-10  bg-gray-100 border-2 border-gray-300 rounded-xl  bg-white rounded-lg items-center"
          >
                <h2 class="text-6xl mb-20">Log In</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input type="text" placeholder="Name" name="loginname">
                    <input type="password" placeholder="Password" name="loginpassword"> 
                    <button type="submit" class="bg-white  sticky duration-500 border-2 border-blue-600 fixed   transform hover:-translate-y-3 ml-2 p-1 text-2xl rounded-full hover:bg-blue-600 hover:text-white text-blue-600 ">Log In</button>
                </form>
                 </div>
    @endauth
  
</body>
</html>