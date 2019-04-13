@extends("_layout")

@section("title")
Country Details
@endsection



@section("content")
<dl class="dl-horizontal">
    <dt>Country</dt>
    <dd>{{$item->name}}</dd>
    <dt>ISO2</dt>
    <dd>{{$item->iso2}}</dd>
</dl>
<a class="btn btn-primary" href="/country/{{$item->id}}/edit">Edit</a>
<a class="btn btn-default" href="/country">Cancel</a>
<hr>
<form action="/country/{{$item->id}}" class="form-horizontal" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="delete" />
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger">Delete</a>
        </div>
    </div>
</form>
@endsection