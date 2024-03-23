@extends('layout.app')
@section('content')
<div class="col-4">
    <form class="py-5 px-5 border mt-5" action="/poll/vote" method="post"  style="transform: translateX(40px)" >
        <div class="row mb-3">
            <label for="judulpoll" class="col-sm-6 col-form-label">judul poll</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="judulpoll" value="WFH / WFO">
            </div>
        </div>
        <div class="row mb-3">
            <label for="deskripsipoll" class="col-sm-6 col-form-label">deskripsipoll</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="deskripsipoll" value="Lebih baik WFH atau WFO">
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-6 pt-0">choices</legend>
            <div class="col-sm-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                    <label class="form-check-label" for="gridRadios1">
                        WFH
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                        WFO
                    </label>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
