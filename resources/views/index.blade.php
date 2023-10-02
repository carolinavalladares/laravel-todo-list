<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-do List</title>

   <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <header class="header">
        <div class="header-wrapper">
            <h1 class="title">{{$user->name}}'s To-do list</h1>
            <a title="log out" class="logout-btn" href="/logout">Log out</a>
        </div>
    </header>

    <main class="main">
        <div class="main-wrapper">

    
        

            @if ($errors->any())
    
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li class="error">{{$error}}</li>
                @endforeach
            </ul>
                
            @endif
    
            <form class="form" action={{route('handle_create_todo')}} method="POST">
                @csrf
                @method('post')
    
                <input class="todo-input" name="name" type="text" placeholder="Enter task name...">

                <div class="checkbox-container">
                    <label class="label" for="important">Important</label>
                    
                    <input id="important" name="important" type="checkbox" value=true>
                </div>
    
    
           
             <input title="Add" class="submit-btn" type="submit" value="+">
               
            </form>
      
    
    
        <div class="todo-container">       
                <ul class="todo-list">
                  @foreach ($todos as $todo)
                        <li class="todo">
                            <p>{{$todo->name}}</p>

                            <div class="actions">
                                @if ($todo->important == true)
                                    <span class="important-tag">important</span>
                                 @endif

                                 <a title="delete task" class="delete-btn" href="{{route('delete_todo',['todo'=>$todo])}}">Delete</a>
                                
                            </div>
                          
                        </li>
                  @endforeach
                </ul>
        </div>

    </div>
    </main>

    



  
</body>
</html>