<option value="">لطفا یک مورد را انتخاب  کنید </option>
@foreach ($category->subsets as $subs)
<option value="{{ $subs->id }}">{{ $subs->name }}</option>
@endforeach

