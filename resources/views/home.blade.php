@extends('layouts.app')

@section('content')
<section class="container">
  <div class="row justify-content-md-center form-inline">
    <div class="form-group row">
      <label>Difficult</label>
      <select class="fn-difficult form-control mx-sm-3">
        <option value="">Select Difficult...</option>
        <option value="1">Easy</option>
        <option value="2">Medium</option>
        <option value="3">Hard</option>
      </select>
    </div>
  </div>
  @include('components.board')
</section>
@endsection
