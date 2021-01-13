@foreach($search_products as $search_product)
    <table>
        <tr class="mt-3">
        	<!-- <td><img src="{{ asset($search_product->image) }}" alt="" style="width: 60px"></td> -->
            <td><a href="{{route('product-details', [$search_product->slug])}}" style="color: #000;">{{$search_product->name}}</a></td>
        </tr>
    </tbody>

@endforeach