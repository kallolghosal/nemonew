@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline">Edit Discussions</h2> <a href="{{ route('discussions') }}" class="btn btn-primary btn-sm float-right">All Discussions</a>
            <p class="mt-4"></p>
            @foreach($discussions as $dscn)
            <form action="" method="post">
                <label for="company">Name of Company</label>
                <input type="text" name="company" value="{{ $dscn->companyname }}" class="form-control">
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="joindt">Date of Joinning</label>
                        <input type="date" name="joindt" value="{{ $dscn->join_dt }}" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="memid">Member ID</label>
                        <input type="text" name="memid" value="{{ $dscn->mem_id }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <label for="discussion">Discussion</label>
                <textarea name="discussion" id="" cols="30" rows="4" class="form-control">{{ $dscn->discussion }}</textarea>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="reason">Reason</label>
                        <input type="text" name="reason" value="{{ $dscn->reason }}" class="form-control" id="">
                    </div>
                    <div class="col">
                        <label for="reminder">Reminder</label>
                        <input type="text" name="reminder" value="{{ $dscn->reminder }}" class="form-control">
                    </div>
                    <div class="col">
                        <label for="rdate">Reminder Dt</label>
                        <input type="date" name="rdate" value="{{ $dscn->r_date }}" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" value="Save Discussion" name="submit" class="btn btn-primary">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
