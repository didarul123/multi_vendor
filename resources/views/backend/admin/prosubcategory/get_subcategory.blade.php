<option value="" disabled="" selected="">----Select Sub Category----</option>
@foreach($subcategories as $subcategory)
<option value="{{$subcategory->id}}">
	@php echo $subcategory->name; @endphp
</option>
@endforeach
