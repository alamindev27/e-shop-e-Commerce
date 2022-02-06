@component('mail::message')
# Hi {{ $name }},

Your Vendorship is active now.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here.

@component('mail::panel')
Your Vendor Email Is : {{ $email }}<br>
Your Vendor Password Is : {{ $password }}
@endcomponent

Thanks,<br>
Regards <b> E-Shop </b>
@endcomponent