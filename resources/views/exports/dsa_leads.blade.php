<table>
	<thead>
		<tr>
            <th>Sr Number</th>
			<th>Employee Name</th>
            <th>Employee ID</th>
			<th>Applicant's PAN</th>
			<th>Applicant's Name</th>
			<th>DOB</th>
			<th>Gender</th>
			<th>Mobile Number</th>
            <th>Email ID</th>
            <th>Bank Account Number</th>
            <th>IFSC Code</th>
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>UPI ID</th>
            <th>Address Type</th>
            <th>Address Line 1</th>
            <th>Address Line 2</th>
            <th>Pincode</th>
            <th>City</th>
            <th>State</th>
            <th>Agency Name</th>
            <th>GST Number</th>
            <th>Official Mobile Number</th>
            <th>Official Email ID</th>
		</tr>
	</thead>
	<tbody>
        @php $i = 1;  @endphp
		@foreach($dsa_leads as $dsa_lead)
			<tr>
                <td>{{$i++}}</td>
                <td>@if(isset($dsa_lead->employee)){{$dsa_lead->employee->name}}@endif</td>
				<td>@if(isset($dsa_lead->employee)){{$dsa_lead->employee->employee_id}}@endif</td>
				<td>{{$dsa_lead->pan_number}}</td>
				<td>{{$dsa_lead->name}}</td>
				<td>{{$dsa_lead->dob}}</td>
				<td>{{$dsa_lead->gender}}</td>
				<td>{{$dsa_lead->mobile_number}}</td>
				<td>{{$dsa_lead->email}}</td>
				<td>{{$dsa_lead->bank_acc_number}}</td>
				<td>{{$dsa_lead->ifsc_code}}</td>
				<td>{{$dsa_lead->bank_name}}</td>
				<td>{{$dsa_lead->branch_name}}</td>
				<td>{{$dsa_lead->upi_id}}</td>
				<td>{{$dsa_lead->address_type}}</td>
				<td>{{$dsa_lead->address_line1}}</td>
				<td>{{$dsa_lead->address_line2}}</td>
				<td>{{$dsa_lead->pincode}}</td>
				<td>{{$dsa_lead->city}}</td>
				<td>{{$dsa_lead->state}}</td>
				<td>{{$dsa_lead->agency_name}}</td>
				<td>{{$dsa_lead->gst_number}}</td>
				<td>{{$dsa_lead->office_mobile_number}}</td>
				<td>{{$dsa_lead->office_email}}</td>
			</tr>
		@endforeach
	</tbody>
</table>