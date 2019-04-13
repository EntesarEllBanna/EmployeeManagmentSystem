@extends("_layout")

@section("title")
Send To View
@endsection


@section("content")
<h3>Using Blade</h3>
$x = <b>{{$x}}</b> <br>
$y = <b>{{$y}}</b> <br>
<h4>Colors</h4>
<ul>
    @foreach($colors as $c)
    <li>{{$c}}</li>
    @endforeach
</ul>
<h3>Using Pure PHP</h3>
$x = <b><?php echo $x ?></b>
<h4>Colors</h4>
<ul>
    <?php foreach($colors as $c){ ?>
    <li><?php echo $c ?></li>
    <?php } ?>
</ul>
@endsection