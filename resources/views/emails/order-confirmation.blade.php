<h3 style="color: darkred">Bakery Rose</h3>
<p>Cảm ơn bạn đã sử dụng sản phẩm của cửa hàng chúng tôi</p>
<hr>
<div>Đơn hàng  #{{ $order->id }} của bạn bao gồm các sản phẩm sau đây</div>
<table style="width: 60%">
	<tr>
		<th>Tên sản phẩm </th>
		<th>Số lượng </th>
		<th>Giá tiền </th>
		<th>Thành tiền </th>
	</tr>
	@php
	$total = 0;
	@endphp
	@foreach($cakes as $cake)
	@php
		$subtotal = $cake->pivot->quanity * $cake->price;
		$total += $subtotal;
	@endphp
	<tr>
		<th>{{ $cake->name }}</th>
		<th>{{ $cake->pivot->quanity }}</th>
		<th>{{ $cake->price }}</th>
		<th>{{ $subtotal}}</th>
	</tr>
	@endforeach
	<tr>
		<td colspan="4" ><strong>Tổng tiền :</strong> {{ $total }}$</td>
	</tr>
</table>