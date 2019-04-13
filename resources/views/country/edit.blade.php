@extends("_layout")

@section("title")
Edit Country
@endsection



@section("content")
<form action="/country/{{$item->id}}" class="form-horizontal" method="post">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="put" />
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Country Name</label>
            <div class="col-sm-10">
              <input autofocus type="text" value="{{$item->name}}" class="form-control" id="name" name="name" placeholder="Country Name">
            </div>
          </div>
    
    
          <div class="form-group">
            <label for="iso2" class="col-sm-2 control-label">ISO2</label>
            <div class="col-sm-10">
              <input type="text" maxlength="2" value="{{$item->iso2}}" class="form-control" id="iso2" name="iso2" placeholder="Country ISO2">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-default" href="/country">Cancel</a>
            </div>
          </div>
        </form>
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