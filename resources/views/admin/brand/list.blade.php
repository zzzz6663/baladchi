<div class="col-lg-6">
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <h1>
                    جدول زیر  شاخه های
                    {{ $telic->name }}
                </h1>
                <ul class="parent1">
                    @foreach ($telic->brands()->where('parent_id',null)->get() as $brand)
                    <li>
                        <a href="{{ route('brand.edit',$brand->id,['telic_id'=>$brand->telic_id]) }}">
                            {{ $brand->name }}
                        </a>
                        <a class="" href="{{ route('brand.create',['brand_id'=>$brand->id]) }}">
                           <i class='bx bxs-folder-plus' ></i>
                        </a>
                        <ul class="parent2">
                            @if($brand->childs())
                            @foreach ($brand->childs() as $child)
                            <li>
                                <a href="{{ route('brand.edit',$child->id,['telic_id'=>$child->telic_id]) }}">
                                    {{ $child->name }}
                                </a>
                                <a class="" href="{{ route('brand.create',['brand_id'=>$child->id]) }}">
                                    <i class='bx bxs-folder-plus' ></i>
                                 </a>
                            </li>
                                <ul class="parent3">
                                    @if($child->childs())
                                    @foreach ($child->childs() as $child)
                                    <li>
                                        <a href="{{ route('brand.edit',$child->id,['telic_id'=>$child->telic_id]) }}">
                                            {{ $child->name }}
                                        </a>
                                        {{-- <a class="" href="{{ route('brand.create',['telic_id'=>$child->telic_id]) }}">
                                            <i class='bx bxs-folder-plus' ></i>
                                         </a> --}}
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            @endforeach
                            @endif
                        </ul>
                    </li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>
</div>
