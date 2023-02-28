@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Post erstellen</div>

                    <div class="card-body">

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="title" class="form-label">Titel</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" name="text"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Posten</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
