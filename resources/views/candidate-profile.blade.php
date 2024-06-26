@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="display:inline;">Profile of {{ $result->fname }}</h2><a href="{{ route('edit-candidate', $result->mem_id) }}" class="btn btn-primary btn-sm float-right">Edit Profile</a>

            <div id="content" class="mt-4">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#red" class="nav-link" data-toggle="tab">Personal</a></li>
                    <li><a href="#discussion" class="nav-link" data-toggle="tab">Discussion</a></li>
                    <li><a href="#contract" class="nav-link" data-toggle="tab">Contract</a></li>
                    <li><a href="#document" class="nav-link" data-toggle="tab">Document</a></li>
                    <li><a href="#bank" class="nav-link" data-toggle="tab">Bank</a></li>
                    <li><a href="#travel" class="nav-link" data-toggle="tab">Travel</a></li>
                    <li><a href="#medical" class="nav-link" data-toggle="tab">Medicals</a></li>
                    <li><a href="#nkd" class="nav-link" data-toggle="tab">NKD</a></li>
                </ul>
            </div>
            <div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="red">
                    <table class="table table-striped mt-4">
                        <tbody>
                            @foreach(json_decode($result) as $k => $v)
                                <tr>
                                    <td>{{ $k }}</td>
                                    <td>{{ $v }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="discussion">
                    <p class="mt-4"></p>
                    <h4>Discussions</h4>
                    <p class="mt-4"></p>
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="avldt">Available Dt</label>
                                <input type="date" name="avldt" class="form-control" id="">
                            </div>
                            <div class="col">
                                <label for="lastsal">Last Salary</label>
                                <input type="text" name="lastsal" class="form-control" id="">
                            </div>
                            <div class="col">
                                <label for="lastcomp">Last Company</label>
                                <input type="text" name="lastcomp" class="form-control" id="">
                            </div>
                            <div class="col">
                                <label for="rank">Rank</label>
                                <select name="rank" id="" class="form-control">
                                    @foreach($ranks as $rank)
                                    <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="mt-4"></p>
                        <div class="row">
                            <div class="col">
                                <label for="vsltype">Vessel Type</label>
                                <select name="vsltype" id="" class="form-control">
                                    <option value="">Select Vessel Type</option>
                                    @foreach($vsltype as $vslt)
                                    <option value="{{ $vslt->vessel }}">{{ $vslt->vessel }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="status">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                        <p class="mt-4"></p>
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </form>
                    @if($discus->isEmpty())
                    <p>No records found</p>
                    @else
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <td>Mem ID</td>
                                <td>Company</td>
                                <td>Join Dt</td>
                                <td>Discussion</td>
                                <td>Posted By</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discus as $dscus)
                            <tr>
                                <td>{{ $dscus->mem_id }}</td>
                                <td>{{ $dscus->companyname }}</td>
                                <td>{{ $dscus->join_date }}</td>
                                <td>{{ $dscus->discussion }}</td>
                                <td>{{ $dscus->post_by }}</td>
                                <td><a href="{{ route('show-discussion', $dscus->disc_id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-discussion', $dscus->disc_id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-discussion', $dscus->disc_id) }}" onclick="return confirm('Are you sure you want to delete this discussion?');"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="tab-pane" id="contract">
                    <p class="mt-4"></p>
                    <h4 style="display:inline">Contracts</h4><button class="btn btn-primary btn-sm ml-4" id="frmbtn">Add/Hide Contract</button>
                    <p class="mt-4"></p>
                    <form action="{{ route('store-contract') }}" method="post" enctype="multipart/form-data" id="contractfrm">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="rank">Rank</label>
                                <select name="rank" id="" class="form-control">
                                    <option value="">Select Rank</option>
                                    @foreach($ranks as $rank)
                                    <option value="{{ $rank->rank }}">{{ $rank->rank }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="company">Company</label>
                                <select name="company" id="" class="form-control">
                                    <option value="">Select Company</option>
                                    @foreach($comps as $comp)
                                    <option value="{{ $comp->company_id }}">{{ $comp->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="vessel">Vessel</label>
                                <select name="vessel" id="" class="form-control">
                                    <option value="">Select Vessel</option>
                                    @foreach($vessels as $vessel)
                                    <option value="{{ $vessel->id }}">{{ $vessel->vsl_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="vsltype">Vessel Type</label>
                                <select name="vsltype" id="" class="form-control">
                                    <option value="">Select Vessel Type</option>
                                    @foreach($vsltype as $vslt)
                                    <option value="{{ $vslt->vessel }}">{{ $vslt->vessel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p class="mt-4"></p>
                        <div class="row">
                            <div class="col">
                                <label for="portsn">Sign On Port</label>
                                <select name="portsn" id="" class="form-control">
                                    <option value="">Select Port</option>
                                    @foreach($ports as $port)
                                    <option value="{{ $port->id }}">{{ $port->port }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="signdt">Sign Date</label>
                                <input type="date" name="signdt" class="form-control" id="">
                            </div>
                            <div class="col">
                                <label for="wagst">Wages Start</label>
                                <input type="date" name="wagst" class="form-control" id="">
                            </div>
                            <div class="col">
                                <label for="eoc">EOC</label>
                                <input type="date" name="eoc" class="form-control" id="">
                            </div>
                        </div>
                        <p class="mt-4"></p>
                        <div class="row">
                            <div class="col">
                                <label for="wages">Wages</label>
                                <input type="text" name="wages" id="" class="form-control">
                            </div>
                            <div class="col">
                                <label for="currency">Couuency</label>
                                <select name="currency" id="" class="form-control">
                                    <option>Select Currency</option>
                                    <option value="AED">AED</option>
                                    <option value="BMD">BMD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="GBP">GBP</option>
                                    <option value="INR">INR</option>
                                    <option value="MYR">MYR</option>
                                    <option value="SGD">SGD</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="wagtype">Wages Type</label>
                                <select name="wagtype" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Nett">Nett</option>
                                    <option value="Gross">Gross</option>
                                    <option value="perday">Per Day</option>
                                    <option value="permonth">Per Month</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="signoff">Sign Off</label>
                                <input type="date" name="signoff" class="form-control" id="">
                            </div>
                        </div>
                        <p class="mt-4"></p>
                        <div class="row">
                            <div class="col">
                                <label for="portoff">Sign Off Port</label>
                                <select name="portoff" id="" class="form-control">
                                    <option value="">Select Port</option>
                                    @foreach($ports as $port)
                                    <option value="{{ $port->id }}">{{ $port->port }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="reason">Reason for Sign Off</label>
                                <input type="text" name="reason" id="" class="form-control">
                            </div>
                            <div class="col">
                                <label for="docs">Documents</label>
                                <input type="file" name="docs" id="" class="form-control">
                            </div>
                            <div class="col">
                                <label for="aoa">AOA</label>
                                <input type="file" name="aoa" id="" class="form-control">
                            </div>
                        </div>
                        <p class="mt-4"></p>
                        <div class="row">
                            <div class="col">
                                <label for="aoanum">AOA Number</label>
                                <input type="text" name="aoanum" id="" class="form-control">
                            </div>
                            <div class="col">
                                <label for="eminum">Emigrate Number</label>
                                <input type="text" name="eminum" id="" class="form-control">
                            </div>
                            <div class="col">
                                <input type="hidden" name="memid" value="{{ $memid }}">
                            </div>
                            <div class="col"></div>
                        </div>
                        <p class="mt-4"></p>
                        <input type="submit" value="Add Contract" class="btn btn-primary">
                    </form>
                    <p class="mt-4"></p>
                    @if($contracts->isEmpty())
                    <p>No records found</p>
                    @else
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Rank</td>
                                <td>Company</td>
                                <td>Vsl Type</td>
                                <td>EOC</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contracts as $contract)
                            <tr>
                                <td>{{ $contract->mem_id }}</td>
                                <td>{{ $contract->c_rank }}</td>
                                <td>{{ $contract->c_company }}</td>
                                <td>{{ $contract->c_vessel }}</td>
                                <td>{{ $contract->c_eoc }}</td>
                                <td><a href="{{ route('show-contract', $contract->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-contract', $contract->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-contract', $contract->id) }}" onclick="return confirm('Are you sure you want to delete this contract?');"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="tab-pane" id="document">
                    <p class="mt-4"></p>
                    <h4>Docs of {{ $result->fname }}</h4>
                    @if($fileuploads->isEmpty())
                    <p>No records found</p>
                    @else
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Doc Detail</td>
                                <td>Doc No</td>
                                <td>Issue Dt</td>
                                <td>Exp dt</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fileuploads as $files)
                            <tr>
                                <td>{{ $files->mid }}</td>
                                <td>{{ $files->doc_details }}</td>
                                <td>{{ $files->doc_number }}</td>
                                <td>{{ $files->doc_issue_date }}</td>
                                <td>{{ $files->doc_expiry_date }}</td>
                                <td><a href="{{ route('show-file', $files->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-file', $files->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-document', $files->id) }}" onclick="return confirm('Are you sure you want to delete this document?');"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="tab-pane" id="bank">
                    <h4 class="mt-4">Bank Account Details</h4>
                    @if($bankacs->isEmpty())
                    <p>No records found</p>
                    @else
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Ac Number</td>
                                <td>Bank</td>
                                <td>Branch</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bankacs as $bankac)
                            <tr>
                                <td>{{ $bankac->mem_id }}</td>
                                <td>{{ $bankac->acct_name }}</td>
                                <td>{{ $bankac->acct_no }}</td>
                                <td>{{ $bankac->bank }}</td>
                                <td>{{ $bankac->branch }}</td>
                                <td><a href="{{ route('show-bank', $bankac->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-bank', $bankac->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-bank', $bankac->id) }}" onclick="return confirm('Are you sure you want to delete this Bank Ac?');"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="tab-pane" id="travel">
                    <p class="mt-4"></p>
                    <h4>Travel</h4>
                    @if($travel->isEmpty())
                    <p>No records found</p>
                    @else
                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Date</td>
                                <td>From</td>
                                <td>To</td>
                                <td>Status</td>
                                <td>Port</td>
                                <td>Edit</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($travel as $trav)
                            <tr>
                                <td>{{ $trav->mem_id }}</td>
                                <td>{{ $trav->t_date }}</td>
                                <td>{{ $trav->t_from }}</td>
                                <td>{{ $trav->t_to }}</td>
                                <td>{{ $trav->t_status }}</td>
                                <td>{{ $trav->t_port_agent }}</td>
                                <td><a href="{{ route('show-travel', $trav->id) }}"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-travel', $trav->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="{{ route('delete-travel', $trav->id) }}" onclick="return confirm('Are you sure you want to delete this Travel Ac?');"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="tab-pane" id="medical">
                    <h4>Medicals</h4>
                    <p>blue blue blue blue blue</p>
                </div>
                <div class="tab-pane" id="nkd">
                    <h4>NKD</h4>
                    <p>blue blue blue blue blue</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
