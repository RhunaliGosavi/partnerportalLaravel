<p>Hi, This is {{ Auth::user()->name }},</p>
<p>You are receiving this email because new DSA Lead generated. Find the details below.</p>
<p>Applicant's Name - {{ $dsaLead->name }}</p>
<p>Applicant's Email - {{ $dsaLead->email }}</p>
<p>Applicant's PAN - {{ $dsaLead->pan_number }}</p>
<p>Mobile Number - {{ $dsaLead->mobile_number }}</p>
<p>Agency Name -  {{ $dsaLead->agency_name }}</p>
<p>Official Email -  {{ $dsaLead->office_email }}</p>
<p>Official Mobile Number - {{ $dsaLead->office_mobile_number }}</p>
<p>Please download the attached files.</p>
<p>Thanks</p>