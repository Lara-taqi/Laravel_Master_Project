@component('mail::message')
# Booking Status Update

Hello {{ $booking->user->name }},

Your booking for **{{ $booking->hotel->hotel_name }}** has been **{{ $booking->status }}**.

**Check-in:** {{ $booking->check_in }}  
**Check-out:** {{ $booking->check_out }}  
**Total Price:** ${{ number_format($booking->total_price, 2) }}

Thanks,<br>
{{ config('Hotelak') }}
@endcomponent
