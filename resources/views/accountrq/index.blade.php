@extends("_layout")

@section("title")
Manage Account
@endsection



@section("content")
<a class="btn btn-success" href="/accountrq/create">Create New Account</a>
<table class="table table-hover">
    <thead>
        <tr><th width="5%">#</th><th>Full Name</th><th>Email</th><th>Active</th><th>Gender</th>
            <th>Country</th>
            <th width="10%"></th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($items as $i)
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->fullname}}</td>
            <td>{{$i->email}}</td>
            <td>{{$i->active}}</td>
            <td>{{$i->gender}}</td>
            <td>{{$i->country}}</td>
            <td>
                <form action="/accountrq/{{$i->id}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />
                    
                    <a href="/accountrq/{{$i->id}}" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-info-sign"></i>
                    </a>
                    <a href="/accountrq/{{$i->id}}/edit" class="btn btn-primary btn-xs">
                        <i class="glyphicon glyphicon-bookmark"></i>
                    </a>
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn-xs btn btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                    </button>
                        
                </form>
            </td>
        </tr>
        @endforeach
        
        </tbody>
</table>
@endsection


