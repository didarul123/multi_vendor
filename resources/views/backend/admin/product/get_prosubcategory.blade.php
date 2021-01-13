<option value="" disabled="" selected="">----Select Pro Sub Category----</option>
@foreach($prosubcategories as $prosubcategory)
<option value="{{$prosubcategory->id}}">
	@php echo $prosubcategory->name; @endphp
</option>
@endforeach
