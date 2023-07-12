@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline">Add Document</h2><a href="{{ route('documents') }}" class="btn btn-primary btn-sm float-right">All Documents</a>
            <p class="mt-4"></p>
            <form action="{{ route('store-doc') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="memid">Member ID</label>
                        <input type="text" name="memid" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="docdetail">Document Detail</label>
                        <input type="text" name="docdetail" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="docno">Document No</label>
                        <input type="text" name="docno" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="issudt">Issue Date</label>
                        <input type="date" name="issudt" id="" class="form-control">
                    </div>
                </div>
                <p class="mt-4"></p>
                <div class="row">
                    <div class="col">
                        <label for="exprdt">Expiary Date</label>
                        <input type="date" name="exprdt" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="issplace">Place of Issue</label>
                        <input type="text" name="issplace" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="fileup">Upload</label>
                        <input type="file" name="fileup" id="" class="form-control">
                    </div>
                    <div class="col"></div>
                </div>
                <p class="mt-4"></p>
                <input type="submit" name="submit" value="Add Document" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection