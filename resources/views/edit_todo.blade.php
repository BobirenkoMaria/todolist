@extends('layout.app')

@section('includes')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection

@section('content')
<form method="POST" action="{{ route('edit-check', ['id' => $todo->id]) }}" style="margin: 5%">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Todo Title</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $name }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
