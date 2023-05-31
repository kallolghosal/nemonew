@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">Add Ranks</h2><a href="{{ route('all-ranks') }}" class="btn btn-primary btn-sm float-right">All Ranks</a>
            <p class="mt-4"></p>
            <form action="" method="post">
                <label for="rank">Rank</label>
                <input type="text" name="rank" class="form-control">
                <p class="mt-4"></p>
                <label for="order">Order</label>
                <input type="text" name="order" class="form-control">
                <p class="mt-4"></p>
                <label for="category">Category</label>
                <input type="text" name="category" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Add Rank" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection