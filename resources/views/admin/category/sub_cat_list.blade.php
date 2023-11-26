<ul>
    @foreach ($category->subsets as $subset)
    <li>{{ $subset->name }}</li>
    <ul>
        @foreach ($subset->telics as $telic)
        <li>{{ $telic->name }}</li>
        @endforeach
    </ul>
    @endforeach
</ul>

<br>

