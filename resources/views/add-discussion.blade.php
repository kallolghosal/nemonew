@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">Add Discussions</h2> <a href="{{ route('discussions') }}" class="btn btn-primary btn-sm float-right">All Discussions</a>
            <p class="mt-4"></p>
            <form action="" method="post">
                <label for="company">Name of Company</label>
                <input type="text" name="company" class="form-control">
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="joindt">Date of Joinning</label>
                        <input type="date" name="joindt" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="memid">Member ID</label>
                        <input type="text" name="memid" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="discussion">Discussion</label>
                <textarea name="discussion" id="" cols="30" rows="4" class="form-control"></textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="reason">Reason</label>
                        <input type="text" name="reason" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="reminder">Reminder</label>
                        <input type="text" name="reminder" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rdate">Reminder Dt</label>
                        <input type="date" name="rdate" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Add Discussion" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
