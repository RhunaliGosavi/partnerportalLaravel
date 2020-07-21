<table>
	<thead>
		<tr>
			<th>Sr No</th>
			<th>Lead Genrated Source</th>
			<th>Source Name</th>
			<th>Source ID</th>
			<th>Applicants Name</th>
			<th>Mobile Number</th>
			<th>Email ID</th>
			<th>Loan Product</th>
			<th>Loan Amount</th>
			<th>Preferred time to contact</th>
		</tr>
	</thead>
	<tbody>
		@php $i = 1;  @endphp
		@foreach($loans as $loan)
			<tr>
                <td>{{$i++}}</td>
				<td>@if(isset($loan->employee)){{'AFL Employee'}}@endif</td>
				<td>@if(isset($loan->employee)){{$loan->employee->name}}@endif</td>
				<td>{{$loan->employee_id}}</td>
				<td>{{$loan->name}}</td>
				<td>{{$loan->mobile_number}}</td>
				<td>@if(isset($loan->employee)){{$loan->employee->email}}@endif</td>
				<td>HR Loan</td>
				<td>{{$loan->loan_amount}}</td>
				<td>{{$loan->prefered_contact_time}}</td>
			</tr>
		@endforeach
		@foreach($otherloans as $loan)
			<tr>
                <td>{{$i++}}</td>
				<td>@if(isset($loan->employee)){{'AFL Employee'}}@endif</td>
				<td>@if(isset($loan->employee)){{$loan->employee->name}}@endif</td>
				<td>{{$loan->employee_id}}</td>
				<td>{{$loan->name}}</td>
				<td>{{$loan->mobile_number}}</td>
				<td>@if(isset($loan->employee)){{$loan->employee->email}}@endif</td>
				<td>@if(isset($loan->loan_product)){{$loan->loan_product->name}}@endif</td>
				<td>{{$loan->loan_amount}}</td>
				<td>{{$loan->prefered_contact_time}}</td>
			</tr>
		@endforeach
	</tbody>
</table>