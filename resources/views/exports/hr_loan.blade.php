<table>
	<thead>
		<tr>
			<th>Employee Id</th>
			<th>Employee Name</th>
			<th>Employee Designation</th>
			<th>Date Of Confirmation</th>
			<th>Mobile Number</th>
			<th>Loan Amount</th>
		</tr>
	</thead>
	<tbody>
		@foreach($loans as $loan)
			<tr>
				<td>{{$loan->employee_id}}</td>
				<td>{{$loan->name}}</td>
				<td>{{$loan->designation}}</td>
				<td>{{$loan->prefered_contact_time}}</td>
				<td>{{$loan->mobile_number}}</td>
				<td>{{$loan->loan_amount}}</td>
			</tr>
		@endforeach
	</tbody>
</table>