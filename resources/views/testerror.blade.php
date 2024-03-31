@extends('layouts.app')

@section('content')

<form method="POST" action="testerror">
  @csrf <!-- Add this to include CSRF protection -->
  @if ($errors->any())
  <h1>yes</h1>
  @else
  <h1>no</h1>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  
  <input type="text" name="test" value="">
  <input type="submit">
</form>

@endsection
