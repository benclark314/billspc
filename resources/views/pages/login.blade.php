@extends('layouts.app')
@section('title', 'Contact Us')


@section('content')
<div class="container">
<div class="row">
  <div class="col-sm-6 offset-sm-3">
    <h1>Contact Us</h1>
    <hr>
    <form action="#" method="POST">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control">

      <label for="email" class="mt-3">eMail</label>
      <input type="email" name="email" class="form-control">

      <label for="message" class="mt-3">Message</label>
      <textarea name="message" cols="30" rows="10" class="form-control"></textarea>

      <button type="submit" class="btn btn-success btn-block my-3">Send Email</button>

    </form>
  </div>
</div>
</div>
@endsection
