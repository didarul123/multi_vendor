<option value="" disabled="" selected="">----Value----</option>
@foreach($attribute_values as $attribute_value)
<option value="{{$attribute_value->id}}">
	@php echo $attribute_value->value; @endphp
</option>
@endforeach
