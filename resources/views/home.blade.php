@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Dashboard</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>{{ Auth::user()->name }} </h1>
                        <a class="btn btn-danger text-white" onclick="myFunction()">Edit Name</a>
                        <h3>{{ Auth::user()->email }} </h3>
                        You are logged in!
                    </div>

                    <form id="edit" method="post" action="{{ route('editName') }}" style="display: none; padding: 15px;">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ Auth::user()->id }}" readonly/>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" />
                        <br>
                        <input type="submit" class="btn btn-danger text-white" value="Done"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("edit");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>
