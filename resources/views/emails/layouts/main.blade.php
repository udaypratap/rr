<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Uday Test</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="margin:0; padding:0;" bgcolor="#eaeced">
<table width="100%" height="100" cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr>
<td>
<table width="600" cellpadding="0" cellspacing="0" border="0"
align="center">
<tbody>
<tr>
<td>
<!-- Header section -->
@include('emails.layouts.header')
<!-- START main content -->
<table data-bgcolor="BG Color 01" width="100%" style="min-height:200px; padding: 0 0 30px 0;" cellpadding="0"
cellspacing="0" border="0" bgcolor="#FFFFFF" align="center">
<tbody>
<tr>
<td valign="top" style="padding:20px 0px 0px 0px;">
    @yield('content')
</td>
</tr>
</tbody>
</table>
<!-- END main content -->
<!-- START footer -->
@include('emails.layouts.footer')
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</body>

</html>