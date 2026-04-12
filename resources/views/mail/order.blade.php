@component('mail::message')
# Welcome To PokharaYogaSchoolAndRetreatCenter

User Informations:

User Name: {{ $data['name'] }}<br>
    Email:{{ $data['email'] }}<br>
    Gender:{{ $data['gender'] }}<br>
    Date Of Birth:{{ $data['dob'] }}<br>
    Contact Number:{{ $data['contact'] }}<br>
    Whattsapp Number:{{ $data['whatsappNo'] }}<br>
    Nationality:{{ $data['nationality'] }}<br>
    Address:{{ $data['address'] }}<br>
    Course:{{ $data['course'] }}<br>
    Start Date: {{ $data['startDate'] }}<br>
    Accommodation: {{ $data['accommodation'] }}<br>
    Practice Time: {{ $data['practiceTime'] }}<br>
    Yoga Experience: {{ $data['yogaExperience'] }}<br>
    Puropse Of Buying Course: {{ $data['purposeOfcourse'] }}<br>
    Medical Condition: {{ $data['medicalCondition'] }}<br>
    specialRequirement: {{ $data['specialRequirement'] }}<br>
    EmergencyContact: {{ $data['EmergencyContact'] }}<br>
    Comments/Questions: {{ $data['comments'] }}<br>
    How heared us: {{ $data['hearUs'] }}<br>
    Reffered By: {{ $data['reffered'] }}<br>
    Terms and Condition: {{ $data['termsCondition'] }}<br>
    Coupon Code: {{ $data['coupon_code'] }} <br>

@component('mail::button', ['url' => 'https://www.pokharayogaschoolandretreatcenter.com/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
