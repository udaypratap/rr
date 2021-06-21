@extends('emails.layouts.main')

@section('content')
<table width="380" height="100" cellpadding="0" cellspacing="0"
    border="0" align="center">
    <!-- START logo -->
    <tbody>
        <tr>
            <td data-color="Text 01" data-size="Text 01" data-min="5"
                data-max="50" class="td-pad10-wide" align="center"
                style="padding:0px 20px 0px 20px; font-weight:400; font-size:13px; letter-spacing:0.025em; line-height:26px; color:#51636f; font-family:'Poppins', sans-serif; mso-line-height-rule: exactly;">
                @php
                    echo '<pre>';
                        print_r($maildata['message']);
                    echo '</pre>';
                @endphp
                    <br><br>
                    <img src="{{ $maildata['imageurl'] }}" />
            </td>
        </tr>
        <!-- END texts -->
    </tbody>
</table>
@endsection