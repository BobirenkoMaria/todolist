@extends('layout.app')

@section('includes')
@vite(['resources/js/app.js'])
@endsection

@section('content')
<form id="myDIV" class="header" method="post" action="/added">
  @csrf
    @if ($errors->any())
        <div class="alert alert-primary" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

    <h2>My To Do List</h2>
    <input type="text" id="myInput" placeholder="Title..." name="name">
    <button type="submit" class="addBtn">Add</button>
  </form>
  
  <ul id="myUL" class="ul-class">
    @foreach ($todos as $todo)
        <li>
          <div class="line-edit left">
            <div class="element">{{$todo->name}}</div>
            <div class="element">{{$todo->tag_id}}</div>
            <div class="element">{{$todo->deadline}}</div>
          </div>
          
        <div class="line_edit">
            <div class="element">{{$todo->reminder}}</div>
        </div>

        <div class="line_edit">
          @if ($todo->status == 0)
            <a style="color: red" href="{{ route('change-status', ["id" => $todo->id]) }}"><i class="fa-solid fa-check"></i></a>  
          @else
            <a style="color: green" href="{{ route('change-status', ["id" => $todo->id]) }}"><i class="fa-solid fa-check"></i></a>
          @endif
          
          <a href="{{ route('edit', ["id" => $todo->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
          <a href="{{route('delete', ["id" => $todo->id])}}"><i class="fa-solid fa-trash"></i></a>
        </div>
      
    </li>
    @endforeach
  </ul>
@endsection