@extends("_layout")

@section("title")
Manage Country
@endsection



@section("content")
<a class="btn btn-success" href="/country/create">Create New Country</a>
<table class="table table-hover">
    <thead>
        <tr><th width="5%">#</th><th>Country</th><th>ISO2</th><th width="10%"></th></tr>
    </thead>
    <tbody>
        
        @foreach($items as $i)
        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->name}}</td>
            <td>{{$i->iso2}}</td>
            <td>
                <form action="/country/{{$i->id}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete" />
                    
                    <a href="/country/{{$i->id}}" class="btn btn-info btn-xs">
                        <i class="glyphicon glyphicon-info-sign"></i>
                    </a>
                    <a href="/country/{{$i->id}}/edit" class="btn btn-primary btn-xs">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn-xs btn btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                    </button>
                        
                </form>
            </td>
        </tr>
        @endforeach
        
        <?php
        /*foreach($items as $i){
        ?>
        <tr>
            <td><?php echo $i->id ?></td>
            <td><?php echo $i->name ?></td>
            <td><?php echo $i->iso2 ?></td>
            <td></td>
        </tr>
        <?php
        }*/
        ?>
    </tbody>
</table>
@endsection


