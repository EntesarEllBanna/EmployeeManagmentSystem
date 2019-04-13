@extends("_layout")

@section("title")
Database Intro
@endsection


@section("content")

<table class="table table-hover">
    <thead><tr><th>#</th><th>Country</th><th>ISO2</th></tr></thead>
    <tbody>
        @foreach($countryList as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->iso2}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
